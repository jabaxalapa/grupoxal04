<?php require_once("inc/init.php"); ?>






<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-table fa-fw "></i> 
				Usuarios 
			<span>> 
				Lista de Usuarios
			</span>
		</h1>
	</div>

</div>



<!-- Button trigger modal -->
<button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
  Agregar Nuevo Usuario
</button>
<br>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
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
					<h2> Usuarios de Grupo Xalapa </h2>

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

						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
									<th data-hide="phone"> 
										<i class="fa fa-fw fa-user txt-color-blue text-muted hidden-md hidden-sm hidden-xs"></i> 
										Nombre
									</th>

									<th data-class="expand">
										<i class="fa fa-fw fa-user txt-color-blue text-muted hidden-md hidden-sm hidden-xs"></i> 
										Apellido
									</th>

									<th data-hide="phone">
										<i class="fa fa-envelope txt-color-blue text-muted hidden-md hidden-sm hidden-xs"></i> 
										E-mail
									</th>

									<th>
										<i class="fa fa-fw fa-institution text-muted txt-color-blue hidden-md hidden-sm hidden-xs"></i> 
										Sucursal
									</th>

									<th data-hide="phone,tablet">
										<i class="fa fa-male fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> 
										Rol
									</th>

									<th data-hide="phone,tablet">
										<i class="fa fa-user-md txt-color-blue hidden-md hidden-sm hidden-xs"></i> 
										Username
									</th>

									<th data-hide="phone,tablet">
										<i class="fa  fa-phone txt-color-blue hidden-md hidden-sm hidden-xs"></i> 
										Telefono
									</th>

									<th data-hide="phone,tablet">
										<i class="fa fa-gears txt-color-blue hidden-md hidden-sm hidden-xs"></i> 
										Acciones
									</th>

								</tr>
							</thead>
							<tbody>

							@if($usuarios)
								@foreach($usuarios as $usuario)
		 						<tr>
									<td>{{ $usuario->name }}</td>
									<td>{{ $usuario->last_name }}</td>
									<td>{{ $usuario->email }}</td>
									<td>{{ $usuario->name_branch }}</td>
									<td>{{ $usuario->name_role }}</td>
									<td>{{ $usuario->username }}</td>
									<td>{{ $usuario->phone }}</td>
									<td style="text-align:center;"> 
										@if(($usuario->id_role)!=1)
											<!--<a href="">-->
												<i class="fa fa-edit txt-color-blue hidden-md hidden-sm hidden-xs" onclick="edita({{ $usuario->id }})" title="Editar"></i>     
											<!--</a>-->
											<!--<a href="">-->
												<i class="fa fa-trash-o txt-color-blue hidden-md hidden-sm hidden-xs" onclick="eliminar({{ $usuario->id }}, '{{ $usuario->username }}' )" title="Eliminar"></i>    
											<!--</a>-->
										@endif
									</td>
								</tr>
								@endforeach

							@else 
								No existe ningun resultado
							@endif
							</tbody>
						</table>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->


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































<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
      </div>

 		<form action="usuarios/guarda" method="post" id="order-form" class="smart-form" novalidate="novalidate">
      <div class="modal-body">
							<input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d') ?>">


							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="name" placeholder="Nombres" >
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-briefcase"></i>
											<input type="text" name="last_name" placeholder="Apellidos">
										</label>
									</section>
								</div>



								<div class="row">
									<section class="col col-6">
										<label class="select">
											<select name="branch" required>
												<option value="0" selected="" disabled="">Sucursal</option>
												@foreach($sucursales as $sucursal)
													<option value="{{ $sucursal->num_branch }}">{{ $sucursal->name_branch }}</option>
												@endforeach
											</select> <i></i> </label>
									</section>
									<section class="col col-6">
										<label class="select">
											<select name="rol" required>
												<option value="0" selected="" disabled="">Rol</option>
												@foreach($roles as $rol)
													<option value="{{ $rol->id }}">{{ $rol->name_role }}</option>
												@endforeach
											</select> <i></i> </label>
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
											<input type="text" name="user_name" id="user_name" placeholder="User Name" required/>
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-phone"></i>
											<input type="password" name="password" id="password" placeholder="****" required/>
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
											<input type="email" name="email" placeholder="E-mail" required>
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-phone"></i>
											<input type="tel" name="phone" placeholder="Telefono" data-mask="(999) 999-9999" required>
										</label>
									</section>
								</div>


							</fieldset>


						
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Enviar" />
      </div>

      </form>


    </div>


  </div>
</div>





























<script type="text/javascript">

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
		
		/* COLUMN FILTER  */
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
	    

	    	   
	    // Apply the filter
	    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
	    	
	        otable
	            .column( $(this).parent().index()+':visible' )
	            .search( this.value )
	            .draw();
	            
	    } );
	    /* END COLUMN FILTER */   
    
		/* COLUMN SHOW - HIDE */
		$('#datatable_col_reorder').dataTable({
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_col_reorder) {
					responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_col_reorder.respond();
			}			
		});
		
		/* END COLUMN SHOW - HIDE */



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





function eliminar(id,username){
	if (confirm("Desea eliminar el usuario "+username)) {
		document.location=('usuarios/elimina?id='+id);
	};
}


function edita(id){
	$("#load").load("usuarios/formedita?id="+id);
}


</script>


<section id="load"> </section>





