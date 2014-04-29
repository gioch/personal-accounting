<?php namespace Custom\Repositories;

use Priority;
use Custom\Interfaces\PriorityInterface;

class PriorityRepository implements PriorityInterface {
 
	public function getList()
	{ 
		return Priority::lists('name_en', 'id');
	}
}