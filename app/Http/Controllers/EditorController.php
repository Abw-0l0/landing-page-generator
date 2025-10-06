<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    /**
     * Create a new project from a template and redirect to editor.
     */
    public function create(string $locale, string $templateId): RedirectResponse
    {
        $template = Template::findOrFail((int) $templateId);

        // Increment template views
        $template->incrementViews();

        // Load template content from blade file
        $templateContent = view("templates.{$template->template_file}")->render();

        // Create new project for the user
        $project = Project::create([
            'user_id' => Auth::id(),
            'template_id' => $template->id,
            'name' => $template->name . ' - ' . now()->format('M d, Y'),
            'content' => $templateContent,
        ]);

        return redirect()->route('locale.editor.edit', [
            'locale' => $locale,
            'projectId' => $project->id
        ]);
    }

    /**
     * Show the editor for an existing project.
     */
    public function edit(string $locale, string $projectId): View
    {
        $project = Project::with('template')->findOrFail((int) $projectId);

        // Ensure user owns this project
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('editor', compact('project'));
    }

    /**
     * Render preview HTML for iframe.
     */
    public function preview(string $locale, string $projectId): string
    {
        $project = Project::findOrFail((int) $projectId);

        // Ensure user owns this project
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return $project->content;
    }

    /**
     * Auto-save project content via AJAX.
     */
    public function autosave(Request $request, string $locale, string $projectId): JsonResponse
    {
        $project = Project::findOrFail((int) $projectId);

        // Ensure user owns this project
        if ($project->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $project->update([
            'content' => $validated['content'],
            'last_edited_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Project saved successfully',
            'last_edited_at' => $project->last_edited_at->diffForHumans(),
        ]);
    }
}
