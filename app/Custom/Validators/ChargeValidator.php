<?php namespace Custom\Validators;

class ChargeValidator extends Validation {

	protected $rules = [
		'title' => 'required',
		'amount' => 'required|numeric'
	];

	protected $updateRules = [
		'title' => 'required',
		'amount' => 'required|numeric'
	];

}