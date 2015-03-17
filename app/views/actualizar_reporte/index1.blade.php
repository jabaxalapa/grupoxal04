<?php require_once("inc/init.php"); ?>



<form method="get" action="http://104.131.68.229/descarga2.php">
<table>
<tr>
	
	<td>	
		<select name="suc" class="form-control">
		@foreach($sucursales as $sucursal)
			<option value="{{ $sucursal->num_branch }}">{{ $sucursal->name_branch}} </option>
		@endforeach
		</select>
	</td>

	<td>
		<div class="input-group">
			<!--<input type="text" name="fecha_captura" placeholder="Seleccione fecha" class="form-control datepicker" data-dateformat="dd/mm/yy" required>-->
			<input type="text" name="fecha" id="fecha_captura" placeholder="Seleccione Fecha" class="form-control datepicker" data-dateformat="y-mm-dd" required>
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		</div>

	</td>

	<td>
		<button class="btn btn-primary" type="submit">
			<i class="fa fa-save"></i>
			Submit
		</button>

	</td>

</tr>
</table>
</form>






<script type="text/javascript">
pageSetUp();
	var pagefunction = function() {
		$("#num_deposito").spinner({
			min: 1,
		   	max: 25,
		   	step: 1,
		   	start: 1000,
		   	numberFormat: "C",
           		spin: function(event,ui){
           			anterior = $("#num_deposito").spinner("value");              		
           		},
		   	
			   	stop: function(event,ui) {	                
	                actual = $("#num_deposito").spinner("value");
	                	
                    var existe=$("#field_"+actual).val();


                    sum=parseFloat(anterior)+1;
					var siguiente=$("#field_"+sum).val();
/*
	                if(actual!=anterior ){	

		                if(actual>anterior && typeof existe=="undefined"){
		                	//alert("ADELANTE->");
		                	$('#field_'+anterior).after('<fieldset id="field_'+actual+'"><legend>Depósitos '+actual+'</legend><div class="row"><div class="col-sm-4"><div class="form-group"><label class="col-md-12">Cantidad '+actual+'</label><div class="col-md-12"><div class="input-group"><span class="input-group-addon"><i class="fa fa-dollar"></i></span><input class="form-control"  step="any" onkeyup="CalculaDepositos(this.value,'+actual+')" cantidad="'+actual+'" name="cantidad_'+actual+'" id="cantidad_'+actual+'"  type="number" required></div></div></div></div><div class="col-sm-4" id="tipo_pago_'+actual+'"><label>Tipo:</label><div class="form-group"><div class="col-md-6"><div class="radio"><label><input type="radio" name="tipo_'+actual+'" value="lock" onclick="tipo_deposito('+actual+',\'lock\')"   class="radiobox style-0"><span>LOCK</span></label></div><div class="radio"><label><input type="radio" onclick="tipo_deposito('+actual+',\'bancomer\')" name="tipo_'+actual+'" value="bancomer" checked="checked" class="radiobox style-0"><span>BANCOMER</span></label></div></div></div></div>     <div class="col-sm-4" id="num_ficha_'+actual+'"><input class="form-control" id="numero_ficha_'+actual+'" name="numero_ficha_'+actual+'" value="0" type="hidden"></div>   </div></fieldset>');	                              
		                }else if(actual<anterior && typeof siguiente == "undefined"){
		                	//alert("<-ATRAS");
		                	$('#field_'+anterior).remove();
		                }
	                }*/
	            }
        });
	}; 	
pagefunction();
</script>