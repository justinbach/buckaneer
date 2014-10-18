<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $admin = new User;
        $admin->username = 'admin';
        $admin->email = 'justinbachorik@gmail.com';
        $admin->password = 'password';
        $admin->password_confirmation = 'password';
        $admin->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $admin->save()) {
            Log::info('Unable to create user '.$admin->username, (array)$admin->errors());
        } else {
            Log::info('Created user "'.$admin->username.'" <'.$admin->email.'>');
        }

        $user1 = new User;
        $user1->username = 'justinbach';
        $user1->email = 'justinbach@gmail.com';
        $user1->password = 'password';
        $user1->password_confirmation = 'password';
        $user1->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user1->save()) {
            Log::info('Unable to create user '.$user1->username, (array)$user1->errors());
        } else {
            Log::info('Created user "'.$user1->username.'" <'.$user1->email.'>');
        }

        $user2 = new User;
        $user2->username = 'hadjey';
        $user2->email = 'hadjey@gmail.com';
        $user2->password = 'password';
        $user2->password_confirmation = 'password';
        $user2->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $user2->save()) {
            Log::info('Unable to create user '.$user2->username, (array)$user2->errors());
        } else {
            Log::info('Created user "'.$user2->username.'" <'.$user2->email.'>');
        }
    }
}