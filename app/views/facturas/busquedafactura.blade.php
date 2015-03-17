<form id="formbusqueda" action="facturas/buscafac" method="post" >
	
	Buscar Folio: <input type="search" id="folio" name="folio" /> <input type="submit" value="Buscar"/>
 	
 	<input type="hidden" value="{{ Session::get('id_suc') }}" name="id_sucursal" id="id_sucursal">
</form>





<section id="resultado"> </section>


<section id="res"></section>

<script type="text/javascript">
$(document).ready(function(){

	$('#formbusqueda').submit(function(event) {
		/*
			$.ajax({
	            type : $(this).attr("method"),
	            //url  : $(this).attr("action"),
	            url  :"facturas/buscafac",
	            data : $(this).serialize(),
	            success:function(data, textStatus, jqXHR) 
		        { 		 
		            $('#resultado').html(data);	
		            //reload_tabla();	    
		            //Limpia Formulario  
		            $('#formbusqueda')[0].reset();   		            	                    
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		            alert("Ocurrio un Error al Guardar");  
		            $('#resultado').html("Ocurrio un Error al Guardar");	   
		        }		        
			});

*/
	 	var folio=$("#folio").val();
		$("#resultado").load("facturas/buscafac?folio="+folio);   	
		event.preventDefault(); //STOP default action
    	//event.unbind(); //unbind. to stop multiple form submit.

	});	

/*
	$.get("/facturas/buscafac", {id:id}, function(respuesta){
			$("#colum_"+id).after("<tr colspan='8' id='subcolumna_"+id+"'><td  colspan='8'>"+respuesta+"</td></tr>");
		});	

*/
});

function ligasucfac(folio){
	//alert(id);
	var id_suc=$("#id_sucursal").val();
	$("#res").load("facturas/actualizasucursal?id_num_fac="+folio+"&c_id="+id_suc);
	alert("Se ligo Correctamente");
	$("#botonliga").hide();
	$("#tdbot").val("Ligado ");
	
}


</script>
