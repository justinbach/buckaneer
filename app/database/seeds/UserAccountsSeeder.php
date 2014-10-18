<?php

class UserAccountsSeeder extends Seeder {

    public function run()
    {
        $account = Account::where('name','=','Household')->first();

        $primaryUser = User::where('username','=','justinbach')->first();
        $primaryUser->account()->associate($account);
        $primaryUser->save();

        $secondaryUser = User::where('username', '=', 'hadjey')->first();
        $secondaryUser->account()->associate($account);
        $secondaryUser->save();
    }

}