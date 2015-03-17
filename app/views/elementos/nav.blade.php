{{ $role=Auth::user()->id_role }}

<?php 
//Super Administrador
if($role==1){
	$page_nav = 	
		array("dashboard" => array(
			"title" => "Dashboard",
			"url" => "graficas",
			"icon" => "fa-home"
		),

		"ingresos" => array(
			"title" => "Ingresos",
			"icon" => "fa-money",
			"sub" => array(
				"agregar" => array(
					"title" => "Agregar Ingreso",
					"url" => "ingresos"
				),
				"lista" => array(
					"title" => "Lista de Ingresos",
					"url" => "ingresos/lista"
				)
			)
		),

		"gestion"	=>	array(
			"title"	=>	"Gestion del Sistema",
			"icon" => "fa-user",
			"sub"  => array(
				"usuarios" => array(
					"title" => "Usuarios",
					"url" => "usuarios"
				),
				"sucursales" => array(
					"title" => "Sucursales",
					"url" => "sucursal"
				),
				"actualiza" => array(
					"title" => "Actualiza Ventas",
					"url" => "actualiza"
				),
				"roles" => array(
					"title" => "Roles",
					"url" => "roles"
				)
			)
		),
		"facturas"	=>	array(
			"title"	=>	"Facturas",
			"icon" => "fa-archive",
			"url" => "facturas"
		),
		"busqueda"	=>	array(
			"title"	=>	"Busqueda Factura",
			"icon" => "fa-archive",
			"url" => "facturas/busquedafactura"
		),		
		"macros" => array(
			"title" => "Macros",
			"icon" => "fa-file-excel-o",
			"url" => "macros"
		),

	);
		//Director
}else if ($role==2) {
		$page_nav = 	
		array("dashboard" => array(
			"title" => "Dashboard",
			"url" => "graficas",
			"icon" => "fa-home"
		),

		"ingresos"	=>	array(
			"title"	=>	"Ingresos",
			"url"	=>	"ingresos",
			"icon" => "fa-money")
	);
		//Contador
}else if ($role==3) {
		$page_nav = 	
		array("ingresos" => array(
			"title" => "Ingresos",
			"icon" => "fa-money",
			"url" => "ingresos/lista",
			"sub" => array(
				"agregar" => array(
					"title" => "Agregar Ingreso",
					"url" => "ingresos"
				),
				"lista" => array(
					"title" => "Lista de Ingresos",
					"url" => "ingresos/lista"
				),"actualiza" => array(
					"title" => "Actualiza Ventas",
					"url" => "actualiza"
				)

			)
		),
			"facturas"	=>	array(
			"title"	=>	"Facturas",
			"url" => "facturas",
			"icon" => "fa-archive"
			
		),
		"macros" => array(
			"title" => "Macros",
			"icon" => "fa-file-excel-o",
			"url" => "macros"
		),
	);
}else if ($role==4) {
		$page_nav = 	
		array("dashboard" => array(
			"title" => "Dashboard",
			"url" => "graficas",
			"icon" => "fa-home"
		),

		"ingresos"	=>	array(
			"title"	=>	"Ingresos",
			"url"	=>	"ingresos",
			"icon" => "fa-money")
	);
}else if ($role==5) {
		$page_nav = 	
		array("ingresos"	=>	array(
			"title"	=>	"Ingresos",
			"url"	=>	"ingresos",
			"icon" => "fa-money"),

		"facturas"	=>	array(
			"title"	=>	"Facturas",
			"url" => "facturas",
			"icon" => "fa-archive"
			),
			"busqueda"	=>	array(
			"title"	=>	"Busqueda Factura",
			"icon" => "fa-archive",
			"url" => "facturas/busquedafactura"
		),	
	);
}else if ($role==6) {
		$page_nav = 	
		array("dashboard" => array(
			"title" => "Dashboard",
			"url" => "graficas",
			"icon" => "fa-home"
		),

		"ingresos"	=>	array(
			"title"	=>	"Ingresos",
			"url"	=>	"ingresos",
			"icon" => "fa-money")
	);
}






 ?>		



		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as is -->

					<!--<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">-->
					<a  id="show-hh" >

						<!--<img src="<?php echo ASSETS_URL; ?>/img/avatars/sunny.png" alt="me" class="online" />-->
						<span>
							{{ Auth::user()->username }}

						</span>
						<i class="fa fa-angle-down"></i>
					</a>

				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive

			To make this navigation dynamic please make sure to link the node
			(the reference to the nav > ul) after page load. Or the navigation
			will not initialize.
			-->
			<nav>
				<!-- NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional hre="" links. See documentation for details.
				-->
				<ul>
					<?php
						foreach ($page_nav as $key => $nav_item) {
							//process parent nav
							$nav_htm = '';
							$url = isset($nav_item["url"]) ? $nav_item["url"] : "#";
							$url_target = isset($nav_item["url_target"]) ? 'target="'.$nav_item["url_target"].'"' : "";
							$icon_badge = isset($nav_item["icon_badge"]) ? '<em>'.$nav_item["icon_badge"].'</em>' : '';
							$icon = isset($nav_item["icon"]) ? '<i class="fa fa-lg fa-fw '.$nav_item["icon"].'">'.$icon_badge.'</i>' : "";
							$nav_title = isset($nav_item["title"]) ? $nav_item["title"] : "(No Name)";
							$label_htm = isset($nav_item["label_htm"]) ? $nav_item["label_htm"] : "";
							$nav_htm .= '<a href="'.$url.'" '.$url_target.' title="'.$nav_title.'">'.$icon.' <span class="menu-item-parent">'.$nav_title.'</span>'.$label_htm.'</a>';

							if (isset($nav_item["sub"]) && $nav_item["sub"])
								$nav_htm .= process_sub_nav($nav_item["sub"]);

							echo '<li '.(isset($nav_item["active"]) ? 'class = "active"' : '').'>'.$nav_htm.'</li>';
						}

						function process_sub_nav($nav_item) {
							$sub_item_htm = "";
							if (isset($nav_item["sub"]) && $nav_item["sub"]) {
								$sub_nav_item = $nav_item["sub"];
								$sub_item_htm = process_sub_nav($sub_nav_item);
							} else {
								$sub_item_htm .= '<ul>';
								foreach ($nav_item as $key => $sub_item) {
									$url = isset($sub_item["url"]) ? $sub_item["url"] : "#";
									$url_target = isset($sub_item["url_target"]) ? 'target="'.$sub_item["url_target"].'"' : "";
									$icon = isset($sub_item["icon"]) ? '<i class="fa fa-lg fa-fw '.$sub_item["icon"].'"></i>' : "";
									$nav_title = isset($sub_item["title"]) ? $sub_item["title"] : "(No Name)";
									$label_htm = isset($sub_item["label_htm"]) ? $sub_item["label_htm"] : "";
									$sub_item_htm .=
										'<li '.(isset($sub_item["active"]) ? 'class = "active"' : '').'>
											<a href="'.$url.'" '.$url_target.'>'.$icon.' '.$nav_title.$label_htm.'</a>
											'.(isset($sub_item["sub"]) ? process_sub_nav($sub_item["sub"]) : '').'
										</li>';
								}
								$sub_item_htm .= '</ul>';
							}
							return $sub_item_htm;
						}


					?>
				</ul>

			</nav>
			<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION -->