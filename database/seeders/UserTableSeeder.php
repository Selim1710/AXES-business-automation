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

        $permission = [
            'Daily Process' => [
                    'Daily Process',
                    'Price List',
                    'Expenses Record',
                    'Create Expenses',
                    'Expenses Head',
            ],
            'Service' => [
                'Service',
                'Service List',
                'Service Received List',
                'Service Received Create',
            ],
            'Warranty Management' => [
                'Warranty Management',
                'Warranty Clam',
                'Service Center',
                'Claim To Supplier',
                'Warranty Stock',
                'Manage Product',
                'Warranty Delivered',
            ],
            'Purchase' => [
                'Purchase',
                'Purchase Order',
                'Purchase Return',
            ],
            'Sales' => [
                'Sales',
                'Sales Estimate',
                'Sales Estimate Create',
                'Sales Return',
            ],
        ];

function create_permission( $permission_array ){
        $i = 0 ;
        foreach ( $permission_array as $key => $group_name) {
            $i++;
            foreach ($group_name as $permission_name) {
                Permission::create(['name' => $permission_name,'group_id'=>$i, 'group_name'=>$key]);
            }
            
        }
}
        create_permission($permission);


        

        



        $admistrator->assignRole($admistrator_role);
        $super_admin->assignRole($super_admin_role);


        $admistrator_role->givePermissionTo(Permission::all());

    
    }
}
