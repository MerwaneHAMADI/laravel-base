<?php
use App\User;
use App\Models\BackpackUser;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        # permissions
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'edit']);
# roles
        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());

        Role::create(['name' => 'user'])->givePermissionTo('read');
# users
        BackpackUser::create(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('admin1')])->assignRole('admin');
        BackpackUser::create(['name' => 'User', 'email' => 'user@user.com', 'password' => bcrypt('user1!')])->assignRole('user');
    }
}
