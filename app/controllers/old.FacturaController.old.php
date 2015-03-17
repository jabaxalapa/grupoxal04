<?php

class FacturaController extends BaseController {

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
	{	//$facturas = Factura::all();
		//return View::make('ingresos.index') -> with ('ingresos', $ingresos);
		//$role=Auth::user()->id_role;
		/*$falta_facturas = DB::table('view_faltantes_factura')
			->select(DB::raw('count(noIdentificacion) AS total_facturas'))
		    ->get(); */

		    $falta_facturas = DB::table('view_faltantes_factura')->count();

		    $falta_sucursales = DB::table('faltante_sucursal_factura')->count();

		    $sucursales = Branch::all();

			$facturas = DB::table('facturas AS F')
				->leftJoin('branches AS B', 'F.sucursal_id', '=', 'B.num_branch') 
				->leftJoin('concepto_factura AS CF', 'F.id', '=', 'CF.factura_id')
				->select('F.id','F.Emisor_nombre','F.Comprobante_serie','CF.catalogo_cuenta','F.Comprobante_folio','F.Emisor_rfc','F.Comprobante_total','F.Comprobante_metodoDePago','F.Comprobante_fecha','F.created_at','B.name_branch',DB::raw('count(F.id) AS total_conceptos'))
				->groupBy('CF.factura_id')
			    ->get(); 



		//return View::make('facturas.lista')->with('sucursales', $sucursales)->with('facturas', $facturas)->with('falta_facturas', $falta_facturas)->with('falta_sucursales', $falta_sucursales);
		return View::make('facturas.index')->with('sucursales', $sucursales)->with('facturas', $facturas)->with('falta_facturas', $falta_facturas)->with('falta_sucursales', $falta_sucursales);
	}



	public function getLista()
	{
		    $falta_facturas = DB::table('view_faltantes_factura')->count();
		    $falta_sucursales = DB::table('faltante_sucursal_factura')->count();
		    $sucursales = Branch::all();
			$facturas = DB::table('facturas AS F')
				->leftJoin('branches AS B', 'F.sucursal_id', '=', 'B.num_branch') 
				->leftJoin('concepto_factura AS CF', 'F.id', '=', 'CF.factura_id')
				->select('F.id','F.Emisor_nombre','CF.catalogo_cuenta','F.Comprobante_serie','F.Comprobante_folio','F.Emisor_rfc','F.Comprobante_total','F.Comprobante_metodoDePago','F.Comprobante_fecha','F.created_at','B.name_branch',DB::raw('count(F.id) AS total_conceptos'))
				->groupBy('CF.factura_id')
			    ->get(); 

		return View::make('facturas.lista')->with('sucursales', $sucursales)->with('facturas', $facturas)->with('falta_facturas', $falta_facturas)->with('falta_sucursales', $falta_sucursales);
	}








	public function getConsultadetalles(){
		$id=Input::get('id');
		//$detalles = Conceptofactura::where('factura_id', '=', $id)->get();
		//$detalles = Conceptofactura::where('factura_id', '=', $id)->get();
	/*	$detalles = DB::table('concepto_factura AS CF')
			->leftJoin('catalogo AS C', 'CF.catalogo_id', '=', 'C.id')
			->leftJoin('catalogo_cuentas AS CC', 'CC.id', '=', 'CF.catalogo_cuenta')
			->where('factura_id', '=', $id)->get();*/


		$detalles = DB::table('concepto_factura AS CF')
			->leftJoin('catalogo AS C', 'CF.catalogo_id', '=', 'C.id')
			->leftJoin('facturas AS F', 'F.id', '=', 'CF.factura_id')
			->leftJoin('branches AS CC', 'CC.num_branch', '=', 'F.sucursal_id')
			->where('factura_id', '=', $id)->get();




		echo "<table>";
			echo "<tr class='headtb'>";
				echo "<th>Cant.</td>";
				//echo "<th>unidad</td>";
				//echo "<th>noIdentificacion</td>";
				echo "<th>Descripcion</td>";
				echo "<th>Valor Unitario</td>";
				echo "<th>Importe</td>";
				echo "<th>Catalogo</td>";
				echo "<th>Catalogo Cuenta</td>";
			echo "</tr>";
			echo "<tbody class='bodytb'>";
		foreach( $detalles as $detalle){
			echo "<tr>";
				echo "<td>".$detalle->cantidad."</td>";
				//echo "<td>".$detalle->unidad."</td>";
				//echo "<td>".$detalle->noIdentificacion."</td>";
				
				echo "<td>".$detalle->descripcion."</td>";
				echo "<td style='text-align:right;'>$ ".$detalle->valorUnitario."</td>";
				echo "<td style='text-align:right;'>$ ".$detalle->importe."</td>";
				echo "<td>".$detalle->nombre_cuenta."</td>";

				if(($detalle->subfijo)=='5'){
					$catalogo_cuenta=$detalle->catalogo_cuenta5;
				}else if(($detalle->subfijo)=='6'){
					$catalogo_cuenta=$detalle->catalogo_cuenta6;
				}else{
					$catalogo_cuenta="";
				}

				echo "<td>".$detalle->subfijo."-".$catalogo_cuenta.$detalle->num_cuenta."</td>";
			echo "</tr>";
		}
			echo "</tbody>";
		echo "</table>";
		echo "<style> 
			.headtb{ background:#8A8A8A; color:#EBF2E9; } 
			.headtb th{ border:1px solid #fff; padding:2px; } 
			.bodytb td{ border:1px solid #E0E0E0; padding:2px; } 
		</style>";
	}




	public function postSubexml(){

     		function guardaDB($archivo_xml,$archivo_pdf){
				$xml_file = "facturas_xml/xml/".$archivo_xml;

				$xml = simplexml_load_file($xml_file); 


				$ns = $xml->getNamespaces(true);
				$xml->registerXPathNamespace('c', $ns['cfdi']);
				$xml->registerXPathNamespace('t', $ns['tfd']);


				foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){ 		
				    $Comprobante_version=$cfdiComprobante['version']; 
				    
				    $Comprobante_serie=$cfdiComprobante['serie']; 
				    
				    $Comprobante_folio=$cfdiComprobante['folio']; 
				    
				    $Comprobante_fecha=$cfdiComprobante['fecha']; 
				    
				    $Comprobante_sello=$cfdiComprobante['sello']; 
				    
				    $Comprobante_formaDePago=$cfdiComprobante['formaDePago']; 
				    	      
				    $Comprobante_noCertificado=$cfdiComprobante['noCertificado']; 
				    	
				    $Comprobante_certificado=$cfdiComprobante['certificado']; 
				    	      
				    $Comprobante_subTotal=$cfdiComprobante['subTotal']; 
				    	
				    $Comprobante_LugarExpedicion=$cfdiComprobante['LugarExpedicion']; 
				    	
				    $Comprobante_NumCtaPago=$cfdiComprobante['NumCtaPago']; 
				               
				    $Comprobante_TipoCambio=$cfdiComprobante['TipoCambio']; 
				    
				    $Comprobante_Moneda=$cfdiComprobante['Moneda']; 
				    
				    $Comprobante_total=$cfdiComprobante['total']; 
				    
				    $Comprobante_metodoDePago=$cfdiComprobante['metodoDePago']; 
				         
				    $Comprobante_tipoDeComprobante=$cfdiComprobante['tipoDeComprobante']; 
				    
				} 
				



				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){ 
				   $Emisor_rfc=$Emisor['rfc']; 
				    
				   $Emisor_nombre=$Emisor['nombre']; 
				    
				} 
				



				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:DomicilioFiscal') as $DomicilioFiscal){ 
				   $DomicilioFiscal_calle=$DomicilioFiscal['calle']; 
				   
				   $DomicilioFiscal_noExterior=$DomicilioFiscal['noExterior']; 
				   
				   $DomicilioFiscal_colonia=$DomicilioFiscal['colonia']; 
				   
				   $DomicilioFiscal_localidad=$DomicilioFiscal['localidad']; 
				   
				   $DomicilioFiscal_municipio=$DomicilioFiscal['municipio']; 
				   
				   $DomicilioFiscal_estado=$DomicilioFiscal['estado']; 
				   
				   $DomicilioFiscal_pais=$DomicilioFiscal['pais']; 
				   
				   $DomicilioFiscal_codigoPostal=$DomicilioFiscal['codigoPostal']; 
				   
				} 
				



				if($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn') ){

					foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn') as $ExpedidoEn){ 
					   $ExpedidoEn_calle=$ExpedidoEn['calle'];
					   
					   $ExpedidoEn_noExterior=$ExpedidoEn['noExterior'];
					   
					   $ExpedidoEn_colonia=$ExpedidoEn['colonia']; 
					   
					   $ExpedidoEn_localidad=$ExpedidoEn['localidad']; 
					   
					   $ExpedidoEn_referencia=$ExpedidoEn['referencia']; 
					   
					   $ExpedidoEn_estado=$ExpedidoEn['estado']; 
					   
					   $ExpedidoEn_pais=$ExpedidoEn['pais']; 
					   
					   $ExpedidoEn_codigoPostal=$ExpedidoEn['codigoPostal']; 
					   
					} 
					 

				}

				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:RegimenFiscal') as $RegimenFiscal){ 
				   $RegimenFiscal_Regimen=$RegimenFiscal['Regimen']; 
				   
				} 
				 



				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
				   $Receptor_rfc=$Receptor['rfc']; 
				   
				   $Receptor_nombre=$Receptor['nombre']; 
				   
				} 
				 



				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor//cfdi:Domicilio') as $ReceptorDomicilio){ 
				   $Domicilio_calle=$ReceptorDomicilio['calle']; 
				      
				   $Domicilio_colonia=$ReceptorDomicilio['colonia']; 
				   
				   $Domicilio_localidad=$ReceptorDomicilio['localidad']; 
				   
				   $Domicilio_estado=$ReceptorDomicilio['estado']; 
				   
				   $Domicilio_pais=$ReceptorDomicilio['pais']; 
				   
				   $Domicilio_codigoPostal=$ReceptorDomicilio['codigoPostal']; 
				   				   
				   $Domicilio_municipio=$ReceptorDomicilio['municipio']; 
				   
				   $Domicilio_noExterior=$ReceptorDomicilio['noExterior']; 
				   
				   $Domicilio_noInterior=$ReceptorDomicilio['noInterior']; 
				   
				} 
				 





				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos') as $Impuestos){ 
				   $Impuestos_totalImpuestosTrasladados=$Impuestos['totalImpuestosTrasladados']; 				    
				} 
				 





				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){ 
				   $Traslado_importe=$Traslado['importe']; 
				   
				   $Traslado_impuesto=$Traslado['impuesto']; 
				      
				   $Traslado_tasa=$Traslado['tasa']; 
				   
				} 
				 




				//ESTA ULTIMA PARTE ES LA QUE GENERABA EL ERROR
				foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
				   $TimbreFiscalDigital_version=$tfd['version']; 
				   
				   $TimbreFiscalDigital_UUID=$tfd['UUID']; 
				   
				   $TimbreFiscalDigital_FechaTimbrado=$tfd['FechaTimbrado']; 
				   	
				   $TimbreFiscalDigital_selloCFD=$tfd['selloCFD']; 
				      
				   $TimbreFiscalDigital_noCertificadoSAT=$tfd['noCertificadoSAT']; 
				   
				   $TimbreFiscalDigital_selloSAT=$tfd['selloSAT'];    
				   
				} 
				


				$facturas = new Factura;
				$facturas->Comprobante_version=$Comprobante_version;
				$facturas->Comprobante_serie=$Comprobante_serie;
				$facturas->Comprobante_folio=$Comprobante_folio;
				$facturas->Comprobante_fecha=$Comprobante_fecha;
				$facturas->Comprobante_sello=$Comprobante_sello;
				$facturas->Comprobante_formaDePago=$Comprobante_formaDePago;
				$facturas->Comprobante_noCertificado=$Comprobante_noCertificado;
				$facturas->Comprobante_certificado=$Comprobante_certificado;
				$facturas->Comprobante_subTotal=$Comprobante_subTotal;
				$facturas->Comprobante_LugarExpedicion=$Comprobante_LugarExpedicion;
				$facturas->Comprobante_NumCtaPago=$Comprobante_NumCtaPago;
				$facturas->Comprobante_TipoCambio=$Comprobante_TipoCambio;
				$facturas->Comprobante_Moneda=$Comprobante_Moneda;
				$facturas->Comprobante_total=$Comprobante_total;
				$facturas->Comprobante_metodoDePago=$Comprobante_metodoDePago;
				$facturas->Comprobante_tipoDeComprobante=$Comprobante_tipoDeComprobante;

				$facturas->Emisor_rfc=$Emisor_rfc;
				$facturas->Emisor_nombre=$Emisor_nombre;

				$facturas->DomicilioFiscal_calle=$DomicilioFiscal_calle;
				$facturas->DomicilioFiscal_noExterior=$DomicilioFiscal_noExterior;
				$facturas->DomicilioFiscal_colonia=$DomicilioFiscal_colonia;
				$facturas->DomicilioFiscal_localidad=$DomicilioFiscal_localidad;
				$facturas->DomicilioFiscal_municipio=$DomicilioFiscal_municipio;
				$facturas->DomicilioFiscal_estado=$DomicilioFiscal_estado;
				$facturas->DomicilioFiscal_pais=$DomicilioFiscal_pais;
				$facturas->DomicilioFiscal_codigoPostal=$DomicilioFiscal_codigoPostal;

				if($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn') ){
					$facturas->ExpedidoEn_calle=$ExpedidoEn_calle;
					$facturas->ExpedidoEn_noExterior=$ExpedidoEn_noExterior;
					$facturas->ExpedidoEn_colonia=$ExpedidoEn_colonia;
					$facturas->ExpedidoEn_localidad=$ExpedidoEn_localidad;
					$facturas->ExpedidoEn_referencia=$ExpedidoEn_referencia;
					$facturas->ExpedidoEn_estado=$ExpedidoEn_estado;
					$facturas->ExpedidoEn_pais=$ExpedidoEn_pais;
					$facturas->ExpedidoEn_codigoPostal=$ExpedidoEn_codigoPostal;
				}


				$facturas->RegimenFiscal_Regimen=$RegimenFiscal_Regimen;

				$facturas->Receptor_rfc=$Receptor_rfc;
				$facturas->Receptor_nombre=$Receptor_nombre;

				$facturas->Domicilio_calle=$Domicilio_calle;
				$facturas->Domicilio_colonia=$Domicilio_colonia;
				$facturas->Domicilio_localidad=$Domicilio_localidad;
				$facturas->Domicilio_estado=$Domicilio_estado;
				$facturas->Domicilio_pais=$Domicilio_pais;
				$facturas->Domicilio_codigoPostal=$Domicilio_codigoPostal;

				$facturas->Impuestos_totalImpuestosTrasladados=$Impuestos_totalImpuestosTrasladados;

				$facturas->Traslado_importe=$Traslado_importe;
				$facturas->Traslado_impuesto=$Traslado_impuesto;
				$facturas->Traslado_tasa=$Traslado_tasa;

				$facturas->TimbreFiscalDigital_version=$TimbreFiscalDigital_version;
				$facturas->TimbreFiscalDigital_UUID=$TimbreFiscalDigital_UUID;
				$facturas->TimbreFiscalDigital_FechaTimbrado=$TimbreFiscalDigital_FechaTimbrado;
				$facturas->TimbreFiscalDigital_selloCFD=$TimbreFiscalDigital_selloCFD;
				$facturas->TimbreFiscalDigital_noCertificadoSAT=$TimbreFiscalDigital_noCertificadoSAT;
				$facturas->TimbreFiscalDigital_selloSAT=$TimbreFiscalDigital_selloSAT;

				if(Input::get('id_sucursal')>0){
					$facturas->sucursal_id=$sucursal=Input::get('id_sucursal');			
				}else{
					$facturas->sucursal_id=NULL;	
				}
				$facturas->xml=$archivo_xml;
				$facturas->pdf=$archivo_pdf;

				$facturas->save();	
				$id_productos=$facturas->id;





				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){ 				   
				   $Concepto_cantidad=$Concepto['cantidad']; 				   
				   $Concepto_unidad=$Concepto['unidad']; 				   
				   $Concepto_noIdentificacion=$Concepto['noIdentificacion'];				  
				   $Concepto_descripcion=$Concepto['descripcion']; 				    
				   $Concepto_valorUnitario=$Concepto['valorUnitario']; 				       
				   $Concepto_importe=$Concepto['importe']; 
				   




					$concepto_factura = new Conceptofactura;
					//$concepto_factura->factura_id=$id_factura;
					$concepto_factura->cantidad=$Concepto_cantidad;
					$concepto_factura->unidad=$Concepto_unidad;
					$concepto_factura->noIdentificacion=$Concepto_noIdentificacion;
					$concepto_factura->descripcion=$Concepto_descripcion;
					$concepto_factura->valorUnitario=$Concepto_valorUnitario;
					//$concepto_factura->catalogo_id=$id_cat;


					$existe_id = DB::table('view_producto_factura')->count();

					if($existe_id > 0){
						$id_catalogo = DB::table('view_producto_factura')->where('noIdentificacion', '=', $Concepto_noIdentificacion) ->groupBy('noIdentificacion')->get();
						foreach ($id_catalogo as $id_c)
						{
							$concepto_factura->catalogo_id=$id_c->catalogo_id;
						}
					}else{
						$concepto_factura->catalogo_id=NULL;
					}



					$concepto_factura->importe=$Concepto_importe;
					$concepto_factura->Factura()->associate($facturas);
					$concepto_factura->save();
					$id_cat=NULL;

				} 

				$productos = Conceptofactura::where('factura_id', '=', $id_productos)->get();

				$faltantes = DB::table('view_faltantes_factura')->get();
				$catalogo = DB::table('catalogo')->get();

				return View::make('facturas.formato')->with('productos',$productos)->with('faltantes',$faltantes)->with('catalogo',$catalogo);		
     		}


     		

		if(Input::hasFile('archivo_xml')) {


			$fecha_arch=date('dmYHis__');

			//$path = Input::file('archivo_xml')->getRealPath();
			Input::file('archivo_xml');
			$archivo_xml = Input::file('archivo_xml')->getClientOriginalName();
			$archivo_xml = $fecha_arch.$archivo_xml;
			//$extension = Input::file('archivo_xml')->getClientOriginalExtension();
			//$size = Input::file('archivo_xml')->getSize();
			//$mime = Input::file('archivo_xml')->getMimeType();	       	
	       	Input::file('archivo_xml')->move('facturas_xml/xml',$archivo_xml);
			


			$archivo_pdf = Input::file('archivo_pdf')->getClientOriginalName();
			$archivo_pdf = $fecha_arch.$archivo_pdf;
			Input::file('archivo_pdf')->move('facturas_xml/pdf',$archivo_pdf);



			return guardaDB($archivo_xml,$archivo_pdf);
		}



	}



	public function getFormatoproducto()
	{	
		$faltantes = DB::table('view_faltantes_factura')->get();
		$catalogo = DB::table('catalogo')->get();

		return View::make('facturas.formato')->with('faltantes',$faltantes)->with('catalogo',$catalogo);		
	}


	public function getFormatoproveedor()
	{	
		$faltantes = DB::table('faltante_proveedor')->get();
		//$sucursales = DB::table('branches')->get();

		$proveedores= DB::table('catalogo_cuentas')->where('num_cuenta','LIKE', '%2000100050001%')->get();
		$com_tot= DB::table('catalogo_cuentas')->where('num_cuenta','LIKE', '%7740100010001%')->get();
		$excentas= DB::table('catalogo_cuentas')->where('num_cuenta','LIKE','%7740100020001%')->get();

		return View::make('facturas.ligaproveedor')->with('faltantes',$faltantes)->with('proveedores',$proveedores)->with('com_tot',$com_tot)->with('excentas',$excentas);	


	}

	public function getActualizacatalogo()
	{	
		$id_num_fac=Input::get('id_num_fac');
		$c_id=Input::get('c_id');

		//$iva=Input::get('iva');
		//$ieps=Input::get('ieps');		
		
		DB::table('concepto_factura')
            ->where('noIdentificacion', $id_num_fac)
            ->update(array('catalogo_id' => $c_id));

/*
		DB::table('catalogo')
		    ->where('id', $c_id)
		    ->update(array('iva_check' => $iva,'ieps_check' =>$ieps ));
*/
/*
         //Con esta consulta obtenermos solamente los que tengan agregados la Sucursal   
		$cuentas = DB::table('concepto_factura AS CF')
						->leftJoin('facturas AS F', 'F.id', '=', 'CF.factura_id') 
						->leftJoin('branches AS B', 'B.num_branch', '=', 'F.sucursal_id')
						->leftJoin('catalogo AS C', 'CF.catalogo_id', '=', 'C.id')
						->select('F.id AS id_fac','F.sucursal_id', 'CF.id AS id_CF', 'CF.catalogo_id', 'B.catalogo_cuenta5', 'B.catalogo_cuenta6', 'B.name_branch', 'C.num_cuenta')
					    ->where('CF.catalogo_id', $c_id)
					    ->get(); */
/*
		foreach ($cuentas as $key) {
			$id_cf=$key->id_CF;
			$hay=$key->sucursal_id;
			if($hay){	
				$catalogo_sucursal=$key->catalogo_cuenta;
				$catalogo_cuenta=$key->num_cuenta;
				echo $cuenta_catalogo=$catalogo_sucursal.$catalogo_cuenta;

				$cc = DB::table('catalogo_cuentas')
					->where('num_cuenta', $cuenta_catalogo)
					->select('id')
					->get();
				//$cc = Catalogocuenta::find($cuenta_catalogo,array('num_cuenta','id'));
				foreach ($cc as $value) {
					echo "------------------->".$id_cc=$value->id;
				}			

				DB::table('concepto_factura')
		            ->where('id', $id_cf)
		            ->update(array('catalogo_cuenta' => $id_cc));
		    }       
		}*/
		//$this->agrega_catalogo_cuenta($c_id,"catalogo");

	}


	public function getActualizasucursal()
	{	
		$id_num_fac=Input::get('id_num_fac');
		$c_id=Input::get('c_id');
		
		DB::table('facturas')
            ->where('id', $id_num_fac)
            ->update(array('sucursal_id' => $c_id));

/*
         //Con esta consulta obtenermos solamente los que tengan agregados la Sucursal   
		$cuentas = DB::table('concepto_factura AS CF')
						->leftJoin('facturas AS F', 'F.id', '=', 'CF.factura_id') 
						->leftJoin('branches AS B', 'B.num_branch', '=', 'F.sucursal_id')
						->leftJoin('catalogo AS C', 'CF.catalogo_id', '=', 'C.id')
						->select('F.id AS id_fac','F.sucursal_id', 'CF.id AS id_CF', 'CF.catalogo_id', 'B.catalogo_cuenta', 'B.name_branch', 'C.num_cuenta')
					    ->where('F.id', $id_num_fac)
					    ->get(); */
/*
		foreach ($cuentas as $key) {
			$id_cf=$key->id_CF;
			$hay=$key->catalogo_id;
			if($hay){						
				$catalogo_sucursal=$key->catalogo_cuenta;
				$catalogo_cuenta=$key->num_cuenta;
				$cuenta_catalogo=$catalogo_sucursal.$catalogo_cuenta;

				$cc = DB::table('catalogo_cuentas')
					->where('num_cuenta', $cuenta_catalogo)
					->select('id')
					->get();

				foreach ($cc as $value) {
					$id_cc=$value->id;
				}
				

				DB::table('concepto_factura')
		            ->where('id', $id_cf)
		            ->update(array('catalogo_cuenta' => $id_cc));
		    }

		}*/
		//$this->agrega_catalogo_cuenta($c_id,"sucursal");

	}



/*
	function agrega_catalogo_cuenta($c_id,$tipo){
		if($tipo=="sucursal"){
			$reg="F.id";
		}if($tipo=="catalogo"){
			$reg="CF.catalogo_id";
		}
		ECHO $reg;
        //Con esta consulta obtenermos solamente los que tengan agregados la Sucursal   
		$cuentas = DB::table('concepto_factura AS CF')
						->leftJoin('facturas AS F', 'F.id', '=', 'CF.factura_id') 
						->leftJoin('branches AS B', 'B.num_branch', '=', 'F.sucursal_id')
						->leftJoin('catalogo AS C', 'CF.catalogo_id', '=', 'C.id')
						->select('F.id AS id_fac','F.sucursal_id', 'CF.id AS id_CF', 'CF.catalogo_id', 'B.catalogo_cuenta', 'B.name_branch', 'C.num_cuenta')
					    ->where($reg, $c_id)
					    ->get(); 

		foreach ($cuentas as $key) {
			ECHO $id_cf=$key->id_CF;
			$hay=$key->catalogo_id;
			if($hay){	
				$catalogo_sucursal=$key->catalogo_cuenta;
				$catalogo_cuenta=$key->num_cuenta;
				ECHO $cuenta_catalogo=$catalogo_sucursal.$catalogo_cuenta;

				DB::table('concepto_factura')
		            ->where('id', $id_cf)
		            ->update(array('catalogo_cuenta' => $cuenta_catalogo));
		    }       
		}

	}
*/




	/* **** Agrega Sucursal a Factura **** */
	public function getLigarsucursal()
	{	
		$faltantes = DB::table('faltante_sucursal_factura')->get();
		$sucursales = DB::table('branches')->get();

		return View::make('facturas.ligasucursal')->with('faltantes',$faltantes)->with('sucursales',$sucursales);		
	}


	public function getElimina(){
		$id=Input::get('id');
		$income = Factura::find($id);
	    
	   if (is_null ($income)){
	        App::abort(404);
	    }
	    $income->delete();
		//return Redirect::to('panel_admin#facturas');
	}





	public function getVizualizapdf(){
		$nombre_pdf=Input::get('nombre_pdf'); 
		$folio=Input::get('folio');

		return View::make('facturas.vizualizapdf')
			->with('nombre_pdf',$nombre_pdf)
			->with('folio',$folio);	
	}





}

