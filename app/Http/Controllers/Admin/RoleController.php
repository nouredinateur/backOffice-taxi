<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;


class RoleController extends Controller
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
        // response()->json()
        return view('crud.roles' , [
            'roles' => $roles,
            'permissions' => $permissions,
            'users' => $users,
        ]);
    }

    public function permissionIndex()
    {
        $users = User::get();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('crud.permission' , [
            'roles' => $roles,
            'permissions' => $permissions,
            'users' => $users,
        ]);
    }

    public function revokePermissions(Request $request , Role $role)
    {
        $id =$request->id;
        $role = $request->role;
        $permission = $request->permission;

        $thisRole = Role::findByName($role);
        $thisRole->revokePermissionTo($permission);

        return redirect()->to('roles/'.$id);

    }

    public function assignPermissions(Request $request , Role $role)
    {
        $id =$request->id;
        $role = $request->role;
        $permission = $request->permission;

        $thisRole = Role::findByName($role);
        $thisRole->givePermissionTo($permission);

        return redirect()->to('roles/'.$id);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'role' => 'required|max:100|min:3',
            'permission' => 'required'
        ]);
       
        $role = $request->role;
        $thisrole = Role::firstOrCreate(['name' => $role]);
        $permissions = $request->permission;
        $thisrole->givePermissionTo($permissions);
        return redirect('/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // $thisrole = Role::where('id', $role->id)->get();
        $thisRole = Role::findOrFail($role->id);
        $thisRolePermissions = $thisRole->permissions->pluck('name');
        $allperms = Permission::all();
        return view('show.role', [
            'role' => $thisRole,
            'permissions' => $thisRolePermissions,
            'allperms' => $allperms,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Role::where('id', $role->id)->delete();

        return redirect('/roles');
    }
}
