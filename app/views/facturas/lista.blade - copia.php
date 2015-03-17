<?php require_once("inc/init.php"); ?>


<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-table fa-fw "></i> 
				Facturas 
			<span>> 
				Lista de Facturas
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">

	</div>
</div>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">







		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



			<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				Agregar XLM
			</button>





			<button class="btn btn-primary" data-toggle="modal" onclick="faltantes()">
				Conceptos Faltantes de Ligar(@if($falta_facturas) {{$falta_facturas}} @else 0 @endif)
			</button>


			<button class="btn btn-primary" data-toggle="modal" onclick="faltante_sucursal()">
				Faltantes sucursal Ligar Factura(@if($falta_sucursales) {{$falta_sucursales}} @else 0 @endif)
			</button>



			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Facturas</h2>
				</header>





				<!-- widget div-->
				<div>


					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">





						<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
	
					        <thead>



								<tr>
									<th class="hasinput icon-addon">
										<input id="dateselect_filter" style="width:17%" type="text" placeholder="Filtro Fecha" class="form-control datepicker" data-dateformat="yy-mm-dd">
										<label for="dateselect_filter" class="glyphicon glyphicon-calendar no-margin padding-top-15" rel="tooltip" title="" data-original-title="Filter Date"></label>
									</th>		


									<th class="hasinput" >
										<input type="text" class="form-control" placeholder="Filtro Venta Total" />
									</th>


									<th class="hasinput" style="width:15%">
										<input type="text" class="form-control" placeholder="Filtro Cantidad Depositada" />
									</th>


									<th class="hasinput" style="width:14%">
										<div class="input-group">
											<input class="form-control" placeholder="Filtro Venta Voucher" type="text">
										</div>	
									</th>


									<th class="hasinput" style="width:14%">
										<input type="text" class="form-control" placeholder="Filtro Venta Orfis" />
									</th>


									<th class="hasinput" style="width:15%">
										<input type="text" class="form-control" placeholder="Filtro No. Depositos" />
									</th>


									<th class="hasinput" style="width:12%">
										<input type="text" class="form-control" placeholder="Filtro por Sucursal" />
									</th>

									<th class="hasinput" style="width:9%">
										
									</th>
								</tr>


								
					            <tr>
					            	<th data-hide="phone,tablet" data-class="expand">Emisor</th>
				                    <th data-class="expand">RFC</th>
				                    <th>Comprobante Total</th>

				                    <th data-hide="phone">Comprobante Medio de pago</th>
				                    <th data-hide="phone">No. Art.</th>				                    
				                    <th data-hide="phone,tablet">Fecha Comprobante</th>
				                    <th data-hide="phone,tablet">Sucursal</th>
				                    <th data-hide="phone,tablet">Acciones</th>
					            </tr>
					        </thead>

					        <tbody>

							@if($facturas)
							
								@foreach($facturas as $factura)
		 						<tr id="colum_{{ $factura->id }}">
									<td>{{ $factura->Emisor_nombre }}</td>
									<td>{{ $factura->Emisor_rfc }}</td>
									<td>{{ $factura->Comprobante_total }}</td>

									<td>{{ $factura->Comprobante_metodoDePago }}</td>
									
									<td>{{ $factura->total_conceptos }} 										
										<i class="glyphicon glyphicon-plus-sign txt-color-green" style="cursor:pointer;" id="icon_{{ $factura->id }}" onclick="columna({{ $factura->id }})"></i>
									</td>

									<td>{{ $factura->fecha_actual }}</td>
									<td>{{ $factura->name_branch }}</td>
									<td>
										<div style="text-align:center; cursor:pointer;">  																
											<i class="fa fa-trash-o txt-color-red hidden-md hidden-sm hidden-xs" onclick="eliminar({{$factura->id}},'{{$factura->id}}')" title="Eliminar"></i>    									
										</div>		
									</td>
								</tr>							
								@endforeach

							@else 
								<!--No existe ningun resultado-->
							@endif

					        </tbody>
					
						</table>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->


			

		</article>
		<!-- WIDGET END -->

	</div>

	<!-- end row -->

	<!-- end row -->

</section>
<!-- end widget grid -->






















<?php $uri = Request::path(); ?> 

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Factura XML</h4>
      </div>
      <div class="modal-body">

			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">

				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Factura XML</h2>									
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						<!--
						<form action="http://proyecto_laravel.com:8080/facturas/subexml" id="FormFactura" method="post" enctype="multipart/form-data" class="formulario">
						-->
						{{ Form::open(array(						    
						     'url'=>'facturas/subexml', 
						     'method' => 'post',
						     'enctype'=>'multipart/form-data',
						     'id'=>'FormFactura',
						     'class'=>'smart-form'
							))  
						}}


							
								<!--
								<div class="form-group">
									<label class="col-md-2 control-label">Elige una sucursal:</label>
									<select class="input-sm">																					
									@if($sucursales)
										@foreach($sucursales as $suc)
											<option value="{{ $suc->num_branch}}">{{ $suc->name_branch}}</option>
										@endforeach
									@endif
									</select>								
								</div>-->


							<fieldset>
							
								<section>
									<label class="label">Archivo XML</label>
									<label for="file" class="input input-file">
										<!--<div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Buscar</div><input type="text" name="archivo" id="archivo" placeholder="Agrega un archivo XML" readonly="" >-->
										{{Form::file('archivo_xml', ['id' => 'archivo_xml'], ['class' => 'archivo_xml'])}}
									</label>
								</section>

								<section>
									<label class="label">Sucursal</label>
									<label class="input">
										<input type="text" id="sucursal" name="sucursal" list="list_sucursales">
										<datalist id="list_sucursales">											
										@if($sucursales)
											@foreach($sucursales as $suc)
												<option id="{{$suc->num_branch}}" value="{{$suc->name_branch}}"></option>
											@endforeach
										@endif
										</datalist> </label>
									<div class="note">
									</div>
								</section>
							</fieldset>




							<footer>
								<button type="submit" class="btn btn-primary">
									Guardar
								</button>
								<!--<input type="button" value="Subir imagen" />-->
							</footer>
						<!--</form>-->
						{{ Form::close() }}










					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->




      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        <input type="submit" class="btn btn-primary" value="Guardar Cambios"  />

      </div>-->
  
    </div>
  </div>
</div>









































<section id="load"> </section>


<div class="messages"></div><br /><br />
    <!--div para visualizar en el caso de imagen-->
    <div class="showImage"></div>



<script type="text/javascript">


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

function eliminar(id,date){
	if (confirm("Desea eliminar la Factura "+date)) {
		document.location=('facturas/elimina?id='+id);
	};
}


function edita(id){
	$("#load").load("ingresos/formedita?id="+id);
}


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
	 */
	
	// PAGE RELATED SCRIPTS
	
	// pagefunction	
	var pagefunction = function() {
		//console.log("cleared");
		
		/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
		*/	

		/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};




			$('#dt_basic').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}

			});





		/* END BASIC */
		





		/* COLUMN FILTER  *//**/
	    var otable = $('#datatable_fixed_column').DataTable({
	    	//"bFilter": false,
	    	//"bInfo": false,
	    	//"bLengthChange": false
	    	//"bAutoWidth": false,
	    	//"bPaginate": false,
	    	//"bStateSave": true // saves sort state using localStorage
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_fixed_column) {
					responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_fixed_column.respond();
			}		
		
	    });
	    









	    // custom toolbar
	    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
	    	   
	    // Apply the filter
	    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
	    	
	        otable
	            .column( $(this).parent().index()+':visible' )
	            .search( this.value )
	            .draw();
	            
	    } );
	    /* END COLUMN FILTER */   
   


	};

	// load related plugins
	
	loadScript("js/plugin/datatables/jquery.dataTables.min.js", function(){
		loadScript("js/plugin/datatables/dataTables.colVis.min.js", function(){
			loadScript("js/plugin/datatables/dataTables.tableTools.min.js", function(){
				loadScript("js/plugin/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});


</script>

<div id="resultado">Resultado</div>
<div id="progress"></div>

<script type="text/javascript">
//Editaa y Agrega
$(document).ready(function(){

	$('#FormFactura').submit(function(event) {
		var formData = new FormData(this);
		
		var suc_id=0;
		var suc=$("#sucursal").val(); 
		suc_id= $('#list_sucursales').find('option[value="'+suc+'"]').attr('id');

		formData.append("id_sucursal",suc_id);
		//var formData = {'sucursal' : suc_id};
		//alert(formData);
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
	            $('#resultado').html(data);	
	            $('#myModal').modal('hide');  
	            //$('#myModal2').modal('show');  
	                     
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
	            alert("Ocurrio un Error al Guardar");  
	            $('#resultado').html("Ocurrio un Error al Guardar");	   
	        }		        
		});
		event.preventDefault(); //STOP default action
    	//event.unbind(); //unbind. to stop multiple form submit.
});	







/*
    //al enviar el formulario
    $(':button').click(function(){
        //información del formulario
        var formData = new FormData($(".formulario")[0]);
        var message = ""; 
        //hacemos la petición ajax  
        $.ajax({
            url: 'facturas/subexml',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                showMessage(message)        
            },
            //una vez finalizado correctamente
            success: function(data){
            	alert(data);
                message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                showMessage(message);
                if(isImage(fileExtension))
                {
                    //$(".showImage").html("<img src='facturas_xml/"+data+"' />");
                    $('#resultado').html(data);	
                }
            },
            //si ha ocurrido un error
            error: function(){
                message = $("<span class='error'>Ha ocurrido un error.</span>");
                showMessage(message);
            }
        });
    });


    $(".messages").hide();
    //queremos que esta variable sea global
    var fileExtension = "";
    //función que observa los cambios del campo file y obtiene información


    $(':file').change(function()
    {
        //obtenemos un array con los datos del archivo
        var file = $("#archivo_xml")[0].files[0];
        //obtenemos el nombre del archivo
        var fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo
        showMessage("<span class='info'>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
        console.log(fileName);
    });



	function showMessage(message){
	    $(".messages").html("").show();
	    $(".messages").html(message);
	}

//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
function isImage(extension)
{
    switch(extension.toLowerCase()) 
    {
        //case 'jpg': case 'gif': case 'png': case 'jpeg':  case 'xml':
        case 'xml':
            return true;
        break;
        default:
            return false;
        break;
    }
}
*/



});


	function faltantes(){
		$('#resultado').load("facturas/formatoproducto");	
	          //  $('#myModal2').modal('show'); 
	}


	function faltante_sucursal(){
		$('#resultado').load("facturas/ligarsucursal");
	}


	function edita_catalogo(id_num_fac){		
		var c_id=0;
		var CompanyName=$("#cuenta_"+id_num_fac).val(); 
		c_id= $('#list_cuenta').find('option[value="'+CompanyName+'"]').attr('id');
		//alert(CompanyName+" "+c_id+" "+id_num_fac);
		
		if (typeof(c_id) === "undefined") {
			alert("Debes elegir alguna cuenta");
		}else{
			if(confirm("¿Desea relacionar con la cuenta "+CompanyName+" ?")) {			
				$('#load').load("facturas/actualizacatalogo?id_num_fac="+id_num_fac+"&c_id="+c_id);	
				$("#cuenta_"+id_num_fac).attr("disabled","disabled");
				$("#boton_cuenta_"+id_num_fac).css("display","none");
			};
		}		
	}



	function liga_sucursal(id_num_fac){		
		var c_id=0;
		var CompanyName=$("#sucursal_"+id_num_fac).val(); 
		c_id= $('#list_sucursal').find('option[value="'+CompanyName+'"]').attr('id');
		//alert(CompanyName+" "+c_id+" "+id_num_fac);
		
		if (typeof(c_id) === "undefined") {
			alert("Debes elegir alguna cuenta");
		}else{
			if(confirm("¿Desea relacionar con la cuenta "+CompanyName+" ?")) {			
				$('#load').load("facturas/actualizasucursal?id_num_fac="+id_num_fac+"&c_id="+c_id);	
				$("#sucursal_"+id_num_fac).attr("disabled","disabled");
				$("#boton_sucursal_"+id_num_fac).css("display","none");
			};
		}

		
	}	



</script>