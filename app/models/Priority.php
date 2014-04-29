<?php 

class Priority extends Eloquent {
	protected $table = 'priorities';

	public function charges()
	{
		return $this->hasMany('Charge');
	}
}