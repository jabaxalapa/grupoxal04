
<input type="button" style="display:none;" id="bot" data-toggle="modal" data-target="#VentanaEdita" >


<!-- Modal -->
<div class="modal fade" id="VentanaEdita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
      </div>
      <div class="modal-body">

















<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
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
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Checkout Form </h2>				
					
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
						
						<form action="" id="checkout-form" class="smart-form" >

							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input type="text" name="fname" placeholder="First name" required>
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input type="text" name="lname" placeholder="Last name">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
											<input type="email" name="email" placeholder="E-mail">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-phone"></i>
											<input type="tel" name="phone" placeholder="Phone" data-mask="(999) 999-9999">
										</label>
									</section>
								</div>
							</fieldset>





							<fieldset>
								<section>
									<label for="address" class="input">
										<input type="text" name="address" placeholder="Address">
									</label>
								</section>

								<section>
									<label class="textarea"> 										
										<textarea rows="3" name="info" placeholder="Additional info"></textarea> 
									</label>
								</section>
							</fieldset>






							<fieldset>
								<section>
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="radio-inline" checked="">
											<i></i>Visa</label>
										<label class="radio">
											<input type="radio" name="radio-inline">
											<i></i>MasterCard</label>
										<label class="radio">
											<input type="radio" name="radio-inline">
											<i></i>American Express</label>
									</div>
								</section>

								<section>
									<label class="input">
										<input type="text" name="name" placeholder="Name on card">
									</label>
								</section>

								<div class="row">
									<section class="col col-10">
										<label class="input">
											<input type="text" name="card" placeholder="Card number" data-mask="9999-9999-9999-9999">
										</label>
									</section>
									<section class="col col-2">
										<label class="input">
											<input type="text" name="cvv" placeholder="CVV2" data-mask="999">
										</label>
									</section>
								</div>


							</fieldset>








							<footer>
								<button type="submit" class="btn btn-primary">
									Validate Form
								</button>
							</footer>
						</form>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->



























      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        <input type="submit" class="btn btn-primary" value="Guardar Cambios"  />

      </div>
  
    </div>
  </div>
</div>

<script type="text/javascript">
	//document.forms["tuForm"]["tuRadio"].onclick();
	$("#bot").click();
</script>