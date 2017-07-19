<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'name' => "OWNER"
        ]);

        DB::table('roles')->insert([
            'name' => "STAFF"
        ]);

        $this->call(UsersTableSeeder::class);


    }
}
