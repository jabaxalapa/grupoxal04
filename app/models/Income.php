<?php
/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
*/
class Income extends Eloquent {

	//protected $table='incomes';
	public function deposits(){
		return $this->hasMany('Deposit','id_income');
		//return $this->hasMany('Deposit');
	}

}
