<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Inserting users
        DB::table('users')->insert([
            'name' => 'Admin',
            'last_name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'company' => true,
            'user_type' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
