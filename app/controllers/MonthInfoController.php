<?php 

use Custom\Interfaces\MonthInfoInterface;
use Custom\Exceptions\ValidationException;

class MonthInfoController extends BaseController {

	protected $monthInfoRepo;

	public function __construct(MonthInfoInterface $MIrepo)
	{
		$this->monthInfoRepo = $MIrepo;
	}

	public function index() 
	{
		
	}

	public function create()
	{
		return View::make('month_info.create', compact('months'));
	}

	public function store()
	{  
		try 
		{
			$this->monthInfoRepo->create(Input::all());
		}
		catch (ValidationException $e)
		{
			return $e->getErrors();
		}

		return Redirect::to('charges');
	}


}