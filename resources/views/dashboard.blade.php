@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-8">
    <!-- Navigation Tabs -->
    <div class="border-b border-gray-200 mb-8">
        <nav class="flex gap-8">
            <button class="pb-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 transition-colors">
                {{ __('dashboard.community_tab') }}
            </button>
            <button class="pb-4 px-1 border-b-2 border-[#007CBE] text-[#007CBE] font-medium transition-colors">
                {{ __('dashboard.from_community_tab') }}
            </button>
            <button class="pb-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 transition-colors">
                {{ __('dashboard.your_templates_tab') }}
            </button>
        </nav>
    </div>

    <!-- Hero Section -->
    <div class="text-center mb-8">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            {{ __('dashboard.hero_title') }}
        </h1>
        <p class="text-gray-600 text-lg mb-6">
            {{ __('dashboard.hero_subtitle') }}
        </p>

        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-12">
            <div class="relative">
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input
                    type="text"
                    class="prompt-input w-full pl-12 pr-4 py-3 rounded-lg text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-[#007CBE]"
                    placeholder="{{ __('dashboard.search_templates') }}"
                />
            </div>
        </div>
    </div>

    <!-- Featured Templates Section -->
    <div>
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">{{ __('dashboard.from_community') }}</h2>
            <a href="#" class="text-[#007CBE] hover:text-[#0090dd] font-medium flex items-center gap-1">
                {{ __('dashboard.browse_all') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Template Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Template Card 1 -->
            <div class="template-card rounded-xl overflow-hidden cursor-pointer">
                <div class="aspect-video bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="p-4">
                    <h3 class="text-gray-900 font-semibold mb-1">{{ __('dashboard.template_effortless') }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ __('dashboard.template_effortless_desc') }}</p>
                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <span>👁 398</span>
                    </div>
                </div>
            </div>

            <!-- Template Card 2 -->
            <div class="template-card rounded-xl overflow-hidden cursor-pointer">
                <div class="aspect-video bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <div class="p-4">
                    <h3 class="text-gray-900 font-semibold mb-1">{{ __('dashboard.template_3d') }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ __('dashboard.template_3d_desc') }}</p>
                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <span>👁 120</span>
                    </div>
                </div>
            </div>

            <!-- Template Card 3 -->
            <div class="template-card rounded-xl overflow-hidden cursor-pointer">
                <div class="aspect-video bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="p-4">
                    <h3 class="text-gray-900 font-semibold mb-1">{{ __('dashboard.template_ai_agents') }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ __('dashboard.template_ai_agents_desc') }}</p>
                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <span>👁 817</span>
                    </div>
                </div>
            </div>

            <!-- Template Card 4 -->
            <div class="template-card rounded-xl overflow-hidden cursor-pointer">
                <div class="aspect-video bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="p-4">
                    <h3 class="text-gray-900 font-semibold mb-1">Medical Clinic Landing</h3>
                    <p class="text-gray-600 text-sm mb-2">1,543 views</p>
                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <span>👁 543</span>
                    </div>
                </div>
            </div>

            <!-- Template Card 5 -->
            <div class="template-card rounded-xl overflow-hidden cursor-pointer">
                <div class="aspect-video bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="p-4">
                    <h3 class="text-gray-900 font-semibold mb-1">Dental Practice Template</h3>
                    <p class="text-gray-600 text-sm mb-2">892 views</p>
                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <span>👁 892</span>
                    </div>
                </div>
            </div>

            <!-- Template Card 6 -->
            <div class="template-card rounded-xl overflow-hidden cursor-pointer">
                <div class="aspect-video bg-gradient-to-br from-pink-100 to-pink-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <div class="p-4">
                    <h3 class="text-gray-900 font-semibold mb-1">Healthcare Provider</h3>
                    <p class="text-gray-600 text-sm mb-2">1,234 views</p>
                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <span>👁 1234</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
