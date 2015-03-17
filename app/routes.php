<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	return View::make('login');
});


Route::get('login2', array('before'=>'auth.basic', function(){
	return "Esta es la vista del login dos";
}));


Route::post('login', 'UserLoginController@user');


Route::get('hola', function(){
	return "hola";
});



Route::get('grafica', function(){
	return View::make('graficas.index');
});



Route::get('tabla', function(){
	return View::make('ajax.table');
});



Route::get('insert_user', function(){
	$reg = new User;
	$reg->id_branch='1';
	$reg->id_role='1';
	$reg->username='JulioMarquines';
	$reg->password=Hash::make('Julio8585');
	$reg->name='Julio Marquines';
	$reg->last_name='Administrador';
	$reg->date='16-09-2014';
	$reg->phone=2281438696;
	$reg->email='juliomarquinez@grupoxalapa.com';	

	$reg->save();
	return 'El usuario de registro corectamente :)';
});


Route::get('insert_user2', function(){
	$reg = new User;
	$reg->id_branch='1';
	$reg->id_role='1';
	$reg->username='Administrador';
	$reg->password=Hash::make('admin');
	$reg->name='Administrador Xalapa.com';
	$reg->last_name='Administrador';
	$reg->date='16-09-2014';
	$reg->phone=2281438696;
	$reg->email='admin';	

	$reg->save();

	return 'El usuario de registro corectamente :)';
});


Route::get('insert_role', function(){
	$reg = new Role;
	$reg->name_role='Administrator';
	$reg->save();

	return 'El usuario de registro corectamente :)';
});


Route::get('insert_branch', function(){
	$reg = new Branch;
	$reg->num_branch='1';
	$reg->name_branch='KFC Americas';
	$reg->save();

	return 'El usuario de registro corectamente :)';
});


Route::get('inserta_deposito', function(){
	$deposito = new Deposit;
	$deposito->id_sucursal="2";
	$deposito->suc="KFCXALAPA";
	$deposito->fecha="2014-25-09";
	$deposito->venta_total="23";
	$deposito->venta_voucher="23";
	$deposito->venta_orfis="23";
	$deposito->num_deposito="23";
	$deposito->tipo_deposito="BANCO";
	$deposito->num_ficha="232323";
	$deposito->save();
	return "El deposito fue guradado";
});


Route::get('graficas', function(){
	return View::make('graficas/index');
});


Route::get('logout', function(){
	Auth::logout();
	//Session::flush();
	return Redirect::to('/');
});

Route::resource('actualiza', 'PanelgeneralController@showActualiza');

Route::controller('panel_admin','PanelgeneralController');

Route::controller('ingresos','IncomeController');

Route::controller('usuarios','UsersController');

Route::controller('sucursal','BranchController');

Route::controller('roles','RolController');

Route::controller('facturas','FacturaController');



Route::get('facturas_xml', function(){
	//return Redirect::to('/facturas_xml');
	return View::make('facturas_xml');
});

Route::get('macros', function(){
	return View::make('macros/index');
});