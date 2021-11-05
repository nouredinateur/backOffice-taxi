<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('crud.permissions', [
            'roles' => $roles,
            'permissions' => $permissions,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'permission' => 'required|max:100|min:3',
            'role' => 'required'
        ]);
        $permission = $request->permission;
        $roles = $request->role;
        // dd($roles);
        $thispermission = Permission::firstOrCreate(['name' => $permission]);
        // $thispermission = Permission::create(['name' => $permission]);
        $thispermission->assignRole($roles);
        return redirect('/permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thisPermission = Permission::findOrFail($id);
        $thisPermissionRoles = $thisPermission->roles->pluck('name');
        $allrols = Role::all();
        return view('show.permission', [
            'permission' => $thisPermission,
            'roles' => $thisPermissionRoles,
            'allroles' => $allrols
        ]);
    }

    public function revokeRoles(Request $request)
    {
        $id = $request->id;
        $roleName = $request->role;
        $permissionName = $request->permission;
        $role = Role::findByName($roleName);
        $permission = Permission::findByName($permissionName);
        $role->revokePermissionTo($permission);

        return redirect()->to('permissions/'.$id);
    }

    public function assignRoles(Request $request)
    {
        $id =$request->id;
        $role = $request->role;
        $permission = $request->permission;
        
        $thisRole = Role::findByName($role);
        $thisRole->givePermissionTo($permission);

        return redirect()->to('permissions/'.$id);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::where('id', $id)->delete();

        return redirect('/permissions');
    }
}
