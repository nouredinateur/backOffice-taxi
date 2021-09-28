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
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.delete']);
        Permission::create(['name' => 'users.read']);
        Permission::create(['name' => 'users.update']);
        Permission::create(['name' => 'dashboard']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('users.create');
        // $role1->givePermissionTo('users.delete');
        $role1->givePermissionTo('users.read');
        $role1->givePermissionTo('users.update');
        $role1->givePermissionTo('dashboard');



        $role2 = Role::create(['name' => 'mod']);
        $role2->givePermissionTo('users.read');
        $role2->givePermissionTo('users.update');
        $role2->givePermissionTo('dashboard');//not seeded yet


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
