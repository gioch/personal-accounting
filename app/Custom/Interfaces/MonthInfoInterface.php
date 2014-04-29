<?php namespace Custom\Interfaces;

interface MonthInfoInterface {
	
	public function find($id);
	public function create($inputs);
	public function hasCurrentMonthInfo();
	public function getCurrentMonthInfo();
	public function updateActualCharge($id, $amount);

}