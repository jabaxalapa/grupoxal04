<?php require_once("inc/init.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



			<div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-18" data-widget-colorbutton="false" data-widget-editbutton="false">

				<header>
					<h2><strong>Captura de Ingresos</strong></h2>									
				</header>


				<!-- widget div-->
				<div>
									
					<!-- widget content -->
					<div class="widget-body">

						<form class="form-horizontal" method="post" action="ingreso/guarda">
						  <input type="hidden" value="kfcxalapa" name="sucursal">
						  <input type="hidden" value="2" name="id_sucursal">

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



						



						<!--Calendario Fecha-->
							<div class="form-group">
								<label class="col-md-2 control-label">Fecha de Captura:</label>
								<div class="col-md-10">
									<div class="input-group">
										<!--<input type="text" name="fecha_captura" placeholder="Seleccione fecha" class="form-control datepicker" data-dateformat="dd/mm/yy" required>-->
										<input type="text" name="fecha_captura" id="fecha_captura" placeholder="Seleccione fecha" class="form-control datepicker" data-dateformat="yy-mm-dd" required>
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-2 control-label">Venta Total:</label>
								<div class="col-md-10">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
										<input class="form-control" id="venta_total" name="venta_total" readonly required>
										
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
										<input class="form-control" onkeyup="CalculaDepositos(this.value,'venta_orfis')" id="venta_orfis" name="venta_orfis" step="any" type="number" required>										
									</div>
								</div>
							</div>




							<div class="form-group">
							<label class="col-md-2 control-label">Numero de Depósitos:</label>
							
							<div class="col-md-10">
									<div class="col-sm-12 col-md-4 col-lg-2">
										<div class="form-group">											
											<input class="form-control spinner-both"  name="num_deposito" style="text-align:center !important;"  id="spinner-currency" name="spinner-currency" value="1" readonly>
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
													<input class="form-control" onkeyup="CalculaDepositos(this.value,1)" id="cantidad_1" name="cantidad_1" step="any" type="number" required>
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
									<div class="col-md-12">
										<button class="btn btn-default" type="submit">
											Cancel
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
    background: #CCC;
    right: 0;
    position:fixed;
    float:right;
    z-index: 1000000;
    text-align: center;
    min-height:40px !important;
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
	var maximo=26;
	var pagefunction = function() {


		// Spinners
		$("#spinner").spinner();

		$("#spinner-decimal").spinner({
		    step: 0.01,
		    numberFormat: "n"
		});
	
		$("#spinner-currency").spinner({
		    min: 1,
		    max: 25,
		    step: 1,
		    start: 1000,
		    numberFormat: "C"
		});
	}; 
	
	// end pagefunction
	
	// run pagefunction
	
	pagefunction();





$(document).ready(function(){

	$('body').on('click','.ui-spinner-down',function(){
		var vt = $('#spinner-currency').val();		
		var anterior=parseFloat(vt)+parseFloat(1);
		$('#field_'+anterior).remove();
	});

	$('body').on('click','.ui-spinner-up',function(){
		var vt = $('#spinner-currency').val();		
		var anterior=vt-1;
		if (vt < maximo){
			$('#field_'+anterior).after('<fieldset id="field_'+vt+'"><legend>Depósitos '+vt+'</legend><div class="row"><div class="col-sm-4"><div class="form-group"><label class="col-md-12">Cantidad '+vt+'</label><div class="col-md-12"><div class="input-group"><span class="input-group-addon"><i class="fa fa-dollar"></i></span><input class="form-control"  step="any" onkeyup="CalculaDepositos(this.value,'+vt+')" name="cantidad_'+vt+'" id="cantidad_'+vt+'"  type="number" required></div></div></div></div><div class="col-sm-4" id="tipo_pago_'+vt+'"><label>Tipo:</label><div class="form-group"><div class="col-md-6"><div class="radio"><label><input type="radio" name="tipo_'+vt+'" value="lock" onclick="tipo_deposito('+vt+',\'lock\')"   class="radiobox style-0"><span>LOCK</span></label></div><div class="radio"><label><input type="radio" onclick="tipo_deposito('+vt+',\'bancomer\')" name="tipo_'+vt+'" value="bancomer" checked="checked" class="radiobox style-0"><span>BANCOMER</span></label></div></div></div></div>     <div class="col-sm-4" id="num_ficha_'+vt+'"><input class="form-control" id="numero_ficha_'+vt+'" name="numero_ficha_'+vt+'" value="0" type="hidden"></div>   </div></fieldset>');
		}
	});

	$('body').on('change','#fecha_captura',function(){
		var fecha = $('#fecha_captura').val();
			$.get("consulta_venta_total.php", {date: fecha}, function(respuesta){
			    $("#venta_total").val(respuesta);
			});
	});

});


function limpia_input(input){
	$("#"+input).val('');
	
}


function CalculaDepositos(cantidad,tipo_cantidad){
	var vt = $('#venta_total').val();
	var vv = $('#venta_voucher').val();
	var vo = $('#venta_orfis').val();
		var subtotal=0;
		var total=0;
		var suma=0;
		var  acomula_depositos=0;
		var cant=0;
	if (vt=='') {
		alert('Necesitas Poner Fecha del Deposito');
		limpia_input(tipo_cantidad);
	}else{

		for (var i=1; i<=maximo ; i++) {
			cant = $('#cantidad_'+i).val();
			if (cant!='' && typeof(cant) !== "undefined"){
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
			total=subtotal-acomula_depositos;
			$('#monto').text(total);	
	
	}	

}


function ventana(){

}


	function tipo_deposito(num_deposito,tipo){
		var nf = $('#numero_ficha_'+num_deposito).val();
		//alert(num_deposito+tipo+nf);		

		if (tipo=='lock') {

			if (nf == 0) {
				$('#num_ficha_'+num_deposito).remove();
				$('#tipo_pago_'+num_deposito).after('<div class="col-sm-4" id="num_ficha_'+num_deposito+'"><div class="form-group"><label class="col-md-12">Numero de Ficha 1</label><div class="col-md-12"><div class="input-group"><span class="input-group-addon"><i class="fa fa-credit-card"></i></span><input class="form-control" name="numero_ficha_'+num_deposito+'" id="numero_ficha_'+num_deposito+'" type="text"  required></div></div></div></div>');
			}
		}else{
			$('#num_ficha_'+num_deposito).remove();
			$('#tipo_pago_'+num_deposito).after('<div class="col-sm-4" id="num_ficha_'+num_deposito+'"><input class="form-control" id="numero_ficha_'+num_deposito+'" name="numero_ficha_'+num_deposito+'" id="numero_ficha_'+num_deposito+'" value="0" type="hidden"></div>');
		}
		
	}

</script>
</body>
</html>