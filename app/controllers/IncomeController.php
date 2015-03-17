<?php

class IncomeController extends BaseController {

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
	{	$sucursales = Branch::where('active', '=', '1')->get();
		//return View::make('ingresos.index') -> with ('ingresos', $ingresos);
		$role=Auth::user()->id_role;
		return View::make('ingresos.formulario'.$role)->with('sucursales',$sucursales);
		//return "Holaaa";
	}

	public function getCreate()
	{
		return View::make('ingresos.guarda');
		//return "aaaaaaa";
	}

	public function getFormulario()
	{
		return View::make('ingresos.formulario');
		//return "aaaaaaa";
	}

	public function postGuarda()
	{

			$ingresos = new Income;
			$ingresos->id_branch=Input::get('id_sucursal');
			$ingresos->date=Input::get('fecha_captura');
			$ingresos->total_sale=Input::get('venta_total');
			$ingresos->cantidad_depositar=Input::get('cantidad_depositar');
			$ingresos->voucher_sale=Input::get('venta_voucher');
			$ingresos->created_by=Input::get('usuario');
			$ingresos->modified_by=Input::get('usuario');
			$ingresos->orfis_sale=Input::get('venta_orfis');
			$ingresos->save();			

			$num_dep=Input::get('num_deposito');

			for ($i=1; $i <= $num_dep; $i++){ 
				$deposito = new Deposit;
				$numdep=$deposito->number_deposit=$i;
				$can=$deposito->deposit_amount=Input::get('cantidad_'.$i);
				$tip=$deposito->deposit_type=Input::get('tipo_'.$i);
				$numfich=$deposito->record_number=Input::get('numero_ficha_'.$i);
				//$deposito->save();
				$deposito->income()->associate($ingresos);
				$deposito->save();
				//return "El ingresos fue guardado".$i;
				echo "ss->".$i.$numdep.$can.$tip.$numfich;
			}	
			Session::put('save', '1');
			return Redirect::to('panel_admin#ingresos');
	}







	public function getConsultafecha(){
		$fecha=Input::get('date');
		$id_sucursal=Input::get('id_sucursal');
		$sucursal=Input::get('sucursal');
		$fecha_actual=date('Y-m-d');

		if (strtotime($fecha)<=strtotime($fecha_actual)) {

			$ingresos = Income::where('date', '=', $fecha)
			->where('id_branch','=',$id_sucursal)
			->select(DB::raw('count(id) AS cuenta'))
			->get();

			foreach( $ingresos as $toingre){
			    $existe=$toingre->cuenta;
			}

			if ($existe<=0) {
				$totefect = $sucursal::where('fechaRep', '=', $fecha)->get();
				foreach( $totefect as $total){
				    echo $total->cobCajeEfectivo;
				}
			}else{
				echo "ya_existe";
			}

		}else{
			echo "fecha_futura";
		}

	}


	public function getCantidadadepositar(){
		$fecha=Input::get('date');
		$sucursal=Input::get('sucursal');

			$totefect = $sucursal::where('fechaRep', '=', $fecha)
			->select(DB::raw('(cobCajeEfectivo-gaTotalReCliente) AS depositar'))
			->get();

			foreach( $totefect as $total){
			    echo $total->depositar;
			}
	}






	public function getLista()
	{
		//$ingresos = Income::all();
/*
		$ingresos = DB::table('incomes')
			->join('branches', 'incomes.id_branch', '=', 'branches.num_branch')
			->get();*/

/*		$ingresos = DB::table('deposits D')
			->leftJoin('incomes AS I', 'I.id', '=', 'D.income_id')
		    ->get(); */

$ingresos = DB::table('deposits AS D')
	->leftJoin('incomes AS I', 'I.id', '=', 'D.income_id')
	->leftJoin('branches AS B', 'B.num_branch', '=', 'I.id_branch')
	->select('I.date','I.id','I.total_sale','I.cantidad_depositar','I.orfis_sale','I.voucher_sale','B.name_branch',DB::raw('count(D.id) AS total_depositos'))
	->groupBy('I.id')
    ->get(); 

		return View::make('ingresos.lista')->with('ingresos',$ingresos);
		//return "aaaaaaa";
	}


	public function getConcultadepositos(){
		$id=Input::get('id');
		$depositos = Deposit::where('income_id', '=', $id)->get();;

		echo "<table>";
			echo "<tr class='headtb'>";
				echo "<th>no deposito</td>";
				echo "<th>monto de deposito</td>";
				echo "<th>Tipo de depósito</td>";
				echo "<th>Numero de clave</td>";
			echo "</tr>";
			echo "<tbody class='bodytb'>";
		foreach( $depositos as $deposito){
			echo "<tr>";
				echo "<td>".$deposito->number_deposit."</td>";
				echo "<td>".$deposito->deposit_amount."</td>";
				echo "<td>".$deposito->deposit_type."</td>";
				echo "<td>".$deposito->record_number."</td>";
			echo "</tr>";
		}
			echo "</tbody>";
		echo "</table>";
		echo "<style> 
			.headtb{ background:#8A8A8A; color:#EBF2E9; } 
			.headtb th{ border:1px solid #fff; padding:2px; } 
			.bodytb td{ border:1px solid #E0E0E0; padding:2px; } 
		</style>";

		//echo "----------->";
	}




		public function getElimina(){
			//return "sssss";
			$id=Input::get('id');
	 		$income = Income::find($id);
	        
	       if (is_null ($income))
	        {
	            App::abort(404);
	        }
	        
	        $income->delete();

			return Redirect::to('ingresos/lista');

		}



}



