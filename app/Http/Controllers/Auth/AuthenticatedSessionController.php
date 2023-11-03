<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        auth()->user()->update(['last_login' => now()]);

        session()->put('country_code', auth()->user()->country_code);

        if(auth()->user()->hasRole(User::SUPERADMIN) || auth()->user()->hasRole(User::RESELLER)) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return redirect()->intended('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $country_code = $request->user()->country_code;

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->put('country_code', $country_code);

        return redirect()->route('home', ['country_code' => $country_code]);
    }
}
