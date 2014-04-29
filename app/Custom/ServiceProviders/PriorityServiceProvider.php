<?php namespace Custom\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class PriorityServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Custom\Interfaces\PriorityInterface',
			'Custom\Repositories\PriorityRepository'
		);
	}

}