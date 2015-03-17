



<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega Catalogo</h4>
      </div>
      <div class="modal-body">



			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">

				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Agregar Catalogo de cuentas</h2>									
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
						{{--  Form::open(array(						    
						     'url'=>'facturas/actualizacatalogo', 
						     'method' => 'post',
						     'enctype'=>'multipart/form-data',
						     'id'=>'FormFactura'
							))  
						--}}

					
									<div class="table-wrap custom-scroll animated fast fadeInRight" style="height: 403px; opacity: 1;">
									<!--<div class="col-md-12 custom-scroll" id="chat-body" style="height: 403px; opacity: 1;">-->
											@if($faltantes)
											<table class="table custom-scroll table-striped table-bordered dataTable table-hover no-footer" width="100%" role="grid" style="width: 100%;" aria-describedby="datatable_fixed_column_info">
												<tr>
													<th>No. Id</th>	
													<th class="hasinput">Descripcion</th>

													<!--<th>IVA</th>
													<th>IEPS</th>-->
													<th>Catalogo</th>												
													<th></th>
												</tr>

												<tbody>
												@foreach($faltantes as $faltante)
												<tr id="fila_{{$faltante->noIdentificacion}}" class="">
													<td>{{$faltante->noIdentificacion }}</td>
													<td >{{$faltante->descripcion }}</td>
<!--
													<td>
														<div class="checkbox">
															<label>
															  <input type="checkbox" id="iva_check" name="iva_check" class="checkbox style-0">
															  <span>IVA</span>
															</label>
														</div>
														
													</td>

													<td>
														<div class="checkbox">
															<label>
															  <input type="checkbox" id="ieps_check" name="ieps_check" class="checkbox style-0">
															  <span>IEPS</span>
															</label>
														</div>
													</td>-->


													<td>
														<input type="text" list="list_cuenta" name="list_cuenta" id="cuenta_{{$faltante->noIdentificacion}}">															
													</td>
													<td> 
														<input class="btn btn-success" type="button" onclick="edita_catalogo('{{$faltante->noIdentificacion}}')" value="Ligar" id="boton_cuenta_{{$faltante->noIdentificacion}}">
													</td>
												</tr>
												@endforeach
												</tbody>
											</table>
											@else
												No existen faltantes
											@endif
											
										



						<datalist id="list_cuenta">
							@foreach($catalogo as $cuenta)
								<option id="{{$cuenta->id}}" value="{{$cuenta->nombre_cuenta.' '.$cuenta->subfijo}}">subfijo {{$cuenta->subfijo ." ".$cuenta->num_cuenta}}</option>
							@endforeach							
						</datalist>


							<footer>
								<!--<button type="submit" class="btn btn-primary">
									Guardar
								</button>-->
								<!--<input type="button" value="Subir imagen" />-->
							</footer>
						<!--</form>-->
						{{-- Form::close() --}}










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



<script type="text/javascript">
	 $('#myModal2').modal('show'); 
</script>