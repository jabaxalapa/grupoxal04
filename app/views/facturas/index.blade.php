<?php require_once("inc/init.php"); ?>

	<section id="contenido">
		@include('facturas.lista')
	</section>










	@include('facturas.modalagregafactura')



	<section id="load"></section>


	<div class="messages"></div><br/><br/>
	    <!--div para visualizar en el caso de imagen-->
	<div class="showImage"></div>



	<div id="resultado"></div>
	<div id="progress"></div>



<script type="text/javascript">
$(document).ready(function(){

	$('#FormFactura').submit(function(event) {
			var archxml=$("#archivo_xml").val();
			var resxml = archxml.substr(-3);

			var archpdf=$("#archivo_pdf").val();
			var respdf = archpdf.substr(-3);

			console.log(resxml+respdf);

		if(resxml=="xml" || resxml=="XML" && respdf=="pdf"  || respdf=="PDF"){	

			var formData = new FormData(this);		
			<?php if($role>=5){ ?>
				var suc_id=$("#sucursal").val(); 
				formData.append("id_sucursal",suc_id);
			<?php }elseif ($role<=3) { ?>		
				var suc_id=0;
				var suc=$("#sucursal").val(); 
				suc_id= $('#list_sucursales').find('option[value="'+suc+'"]').attr('id');
				formData.append("id_sucursal",suc_id);
			<?php } ?>

			$.ajax({
	            type : $(this).attr("method"),
	            url  : $(this).attr("action"),
	            xhr: function() { // custom xhr (es el mejor)               
	           			var xhr = new XMLHttpRequest();
	           			var total = 0;                        
	           			// Obtiene el tamaño total del archivo
	           			$.each(document.getElementById('archivo_xml').files, function(i, file) {
	                  		total += file.size;
	           			});
	           			// Llama meuntras esta subiendo. xhr2
	           			xhr.upload.addEventListener("Progreso", function(evt) {
	                 	// Muestra el progreso like example
	                  		var loaded = (evt.loaded / total).toFixed(2)*100; // Porcentaje
	                  		$('#progress').text('Subiendo... ' + loaded + '%' );
	           			}, false);
	           		return xhr;
	      		},
	      		processData: false,
	      		contentType: false,
	            data: formData,
	            success:function(data, textStatus, jqXHR) 
		        { 		 
		        	limpia_tabla();
		        	<?php if($role<=3){ ?>
		            	$('#resultado').html(data);	
		            <?php } ?>

		            $('#myModal').modal('hide'); 
		            reload_tabla();	    
		            //Limpia Formulario  
		            $('#FormFactura')[0].reset();   
		            	                     
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            alert("Ocurrio un Error al Guardar");  
		            $('#resultado').html("Ocurrio un Error al Guardar");	   
		        }		        
			});
		}else{
			alert("Deber seleccionar el archivo con la extencion solicitada");
		}

		event.preventDefault(); //STOP default action
    	//event.unbind(); //unbind. to stop multiple form submit.
	});	


});









function eliminar(id,date){
	if (confirm("Desea eliminar la Factura "+date)) {
		//document.location=('facturas/elimina?id='+id);		
		limpia_tabla();
		$('#resultado').load('facturas/elimina?id='+id);
		reload_tabla();	
	};
}




function columna(id){
	/*alert("sss");*/
	var existe=$("#subcolumna_"+id).val();
	var texto_deposito=$("#depositos_"+id).html();
	$("#icon_"+id).removeClass();
	$("#icon_"+id).addClass("glyphicon glyphicon-minus-sign txt-color-red");
	
	if( typeof existe=="undefined"){
		$.get("/facturas/consultadetalles", {id:id}, function(respuesta){
			$("#colum_"+id).after("<tr colspan='8' id='subcolumna_"+id+"'><td  colspan='8'>"+respuesta+"</td></tr>");
		});
	}else{
		$("#subcolumna_"+id).remove();
		$("#icon_"+id).removeClass();
		$("#icon_"+id).addClass("glyphicon glyphicon-plus-sign txt-color-green");
	}
}



	function edita(id){
		$("#load").load("ingresos/formedita?id="+id);
	}


	function faltante_proveedor(){

		$('#resultado').load("facturas/formatoproveedor");	
	}

	function faltantes(){
		$('#resultado').load("facturas/formatoproducto");	
	}


	function faltante_sucursal(){
		$('#resultado').load("facturas/ligarsucursal");

	}


	function edita_catalogo(id_num_fac){

		var a=$("#falta_factura").html();
		var c_id=0;
		var CompanyName=$("#cuenta_"+id_num_fac).val(); 
		c_id= $('#list_cuenta').find('option[value="'+CompanyName+'"]').attr('id');		


		if (typeof(c_id) === "undefined") {
			alert("Debes elegir alguna cuenta");
		}else{
			//if(confirm("¿Desea relacionar con la cuenta "+CompanyName+" ?")) {			
				//$('#load').load("facturas/actualizacatalogo?id_num_fac="+id_num_fac+"&c_id="+c_id+"&iva="+iva+"&ieps="+ieps);
				$('#load').load("facturas/actualizacatalogo?id_num_fac="+id_num_fac+"&c_id="+c_id);
				$("#cuenta_"+id_num_fac).attr("disabled","disabled");
				$("#boton_cuenta_"+id_num_fac).css("display","none");
				$("#fila_"+id_num_fac).css("display","none");
				$("#falta_factura").text(a-1);
				
			//};
		}	
	}



	function liga_sucursal(id_num_fac){		
		var c_id=0;
		var CompanyName=$("#sucursal_"+id_num_fac).val(); 
		c_id= $('#list_sucursal').find('option[value="'+CompanyName+'"]').attr('id');
		
		if (typeof(c_id) === "undefined") {
			alert("Debes elegir alguna cuenta");
		}else{
			//if(confirm("¿Desea relacionar con la cuenta "+CompanyName+" ?")) {			
				$('#load').load("facturas/actualizasucursal?id_num_fac="+id_num_fac+"&c_id="+c_id);	
				$("#sucursal_"+id_num_fac).attr("disabled","disabled");
				$("#boton_sucursal_"+id_num_fac).css("display","none");
				
				limpia_tabla();
				reload_tabla();
				$('#myModal3').modal('hide'); 
			//};
		}		
	}




/************************************* Proveedor ***************************************/
	function liga_proveedor(id,rfc){
		var c_id=0;
		//var name=$("#proveedor_"+id).val(); 
		//c_id= $('#list_proveedor').find('option[value="'+name+'"]').attr('id');
		//num_cuenta=$('#list_proveedor').find('option[value="'+name+'"]').attr('numcuenta');	
		
		var name=$("#proveedor_"+id).val();
		c_id= $('#list_proveedor').find('option[value="'+name+'"]').attr('for');
		num_cuenta=$('#list_proveedor').find('option[value="'+name+'"]').attr('numcuenta');
		//alert(id+" nombre: "+name+" numcuenta: "+c_id+" numcuenta: "+num_cuenta+" l_"+name);
		
		if (typeof(c_id) === "undefined") {
			alert("Debes elegir alguna cuenta");
		}else{		
			$('#load').load("facturas/guardaproveedor?id="+id+"&c_id="+c_id+"&num_cuenta="+num_cuenta+"&rfc="+rfc);	
			$("#proveedor_"+id).attr("disabled","disabled");
			$("#boton_proveedor_"+id).css("display","none");
				
			//limpia_tabla();
			//reload_tabla();
			//$('#myModal4').modal('hide'); 
		}
	}	



	function liga_comtot(id,rfc){
		var c_id=0;
		//var name=$("#comtot_"+id).val(); 
		//c_id= $('#list_comtot').find('option[value="'+name+'"]').attr('id');
		//num_cuenta=$('#list_comtot').find('option[value="'+name+'"]').attr('numcuenta');
		
		var name=$("#comtot_"+id).val();
		c_id= $('#list_proveedor').find('option[value="'+name+'"]').attr('for');
		num_cuenta=$('#list_proveedor').find('option[value="'+name+'"]').attr('numcuenta');

		if (typeof(c_id) === "undefined") {
			alert("Debes elegir alguna cuenta");
		}else{		
			$('#load').load("facturas/guardacomtot?id="+id+"&c_id="+c_id+"&num_cuenta="+num_cuenta+"&rfc="+rfc);	
			$("#comtot_"+id).attr("disabled","disabled");
			$("#boton_comtot_"+id).css("display","none");
				
			//limpia_tabla();
			//reload_tabla();
			//$('#myModal4').modal('hide'); 
		}
	}



	function liga_excentas(id,rfc){
		var c_id=0;
		//var name=$("#excentas_"+id).val(); 
		//c_id= $('#list_excentas').find('option[value="'+name+'"]').attr('id');
		//num_cuenta=$('#list_excentas').find('option[value="'+name+'"]').attr('numcuenta');

		var name=$("#excentas_"+id).val();
		c_id= $('#list_proveedor').find('option[value="'+name+'"]').attr('for');
		num_cuenta=$('#list_proveedor').find('option[value="'+name+'"]').attr('numcuenta');

		if (typeof(c_id) === "undefined") {
			alert("Debes elegir alguna cuenta");
		}else{		
			$('#load').load("facturas/guardaexcentas?id="+id+"&c_id="+c_id+"&num_cuenta="+num_cuenta+"&rfc="+rfc);	
			$("#excentas_"+id).attr("disabled","disabled");
			$("#boton_excentas_"+id).css("display","none");
				
			//limpia_tabla();
			//reload_tabla();
			//$('#myModal4').modal('hide'); 
		}
	}
/******************** FIN PROVEEDOR ******************************/






function limpia_tabla(){
	$("#contenido").empty();
	$("#wid-id-1").empty();
	$("#wid-id-1").html("");
	$('#wid-id-1').remove();
}



function reload_tabla(){
	$('#contenido').load("facturas/lista"); 
}


function vizualiza_pdf(nombre_pdf,folio){
	//alert(nombre);
	$('#progress').load("facturas/vizualizapdf?nombre_pdf="+nombre_pdf+"&folio="+folio); 
}


</script>



