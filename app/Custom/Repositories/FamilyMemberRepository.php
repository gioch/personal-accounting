<?php namespace Custom\Repositories;

use Auth;
use FamilyMember;
use Custom\Interfaces\FamilyMemberInterface;
use Custom\Validators\FamilyMemberValidator;

class FamilyMemberRepository implements FamilyMemberInterface {

	public $validator;

	public function __construct(FamilyMemberValidator $v)
	{
		$this->validator = $v;
	}

	public function getAll()
	{
		$userId = Auth::user()->id;

		return FamilyMember::whereUserId($userId)->get();
	}

	public function create($inputs)
	{
		$this->validator->validateForCreation($inputs);

		FamilyMember::create([
			'user_id' => Auth::user()->id,
			'name' => $inputs['name']
		]);
	}

	public function find($id)
	{
		return FamilyMember::find($id);
	}

	public function edit($id, $inputs)
	{
		$this->validator->validateForUpdate($inputs);

		$member = FamilyMember::find($id);
		$member->name = $inputs['name'];
		$member->save();
	}

	public function hasMembers()
	{
		$userId = Auth::user()->id;
		$familyMembersCount = FamilyMember::whereUserId($userId)
										->select('id')
										->count(); 

		if( $familyMembersCount < 1 )
			return false;

		return true;
	}

	public function getList()
	{
		$userId = Auth::user()->id;
		return FamilyMember::whereUserId($userId)->lists('name', 'id');
	}
}