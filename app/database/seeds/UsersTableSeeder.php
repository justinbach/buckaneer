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

        $primaryUser = new User;
        $primaryUser->username = 'justinbach';
        $primaryUser->email = 'justinbach@gmail.com';
        $primaryUser->password = 'password';
        $primaryUser->password_confirmation = 'password';
        $primaryUser->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $primaryUser->save()) {
            Log::info('Unable to create user '.$primaryUser->username, (array)$primaryUser->errors());
        } else {
            Log::info('Created user "'.$primaryUser->username.'" <'.$primaryUser->email.'>');
        }

        $secondaryUser = new User;
        $secondaryUser->username = 'hadjey';
        $secondaryUser->email = 'hadjey@gmail.com';
        $secondaryUser->password = 'password';
        $secondaryUser->password_confirmation = 'password';
        $secondaryUser->confirmation_code = md5(uniqid(mt_rand(), true));

        if(! $secondaryUser->save()) {
            Log::info('Unable to create user '.$secondaryUser->username, (array)$secondaryUser->errors());
        } else {
            Log::info('Created user "'.$secondaryUser->username.'" <'.$secondaryUser->email.'>');
        }
    }
}