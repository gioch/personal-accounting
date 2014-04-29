<?php namespace Custom\Interfaces;

interface ChargeInterface {

	public function find($id);
	public function getAllTodayCharges($monthInfoId);
	public function create($monthInfoId, $inputs);
	public function update($id, $inputs);
	public function getSumOfMonthCharges($monthInfoId);
	public function delete($id);
	public function getChargeMonthId($id);

}