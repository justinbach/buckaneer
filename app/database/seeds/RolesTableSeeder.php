<?php

class RolesTableSeeder extends Seeder {

   public function run()
   {
       $admin = new Role;
       $admin->name = "Admin";
       $admin->save();

       $primaryUser = new Role;
       $primaryUser->name = "PrimaryUser";
       $primaryUser->save();

       $secondaryUser = new Role;
       $secondaryUser->name = "SecondaryUser";
       $secondaryUser->save();

   }

}
