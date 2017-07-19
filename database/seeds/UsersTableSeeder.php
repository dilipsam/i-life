<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //OWNER
        DB::table('users')->insert([
            'name' => 'Owner',
            'email' => 'admin@ilife.com',
            'password' => bcrypt('admin123'),
            'created_at' => date("Y-m-d H:i:s")
        ]);

        //STAFF
        DB::table('users')->insert([
            'name' => 'Staff User',
            'email' => 'staff@ilife.com',
            'password' => bcrypt('admin123'),
            'created_at' => date("Y-m-d H:i:s")
        ]);


        $admin_role = Role::where('name', 'OWNER')->first();
        $owner = User::where('name', 'Owner')->first();
        $owner->attachRole($admin_role);

        $staff_role = Role::where('name', 'STAFF')->first();
        $staff = User::where('name', 'Staff User')->first();
        $staff->attachRole($staff_role);

        $editUser = new Permission();
        $editUser->name = 'MANAGE_USERS';
        $editUser->display_name = 'Manage Users'; // optional
        $editUser->save();

        $admin_role->attachPermission($editUser);
    }
}