<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('auth.sign_in') }} - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen flex flex-col">

    <!-- Header with Language Switcher -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <a href="{{ route('locale.welcome', ['locale' => app()->getLocale()]) }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-[#007CBE] flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ __('app_name') }}</h1>
                </a>

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
                            <a href="{{ route('locale.auth', ['locale' => 'en-US']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                English
                            </a>
                            <a href="{{ route('locale.auth', ['locale' => 'ja-JP']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                日本語
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="auth-card">
            <!-- Toggle Buttons -->
            <div class="auth-toggle">
                <button type="button" class="toggle-btn active" id="login-toggle" onclick="switchToLogin()">
                    {{ __('auth.sign_in') }}
                </button>
                <button type="button" class="toggle-btn" id="register-toggle" onclick="switchToRegister()">
                    {{ __('auth.register') }}
                </button>
            </div>

            @if(session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif

            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any() && !old('is_register_form'))
                <div class="error-box">
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form Container -->
            <div class="form-container active" id="login-form-container">
                <h1 class="title">{{ __('auth.sign_in_to_account') }}</h1>

                <form method="POST" action="{{ route('api.locale.login.submit', ['locale' => app()->getLocale()]) }}">
                    @csrf

                    <!-- Email Input -->
                    <div class="form-group">
                        <label for="login-email" class="form-label">
                            {{ __('auth.email') }}
                        </label>
                        <input id="login-email" name="email" type="text" autocomplete="email" autofocus
                            value="{{ old('email') }}"
                            placeholder="{{ __('auth.email_placeholder') }}"
                            class="form-input @error('email') {{ !old('is_register_form') ? 'error' : '' }} @enderror" />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="login-password" class="form-label">
                            {{ __('auth.password') }}
                        </label>
                        <div class="password-toggle-container">
                            <input id="login-password" type="password" name="password"
                                autocomplete="current-password"
                                placeholder="{{ __('auth.password_placeholder') }}"
                                class="form-input with-icon @error('password') {{ !old('is_register_form') ? 'error' : '' }} @enderror" />
                            <button type="button" class="password-toggle-button" onclick="togglePasswordVisibility('login-password')">
                                <svg id="login-password_eye_open" class="hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <svg id="login-password_eye_closed" class="" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 616 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    <line stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="3" y1="3" x2="21" y2="21"></line>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="form-footer">
                        <div class="checkbox-group">
                            <input id="remember_me" type="checkbox" name="remember" value="1" class="checkbox-input">
                            <label for="remember_me" class="checkbox-label">{{ __('auth.remember_me') }}</label>
                        </div>
                    </div>

                    <!-- Log In Button -->
                    <button type="submit" class="submit-button">
                        {{ __('auth.log_in') }}
                    </button>
                </form>
            </div>

            <!-- Register Form Container -->
            <div class="form-container" id="register-form-container">
                <h1 class="title">{{ __('auth.create_account') }}</h1>

                @if($errors->any() && old('is_register_form'))
                    <div class="error-box">
                        <ul class="error-list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('api.locale.register.submit', ['locale' => app()->getLocale()]) }}">
                    @csrf
                    <input type="hidden" name="is_register_form" value="1">

                    <!-- Name Input -->
                    <div class="form-group">
                        <label for="full_name" class="form-label">
                            {{ __('auth.full_name') }} <span style="color: #EF4444; font-size: 12px;">*</span>
                        </label>
                        <input
                            id="full_name"
                            name="full_name"
                            type="text"
                            autocomplete="name"
                            value="{{ old('full_name') }}"
                            placeholder="{{ __('auth.full_name_placeholder') }}"
                            class="form-input @error('full_name') {{ old('is_register_form') ? 'error' : '' }} @enderror"
                            maxlength="200"
                        />
                    </div>

                    <!-- Email Input -->
                    <div class="form-group">
                        <label for="register-email" class="form-label">
                            {{ __('auth.email') }} <span style="color: #EF4444; font-size: 12px;">*</span>
                        </label>
                        <input
                            id="register-email"
                            name="email"
                            type="text"
                            autocomplete="email"
                            value="{{ old('email') }}"
                            placeholder="{{ __('auth.email_placeholder') }}"
                            class="form-input @error('email') {{ old('is_register_form') ? 'error' : '' }} @enderror"
                        />
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <label for="register-password" class="form-label">
                            {{ __('auth.password') }} <span style="color: #EF4444; font-size: 12px;">*</span>
                        </label>
                        <div class="password-toggle-container">
                            <input
                                id="register-password"
                                name="password"
                                type="password"
                                autocomplete="new-password"
                                placeholder="{{ __('auth.password_placeholder') }}"
                                class="form-input with-icon @error('password') {{ old('is_register_form') ? 'error' : '' }} @enderror"
                            />
                            <button type="button" class="password-toggle-button" onclick="togglePasswordVisibility('register-password')">
                                <svg id="register-password_eye_open" class="hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <svg id="register-password_eye_closed" class="" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 616 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    <line stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="3" y1="3" x2="21" y2="21"></line>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Hidden fields -->
                    <input type="hidden" name="locale" value="{{ app()->getLocale() }}">

                    <!-- Register Button -->
                    <button type="submit" class="submit-button">
                        {{ __('auth.register') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .auth-card {
            background: white;
            border-radius: 12px;
            padding: 40px 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
        }

        /* Toggle Buttons */
        .auth-toggle {
            display: flex;
            margin-bottom: 32px;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            overflow: hidden;
        }

        .toggle-btn {
            flex: 1;
            padding: 12px;
            background: white;
            border: none;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #6B7280;
        }

        .toggle-btn:first-child {
            border-right: 1px solid #E5E7EB;
        }

        .toggle-btn.active {
            background: #007CBE;
            color: white;
        }

        .toggle-btn:hover:not(.active) {
            background: #F9FAFB;
        }

        /* Form Containers */
        .form-container {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .form-container.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .title {
            font-size: 24px;
            color: #374151;
            margin-bottom: 24px;
            font-weight: 600;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            color: #374151;
            margin-bottom: 6px;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        .form-input.with-icon {
            padding-right: 40px;
        }

        .password-toggle-container {
            position: relative;
        }

        .password-toggle-button {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            padding: 0 12px;
            background: none;
            border: none;
            cursor: pointer;
            color: #9CA3AF;
            transition: color 0.2s;
        }

        .password-toggle-button:hover {
            color: #6B7280;
        }

        .password-toggle-button svg {
            width: 20px;
            height: 20px;
        }

        .hidden {
            display: none;
        }

        .form-input:focus {
            outline: none;
            border-color: #007CBE;
            box-shadow: 0 0 0 3px rgba(0, 124, 190, 0.1);
        }

        .form-input.error {
            border-color: #EF4444;
        }

        .form-input::placeholder {
            color: #9CA3AF;
            opacity: 1;
        }

        .success-message {
            background-color: #D1FAE5;
            padding: 12px;
            border-radius: 8px;
            color: #065F46;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .error-box {
            background-color: #FEE2E2;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error-list {
            list-style-position: inside;
            color: #991B1B;
            font-size: 14px;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-input {
            width: 16px;
            height: 16px;
            border: 1px solid #D1D5DB;
            border-radius: 4px;
            cursor: pointer;
        }

        .checkbox-label {
            font-size: 14px;
            color: #6B7280;
            cursor: pointer;
        }

        .submit-button {
            background-color: #007CBE;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 32px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.2s;
            margin-top: 8px;
        }

        .submit-button:hover {
            background-color: #006AA8;
        }

        .submit-button:active {
            transform: translateY(1px);
        }

        /* Mobile responsive */
        @media (max-width: 480px) {
            .auth-card {
                padding: 30px 20px;
            }

            .title {
                font-size: 20px;
            }

            .toggle-btn {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>

    <script>
        // Toggle between login and register forms
        function switchToLogin() {
            document.getElementById('login-toggle').classList.add('active');
            document.getElementById('register-toggle').classList.remove('active');
            document.getElementById('login-form-container').classList.add('active');
            document.getElementById('register-form-container').classList.remove('active');
            window.location.hash = 'login';
        }

        function switchToRegister() {
            document.getElementById('login-toggle').classList.remove('active');
            document.getElementById('register-toggle').classList.add('active');
            document.getElementById('login-form-container').classList.remove('active');
            document.getElementById('register-form-container').classList.add('active');
            window.location.hash = 'register';
        }

        // Password toggle functionality
        function togglePasswordVisibility(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const eyeOpenIcon = document.getElementById(fieldId + '_eye_open');
            const eyeClosedIcon = document.getElementById(fieldId + '_eye_closed');

            if (passwordField.type === 'password') {
                // Show password
                passwordField.type = 'text';
                eyeOpenIcon.classList.remove('hidden');
                eyeClosedIcon.classList.add('hidden');
            } else {
                // Hide password
                passwordField.type = 'password';
                eyeOpenIcon.classList.add('hidden');
                eyeClosedIcon.classList.remove('hidden');
            }
        }

        // Check URL hash and form errors on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Check URL hash to determine which form to show
            const hash = window.location.hash;

            // Check if there are errors on register form
            const hasRegisterErrors = {{ (old('is_register_form') && $errors->any()) ? 'true' : 'false' }};

            if (hash === '#register' || hasRegisterErrors === true) {
                switchToRegister();
            } else {
                switchToLogin();
            }
        });
    </script>
</body>
</html>
