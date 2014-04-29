<?php namespace Custom\Validators;

use Validator as V;
use Custom\Exceptions\ValidationException;

abstract class Validation {

	public function validate($inputs, $rules)
	{
		$validation = V::make($inputs, $rules);

		if($validation->fails())
			throw new ValidationException($validation->messages());

		return true;
	}

	public function validateForCreation($inputs)
	{
		return $this->validate($inputs, $this->rules);
	}

	public function validateForUpdate($inputs)
	{
		return $this->validate($inputs, $this->updateRules);
	}

}