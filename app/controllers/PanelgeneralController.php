<?php 
	
	Class PanelgeneralController extends BaseController
	{

		public function __construct(){
			$this->beforeFilter('auth'); //bloqueo de accion
		}

		public function getIndex()
		{
			$role=Auth::user()->id_role;
			return View::make('paneladmin');
		}


		public function showActualiza()
		{
			$sucursales = Branch::where('active', '=', '1')->get();
			//return View::make('ingresos.index') -> with ('ingresos', $ingresos);
			$role=Auth::user()->id_role;
			return View::make('actualizar_reporte.index'.$role)->with('sucursales',$sucursales);
		}


	}
?>