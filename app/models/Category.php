<?php

class Category extends Eloquent {
	protected $table = 'categories';

	public function charge()
	{
		return $this->hasMany('Charge');
	}
}