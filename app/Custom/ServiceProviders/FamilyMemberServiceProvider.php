<?php namespace Custom\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class FamilyMemberServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Custom\Interfaces\FamilyMemberInterface',
			'Custom\Repositories\FamilyMemberRepository'
		);
	}

}