<?php

class BudgetTableSeeder extends Seeder {

	public function run()
	{
		Budget::truncate();

		Budget::create([
			'amount' => '0'
		]);
	}

}