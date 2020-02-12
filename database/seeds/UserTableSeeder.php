<?php

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
        //
        $user= \App\User::all();
        if($user){
          $admin = \App\User::create(
                     [
                         'name' => 'Jonathan Rochez',
                         'email' => 'jonathan@admin.com',
                         'password' => Hash::make('govzilla'),
                         'role' => 'admin'
                     ]);
          $user = \App\User::create(
                     [
                         'name' => 'Jonathan Rochez',
                         'email' => 'jonathan@user.com',
                         'password' => Hash::make('govzilla'),
                         'role' => 'user'

                     ]);
        }

    }
}
