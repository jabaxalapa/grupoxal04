<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa  fa-archive fa-fw "></i> 
				Facturas 
			<span>> 
				Lista de Facturas
			</span>
		</h1>
	</div>


	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">

			<li class="sparks-info" >	
				<a class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus"></i> Agregar XML</a>
			</li>
			@if($role<=3)
			<li class="sparks-info">
				<a class="btn btn-warning" data-toggle="modal" onclick="faltantes()"><i class="fa fa-exchange"></i> Faltantes Ligar Catalogo ( <div id="falta_factura" style="display:inline-block;">@if($falta_facturas) {{$falta_facturas}} @else 0 @endif</div> )</a>
			</li>

			<li class="sparks-info">
				<a class="btn btn-info" data-toggle="modal" onclick="faltante_sucursal()"><i class="fa fa-exchange"></i> Faltantes Ligar Sucursal (@if($falta_sucursales) {{$falta_sucursales}} @else 0 @endif)</a>	
			</li>

			<li class="sparks-info">
				<a class="btn btn-info" data-toggle="modal" onclick="faltante_proveedor()"><i class="fa fa-exchange"></i> Faltantes Ligar Proveedor</a>	
			</li>
			@endif

		</ul>
	</div>

</div>





<section id="widget-grid" class="">
	<div class="row">

		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<!--
			<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				Agregar XLM
			</button>

			<button class="btn btn-primary" data-toggle="modal" onclick="faltantes()">
				Conceptos Faltantes de Ligar( <div id="falta_factura" style="display:inline-block;">@if($falta_facturas) {{$falta_facturas}} @else 0 @endif</div> )
			</button>


			<button class="btn btn-primary" data-toggle="modal" onclick="faltante_sucursal()">
				Faltantes sucursal Ligar Factura(@if($falta_sucursales) {{$falta_sucursales}} @else 0 @endif)
			</button>
-->

			<!-- Widget ID (each widget will need unique ID)-->
			<div  class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
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

<?php 
/*
function lista($sucu){
	if($sucu<=3){
		echo "ve todo";
	}else if($sucu==5){
		echo "solo 1 partte";
	}
}
*/
?>



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
									<th class="hasinput">
										<input type="text" class="form-control" placeholder="Filtro Emisor" />
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


									<th class="hasinput">
										<!--<input type="text" class="form-control" placeholder="Filtro No. Depositos" />-->
									</th>

									 
									<th class="hasinput" style="width:12%">
									@if($role<=3)
										<input type="text" class="form-control" placeholder="Filtro por Sucursal" />
									@endif
									</th>

									@if($role<=3)
									<th class="hasinput" style="width:9%">
										
									</th>
									<th class="hasinput" style="width:9%">
										
									</th>
									@endif
									
								</tr>


								
					            <tr>

					            	<th data-hide="phone,tablet" data-class="expand">Emisor</th>
					            	<th data-hide="phone,tablet" data-class="expand">Folio</th>
				                    <th data-class="expand">RFC</th>
				                    <th>Comprobante Total</th>

				                    <th data-hide="phone">Comprobante Medio de pago</th>
				                    <th data-hide="phone">No. Art.</th>				                    
				                    <th data-hide="phone,tablet">Fecha Comprobante</th>
				                    @if($role<=3)
				                    <th data-hide="phone,tablet">Sucursal</th>
				                    <th data-hide="phone,tablet">Acciones</th>
				                    @endif	
					            </tr>
					        </thead>

					        <tbody>

							@if($facturas)
								@if($role<=3)
									@foreach($facturas as $factura)
										<?php //lista($role); ?>				
				 						<tr id="colum_{{ $factura->id }}">
											<td>{{ $factura->Emisor_nombre }}</td>
											<td>{{ $factura->Comprobante_serie.$factura->Comprobante_folio }}</td>
											<td>{{ $factura->Emisor_rfc }}</td>
											<td>{{ $factura->Comprobante_total }}</td>
											<td>{{ $factura->Comprobante_metodoDePago }}</td>									
											<td>{{ $factura->total_conceptos }} 										
												<i class="glyphicon glyphicon-plus-sign txt-color-green" style="cursor:pointer;" id="icon_{{ $factura->id }}" onclick="columna({{ $factura->id }})"></i>
											</td>
											<td>{{ $factura->Comprobante_fecha }}</td>
											
											<td>{{ $factura->name_branch }}</td>
											<td>
												<div style="text-align:center; cursor:pointer;">  																
													<i class="fa fa-trash-o txt-color-red hidden-md hidden-sm hidden-xs" onclick="eliminar({{$factura->id}},'{{$factura->id}}')" title="Eliminar"></i>    									
												</div>		
											</td>
												
										</tr>									
									@endforeach
								@else


									@foreach($facturas as $factura)
										@if($factura->sucursal_id==Session::get('id_suc'))			
					 						<tr id="colum_{{ $factura->id }}">
												<td>{{ $factura->Emisor_nombre }}</td>
												<td>{{ $factura->Comprobante_serie.$factura->Comprobante_folio }}</td>
												<td>{{ $factura->Emisor_rfc }}</td>
												<td>{{ $factura->Comprobante_total }}</td>
												<td>{{ $factura->Comprobante_metodoDePago }}</td>									
												<td>{{ $factura->total_conceptos }} 										
													<i class="glyphicon glyphicon-plus-sign txt-color-green" style="cursor:pointer;" id="icon_{{ $factura->id }}" onclick="columna({{ $factura->id }})"></i>
												</td>
												<td>{{ $factura->Comprobante_fecha }}</td>
											</tr>	
										@endif									
									@endforeach

								@endif	

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






<?php 

//date_default_timezone_set('America/Mexico_City');
//echo $timestamp =date('Y-m-d H:i:s');
?>












<script type="text/javascript">

	pageSetUp();

	var pagefunction = function() {


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


	    var otable = $('#datatable_fixed_column').DataTable({

			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth" : true,
			"preDrawCallback" : function() {
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
	    



	    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
	    	   
	    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
	    	
	        otable
	            .column( $(this).parent().index()+':visible' )
	            .search( this.value )
	            .draw();	            
	    } );
   
	};

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
