<?php

class UserRolesSeeder extends Seeder {

    public function run()
    {

        $adminRole = Role::where('name','=','Admin')->first();
        $adminUser = User::where('username','=','admin')->first();
        $adminUser->attachRole($adminRole);

        $primaryUserRole = Role::where('name','=','PrimaryUser')->first();
        $primaryUserUser = User::where('username','=','justinbach')->first();
        $primaryUserUser->attachRole($primaryUserRole);

        $secondaryUserRole = Role::where('name','=','SecondaryUser')->first();
        $secondaryUserUser = User::where('username','=','hadjey')->first();
        $secondaryUserUser->attachRole($secondaryUserRole);
    }

}