<?php require_once("inc/init.php"); ?>








<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-table fa-fw "></i> 
				Ingresos 
			<span>> 
				Lista de Ingresos
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
					<h2>Ingresos</h2>
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


									<th class="hasinput" style="width:17%">
										<input type="text" class="form-control" placeholder="Filtro Cantidad Depositada" />
									</th>


									<th class="hasinput" style="width:15%">
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
<!--
									<th class="hasinput" style="width:9%">
										
									</th>-->
								</tr>


								
					            <tr>
					            	<th data-hide="phone,tablet" data-class="expand">Fecha</th>
				                    <th data-class="expand">Venta Total</th>
				                    <th>Cantidad Depositada</th>
				                    <th>Venta Voucher</th>
				                    <th data-hide="phone">Venta orfis</th>
				                    <th data-hide="phone">No. de depositos</th>				                    
				                    <th data-hide="phone,tablet">Sucursal</th>
				                    <!--<th data-hide="phone,tablet">Acciones</th>-->
					            </tr>
					        </thead>

					        <tbody>

							@if($ingresos)
								@foreach($ingresos as $ingreso)
		 						<tr id="colum_{{ $ingreso->id }}">
									<td>{{ $ingreso->date }}</td>
									<td>{{ $ingreso->total_sale }}</td>
									<td>{{ $ingreso->cantidad_depositar }}</td>
									<td>{{ $ingreso->voucher_sale }}</td>
									<td>{{ $ingreso->orfis_sale }}</td>
									<td>{{ $ingreso->total_depositos }} 										
										<i class="glyphicon glyphicon-plus-sign txt-color-green" style="cursor:pointer;" id="icon_{{ $ingreso->id }}" onclick="columna({{ $ingreso->id }})"></i>
									</td>
									<td>{{ $ingreso->name_branch }}</td>
									<!--	
									<td>																		
										<i class="fa fa-trash-o txt-color-blue hidden-md hidden-sm hidden-xs" onclick="eliminar({{ $ingreso->id }},'{{ $ingreso->date }}')" title="Eliminar"></i>    										
									</td>-->
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

<script type="text/javascript">


function columna(id){
	/*alert("sss");*/
	var existe=$("#subcolumna_"+id).val();
	var texto_deposito=$("#depositos_"+id).html();
	$("#icon_"+id).removeClass();
	$("#icon_"+id).addClass("glyphicon glyphicon-minus-sign txt-color-red");
	
	if( typeof existe=="undefined"){
		$.get("/ingresos/concultadepositos", {id:id}, function(respuesta){
			$("#colum_"+id).after("<tr colspan='7' id='subcolumna_"+id+"'><td  colspan='7'>"+respuesta+"</td></tr>");
		});
	}else{
		$("#subcolumna_"+id).remove();
		$("#icon_"+id).removeClass();
		$("#icon_"+id).addClass("glyphicon glyphicon-plus-sign txt-color-green");
	}
}

function eliminar(id,date){
	if (confirm("Desea eliminar el usuario "+date)) {
		document.location=('ingresos/elimina?id='+id);
	};
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
   

		/* TABLETOOLS */
		$('#datatable_tabletools').dataTable({
			
			// Tabletools options: 
			//   https://datatables.net/extensions/tabletools/button_options
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
	        "oTableTools": {
	        	 "aButtons": [
	             "copy",
	             "csv",
	             "xls",
	                {
	                    "sExtends": "pdf",
	                    "sTitle": "SmartAdmin_PDF",
	                    "sPdfMessage": "SmartAdmin PDF Export",
	                    "sPdfSize": "letter"
	                },
	             	{
                    	"sExtends": "print",
                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                	}
	             ],
	            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
	        },
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_tabletools) {
					responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_tabletools.respond();
			}
		});
		
		/* END TABLETOOLS */

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
