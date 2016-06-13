<?php

use App\User;
use Bican\Roles\Models\Role;
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

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678')
        ]);
        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'admin', // optional
            'level' => 1, // optional, set to 1 by default
        ]);
        $user->attachRole($adminRole);
    }
}
