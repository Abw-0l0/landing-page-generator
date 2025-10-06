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
            /* border-bottom: 1px solid #e5e7eb; */
            padding: 10px 20px;
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
            padding: 10px;
            background: #ffffff;
        }

        .prompt-textarea {
            width: 100%;
            min-height: 100px;
            padding: 16px;
            border: 1px solid #e5e7eb;
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
            margin-top: 8px;
            display: flex;
            gap: 12px;
        }

        .btn-primary {
            padding: 8px 20px;
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
            padding: 8px 20px;
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

        /* Code Editor */
        .code-editor {
            flex: 1;
            overflow: auto;
            font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
            font-size: 13px;
            line-height: 1.6;
            padding: 16px;
            color: #d4d4d4;
            background: #1e1e1e;
            border: none;
            resize: none;
            outline: none;
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
                    <span id="saveStatusText">{{ __('editor.saved') }}</span>
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
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('editor.ask_ai_to_modify') }}</label>
                        <textarea
                            id="promptTextarea"
                            class="prompt-textarea"
                            placeholder="{{ __('editor.prompt_placeholder') }}"
                        ></textarea>
                        <div class="prompt-actions">
                            <button class="btn-primary" id="generateBtn">{{ __('editor.generate') }}</button>
                            <button class="btn-secondary" id="clearPromptBtn">{{ __('editor.clear') }}</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="preview-panel">
                <div class="toggle-controls">
                    <div class="toggle-group">
                        <button class="toggle-btn active" data-view="preview">{{ __('editor.preview') }}</button>
                        <button class="toggle-btn" data-view="codeview">{{ __('editor.code') }}</button>
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

                <!-- Code Editor View -->
                <div class="view-area" id="codeViewArea">
                    <textarea
                        id="codeEditor"
                        class="code-editor"
                        spellcheck="false"
                        placeholder="{{ __('editor.edit_html_placeholder') }}"
                    >{{ $project->content }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-save configuration
        const AUTOSAVE_DELAY = 2000; // 2 seconds
        let autosaveTimer = null;
        let isSaving = false;

        // DOM Elements
        const codeEditor = document.getElementById('codeEditor');
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

        // Update save status UI
        function updateSaveStatus(status) {
            if (status === 'saving') {
                statusDot.classList.add('saving');
                saveStatusText.textContent = '{{ __('editor.saving') }}';
            } else if (status === 'saved') {
                statusDot.classList.remove('saving');
                saveStatusText.textContent = '{{ __('editor.saved') }}';
            } else if (status === 'error') {
                statusDot.classList.remove('saving');
                saveStatusText.textContent = '{{ __('editor.error_saving') }}';
            }
        }

        // Save content to server
        async function saveContent(content) {
            if (isSaving) return;

            isSaving = true;
            updateSaveStatus('saving');

            try {
                const response = await fetch('{{ route("locale.editor.autosave", ["locale" => app()->getLocale(), "projectId" => $project->id]) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ content })
                });

                const data = await response.json();

                if (data.success) {
                    updateSaveStatus('saved');
                    // Refresh preview iframe
                    previewFrame.src = previewFrame.src;
                } else {
                    updateSaveStatus('error');
                    console.error('Save failed:', data);
                }
            } catch (error) {
                updateSaveStatus('error');
                console.error('Save error:', error);
            } finally {
                isSaving = false;
            }
        }

        // Debounced auto-save
        function scheduleAutosave() {
            clearTimeout(autosaveTimer);
            autosaveTimer = setTimeout(() => {
                saveContent(codeEditor.value);
            }, AUTOSAVE_DELAY);
        }

        // Listen for code changes
        codeEditor.addEventListener('input', scheduleAutosave);

        // Save on Ctrl/Cmd + S
        codeEditor.addEventListener('keydown', (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === 's') {
                e.preventDefault();
                clearTimeout(autosaveTimer);
                saveContent(codeEditor.value);
            }
        });

        // Prompt actions
        document.getElementById('clearPromptBtn').addEventListener('click', () => {
            promptTextarea.value = '';
        });

        document.getElementById('generateBtn').addEventListener('click', async () => {
            const prompt = promptTextarea.value.trim();
            if (!prompt) {
                alert('{{ __("editor.please_enter_prompt_first") }}');
                return;
            }

            // Disable button and show loading state
            const generateBtn = document.getElementById('generateBtn');
            const originalText = generateBtn.textContent;
            generateBtn.disabled = true;
            generateBtn.textContent = '{{ __("editor.generating") }}...';
            updateSaveStatus('saving');

            try {
                const response = await fetch('{{ route("locale.editor.generateAi", ["locale" => app()->getLocale(), "projectId" => $project->id]) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ prompt })
                });

                const data = await response.json();

                if (data.success) {
                    // Update code editor with new content
                    codeEditor.value = data.content;

                    // Refresh preview iframe
                    previewFrame.src = previewFrame.src;

                    // Update save status
                    updateSaveStatus('saved');

                    // Show success message
                    alert(data.message || '{{ __("editor.ai_success") }}');

                    // Clear prompt after successful generation
                    promptTextarea.value = '';
                } else {
                    updateSaveStatus('error');
                    alert(data.error || '{{ __("editor.ai_error") }}');
                }
            } catch (error) {
                updateSaveStatus('error');
                console.error('AI Generation error:', error);
                alert('{{ __("editor.ai_error") }}');
            } finally {
                // Re-enable button
                generateBtn.disabled = false;
                generateBtn.textContent = originalText;
            }
        });

        // Save before leaving
        window.addEventListener('beforeunload', (e) => {
            if (autosaveTimer) {
                e.preventDefault();
                saveContent(codeEditor.value);
            }
        });
    </script>
</body>
</html>
