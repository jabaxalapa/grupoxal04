<?php require_once("inc/init.php"); ?>

@if(Auth::check())



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

@if (Session::has('save'))
 <script type="text/javascript">
 	alert("SE GUARDO CORRECTAMENTE");
 </script>
{{ Session::forget('save'); }}
 
@endif


			<div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-18" data-widget-colorbutton="false" data-widget-editbutton="false">

				<header>
					<h2><strong>Captura de Ingresos</strong></h2>	

													
				</header>


				<!-- widget div-->
				<div>
									
					<!-- widget content -->
					<div class="widget-body">

						<!--<form class="form-horizontal" method="post" action="ingresos/guarda" nombre="formulario" onsubmit="return  envia_form()">-->
						<form class="form-horizontal" method="post" action="ingresos/guarda" nombre="formulario" onsubmit="return  CalculaDepositos(1,'form')">
						  <input type="hidden" value="" name="sucursal" id="sucursal">
						  <input type="hidden" value="{{ Session::get('user') }}" name="usuario" id="usuario">
						  <!--<input type="hidden" value="{{ Session::get('id_suc') }}" name="id_sucursal" id="id_sucursal">-->

						<div class="widget-body-toolbar">
							<div class="row">	
								<div class="col-md-12">
<!--
									<h4 class="alert alert-warning"> 
										Faltan <strong> $ 56 </strong> pesos
									</h4>
									
									<h4 class="alert alert-success"> Succes </h4>
									<h4 class="alert alert-danger"> Insert tabs / pills to widget header </h4>
									<p class="alert alert-success"> 
										<strong><i class="fa fa-check"></i> Alert</strong> without body padding... 
									</p>
										 <div id="mensaje">Total: $ <strong id="monto"></strong></div>	-->		

								</div>
							</div>				
						</div>



						
							<div class="form-group">
								<label class="col-md-2 control-label">Sucursal:</label>
								<div class="col-md-10">
									<div class="input-group"><span class="input-group-addon"><i class="fa fa-institution"></i></span>
										<select class="form-control" id="id_sucursal" placeholder="Seleccione Sucursal" name="id_sucursal" onchange="cambia_sucrusal(this.value)">
												<option placeholder="Seleccione Sucursal"></option>
											@foreach($sucursales as $sucursal)
												<option sucur="{{ $sucursal->short_name_branch }}" value="{{ $sucursal->num_branch }}">{{ $sucursal->name_branch }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>



						<!--Calendario Fecha-->
							<div class="form-group">
								<label class="col-md-2 control-label">Fecha de Captura:</label>
								<div class="col-md-10">
									<div class="input-group">
										<!--<input type="text" name="fecha_captura" placeholder="Seleccione fecha" class="form-control datepicker" data-dateformat="dd/mm/yy" required>-->
										<input type="text" name="fecha_captura" onchange="compara_fecha()" id="fecha_captura" placeholder="Seleccione Fecha" class="form-control datepicker" data-dateformat="yy-mm-dd" required>
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-2 control-label">Venta Total del día:</label>
								<div class="col-md-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
										<input class="form-control" id="venta_total" name="venta_total" readonly required>
										
									</div>
								</div>
							</div>



							<div class="form-group">
								<label class="col-md-2 control-label">Cantidad a Depositar:</label>
								<div class="col-md-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
										<input class="form-control" id="cantidad_depositar" name="cantidad_depositar" readonly required>
										
									</div>
								</div>
							</div>



							<div class="form-group">
								<label class="col-md-2 control-label">Venta Voucher:</label>
								<div class="col-md-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
										<input class="form-control" onkeyup="CalculaDepositos(this.value,'venta_voucher')" id="venta_voucher" name="venta_voucher" step="any" type="number" required>
										
									</div>
								</div>
							</div>

								
							<div class="form-group">
								<label class="col-md-2 control-label">Venta Orfis:</label>
								<div class="col-md-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
										<input class="form-control" onkeyup="CalculaDepositos(this.value,'venta_orfis')" id="venta_orfis" name="venta_orfis" step="any" min="0" type="number" required>										
									</div>
								</div>
							</div>




							<div class="form-group">
							<label class="col-md-2 control-label">Numero de Depósitos:</label>
							
							<div class="col-md-10">
									<div class="col-sm-12 col-md-4 col-lg-2">
										<div class="form-group">											
											<input name="num_deposito" id="num_deposito" class="form-control spinner-both" style="text-align:center !important;" min="0" value="1" readonly >
										</div>
									</div>
							</div>
							</div>













							<fieldset id="field_1">
								<legend>
									Depósitos 1
								</legend>

								<div class="row">

									<div class="col-sm-4">
										<div class="form-group">
											<label class="col-md-12">Cantidad 1</label>
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
													<input class="form-control" onkeyup="CalculaDepositos(this.value,1)" id="cantidad_1" name="cantidad_1" step="any" type="number" min="1" required>
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-4" id="tipo_pago_1">
										<label>Tipo:</label>									
										<div class="form-group">
											<div class="col-md-6">
												<div class="radio">
													<label>
														<input type="radio" onclick="tipo_deposito(1,'lock')" name="tipo_1" value="lock" class="radiobox style-0"  required>
														<span>LOCK</span> 
													</label>
												</div>

												<div class="radio">
													<label>
														<input type="radio" onclick="tipo_deposito(1,'bancomer')" name="tipo_1" value="bancomer" class="radiobox style-0" checked="checked" required>
														<span>BANCOMER</span> 
													</label>
												</div>
											</div>
										</div>
									</div>


									<div class="col-sm-4" id="num_ficha_1">
										<div class="form-group">
											<!--<label class="col-md-12">Numero de Ficha 1</label>
											<div class="col-md-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
													<input class="form-control" name="numero_ficha_1" type="text">
												</div>
											</div>-->
											<input class="form-control" id="numero_ficha_1" name="numero_ficha_1" value="0" type="hidden">
										</div>
									</div>


								</div>
							</fieldset>













							<div class="form-actions" id="seccion_envio">
								<div class="row">
									<div class="col-md-12"><!--
										<button class="btn btn-default" type="submit">
											Cancel
										</button>-->
										</button>
										<button class="btn btn-primary" type="submit">
											<i class="fa fa-save"></i>
											Submit
										</button>
									</div>
								</div>
							</div>


						</form>	
						
											
					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->




<style type="text/css">
#scroller {
   /* position: relative;*/
    top: 49px;
    width: 200px !important;
    height: 40px !important;
    /*background: #CCC;*/
    background: #474544; 
    color: #fff;   
    right: 0;
    position:fixed;
    float:right;
    z-index: 1000000;
    text-align: left;
    min-height:40px !important;
    padding: 10px 0 0 10px;
}
</style>

<aside id="scroller"> <div id="mensaje">Total: $ <strong id="monto"></strong></div>	 </aside>





<script type="text/javascript">
/**
$(window).scroll(function () {
    if ($(window).scrollTop() > 50) {
        $('#scroller').css('top', $(window).scrollTop());
    }
}
);*/

	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();

	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 *
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 *
	 * TO LOAD A SCRIPT:
	 * var pagefunction = function (){
	 *  loadScript(".../plugin.js", run_after_loaded);
	 * }
	 *
	 * OR
	 *
	 * loadScript(".../plugin.js", run_after_loaded);
	 */

	// pagefunction
	var maximo=25;


	var pagefunction = function() {

		$("#num_deposito").spinner({
			min: 1,
		   	max: maximo,
		   	step: 1,
		   	start: 1000,
		   	numberFormat: "C",
           		spin: function(event,ui){
           			anterior = $("#num_deposito").spinner("value");              		
           		},
		   	
			   	stop: function(event,ui) {	                
	                actual = $("#num_deposito").spinner("value");
	                	
                    var existe=$("#field_"+actual).val();


                    sum=parseFloat(anterior)+1;
					var siguiente=$("#field_"+sum).val();

	                if(actual!=anterior ){	

		                if(actual>anterior && typeof existe=="undefined"){
		                	//alert("ADELANTE->");
		                	$('#field_'+anterior).after('<fieldset id="field_'+actual+'"><legend>Depósitos '+actual+'</legend><div class="row"><div class="col-sm-4"><div class="form-group"><label class="col-md-12">Cantidad '+actual+'</label><div class="col-md-12"><div class="input-group"><span class="input-group-addon"><i class="fa fa-dollar"></i></span><input class="form-control"  step="any" onkeyup="CalculaDepositos(this.value,'+actual+')" cantidad="'+actual+'" name="cantidad_'+actual+'" id="cantidad_'+actual+'"  type="number" required></div></div></div></div><div class="col-sm-4" id="tipo_pago_'+actual+'"><label>Tipo:</label><div class="form-group"><div class="col-md-6"><div class="radio"><label><input type="radio" name="tipo_'+actual+'" value="lock" onclick="tipo_deposito('+actual+',\'lock\')"   class="radiobox style-0"><span>LOCK</span></label></div><div class="radio"><label><input type="radio" onclick="tipo_deposito('+actual+',\'bancomer\')" name="tipo_'+actual+'" value="bancomer" checked="checked" class="radiobox style-0"><span>BANCOMER</span></label></div></div></div></div>     <div class="col-sm-4" id="num_ficha_'+actual+'"><input class="form-control" id="numero_ficha_'+actual+'" name="numero_ficha_'+actual+'" value="0" type="hidden"></div>   </div></fieldset>');	                              
		                }else if(actual<anterior && typeof siguiente == "undefined"){
		                	//alert("<-ATRAS");
		                	$('#field_'+anterior).remove();
		                }

	                }


	            }
           		 
        });





	}; 

	
	pagefunction();
/*

	function limpia_input(input){
		if(input>=1){
			$("#cantidad_"+input).val('');		
		}else{
			$("#"+input).val('');		
		}
	}






	function compara_fecha(){
		var fecha = $('#fecha_captura').val();
		var id_branch= $('#id_sucursal').val();
		var sucursal= $('#sucursal').val();
			
				//$.get("consulta_venta_total.php", {date: fecha, id_sucursal: id_branch, sucursal:sucursal}, function(respuesta){
			$.get("/ingresos/consultafecha", {date: fecha, id_sucursal: id_branch, sucursal:sucursal }, function(respuesta){

				if (respuesta == "ya_existe"){
					alert("Ya existen depositos en esa fecha "+respuesta);							
					$("#fecha_captura").css({"background":"#fff0f0","border-color":"#A90329"});	
					$("#venta_total").val("");					
			    }else if(respuesta == "fecha_futura"){
			    	alert("Fecha futura, aun sin resultados");							
					$("#fecha_captura").css({"background":"#faf2cc","border-color":"#dbab57"});	
					$("#venta_total").val("");
			    }else{
					$("#venta_total").val(respuesta);
					$("#fecha_captura").css({"background":"#f0fff0","border-color":"#7DC27D"});		

					//Consulta
					$.get("/ingresos/cantidadadepositar", {date: fecha, id_sucursal: id_branch, sucursal:sucursal }, function(respuesta){
						$("#cantidad_depositar").val(respuesta);
					});

			    }

			});
	}







	function cambia_sucrusal(valor){
		//$('#cantidad_depositar').val("");
		//$('#fecha_captura').val("");
		var suc = $("#id_sucursal").children(":selected").attr("sucur");
		$("#cantidad_depositar").val("");		
		$('#sucursal').val(suc);
		//$("#fecha_captura").css({"background":"","border-color":""});	
		compara_fecha();
	}







	function CalculaDepositos(cantidad,tipo_cantidad){
		var vt = $('#cantidad_depositar').val();
		var vv = $('#venta_voucher').val();
		var vo = $('#venta_orfis').val();
			var subtotal=0;
			var total=0;
			var suma=0;
			var  acomula_depositos=0;
			var cant=0;
		if (vt=='') {
			alert('Necesitas Poner Fecha del Deposito válida');
			limpia_input(tipo_cantidad);
		}else{

			for (var i=1; i<=maximo ; i++) {
				cant = $('#cantidad_'+i).val();
				if (cant != '' && typeof(cant) !== "undefined"){
					acomula_depositos=parseFloat(acomula_depositos)+parseFloat(cant);
				}
			}; 
				if(vv=='' && vo==''){ 
					subtotal=vt;
				}else if (vv=='') {						
					subtotal=vt-vo;
				}else if (vo=='') {
					subtotal=vt-vv;
				}else{
					suma=((parseFloat(vv)+parseFloat(vo)));
					subtotal=vt-suma;
				}
				console.log("----->"+vt+" -> "+vo+" --> "+vv);
				total=(subtotal-acomula_depositos).toFixed(2);


				$('#monto').text(total);

				if (tipo_cantidad=="form"){
					
					if (total==0) {
						return true;
					}else{
						alert("TUS DEPÓSITOS NO COINCIDEN CON LA CANTIDAD A DEPOSITAR");
						return false;					
					}
				}
		}	

	}





	function tipo_deposito(num_deposito,tipo){
		var nf = $('#numero_ficha_'+num_deposito).val();
		//alert(num_deposito+tipo+nf);		

		if (tipo=='lock') {

			if (nf == 0) {
				$('#num_ficha_'+num_deposito).remove();
				$('#tipo_pago_'+num_deposito).after('<div class="col-sm-4" id="num_ficha_'+num_deposito+'"><div class="form-group"><label class="col-md-12">Numero de Ficha '+num_deposito+'</label><div class="col-md-12"><div class="input-group"><span class="input-group-addon"><i class="fa fa-credit-card"></i></span><input class="form-control" name="numero_ficha_'+num_deposito+'" id="numero_ficha_'+num_deposito+'" type="text" min="1"  required></div></div></div></div>');
			}
		}else{
			$('#num_ficha_'+num_deposito).remove();
			$('#tipo_pago_'+num_deposito).after('<div class="col-sm-4" id="num_ficha_'+num_deposito+'"><input class="form-control" id="numero_ficha_'+num_deposito+'" name="numero_ficha_'+num_deposito+'" id="numero_ficha_'+num_deposito+'" value="0" type="hidden"></div>');
		}
	}

*/

</script>

	
</body>
</html>

@endif