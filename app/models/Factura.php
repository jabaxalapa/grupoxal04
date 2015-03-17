<?php
/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
*/
class Factura extends Eloquent {

	//protected $table='incomes';
	public function deposits(){
		return $this->hasMany('Conceptofactura','id_factura');
		//return $this->hasMany('Deposit');
	}

	public function impuestos(){
		return $this->hasMany('Impuestosfactura','factura_id');
		//return $this->hasMany('Deposit');
	}

}
