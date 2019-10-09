<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        App\User::create([
            'name' => 'My',
            'email' => 'nguyenmy97bn@gmail.com',
            'password' => bcrypt('12345678')

        ]);
    }
}
