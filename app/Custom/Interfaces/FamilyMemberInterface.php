<?php namespace Custom\Interfaces;

interface FamilyMemberInterface {

	public function getAll();
	public function create($inputs);
	public function find($id);
	public function edit($id, $inputs);
	public function hasMembers();
	public function getList();

}