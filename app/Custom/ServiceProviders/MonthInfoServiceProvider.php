<?php namespace Custom\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class MonthInfoServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Custom\Interfaces\MonthInfoInterface',
			'Custom\Repositories\MonthInfoRepository'
		);
	}

}