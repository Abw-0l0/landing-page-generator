<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="favicon" rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <title>{{ config('app.name', 'Landing Page Generator') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
    <!-- Header with Auth Links -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <a href="/en-US" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-[#007CBE] flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ __('app_name') }}</h1>
                </a>
                <nav class="flex items-center gap-4">
                    <!-- Language Switcher -->
                    <div class="relative">
                        <button id="languageButton" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#007CBE] rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                            </svg>
                            <span>{{ app()->getLocale() === 'ja-JP' ? '日本語' : 'English' }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="languageDropdown" class="hidden absolute right-0 mt-2 w-40 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                            <div class="py-1">
                                <a href="{{ route('locale.welcome', ['locale' => 'en-US']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    English
                                </a>
                                <a href="{{ route('locale.welcome', ['locale' => 'ja-JP']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    日本語
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Auth Links -->
                    @auth
                        <a href="{{ route('locale.dashboard', ['locale' => app()->getLocale()]) }}" class="px-4 py-2 text-sm font-medium text-white bg-[#007CBE] hover:bg-[#006AA8] rounded-lg transition-colors">
                            {{ __('dashboard') }}
                        </a>
                    @else
                        <a href="{{ route('locale.auth', ['locale' => app()->getLocale()]) }}#login" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-[#007CBE] transition-colors">
                            {{ __('auth.log_in') }}
                        </a>
                        <a href="{{ route('locale.auth', ['locale' => app()->getLocale()]) }}#register" class="px-4 py-2 text-sm font-medium text-white bg-[#007CBE] hover:bg-[#006AA8] rounded-lg transition-colors">
                            {{ __('auth.register') }}
                        </a>
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                {{ __('hero_title') }} <span class="text-[#007CBE]">{{ __('hero_title_highlight') }}</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ __('hero_subtitle') }}
            </p>
            <div class="mt-6 flex items-center justify-center gap-6 text-sm text-gray-500">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#007CBE]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ __('timeline_4_weeks') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#007CBE]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ __('claude_ai_integration') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#007CBE]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ __('aws_hosting') }}</span>
                </div>
            </div>
        </div>

        <!-- Tech Stack Cards -->
        <div class="grid md:grid-cols-4 gap-6 mb-12">
            <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('backend') }}</h3>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        Laravel 11 (PHP)
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        PostgreSQL (AWS RDS)
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        Laravel Breeze
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        Queue + AWS SQS
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('frontend') }}</h3>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        Blade + TailwindCSS
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        Alpine.js
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        Real-time iframe
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('ai_integration') }}</h3>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        Claude API (Sonnet 4)
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        ~$3-15 per million tokens
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        Japanese content gen
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ __('infrastructure') }}</h3>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        EC2 (t3.medium)
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        S3 + CloudFront
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#007CBE]"></span>
                        Static sites on S3
                    </li>
                </ul>
            </div>
        </div>

        <!-- Development Timeline -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-[#007CBE] to-[#005A94] px-8 py-6">
                <h2 class="text-3xl font-bold text-white">4-Week Sprint Breakdown</h2>
                <p class="text-blue-100 mt-2">Rapid MVP development with core features</p>
            </div>

            <div class="p-8">
                <!-- Week 1 -->
                <div class="mb-8 pb-8 border-b border-gray-200">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#007CBE] text-white font-bold text-lg">
                            1
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Week 1: Foundation</h3>
                            <p class="text-gray-600">Days 1-7 • Setup complete, users can browse templates</p>
                        </div>
                    </div>
                    <div class="ml-16 grid md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Days 1-2</h4>
                            <p class="text-sm text-gray-600">Laravel setup, AWS config, DB schema</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">Environment Ready</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Days 3-4</h4>
                            <p class="text-sm text-gray-600">User auth (Breeze), registration, login</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">Auth Working</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Day 5</h4>
                            <p class="text-sm text-gray-600">Create 3 HTML templates with Tailwind</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">Templates Ready</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Days 6-7</h4>
                            <p class="text-sm text-gray-600">Template gallery, preview, language toggle</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">Bilingual UI</span>
                        </div>
                    </div>
                    <div class="ml-16 mt-4 p-4 bg-blue-50 rounded-lg border-l-4 border-[#007CBE]">
                        <p class="text-sm font-semibold text-[#007CBE]">✓ Milestone: Users can register and browse templates</p>
                    </div>
                </div>

                <!-- Week 2 -->
                <div class="mb-8 pb-8 border-b border-gray-200">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#007CBE] text-white font-bold text-lg">
                            2
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Week 2: Customization</h3>
                            <p class="text-gray-600">Days 8-14 • Users can customize templates with V0-style interface</p>
                        </div>
                    </div>
                    <div class="ml-16 grid md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Days 8-9</h4>
                            <p class="text-sm text-gray-600">V0-style split-screen interface, mode toggle</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded">Editor Layout</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Days 10-11</h4>
                            <p class="text-sm text-gray-600">Manual mode: forms (clinic info, services, contact)</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded">Basic Editing</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Day 12</h4>
                            <p class="text-sm text-gray-600">Image upload (logo, hero, gallery) to S3</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded">Media Management</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Days 13-14</h4>
                            <p class="text-sm text-gray-600">Color scheme picker, responsive preview, auto-save</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded">Full Editor</span>
                        </div>
                    </div>
                    <div class="ml-16 mt-4 p-4 bg-blue-50 rounded-lg border-l-4 border-[#007CBE]">
                        <p class="text-sm font-semibold text-[#007CBE]">✓ Milestone: Users can fully customize a template with V0-style editor</p>
                    </div>
                </div>

                <!-- Week 3 -->
                <div class="mb-8 pb-8 border-b border-gray-200">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#007CBE] text-white font-bold text-lg">
                            3
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Week 3: AI Power</h3>
                            <p class="text-gray-600">Days 15-21 • Single AI modifies template based on any prompt</p>
                        </div>
                    </div>
                    <div class="ml-16 grid md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Days 15-16</h4>
                            <p class="text-sm text-gray-600">Claude API setup, system prompt design</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded">API Connected</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Days 17-18</h4>
                            <p class="text-sm text-gray-600">AI template modifier (processes any request)</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded">AI Updates Template</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Day 19</h4>
                            <p class="text-sm text-gray-600">Preview auto-refresh after AI changes</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded">Real-time Updates</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-2">Days 20-21</h4>
                            <p class="text-sm text-gray-600">Credit system, queue (SQS), error handling</p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded">Stable AI System</span>
                        </div>
                    </div>
                    <div class="ml-16 mt-4 p-4 bg-blue-50 rounded-lg border-l-4 border-[#007CBE]">
                        <p class="text-sm font-semibold text-[#007CBE]">✓ Milestone: Users type any prompt → AI modifies template → Preview updates automatically</p>
                    </div>
                </div>

                <!-- Week 4 -->
                <div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#007CBE] text-white font-bold text-lg">
                            4
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Week 4: Coming Soon</h3>
                            <p class="text-gray-600">Days 22-28 • Deployment & Polish</p>
                        </div>
                    </div>
                    <div class="ml-16 p-6 bg-gradient-to-r from-gray-50 to-blue-50 rounded-lg border border-gray-200">
                        <p class="text-gray-600 mb-4">Final week will focus on:</p>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#007CBE]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                One-click deployment to AWS S3
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#007CBE]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                CloudFront CDN configuration
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#007CBE]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Testing & bug fixes
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#007CBE]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Performance optimization
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Target Market -->
        <div class="mt-12 bg-white rounded-xl shadow-md border border-gray-200 p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Target Market</h2>
            <p class="text-gray-600 mb-4">
                Japanese healthcare providers including clinics, dentists, and medical practices looking for professional landing pages with minimal technical effort.
            </p>
            <div class="flex flex-wrap gap-2">
                <span class="px-3 py-1 bg-blue-100 text-[#007CBE] rounded-full text-sm font-medium">Japanese Clinics</span>
                <span class="px-3 py-1 bg-blue-100 text-[#007CBE] rounded-full text-sm font-medium">Dental Practices</span>
                <span class="px-3 py-1 bg-blue-100 text-[#007CBE] rounded-full text-sm font-medium">Medical Providers</span>
                <span class="px-3 py-1 bg-blue-100 text-[#007CBE] rounded-full text-sm font-medium">Healthcare Industry</span>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 mt-12 border-t border-gray-200">
        <p class="text-center text-gray-600 text-sm">
            {{ __('footer_text') }} {{ date('Y') }}
        </p>
    </footer>
</body>
</html>
