<?php

use Illuminate\Database\Seeder;
use agora\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = "Forum Level Admin";
        $role_admin->save();
        $role_mod = new Role();
        $role_mod->name = 'mod';
        $role_mod->description = "Board Level Moderator";
        $role_mod->save();
        $user = new Role();
        $user->name = 'user';
        $user->description = "Regular User";
        $user->save();
  }
}
