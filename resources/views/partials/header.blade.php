<header class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="/en-US" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-[#007CBE] flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">{{ __('app_name') }}</h1>
            </a>

            <!-- Right Side: Language + User -->
            <div class="flex items-center gap-4">
                <!-- Language Switcher -->
                <div class="relative">
                    <button id="headerLanguageButton" class="flex items-center gap-2 px-3 py-2 rounded-lg bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 hover:border-[#007CBE] transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                        <span>{{ app()->getLocale() === 'ja-JP' ? '日本語' : 'English' }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="headerLanguageDropdown" class="hidden absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-xl overflow-hidden">
                        <a href="{{ route('locale.dashboard', ['locale' => 'en-US']) }}" class="block px-4 py-2 text-gray-700 hover:bg-[#007CBE] hover:text-white transition-colors">
                            English
                        </a>
                        <a href="{{ route('locale.dashboard', ['locale' => 'ja-JP']) }}" class="block px-4 py-2 text-gray-700 hover:bg-[#007CBE] hover:text-white transition-colors">
                            日本語
                        </a>
                    </div>
                </div>

                <!-- User Dropdown -->
                <div class="relative">
                    <button id="headerUserButton" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-50 transition-all">
                        <div class="w-10 h-10 rounded-full bg-[#007CBE] flex items-center justify-center text-white font-semibold">
                            {{ strtoupper(substr(Auth::user()->name ?? Auth::user()->email, 0, 1)) }}
                        </div>
                        <div class="text-left hidden md:block">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name ?? 'User' }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="headerUserDropdown" class="hidden absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-xl overflow-hidden">
                        <!-- User Info (mobile) -->
                        <div class="px-4 py-3 border-b border-gray-200 md:hidden">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name ?? 'User' }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('auth.logout') }}">
                            @csrf
                            <button type="submit" class="w-full px-4 py-3 text-left text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                {{ __('dashboard.logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Header Language Dropdown
        const headerLangButton = document.getElementById('headerLanguageButton');
        const headerLangDropdown = document.getElementById('headerLanguageDropdown');

        if (headerLangButton && headerLangDropdown) {
            headerLangButton.addEventListener('click', function(event) {
                event.stopPropagation();
                headerLangDropdown.classList.toggle('hidden');
                // Close user dropdown
                const userDropdown = document.getElementById('headerUserDropdown');
                if (userDropdown) userDropdown.classList.add('hidden');
            });
        }

        // Header User Dropdown
        const headerUserButton = document.getElementById('headerUserButton');
        const headerUserDropdown = document.getElementById('headerUserDropdown');

        if (headerUserButton && headerUserDropdown) {
            headerUserButton.addEventListener('click', function(event) {
                event.stopPropagation();
                headerUserDropdown.classList.toggle('hidden');
                // Close language dropdown
                if (headerLangDropdown) headerLangDropdown.classList.add('hidden');
            });
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (headerLangDropdown && !headerLangButton.contains(event.target) && !headerLangDropdown.contains(event.target)) {
                headerLangDropdown.classList.add('hidden');
            }
            if (headerUserDropdown && !headerUserButton.contains(event.target) && !headerUserDropdown.contains(event.target)) {
                headerUserDropdown.classList.add('hidden');
            }
        });
    });
</script>
