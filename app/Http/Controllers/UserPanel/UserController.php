<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        if(Auth::user()->group->group_name === 'MG'){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('emp.dashboard');

    }
}
