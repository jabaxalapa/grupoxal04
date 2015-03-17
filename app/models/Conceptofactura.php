<?php
/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
*/
class Conceptofactura extends Eloquent {

	protected $table='concepto_factura';


	public function factura(){
	    return $this->belongsTo('Factura');
	}


	public function getReminderId(){
		return $this->id;
	}

}
