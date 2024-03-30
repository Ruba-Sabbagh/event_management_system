<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthLoginController extends Controller
{

    public function create(): View
    {

        if(Auth::check()){
            foreach(Auth::user()->roles as $role){
                if($role->name === 'admin'){
                    return view('pages.admin.dashboard');
                }
            }


            return view('/');
        }else
             return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();
        foreach(Auth::user()->roles as $role){
            if($role->name === 'admin'){
                return redirect()->route('admin.dashboard')->with('success','oooookkkk');
            }
        }

        return redirect()->intended(RouteServiceProvider::HOME);

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
