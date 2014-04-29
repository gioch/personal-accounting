<?php namespace Custom\Repositories;

use Auth;
use MonthInfo;
use Custom\Interfaces\MonthInfoInterface;
use Custom\Validators\MonthInfoValidator;

class MonthInfoRepository implements MonthInfoInterface {

	protected $monthInfoValidator;

	public function __construct(MonthInfoValidator $v)
	{
		$this->monthInfoValidator = $v; 
	}

	public function find($id)
	{
		return MonthInfo::find($id);
	}

	public function create($inputs)
	{
		$userId = Auth::user()->id;

		$this->monthInfoValidator->validateForCreation($inputs);

		MonthInfo::create([
			'user_id' => Auth::user()->id,
			'year' => $inputs['year'],
			'month' => $inputs['month'],
			'possible_charge' => $inputs['possible_charge']
		]);
	}

	public function hasCurrentMonthInfo()
	{
		$userId = Auth::user()->id;

		$year = (int)Date('Y');
		$month = (int)Date('m');

		$monthInfoCount = MonthInfo::where('user_id', '=', $userId)
									->where('year', '=', $year)
									->where('month', '=', $month)
									->select('id')
									->count();

		if( $monthInfoCount < 1 )
			return false;

		return true;
	}

	public function getCurrentMonthInfo()
	{
		$userId = Auth::user()->id;

		$year = (int)Date('Y');
		$month = (int)Date('m');

		return MonthInfo::where('user_id', '=', $userId)
						->where('year', '=', $year)
						->where('month', '=', $month)
						->first();
	} 

	public function updateActualCharge($id, $amount)
	{
		$monthInfo = MonthInfo::find($id); 
		$monthInfo->actual_charge = $amount;
		$monthInfo->save();
	}

}