/*Script del sistema GRUPO XALAPA*/
/******************INGRESOS****************************/

//esta funcion es para mantener el menu y el header como fixed
$('body').addClass("fixed-header fixed-navigation fixed-ribbon");





	//maximo=25;

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
					
					//if (total==0) {
						return true;
					//}else{
						//alert("TUS DEPÓSITOS NO COINCIDEN CON LA CANTIDAD A DEPOSITAR");
						//return false;					
					//}
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



