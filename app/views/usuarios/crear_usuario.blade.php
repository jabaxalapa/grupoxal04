<?php require_once("inc/init.php"); ?>
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
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
					<h2>Registro de usuario </h2>				
					
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
						
						<form action="usuarios/guarda" method="post" id="order-form" class="smart-form" >
							<input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d') ?>">
							<header>
								usuario
							</header>

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
											<input type="text" name="user_name" id="user_name" placeholder="User Name" />
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-phone"></i>
											<input type="password" name="password" id="password" placeholder="****"/>
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
											<input type="email" name="email" placeholder="E-mail">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-phone"></i>
											<input type="tel" name="phone" placeholder="Telefono" data-mask="(999) 999-9999">
										</label>
									</section>
								</div>


							</fieldset>


							<footer>
								<button type="submit" class="btn btn-primary">
									Enviar
								</button>
							</footer>
						</form>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->				











<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
						<form action="usuarios/guarda" method="post" id="order-form" class="smart-form" novalidate="novalidate">
							<input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d') ?>">
							<header>
								usuario
							</header>

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
											<input type="text" name="user_name" id="user_name" placeholder="User Name" />
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-phone"></i>
											<input type="password" name="password" id="password" placeholder="****"/>
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
											<input type="email" name="email" placeholder="E-mail">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-phone"></i>
											<input type="tel" name="phone" placeholder="Telefono" data-mask="(999) 999-9999">
										</label>
									</section>
								</div>


							</fieldset>


							<footer>
								<button type="submit" class="btn btn-primary">
									Enviar
								</button>
							</footer>
						</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
