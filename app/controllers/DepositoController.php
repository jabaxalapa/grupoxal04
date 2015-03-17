<?php

class DepositoController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct(){
		$this->beforeFilter('auth');
	}


	public function getIndex()
	{	
		$role=Auth::user()->id_role;
		$deposito = Deposito::all();
		return View::make('deposito.index') -> with ('depositos', $deposito);
		//return "Holaaa";
	}

	public function getCreate()
	{
		return View::make('deposito.guarda');
		//return "aaaaaaa";
	}

	public function getFormulario()
	{
		return View::make('deposito.formulario');
		//return "aaaaaaa";
	}

	public function postGuarda()
	{
			$deposito = new Deposito;
			
			$deposito->id_sucursal=Input::get('id_sucursal');
			$deposito->suc=Input::get('suc');
			$deposito->fecha=Input::get('fecha');
			$deposito->venta_total=Input::get('venta_total');
			$deposito->venta_voucher=Input::get('venta_voucher');
			$deposito->venta_orfis=Input::get('venta_orfis');
			$deposito->num_deposito=Input::get('num_deposito');
			$deposito->tipo_deposito=Input::get('tipo_deposito');
			$deposito->num_ficha=Input::get('num_ficha');
			$deposito->save();
			return "El deposito fue guradado";
	}





}
