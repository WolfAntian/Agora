<?php

use Illuminate\Database\Seeder;
use agora\Role;
use agora\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_mod  = Role::where('name', 'mod')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = "admin@hotmail.com";
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $mod = new User();
        $mod->name = 'Mod';
        $mod->email = "mod@hotmail.com";
        $mod->password = bcrypt('secret');
        $mod->save();
        $mod->roles()->attach($role_mod);

        $admin->roles()->attach($role_mod);
    }
}
