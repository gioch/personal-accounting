<?php namespace Custom\Repositories;

use Charge;
use Custom\Interfaces\ChargeInterface;
use Custom\Validators\ChargeValidator;

class ChargeRepository implements ChargeInterface {

	public $validator;

	public function __construct(ChargeValidator $v)
	{
		$this->validator = $v;
	}

	public function find($id)
	{
		return Charge::find($id);
	}

	public function getAllTodayCharges($monthInfoId)
	{
		$curDay = Date('d') * 1;

		return Charge::with('category')
 						->with('priority')
 						->with('familyMember')
						->where('month_info_id', '=', $monthInfoId)
						->where('day', '=', $curDay)
						->get(); 
	}

	public function create($monthInfoId, $inputs)
	{
		$curDay = Date('d') * 1;

		$this->validator->validateForCreation($inputs);

		Charge::create([
			'month_info_id' => $monthInfoId,
			'day' => $curDay,
			'title' => $inputs['title'],
			'amount' => $inputs['amount'],
			'family_member_id' => $inputs['member'],
			'category_id' => $inputs['category'],
			'priority_id' => $inputs['priority']
		]);
	}

	public function update($id, $inputs)
	{
		$this->validator->validateForUpdate($inputs);
		
		$charge = Charge::find($id);
		$charge->title = $inputs['title'];
		$charge->amount = $inputs['amount'];
		$charge->family_member_id = $inputs['member'];
		$charge->category_id = $inputs['category'];
		$charge->priority_id = $inputs['priority'];
		$charge->save(); 
	}

	public function getSumOfMonthCharges($monthInfoId)
	{
		return Charge::where('month_info_id', '=', $monthInfoId)->sum('amount');
	}

	public function delete($id)
	{
		$charge = Charge::find($id);
		$charge->delete();
	}

	public function getChargeMonthId($id)
	{
		$charge = Charge::find($id);
		return $charge->month_info_id;
	}
}