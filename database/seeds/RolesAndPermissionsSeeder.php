<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
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
//        Permission::create(['name' => 'edit articles']);
//        Permission::create(['name' => 'delete articles']);
//        Permission::create(['name' => 'publish articles']);
//        Permission::create(['name' => 'unpublish articles']);
        Permission::create(['name' => 'create spell']);
        Permission::create(['name' => 'create gear']);
        Permission::create(['name' => 'create creature']);
        Permission::create(['name' => 'edit spell']);
        Permission::create(['name' => 'edit gear']);
        Permission::create(['name' => 'edit creature']);
        Permission::create(['name' => 'delete spell']);
        Permission::create(['name' => 'delete gear']);
        Permission::create(['name' => 'delete creature']);

        // create roles and assign created permissions

        // this can be done as separate statements
        // Role::create(['name' => 'standard']);
        $Standardrole = Role::create(['name' => 'standard']);
        $Standardrole->givePermissionTo(['create spell', 'create gear', 'create creature']);


        // or may be done by chaining
        //Role::create(['name' => 'moderator']);
        $Modrole = Role::create(['name' => 'moderator']);
        $Modrole->givePermissionTo(['create spell', 'create gear', 'create creature']);
        $Modrole->givePermissionTo(['edit spell', 'edit gear', 'edit creature']);

        //    ->givePermissionTo(['publish articles', 'unpublish articles']);

        //Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
