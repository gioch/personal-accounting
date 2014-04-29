<?php

use Custom\Interfaces\FamilyMemberInterface;
use Custom\Exceptions\ValidationException;

class FamilyMembersController extends BaseController {

	protected $familyMemberRepo;

	public function __construct(FamilyMemberInterface $familyMemberRepository)
	{
		$this->familyMemberRepo = $familyMemberRepository;
	}

	public function index()
	{
		$members = $this->familyMemberRepo->getAll();

		return View::make('members.index', compact('members'));
	}

	public function create()
	{ 
		return View::make('members.create');
	}

	public function store()
	{ 
		try 
		{
			$this->familyMemberRepo->create(Input::all());
		}
		catch (ValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors( $e->getErrors() );
		}

		return Redirect::to('members'); 
	}

	public function edit($id)
	{
		$member = $this->familyMemberRepo->find($id);

		return View::make('members/edit', compact('member')); 
	}

	public function update($id)
	{
		try 
		{
			$this->familyMemberRepo->edit($id, Input::all());
		}
		catch (ValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors( $e->getErrors() ); 
		}

		return Redirect::to('members');
	}

}