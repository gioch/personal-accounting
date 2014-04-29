<?php


class PriorityTableSeeder extends Seeder {


	public function run()
	{
		Priority::truncate();

		Priority::create([
			'name_ge' => 'მაღალი',
			'name_en' => 'High'
		]);

		Priority::create([
			'name_ge' => 'საშუალო',
			'name_en' => 'Medium'
		]);

		Priority::create([
			'name_ge' => 'დაბალი',
			'name_en' => 'Low'
		]);
	}

}