<?php

namespace App\Services;

use Anthropic\Anthropic;
use Exception;
use Illuminate\Support\Facades\Log;

class ClaudeService
{
    private Anthropic $client;
    private string $model = 'claude-sonnet-4-20250514';

    public function __construct()
    {
        $apiKey = config('services.anthropic.api_key') ?? env('ANTHROPIC_API_KEY');

        if (!$apiKey) {
            throw new Exception('Anthropic API key not configured');
        }

        $this->client = Anthropic::factory()
            ->withApiKey($apiKey)
            ->withHttpHeader('anthropic-version', '2023-06-01')
            ->make();
    }

    /**
     * Modify HTML template based on user's natural language prompt
     *
     * @param string $currentHtml The current HTML template
     * @param string $userPrompt User's modification request
     * @param string $locale Current locale (en-US or ja-JP)
     * @return string Modified HTML template
     * @throws Exception
     */
    public function modifyTemplate(string $currentHtml, string $userPrompt, string $locale = 'en-US'): string
    {
        try {
            $systemPrompt = $this->buildSystemPrompt($currentHtml, $userPrompt, $locale);

            $response = $this->client->messages()->create([
                'model' => $this->model,
                'max_tokens' => 8000,
                'temperature' => 0.3,
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $systemPrompt,
                    ],
                ],
            ]);

            $modifiedHtml = $response->content[0]->text ?? '';

            if (empty($modifiedHtml)) {
                throw new Exception('Claude API returned empty response');
            }

            // Extract HTML if Claude wrapped it in markdown code blocks
            $modifiedHtml = $this->extractHtmlFromResponse($modifiedHtml);

            return $modifiedHtml;

        } catch (Exception $e) {
            Log::error('Claude API Error', [
                'error' => $e->getMessage(),
                'prompt_length' => strlen($userPrompt),
                'html_length' => strlen($currentHtml),
            ]);

            throw new Exception('Failed to generate template: ' . $e->getMessage());
        }
    }

    /**
     * Build the system prompt for Claude
     */
    private function buildSystemPrompt(string $currentHtml, string $userPrompt, string $locale): string
    {
        $languageName = $locale === 'ja-JP' ? 'Japanese' : 'English';

        return <<<PROMPT
You are an expert web developer helping users modify their landing page HTML templates.

Current HTML template:
```html
{$currentHtml}
```

User's modification request (in {$languageName}):
"{$userPrompt}"

Instructions:
1. Modify ONLY what the user requested - do not make unnecessary changes
2. Preserve all existing Tailwind CSS classes and styling
3. Maintain responsive design (mobile-first approach)
4. Keep accessibility standards (ARIA labels, semantic HTML, alt tags)
5. Ensure all sections remain functional and well-structured
6. If the template uses Blade directives (@php, @foreach, etc.), preserve them
7. Keep the overall structure and layout intact unless explicitly requested to change
8. Return ONLY the complete modified HTML document
9. Do NOT include explanations, comments, or markdown formatting
10. Do NOT wrap the HTML in code blocks

Return the complete modified HTML document now:
PROMPT;
    }

    /**
     * Extract HTML from Claude's response if it's wrapped in markdown code blocks
     */
    private function extractHtmlFromResponse(string $response): string
    {
        // Remove markdown code blocks if present
        $response = preg_replace('/^```html\s*/i', '', $response);
        $response = preg_replace('/^```\s*/m', '', $response);
        $response = preg_replace('/\s*```$/m', '', $response);

        return trim($response);
    }

    /**
     * Validate that the response contains valid HTML
     */
    private function isValidHtml(string $html): bool
    {
        // Basic validation - check for HTML structure
        return str_contains($html, '<html') && str_contains($html, '</html>');
    }
}
