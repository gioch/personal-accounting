<?php namespace Custom\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class ChargeServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Custom\Interfaces\ChargeInterface',
			'Custom\Repositories\ChargeRepository'
		);
	}

}