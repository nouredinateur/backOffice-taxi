<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'read-users']);
        Permission::create(['name' => 'update-users']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('create-users');
        // $role1->givePermissionTo('delete-users');
        $role1->givePermissionTo('read-users');
        $role1->givePermissionTo('update-users');



        $role2 = Role::create(['name' => 'mod']);
        $role2->givePermissionTo('read-users');
        $role2->givePermissionTo('update-users');


        $role3 = Role::create(['name' => 'user']);

        $role4 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@example.com',
        ]);

        $user2 = \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
        ]);

        $user3 = \App\Models\User::factory()->create([
            'name' => 'mod',
            'email' => 'mod@example.com',
        ]);

        $user3->assignRole($role2);
        $user2->assignRole($role3);
        $user->assignRole($role4);

    }
}
