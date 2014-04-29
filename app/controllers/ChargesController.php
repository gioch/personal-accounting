<?php

//use Carbon\Carbon;

use Custom\Interfaces\PriorityInterface;
use Custom\Interfaces\CategoryInterface;
use Custom\Interfaces\FamilyMemberInterface;
use Custom\Interfaces\MonthInfoInterface;
use Custom\Interfaces\ChargeInterface;
use Custom\Exceptions\ValidationException;

class ChargesController extends BaseController {

	protected $categoryRepo;
	protected $priorityRepo;
	protected $familyMemberRepo;
	protected $monthInfoRepo;
	protected $chargeRepo;

	public function __construct(CategoryInterface $catRepo,
								PriorityInterface $Prepo,
								FamilyMemberInterface $FMrepo, 
								MonthInfoInterface $MIrepo, 
								ChargeInterface $Crepo)
	{
		$this->categoryRepo = $catRepo;
		$this->priorityRepo = $Prepo;
		$this->familyMemberRepo = $FMrepo;
		$this->monthInfoRepo = $MIrepo;
		$this->chargeRepo = $Crepo;
	}

	public function index()
	{
		$userId = Auth::user()->id; 

		if( ! $this->familyMemberRepo->hasMembers($userId) )
			return Redirect::to('members/create');

		if( ! $this->monthInfoRepo->hasCurrentMonthInfo() )
			return Redirect::to('monthinfo');

		$currentMonthInfo = $this->monthInfoRepo->getCurrentMonthInfo();

		$charges = $this->chargeRepo->getAllTodayCharges($currentMonthInfo->id);

		$priorities = $this->priorityRepo->getList();
		$categories = $this->categoryRepo->getList();
		$members = $this->familyMemberRepo->getList($userId);

		$possibleCharge = $currentMonthInfo->possible_charge;
		$actualCharge = $currentMonthInfo->actual_charge;
 
		return View::make('charges.index', compact(['charges', 
													'priorities', 
													'categories', 
													'members', 
													'possibleCharge', 
													'actualCharge']));
	}

	public function store()
	{	 
		$currentMonthInfo = $this->monthInfoRepo->getCurrentMonthInfo();

		try
		{
			$this->chargeRepo->create($currentMonthInfo->id, Input::all());
		}
		catch (ValidationException $e)
		{
			return $e->getErrors();
		} 

		$sumOfCharges = $this->chargeRepo->getSumOfMonthCharges($currentMonthInfo->id);

		$this->monthInfoRepo->updateActualCharge( $currentMonthInfo->id, $sumOfCharges );

		return Redirect::to('charges');
	}

	public function edit($id)
	{  
		$userId = Auth::user()->id;
		$charge = $this->chargeRepo->find($id);

		$priorities = $this->priorityRepo->getList();
		$categories = $this->categoryRepo->getList();
		$members = $this->familyMemberRepo->getList($userId);

		return View::make('charges/edit', compact(['charge','priorities', 'categories', 'members']));
	}

	public function update($id)
	{    
		try
		{
			$this->chargeRepo->update($id, Input::all() );
		}
		catch (ValidationException $e)
		{
			return $e->getErrors();
		}

		$monthInfoId = $this->chargeRepo->getChargeMonthId($id); 

		$sumOfCharges = $this->chargeRepo->getSumOfMonthCharges($monthInfoId); 

		$this->monthInfoRepo->updateActualCharge( $monthInfoId, $sumOfCharges ); 

		return Redirect::to('charges');
	}

	public function destroy($id)
	{    
		$monthInfoId = $this->chargeRepo->getChargeMonthId($id); 

		$this->chargeRepo->delete($id);  

		$sumOfCharges = $this->chargeRepo->getSumOfMonthCharges($monthInfoId);  

		$this->monthInfoRepo->updateActualCharge( $monthInfoId, $sumOfCharges );  
		 
		return Redirect::to('charges');
	} 


}