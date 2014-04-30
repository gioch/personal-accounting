<?php

class SessionsController extends BaseController {

	public function index()
	{
		return View::make('sessions.login');
	}

	public function store()
	{
		$input = Input::all();

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

	public function destroy()
	{
		Auth::logout();

		return Redirect::to('login');
	}

}