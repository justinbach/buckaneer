<?php

class UserRolesSeeder extends Seeder {

    public function run()
    {

        $adminRole = Role::where('name','=','Admin')->first();
        $adminUser = User::where('username','=','admin')->first();
        $adminUser->attachRole($adminRole);

        $user1Role = Role::where('name','=','PrimaryUser')->first();
        $user1User = User::where('username','=','justinbach')->first();
        $user1User->attachRole($user1Role);

        $user2Role = Role::where('name','=','SecondaryUser')->first();
        $user2User = User::where('username','=','hadjey')->first();
        $user2User->attachRole($user2Role);
    }

}