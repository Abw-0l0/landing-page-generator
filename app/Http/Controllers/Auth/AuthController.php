<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show the unified auth form (login/register)
     */
    public function showAuthForm(): View|RedirectResponse
    {
        // Redirect authenticated users to dashboard
        if (Auth::check()) {
            return redirect()->route('locale.dashboard', ['locale' => app()->getLocale()]);
        }

        return view('auth.unified-auth');
    }

    /**
     * Handle login request
     */
    public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            'remember' => ['sometimes', 'accepted'],
        ], [
            'email.required' => __('auth.email_required'),
            'email.email' => __('auth.email_format_invalid'),
            'email.max' => __('auth.email_max_255_characters'),
            'password.required' => __('auth.password_required'),
            'password.min' => __('auth.password_min_6_characters'),
        ]);

        $credentials = $request->only('email', 'password');
        $rememberMe = isset($validated['remember']) && $validated['remember'];

        if (Auth::attempt($credentials, $rememberMe)) {
            $request->session()->regenerate();

            return redirect()->intended(route('locale.dashboard', ['locale' => app()->getLocale()]));
        }

        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => __('auth.login_failed')]);
    }

    /**
     * Handle registration request
     */
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:200', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'locale' => ['nullable', 'string', 'in:ja-JP,en-US'],
        ], [
            'full_name.required' => __('auth.full_name_required'),
            'full_name.min' => __('auth.full_name_min_2_characters'),
            'full_name.max' => __('auth.full_name_max_200_characters'),
            'email.required' => __('auth.email_required'),
            'email.email' => __('auth.email_format_invalid'),
            'email.max' => __('auth.email_max_255_characters'),
            'email.unique' => __('auth.email_already_exists'),
            'password.required' => __('auth.password_required'),
            'password.min' => __('auth.password_min_6_characters'),
        ]);

        // Create user
        $user = User::create([
            'name' => $validated['full_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'default_language' => $validated['locale'] ?? app()->getLocale(),
        ]);

        // Auto-login after registration
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('locale.dashboard', ['locale' => app()->getLocale()])
            ->with('success', __('auth.registration_successful'));
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('locale.welcome', ['locale' => 'en-US']);
    }
}
