<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .editor-container {
            display: flex;
            height: 100vh;
            flex-direction: column;
        }

        .editor-header {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 12px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
        }

        .editor-body {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        .editor-panel, .preview-panel {
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .editor-panel {
            flex: 0 0 30%;
        }

        .preview-panel {
            flex: 1;
            background: #f9fafb;
            margin: 5px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        /* Toggle Controls */
        .toggle-controls {
            display: flex;
            align-items: center;
            padding: 2px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
        }

        .preview-panel .toggle-controls {
            background: #f9fafb;
        }

        .toggle-group {
            display: inline-flex;
            background: #f3f4f6;
            border-radius: 8px;
            padding: 4px;
        }

        .toggle-btn {
            padding: 2px 12px;
            border: none;
            background: transparent;
            color: #6b7280;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .toggle-btn:hover {
            color: #374151;
        }

        .toggle-btn.active {
            background: #ffffff;
            color: #111827;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        /* View Areas */
        .view-area {
            flex: 1;
            overflow: hidden;
            display: none;
        }

        .view-area.active {
            display: flex;
            flex-direction: column;
        }

        /* Prompt Area */
        .prompt-area {
            margin-top: auto;
            padding: 20px;
            background: #ffffff;
        }

        .prompt-textarea {
            width: 100%;
            min-height: 100px;
            padding: 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            font-size: 15px;
            line-height: 1.6;
            resize: vertical;
            outline: none;
            transition: border-color 0.2s;
        }

        .prompt-textarea:focus {
            border-color: #007CBE;
        }

        .prompt-actions {
            margin-top: 16px;
            display: flex;
            gap: 12px;
        }

        .btn-primary {
            padding: 10px 20px;
            background: #007CBE;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-primary:hover {
            background: #0090dd;
        }

        .btn-secondary {
            padding: 10px 20px;
            background: #f3f4f6;
            color: #374151;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        /* Code View (Read-only) */
        .code-view {
            flex: 1;
            overflow: auto;
            font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
            font-size: 13px;
            line-height: 1.6;
            padding: 16px;
            color: #d4d4d4;
            background: #1e1e1e;
            white-space: pre;
            margin: 0;
        }

        /* Preview Iframe */
        .preview-iframe {
            flex: 1;
            border: none;
            background: white;
        }

        /* Status Indicator */
        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #6b7280;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #10b981;
        }

        .status-dot.saving {
            background: #f59e0b;
        }

        @media (max-width: 768px) {
            .editor-body {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="editor-container">
        <!-- Header -->
        <div class="editor-header">
            <div class="flex items-center gap-4">
                <a href="{{ route('locale.dashboard', ['locale' => app()->getLocale()]) }}" class="flex items-center gap-2 text-gray-700 hover:text-[#007CBE] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <!-- <span class="font-medium">Dashboard</span> -->
                </a>
                <div class="h-6 w-px bg-gray-300"></div>
                <h1 class="text-md font-semibold text-gray-900">{{ $project->name }}</h1>
            </div>
            <div class="flex items-center gap-4">
                <div id="saveStatus" class="status-indicator">
                    <span class="status-dot"></span>
                    <span id="saveStatusText">Saved</span>
                </div>
            </div>
        </div>

        <!-- Editor Body -->
        <div class="editor-body">
            <!-- Left Panel -->
            <div class="editor-panel">
                <!-- Prompt View -->
                <div class="view-area active" id="promptView">
                    <div class="prompt-area">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Ask AI to modify your website</label>
                        <textarea
                            id="promptTextarea"
                            class="prompt-textarea"
                            placeholder="e.g., Change the header background to blue, add a testimonials section, make the font larger..."
                        ></textarea>
                        <div class="prompt-actions">
                            <button class="btn-primary" id="generateBtn">Generate</button>
                            <button class="btn-secondary" id="clearPromptBtn">Clear</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="preview-panel">
                <div class="toggle-controls">
                    <div class="toggle-group">
                        <button class="toggle-btn active" data-view="preview">Preview</button>
                        <button class="toggle-btn" data-view="codeview">Code</button>
                    </div>
                </div>

                <!-- Preview View -->
                <div class="view-area active" id="previewView">
                    <iframe
                        id="previewFrame"
                        class="preview-iframe"
                        sandbox="allow-same-origin allow-scripts allow-forms"
                        src="{{ route('locale.editor.preview', ['locale' => app()->getLocale(), 'projectId' => $project->id]) }}"
                    ></iframe>
                </div>

                <!-- Code View -->
                <div class="view-area" id="codeViewArea">
                    <pre id="codeView" class="code-view">{{ $project->content }}</pre>
                </div>
            </div>
        </div>
    </div>

    <script>
        // DOM Elements
        const codeView = document.getElementById('codeView');
        const previewFrame = document.getElementById('previewFrame');
        const saveStatus = document.getElementById('saveStatus');
        const saveStatusText = document.getElementById('saveStatusText');
        const statusDot = saveStatus.querySelector('.status-dot');
        const promptTextarea = document.getElementById('promptTextarea');

        // Toggle functionality
        const rightToggles = document.querySelectorAll('.preview-panel .toggle-btn');

        rightToggles.forEach(btn => {
            btn.addEventListener('click', () => {
                const view = btn.dataset.view;
                rightToggles.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                document.getElementById('previewView').classList.remove('active');
                document.getElementById('codeViewArea').classList.remove('active');

                if (view === 'preview') {
                    document.getElementById('previewView').classList.add('active');
                } else {
                    document.getElementById('codeViewArea').classList.add('active');
                }
            });
        });

        // Prompt actions
        document.getElementById('clearPromptBtn').addEventListener('click', () => {
            promptTextarea.value = '';
        });

        document.getElementById('generateBtn').addEventListener('click', () => {
            const prompt = promptTextarea.value.trim();
            if (!prompt) {
                alert('Please enter a prompt first');
                return;
            }

            // TODO: Implement AI generation
            alert('AI generation will be implemented in the next phase.');
        });
    </script>
</body>
</html>
