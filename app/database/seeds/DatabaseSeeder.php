<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('UserRolesSeeder');
        $this->call('AccountsSeeder');
        $this->call('UserAccountsSeeder');
	}

}
