<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Groups;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $groups = Groups::all();
        return view('auth.register',compact('groups'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'lowercase', 'max:255', 'unique:'.User::class],
            'first_name_eng' => ['required', 'string', 'max:255'],
            'father_name_eng' => ['required', 'string', 'max:255'],
            'last_name_eng' => ['required', 'string', 'max:255'],
            'mbl' => ['required', 'string', 'max:255'],
            'sid' => ['required', 'string', 'max:255'],
            'group' => ['required'],
            //'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'personal_email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->name."@svuonline.org",
            'password' => Hash::make($request->password),
            'first_name_eng' => $request->first_name_eng,
            'father_name_eng' => $request->father_name_eng,
            'last_name_eng' => $request->last_name_eng,
            'full_name_eng' => $request->first_name_eng." ".$request->father_name_eng." ".$request->last_name_eng,
            'gender' => $request->gender,
            'mbl' => $request->mbl,
            'group_id' => $request->group,
            'sid' => $request->sid,
            'personal_email' => $request->personal_email,

        ]);

        event(new Registered($user));

        Auth::login($user);
        /*if($request->group === 1){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('emp.dashboard');
        }*/
        return redirect(RouteServiceProvider::HOME);
    }
     /*public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }*/
}
