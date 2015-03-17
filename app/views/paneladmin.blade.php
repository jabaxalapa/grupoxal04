@if(Auth::check())

<?php
//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
//require_once("inc/config.ui.php");
require_once("inc/config.ui.php");
//require_once("elementos/config.blade.php");
//File::requireOnce("/elementos/config.blade.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC. */



/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
//include("inc/header.php");
//@include('elementos.config')
//include left panel (navigation)
//follow the tree in inc/config.ui.php
//include("inc/nav.php");
//include("elementos/nav.blade.php");
?>

<!--@require_once('elementos.config')-->

@include('elementos.header')

@include('elementos.nav')
<!--@yield('elementos.nav')-->


<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//include("inc/ribbon.php");
	?>
	@include('elementos.ribbon')


	<!-- MAIN CONTENT -->
	<div id="content">

	</div>
	<!-- END MAIN CONTENT -->
	
</div>
<!-- END MAIN PANEL -->

<!-- FOOTER -->
	<?php
		//include("inc/footer.php");
	?>
	@include('elementos.footer')
<!-- END FOOTER -->

<!-- ==========================CONTENT ENDS HERE ========================== -->
<?php 
	//include required scripts
	include("inc/scripts.php"); 
	//include("js/script_sistema.js"); 
	//include footer
	include("inc/google-analytics.php"); 
?>

<script type="text/javascript"></script>

<script type="text/javascript">
/*

$('body').addClass("fixed-header fixed-navigation fixed-ribbon");

$(document).ready(function(){

	$('body').on('click','.ui-spinner-down',function(){
		var vt = $('#spinner-currency').val();		
		var anterior=parseFloat(vt)+parseFloat(1);
		$('#field_'+anterior).remove();
	});

	$('body').on('click','.ui-spinner-up',function(){
		var vt = $('#spinner-currency').val();		
		var anterior=vt-1;
		//if (vt < maximo){
		if (vt <= maximo){
			$('#field_'+anterior).after('<fieldset id="field_'+vt+'"><legend>Depósitos '+vt+'</legend><div class="row"><div class="col-sm-4"><div class="form-group"><label class="col-md-12">Cantidad '+vt+'</label><div class="col-md-12"><div class="input-group"><span class="input-group-addon"><i class="fa fa-dollar"></i></span><input class="form-control"  step="any" onkeyup="CalculaDepositos(this.value,'+vt+')" name="cantidad_'+vt+'" id="cantidad_'+vt+'"  type="number" required></div></div></div></div><div class="col-sm-4" id="tipo_pago_'+vt+'"><label>Tipo:</label><div class="form-group"><div class="col-md-6"><div class="radio"><label><input type="radio" name="tipo_'+vt+'" value="lock" onclick="tipo_deposito('+vt+',\'lock\')"   class="radiobox style-0"><span>LOCK</span></label></div><div class="radio"><label><input type="radio" onclick="tipo_deposito('+vt+',\'bancomer\')" name="tipo_'+vt+'" value="bancomer" checked="checked" class="radiobox style-0"><span>BANCOMER</span></label></div></div></div></div>     <div class="col-sm-4" id="num_ficha_'+vt+'"><input class="form-control" id="numero_ficha_'+vt+'" name="numero_ficha_'+vt+'" value="0" type="hidden"></div>   </div></fieldset>');
		}
	});

});
*/




</script>

@endif

