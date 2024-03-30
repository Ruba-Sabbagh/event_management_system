<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        /*$this->middleware('permission.view user',['only'=>['index']]);

        $this->middleware('permission.create user',['only'=>['create','store']]);

        $this->middleware('permission.update user',['only'=>['edit','update']]);

        $this->middleware('permission.delete user',['only'=>['destroy']]);*/
    }
    public function index()
    {
        $users = User::latest()->paginate(10);
        $roles = Role::get();
        $permissions = Permission::get();
        return view('users.index', compact('users','roles','permissions'));
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request)
    {
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user
        //dd($request->all());
        $user->create(array_merge($request->validated(), [
            'password' => Hash::make('12345678')
        ]));

        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'role' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get(),
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        //dd($request->all());
        $user->update($request->validated());

        if($request->get('role'))
            $user->syncRoles($request->get('role'));

        if($request->get('password')){
            if($request->get('password_confirmation')){
                if($request->get('password')==$request->get('password_confirmation')){
                      $user->password= Hash::make($request->get('password'));
                      $user->save();
                }
                else
                    return redirect()->route('users.index')
                    ->withSuccess(__('Passwrod is not confirmed'));

            }
        }
        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }
    public function updatepermissions(User $user,Request $request){
        $user->syncPermissions($request->get('permission'));
        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}
