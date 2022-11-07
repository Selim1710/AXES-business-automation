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
            'password'=>bcrypt(1111),
            'role'=> 'admin',
        ]);
        
        $super_admin = User::create([
            'name'=> 'Super Admin',
            'email'=> 'superadmin@gmail.com',
            'password'=>bcrypt(1111),
            'role'=> 'superadmin',
        ]);


        //
        $admistrator_role = Role::create(['name' => 'Administrator']);
        $super_admin_role = Role::create(['name' => 'Super Admin']);

        $permission = Permission::create(['name' => 'Role access','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'Role edit','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'Role create','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'Role delete','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'Role print','group_id'=>'1', 'group_name'=>'Users And Role']);

        $permission = Permission::create(['name' => 'User access','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'User edit','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'User create','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'User delete','group_id'=>'1', 'group_name'=>'Users And Role']);
        $permission = Permission::create(['name' => 'User print','group_id'=>'1', 'group_name'=>'Users And Role']);

        $permission = Permission::create(['name' => 'Expenses Head access','group_id'=>'2', 'group_name'=>'Daily Process']);
        $permission = Permission::create(['name' => 'Expenses Head edit','group_id'=>'2', 'group_name'=>'Daily Process']);
        $permission = Permission::create(['name' => 'Expenses Head create','group_id'=>'2', 'group_name'=>'Daily Process']);
        $permission = Permission::create(['name' => 'Expenses Head delete','group_id'=>'2', 'group_name'=>'Daily Process']);
        $permission = Permission::create(['name' => 'Expenses Head print','group_id'=>'2', 'group_name'=>'Daily Process']);

        $permission = Permission::create(['name' => 'Expense access','group_id'=>'2', 'group_name'=>'Daily Process']);
        $permission = Permission::create(['name' => 'Expense edit','group_id'=>'2', 'group_name'=>'Daily Process']);
        $permission = Permission::create(['name' => 'Expense create','group_id'=>'2', 'group_name'=>'Daily Process']);
        $permission = Permission::create(['name' => 'Expense delete','group_id'=>'2', 'group_name'=>'Daily Process']);
        $permission = Permission::create(['name' => 'Expense print','group_id'=>'2', 'group_name'=>'Daily Process']);

        $permission = Permission::create(['name' => 'Product Setup access','group_id'=>'3', 'group_name'=>'Product Setup']);
        $permission = Permission::create(['name' => 'Product Setup edit','group_id'=>'3', 'group_name'=>'Product Setup']);
        $permission = Permission::create(['name' => 'Product Setup create','group_id'=>'3', 'group_name'=>'Product Setup']);
        $permission = Permission::create(['name' => 'Product Setup delete','group_id'=>'3', 'group_name'=>'Product Setup']);
        $permission = Permission::create(['name' => 'Product Setup print','group_id'=>'3', 'group_name'=>'Product Setup']);


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
