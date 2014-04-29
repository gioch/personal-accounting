<?php

class FamilyMember extends Eloquent {
	protected $table = 'family_members';

	protected $guarded = array('id');

	public function charges()
	{
		return $this->hasMany('Charge');
	}
}