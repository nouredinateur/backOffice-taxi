<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class dashboardController extends Controller
{

    public function   __constract(){

        $this->middleware('auth');
    }

    public function index(){

         $role = Role::findByName('user');
         $role->revokePermissionTo('read-users');
        //  User::with('roles')->get();
        return view('dashboard');
    }
}
