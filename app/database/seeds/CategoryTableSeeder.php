<?php

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		Category::truncate();


		Category::create([
			'name_ge' => 'კომუნალური',
			'name_en' => 'Utility charges'
		]);

		Category::create([
			'name_ge' => 'ყოველდღიური',
			'name_en' => 'Everyday charges'
		]);

		Category::create([
			'name_ge' => 'სხვა',
			'name_en' => 'Other'
		]);
	}

}