



<!-- Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Ligar Sucursal</h4>
      </div>
      <div class="modal-body">

			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">

				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Ligar Facturas con sucursal</h2>									
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body">






					<div class="widget-body fuelux">
						<div class="wizard">
							<ul class="steps">
								<?php $a=1; ?>
								@foreach($faltantes as $faltante)												
								<li data-target="#step{{$a}}" class="@if($a==1) active @endif">
									<span class="badge badge-info">{{$a}}</span> 
										Folio {{ $faltante->Comprobante_folio }}
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
									<h3><strong>Factura:  </strong>{{$a}} </h3>
									<h3><strong>Folio: </strong>{{ $faltante->Comprobante_serie }} {{ $faltante->Comprobante_folio }}</h3>
									<h3><strong>Emisor: </strong> {{$faltante->Emisor_nombre}}</h3>
									<h3><strong>Fecha: </strong> {{$faltante->Comprobante_fecha}}</h3>
									<h3><strong>Lugar: </strong> {{$faltante->Comprobante_LugarExpedicion}}</h3>								
										<div class="col-sm-2">
											@if($faltante->pdf)
											<img src="img/pdf_ico.png" style="cursor:pointer;" onclick="vizualiza_pdf('{{$faltante->pdf}}','{{$faltante->Comprobante_folio}}','{{$faltante->Emisor_nombre}}')">
											@endif
										</div>

										<div class="col-sm-7">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-institution fa-lg fa-fw"></i></span>
													<input class="form-control input-lg" placeholder="Elige una Sucursal" type="text" list="list_sucursal" name="list_sucursal" id="sucursal_{{$faltante->id }}">

												</div>
											</div>
										</div>

										<div class="col-sm-2">
											<input class="btn-lg bg-color-green txt-color-white" type="button" onclick="liga_sucursal('{{$faltante->id}}')" value="Ligar" id="boton_sucursal_{{$faltante->id }}"> 
										</div>
								</div>
								<?php $a++; ?>
								@endforeach
							</form>
						</div>
				    </div>



							



						<datalist id="list_sucursal">
							@foreach($sucursales as $sucursal)
								<option id="{{$sucursal->num_branch}}" value="{{$sucursal->name_branch}}"></option>
							@endforeach							
						</datalist>


							<footer>
							</footer>








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
	 $('#myModal3').modal('show'); 
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
