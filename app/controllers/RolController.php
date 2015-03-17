<?php

class RolController extends BaseController {

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




	public function getIndex()
	{	$roles = Role::all();
		//return View::make('ingresos.index') -> with ('ingresos', $ingresos);
		$role=Auth::user()->id_role;
		return View::make('rol.index')->with('roles',$roles);
		//return "Holaaa";
	}


}
