<?php

class UserController extends BaseController {

	public function index()
	{
		return View::make('user.create');
	}

	public function store()
	{
		$input = Input::all();

		$rules = [
			'username' => 'required',
			'password' => 'required',
			'email' => 'required|email'
		];

		$validation = Validator::make($input, $rules);

		if( $validation->fails() )
		{
			return $validation->messages();
		}

		User::create($input);

		$attempt = Auth::attempt([
			'username' => $input['username'],
			'password' => $input['password']
		]);

		if($attempt)
		{
			return Redirect::to('charges');
		}

		return Redirect::back()->withInput();
	}

}