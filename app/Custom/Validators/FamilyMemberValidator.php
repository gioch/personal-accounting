<?php namespace Custom\Validators;

class FamilyMemberValidator extends Validation {

	protected $rules = [
		'name' => 'required'
	];

	protected $updateRules = [
		'name' => 'required'
	];

}