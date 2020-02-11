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
                         'password' => Hash::make('govzilla')
                     ]);
          $user = \App\User::create(
                     [
                         'name' => 'Jonathan Rochez',
                         'email' => 'jonathan@user.com',
                         'password' => Hash::make('govzilla')
                     ]);
          $admin_role = \App\Role::create(['slug' => 'admin', 'name' => 'Admin']);
          $user_role = \App\Role::create(['slug' => 'user', 'name' => 'User']);
          $admin->roles()->attach($admin_role);
          $user->roles()->attach($user_role);
        }

    }
}
