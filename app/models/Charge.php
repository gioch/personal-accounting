<?php

class Charge extends Eloquent {

	protected $table = 'charges';
	protected $guarded = ['id'];


	public function familyMember() 
	{
		return $this->belongsTo('FamilyMember');
	}

	public function category() 
	{
		return $this->belongsTo('Category');
	}

	public function priority() 
	{
		return $this->belongsTo('Priority');
	}
}