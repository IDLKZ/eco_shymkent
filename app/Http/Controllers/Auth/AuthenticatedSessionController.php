<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\GeoPosition;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
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
        if (Auth::user()->role_id == env('APP_ADMIN_ROLE', 1)) {
            return redirect()->intended(RouteServiceProvider::AdminHome);
        } else if (Auth::user()->role_id == env('APP_MODER_ROLE', 2)) {
            return redirect()->intended(RouteServiceProvider::ModerHome);
        } else {
            return redirect()->intended(RouteServiceProvider::MayorHome);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::user()->role_id == 2) {
            $geo = GeoPosition::where('user_id', Auth::id())->first();
            if ($geo) {
                $geo->delete();
            }
        }
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
