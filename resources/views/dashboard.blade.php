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
            @php
            $gradients = [
                'medical' => 'from-blue-100 to-blue-200',
                'saas' => 'from-purple-100 to-purple-200',
                'restaurant' => 'from-amber-100 to-amber-200',
            ];
            $iconColors = [
                'medical' => 'text-blue-600',
                'saas' => 'text-purple-600',
                'restaurant' => 'text-amber-600',
            ];
            @endphp

            @foreach($templates as $template)
            <a href="{{ route('locale.editor.create', ['locale' => app()->getLocale(), 'templateId' => $template->id]) }}" class="template-card rounded-xl overflow-hidden cursor-pointer block">
                <div class="aspect-video bg-gradient-to-br {{ $gradients[$template->category] ?? 'from-gray-100 to-gray-200' }} flex items-center justify-center">
                    @if($template->category === 'medical')
                        <i class="fas fa-heartbeat text-6xl {{ $iconColors[$template->category] }}"></i>
                    @elseif($template->category === 'saas')
                        <i class="fas fa-cloud text-6xl {{ $iconColors[$template->category] }}"></i>
                    @elseif($template->category === 'restaurant')
                        <i class="fas fa-utensils text-6xl {{ $iconColors[$template->category] }}"></i>
                    @else
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="text-gray-900 font-semibold mb-1">{{ $template->name }}</h3>
                    <p class="text-gray-600 text-sm mb-2 line-clamp-2">{{ $template->description }}</p>
                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <span>👁 {{ number_format($template->views) }}</span>
                        <span class="px-2 py-1 bg-gray-100 rounded">{{ ucfirst($template->category) }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
