<?php
/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
*/
class Impuestosfactura extends Eloquent {

	protected $table='impuestos_factura';

	public function factura(){
	    return $this->belongsTo('Factura');
	}


	public function getReminderId(){
		return $this->id;
	}
	
}
