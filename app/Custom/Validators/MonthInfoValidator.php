<?php namespace Custom\Validators;

class MonthInfoValidator extends Validation {

	protected $rules = [
		'possible_charge' => 'required|numeric'
	];

	protected $updateRules = [
		'possible_charge' => 'required|numeric'
	];

}