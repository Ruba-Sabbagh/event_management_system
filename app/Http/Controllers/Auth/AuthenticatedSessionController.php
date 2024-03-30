<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
    public function create1(): View
    {

        if(Auth::check()){
            if(Auth::user()->name === 'Admin'){
                return view('pages.admin.dashboard');
            }
            return view('/');
        }else
             return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store1(LoginRequest $request): RedirectResponse
    {
        dd('dadwd');
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->name === 'Admin'){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('/');
        //return redirect()->intended(RouteServiceProvider::HOME);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
