<?php namespace Custom\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Custom\Interfaces\CategoryInterface',
			'Custom\Repositories\CategoryRepository'
		);
	}

}