<?php
//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Login";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
$no_main_header = true;
$page_body_prop = array("id"=>"extr-page", "class"=>"animated fadeInDown");
include("inc/header.php");

?>

<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container">
	
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
				<center><img src="img/loginlogo.png" style="text-align:center;"></center><br>
				<div class="well no-padding">

					<form action="login" method="post" id="login-form" class="smart-form client-form">
						<header>
							Iniciar sesión
						</header>

						@if (Session::has('login_errors'))
							<center><p style="color:red;"> El nombre usuario o la contraseña son incorrectos</p></center>
						@else
							<!--<center><p>Introdizca usuario y contraseña para continuar</p></center>-->
						@endif



						<fieldset>
							
							<section>
								<label class="label">Usuario</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="text" name="email" autofocus>
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Porfavor ingrese su dirección de email o usuario</b></label>
							</section>

							<section>
								<label class="label">Contraseña</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password">
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingrese su Contraseña</b> </label>
								<div class="note">
									<a href="<?php echo APP_URL; ?>/forgotpassword.php">¿Has olvidado tu contraseña?</a>
								</div>
							</section>

							<section>
								<label class="checkbox">
									<input type="checkbox" name="remember" checked="">
									<i></i>Mantener la sesión iniciada</label>
							</section>
						</fieldset>
						<footer>
							<button type="submit" class="btn btn-primary">
								Iniciar sesión
							</button>
						</footer>
					</form>

				</div>
		</div>
	</div>




<a target="_blank" href="http://104.131.68.229/estatus_vista.php">Status KFC PH</a>



</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->
<script type="text/javascript">
	runAllForms();

	$(function() {
		// Validation
		$("#login-form").validate({
			// Rules for form validation
			rules : {
				/*email : {
					required : true,
					email : true
				},*/
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				}
			},

			// Messages for form validation
			messages : {
				email : {
					//required : 'Please enter your email address',
					//email : 'Please enter a VALID email address'
				},
				password : {
					required : 'Please enter your password'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});
	});
</script>

<?php 
	//include footer
	include("inc/google-analytics.php"); 
?>