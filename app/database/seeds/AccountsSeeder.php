<?php

class AccountsSeeder extends Seeder {

    public function run()
    {
        $account = new Account;
        $account->name = "Household";
        $account->cached_balance = 0.00;
        $account->save();
    }

}