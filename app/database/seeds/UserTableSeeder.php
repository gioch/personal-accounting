<?php

class UserTableSeeder extends Seeder {

	public function run()
	{

		User::truncate();

		User::create([
			'username' => 'gioch',
			'password' => '1234',
			'email' => 'georgechkhvirkia@gmail.com'
		]);

	}

}