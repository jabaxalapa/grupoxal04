



<!-- Modal -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Ligar Proveedores</h4>
      </div>
      <div class="modal-body">



			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">

				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Ligar Porveedores</h2>									
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










					<div class="widget-body fuelux">
						<div class="wizard">
							<ul class="steps">
								<?php $a=1; ?>
								@foreach($faltantes as $faltante)												
								<li data-target="#step{{$a}}" class="@if($a==1) active @endif">
									<span class="badge badge-info">{{$a}}</span> 
										RFC: {{ $faltante->Emisor_rfc }}
									<span class="chevron"></span>
								</li>
								<?php $a++; ?>
								@endforeach
							</ul>
							<div class="actions">
								<button type="button" class="btn btn-sm btn-primary btn-prev">
									<i class="fa fa-arrow-left"></i>Ant.
								</button>
								<button type="button" class="btn btn-sm btn-success btn-next" data-last="Finish">
									Sig.<i class="fa fa-arrow-right"></i>
								</button>
							</div>
						</div>


						<div class="step-content">
							<form class="form-horizontal" id="fuelux-wizard" method="post">
								<?php $a=1; ?>
								@foreach($faltantes as $faltante)	
								<div class="step-pane @if($a==1) active @endif" id="step{{$a}}">											
									<h3><strong>Proveedor:  </strong>{{$a}} </h3>
									<h3><strong>RFC: </strong>{{ $faltante->Emisor_rfc }}</h3>								
									<h3><strong>Nombre: </strong>{{ $faltante->Emisor_nombre }}</h3>	
									
									
									<div class="col-sm-12">
										<div class="col-sm-3">
											<!--<h4><strong>Proveedor</strong></h4>-->
											<label class="col-md-2 control-label"><h4><strong>Proveedor</strong></h4></label>
										</div>
										
										@if(($faltante->nombre_proveedor) == NULL)
										<div class="col-sm-7">
											<div class="form-group">
												<div class="input-group">

													<span class="input-group-addon">
														<i class="fa fa-truck fa-lg fa-fw"></i>
													</span>
													<input class="form-control input-lg"  placeholder="Elige un proveedor" type="text" list="list_proveedor" name="list_proveedor" id="proveedor_{{$faltante->id}}" >												

												</div>
											</div>
										</div>

										<div class="col-sm-2" id="colp2_{{$faltante->id}}">
											<input class="btn-lg bg-color-green txt-color-white" type="button" onclick="liga_proveedor('{{$faltante->id}}','{{$faltante->Emisor_rfc}}')" value="Ligar" id="boton_proveedor_{{$faltante->id }}"> 
										</div>
											<script type="text/javascript">
											document.getElementById('proveedor_{{$faltante->id}}').addEventListener('input', function () {
												var c_id=0;  
												var name=$("#proveedor_{{$faltante->id}}").val();
												c_id= $('#list_proveedor').find('option[value="'+name+'"]').attr('for');
												num_cuenta=$('#list_proveedor').find('option[value="'+name+'"]').attr('numcuenta');
												//console.log('changed: '+num_cuenta); 
												$('#numcuentap_{{$faltante->id}}').remove();
												$("#colp2_{{$faltante->id}}").after("<div id='numcuentap_{{$faltante->id}}' class='col-sm-12'><p class='text-center'>"+num_cuenta+"</p></div>");
											});
											</script>	
										@else
										<div class="col-sm-9" >
											<h3>{{$faltante->nombre_proveedor}} - {{$faltante->num_proveedor}}</h3>
										</div>
										@endif

									</div>				
			
									






									
									<div class="col-sm-12">
										<div class="col-sm-3">
											<!--<h4><strong>Compras Totales</strong></h4>-->
											<label class="col-md-2 control-label"><h4><strong>Compras Totales</strong></h4></label>
										</div>

										@if(($faltante->nombre_comptotgrab15) == NULL)
										<div class="col-sm-7">
											<div class="form-group">
												<div class="input-group">

													<span class="input-group-addon">
														<i class="fa fa-shopping-cart fa-lg fa-fw"></i>
													</span>
													<input class="form-control input-lg" placeholder="Elige un proveedor" type="text" list="list_proveedor" name="listcomtot" id="comtot_{{$faltante->id }}">


												</div>
											</div>
										</div>

										<div class="col-sm-2" id="colct2_{{$faltante->id}}">
											<input class="btn-lg bg-color-green txt-color-white" type="button" onclick="liga_comtot('{{$faltante->id}}','{{$faltante->Emisor_rfc}}')" value="Ligar" id="boton_comtot_{{$faltante->id }}"> 
										</div>
											<script type="text/javascript">
											document.getElementById('comtot_{{$faltante->id}}').addEventListener('input', function () {
												var c_id=0;  
												var name=$("#comtot_{{$faltante->id}}").val();
												c_id= $('#list_proveedor').find('option[value="'+name+'"]').attr('for');
												num_cuenta=$('#list_proveedor').find('option[value="'+name+'"]').attr('numcuenta');
												//console.log('changed: '+num_cuenta); 
												$('#numcuentact_{{$faltante->id}}').remove();
												$("#colct2_{{$faltante->id}}").after("<div id='numcuentact_{{$faltante->id}}' class='col-sm-12'><p class='text-center'>"+num_cuenta+"</p></div>");
											});
											</script>	
										@else
										<div class="col-sm-9">
											<h3>{{$faltante->nombre_comptotgrab15}} - {{$faltante->num_comptotgrab15}} </h3>
										</div>
										@endif

									</div>
								




									
									<div class="col-sm-12">
										<div class="col-sm-3">
											<!--<h4><strong>Extentas 0%</strong></h4>-->
											<label class="col-md-2 control-label"><h4><strong>Extentas 0%</strong></h4></label>
										</div>
										@if(($faltante->nombre_excentas) == NULL)
										<div class="col-sm-7">
											<div class="form-group">
												<div class="input-group">

													<span class="input-group-addon">

														<i class="fa fa-level-down fa-lg fa-fw"></i>
													</span>
													<input class="form-control input-lg" placeholder="Elige un proveedor" type="text" list="list_proveedor" name="list_excentas" id="excentas_{{$faltante->id }}">

												</div>
											</div>
										</div>

										<div class="col-sm-2" id="colex2_{{$faltante->id}}">
											<input class="btn-lg bg-color-green txt-color-white" type="button" onclick="liga_excentas('{{$faltante->id}}','{{$faltante->Emisor_rfc}}')" value="Ligar" id="boton_excentas_{{$faltante->id }}"> 
										</div>
											<script type="text/javascript">
											document.getElementById('excentas_{{$faltante->id}}').addEventListener('input', function () {
												var c_id=0;  
												var name=$("#excentas_{{$faltante->id}}").val();
												c_id= $('#list_proveedor').find('option[value="'+name+'"]').attr('for');
												num_cuenta=$('#list_proveedor').find('option[value="'+name+'"]').attr('numcuenta');
												//console.log('changed: '+num_cuenta); 
												$('#numcuentaex_{{$faltante->id}}').remove();
												$("#colex2_{{$faltante->id}}").after("<div id='numcuentaex_{{$faltante->id}}' class='col-sm-12'><p class='text-center'>"+num_cuenta+"</p></div>");
											});
											</script>										
										@else
										<div class="col-sm-9">
											<h3>{{$faltante->nombre_excentas}} - {{$faltante->num_excentas}}</h3>
										</div>
										@endif
									</div>
									




								</div>
								<?php $a++; ?>
								@endforeach
							</form>
						</div>
				    </div>




					<datalist id="list_proveedor">
						@foreach($catalogo as $proveedor)
							<option id="{{$proveedor->id}}" for="{{$proveedor->id}}" value="{{$proveedor->nombre_cuenta}} - {{$proveedor->num_cuenta}}" numcuenta="{{$proveedor->num_cuenta}}">{{--$proveedor->num_cuenta--}}</option>
						@endforeach							
					</datalist>
<!--
					<datalist id="list_comtot">
						{{--@foreach($catalogo as $com_to)--}}
							<option id="{{--$com_to->id--}}" for="{{--$com_to->id--}}" value="{{--$com_to->nombre_cuenta--}} - {{--$com_to->num_cuenta--}}" numcuenta="{{--$com_to->num_cuenta--}}">{{--$com_to->num_cuenta--}}</option>
						{{--@endforeach--}}
					</datalist>


					<datalist id="list_excentas">
						{{--@foreach($catalogo as $excenta)--}}
							<option id="{{--$excenta->id--}}" for="{{--$excenta->id--}}" value="{{--$excenta->nombre_cuenta--}} - {{--$excenta->num_cuenta--}}" numcuenta="{{--$excenta->num_cuenta--}}">{{--$excenta->num_cuenta--}}</option>
						{{--@endforeach--}}
					</datalist>

-->

						
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
	 $('#myModal4').modal('show'); 
</script>


<script type="text/javascript">
	pageSetUp();

	// PAGE RELATED SCRIPTS
	// pagefunction
	var pagefunction = function() {

		loadScript("js/plugin/fuelux/wizard/wizard.min.js", fueluxWizard);

		function fueluxWizard() {

			var wizard = $('.wizard').wizard();

			wizard.on('finished', function(e, data) {
				//$("#fuelux-wizard").submit();
				//console.log("submitted!");
				/*
				$.smallBox({
					title : "Congratulations! Your form was submitted",
					content : "<i class='fa fa-clock-o'></i><i>1 seconds ago...</i>",
					color : "#5F895F",
					iconSmall : "fa fa-check bounce animated",
					timeout : 4000
				});*/

			});

		};

	};// end pagefunction
	
	// Load bootstrap wizard dependency then run pagefunction
	pagefunction();
</script>