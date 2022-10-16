<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admistrator = User::create([
            'name'=> 'Administrator',
            'email'=> 'administrator@gmail.com',
            'password'=>'$2y$10$Q0Ar5Ap.3JtsegrGWXN0cOAY0qUAPj9qDkLJWeNH9Uht.vwtIsuD.'
        ]);
        
        $super_admin = User::create([
            'name'=> 'Super Admin',
            'email'=> 'superadmin@gmail.com',
            'password'=>'$2y$10$Q0Ar5Ap.3JtsegrGWXN0cOAY0qUAPj9qDkLJWeNH9Uht.vwtIsuD.'
        ]);


        //
        $admistrator_role = Role::create(['name' => 'administrator']);
        $super_admin_role = Role::create(['name' => 'super_admin']);

        $permission = Permission::create(['name' => 'Role access','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'Role edit','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'Role create','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'Role delete','group_id'=>'1', 'group_name'=>'Users And Role']);

        $permission = Permission::create(['name' => 'User access','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'User edit','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'User create','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'User delete','group_id'=>'1', 'group_name'=>'Users And Role']);

        // $permission = Permission::create(['name' => 'Permission access']);
        // $permission = Permission::create(['name' => 'Permission edit']);
        // $permission = Permission::create(['name' => 'Permission create']);
        // $permission = Permission::create(['name' => 'Permission delete']);

        // $permission = Permission::create(['name' => 'Mail access']);
        // $permission = Permission::create(['name' => 'Mail edit']);



        $admistrator->assignRole($admistrator_role);
        $super_admin->assignRole($super_admin_role);


        $admistrator_role->givePermissionTo(Permission::all());

    
    }
}
