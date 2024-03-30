<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$permission): Response
    {
        $user = Auth::user();

        if(isset($user)){
            $role =Role::where('id',$user->roles[0]->id)->first();
            //dd($user->roles[0]->id);
            if ($role->hasPermissionTo($permission)) //If user has this //permission
            {
                return $next($request);
            }else{
                abort(401);
            }

            /*if ($request->is('posts/create'))//If user is creating a post
            {
                if (!Auth::user()->hasPermissionTo('Create Post'))
            {
                abort('401');
            }
            else {
                    return $next($request);
                }
            }*/
        }
    }
}
