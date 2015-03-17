<?php
$conexion=mysqli_connect('localhost','root','crmauto1','naolfer3_ingre_compaq');

/*----------------------------------------Inicializa la seccion de KFC------------------------------------------------*/
$qu1="SELECT cobCajeEfectivo, fechaRep FROM kfc_americas WHERE fechaRep>'2014-09-01' ORDER BY fechaRep ASC";
$query1=mysqli_query($conexion,$qu1)or die(mysqli_error($conexion));
$nu1=mysqli_num_rows($query1);


/*
function fecha_es1($fechaa){
    setlocale(LC_ALL, 'es_ES.UTF-8');
    return ucfirst(strftime("%A, %e de %B del %Y a las %H:%M",strtotime($fechaa)));
}
echo fecha_es1('d-m-Y');


echo date('d-m-y');

function fecha_es2(){
    $dias=array('Thu'=>'Jueves','Sun'=>'Domingo','Mon'=>'Lunes','Tue'=>'Martes','Wed'=>'Miercoles','Fri'=>'Viernes','Sat'=>'Sabado');
    $meses=array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
    //return $dias[date('D')]." ".date('d')." de ".$meses[date('m')]." del ".date('Y');
    return $dias[date('D')]." ".date('04')." de ".$meses[date('04')]." del ".date('2014');
}
echo fecha_es2();
*/


/**
 * Obtener el día de la semana para una fecha concreta.
 */
function diaSemana($ano,$mes,$dia)
{
    // 0->domingo     | 6->sabado
    $dia= date("w",mktime(0, 0, 0, $mes, $dia, $ano));

    switch ($dia) {
    	case '1':
    		$dia="Lun";
    		break;
    	case '2':
    		$dia="Mar";
    		break;
    	case '3':
    		$dia="Mie";
    		break;
    	case '4':
    		$dia="Jue";
    		break;
    	case '5':
    		$dia="Vie";
    		break;
    	case '6':
    		$dia="Sab";
    		break;
    	case '0':
    		$dia="Dom";
    		break;

    }

        return $dia;
}
 
/**
 * Ejemplo de uso
 */
//$diaSemana = diaSemana("2014", "09", "16");
//echo $diaSemana;
 
/**
 * Imprime:
 * 4 | El cuatro corresponde a Jueves
 */



$con1=1;
while ($row1=mysqli_fetch_array($query1)) {
	$total1=$row1['cobCajeEfectivo'];
	$fecha1=$row1['fechaRep'];

	if($con1==1){
		$aarray1="[".$con1.", ".$total1."],";
	}else{
		$aarray1.="[".$con1.", ".$total1."],";
	}




	 $Y=date("Y", strtotime($fecha1));
	 $d=date("d", strtotime($fecha1));
	 $m=date("m", strtotime($fecha1));

	$diaSemana = diaSemana($Y,$m,$d);
	//echo $diaSemana;

	if($con1==1){
		$aarrayfecha1="[".$con1.", \" ".$diaSemana." ".$d."\"],";
	}else{
		$aarrayfecha1.="[".$con1.", \"".$diaSemana." ".$d."\"],";
	}
	
	$con1++;
}
//echo $aarray1;
 $aarrayfecha1;



$qu2="SELECT cobCajeEfectivo, fechaRep FROM kfc_boulevard WHERE fechaRep>'2014-09-01' ";
$query2=mysqli_query($conexion,$qu2)or die(mysqli_error($conexion));
$nu2=mysqli_num_rows($query2);
$con2=1;
while ($row2=mysqli_fetch_array($query2)) {
	$total2=$row2['cobCajeEfectivo'];
	//$fecha=$row['fechaRep'];

	if($con2==1){
		$aarray2="[".$con2.", ".$total2."],";
	}else{
		$aarray2.="[".$con2.", ".$total2."],";
	}

	$con2++;
}
//echo $aarray2;





$qu3="SELECT cobCajeEfectivo, fechaRep FROM kfc_brisas WHERE fechaRep>'2014-09-01' ";
$query3=mysqli_query($conexion,$qu3)or die(mysqli_error($conexion));
$nu3=mysqli_num_rows($query3);
$con3=1;
while ($row3=mysqli_fetch_array($query3)) {
	$total3=$row3['cobCajeEfectivo'];
	//$fecha=$row['fechaRep'];

	if($con3==1){
		$aarray3="[".$con3.", ".$total3."],";
	}else{
		$aarray3.="[".$con3.", ".$total3."],";
	}

	$con3++;
}
//echo $aarray3;






$qu4="SELECT cobCajeEfectivo, fechaRep FROM kfc_independencia WHERE fechaRep>'2014-09-01' ";
$query4=mysqli_query($conexion,$qu4)or die(mysqli_error($conexion));
$nu2=mysqli_num_rows($query4);
$con4=1;
while ($row4=mysqli_fetch_array($query4)) {
	$total4=$row4['cobCajeEfectivo'];
	//$fecha=$row['fechaRep'];

	if($con4==1){
		$aarray4="[".$con4.", ".$total4."],";
	}else{
		$aarray4.="[".$con4.", ".$total4."],";
	}

	$con4++;
}
//echo $aarray4;





$qu5="SELECT cobCajeEfectivo, fechaRep FROM kfc_dorado WHERE fechaRep>'2014-09-01' ";
$query5=mysqli_query($conexion,$qu5)or die(mysqli_error($conexion));
$nu5=mysqli_num_rows($query5);
$con5=1;
while ($row5=mysqli_fetch_array($query5)) {
	$total5=$row5['cobCajeEfectivo'];
	//$fecha=$row['fechaRep'];

	if($con5==1){
		$aarray5="[".$con5.", ".$total5."],";
	}else{
		$aarray5.="[".$con5.", ".$total5."],";
	}

	$con5++;
}
//echo $aarray5;






$qu6="SELECT cobCajeEfectivo, fechaRep FROM kfc_xalapa WHERE fechaRep>'2014-09-01' ";
$query6=mysqli_query($conexion,$qu6)or die(mysqli_error($conexion));
$nu6=mysqli_num_rows($query6);
$con6=1;
while ($row6=mysqli_fetch_array($query6)) {
	$total6=$row6['cobCajeEfectivo'];
	//$fecha=$row['fechaRep'];

	if($con6==1){
		$aarray6="[".$con6.", ".$total6."],";
	}else{
		$aarray6.="[".$con6.", ".$total6."],";
	}

	$con6++;
}
//echo $aarray6;

/*----------------------------------------Finalaza la seccion de KFC------------------------------------------------*/

/*----------------------------------------Inicializada la seccion de PH------------------------------------------------*/
$qu1_ph="SELECT cobCajeEfectivo, fechaRep FROM ph_animas WHERE fechaRep>'2014-09-01' ";
$query1_ph=mysqli_query($conexion,$qu1_ph)or die(mysqli_error($conexion));
$nu1_ph=mysqli_num_rows($query1_ph);



function fecha_es1_ph($fechaa_ph){
    setlocale(LC_ALL, 'es_ES.UTF-8');
    return ucfirst(strftime("%A, %e de %B del %Y a las %H:%M",strtotime($fechaa_ph)));
}
echo fecha_es1_ph('d-m-Y');/* 2014-09-04*/


echo date('d-m-y');

function fecha_es2_ph(){
    $dias_ph=array('Thu'=>'Jueves','Sun'=>'Domingo','Mon'=>'Lunes','Tue'=>'Martes','Wed'=>'Miercoles','Fri'=>'Viernes','Sat'=>'Sabado');
    $meses_ph=array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
    //return $dias[date('D')]." ".date('d')." de ".$meses[date('m')]." del ".date('Y');
    return $dias_ph[date('D')]." ".date('04')." de ".$meses_ph[date('04')]." del ".date('2014');
}
echo fecha_es2_ph();


$con1_ph=1;
while ($row1_ph=mysqli_fetch_array($query1_ph)) {
	$total1_ph=$row1_ph['cobCajeEfectivo'];
	$fecha1_ph=$row1_ph['fechaRep'];

	if($con1_ph==1){
		$aarray1_ph="[".$con1_ph.", ".$total1_ph."],";
	}else{
		$aarray1_ph.="[".$con1_ph.", ".$total1_ph."],";
	}

//$fecha1
	if($con1_ph==1){
		$aarrayfecha1_ph="[".$con1_ph.", \" ".$fecha1_ph."\"],";
	}else{
		$aarrayfecha1_ph.="[".$con1_ph.", \"".$fecha1_ph."\"],";
	}
	
	$con1_ph++;
}
//echo $aarray1;
 $aarrayfecha1;



$qu2_ph="SELECT cobCajeEfectivo, fechaRep FROM ph_avila_camacho WHERE fechaRep>'2014-09-01' ";
$query2_ph=mysqli_query($conexion,$qu2_ph)or die(mysqli_error($conexion));
$nu2_ph=mysqli_num_rows($query2_ph);
$con2_ph=1;
while ($row2_ph=mysqli_fetch_array($query2_ph)) {
	$total2_ph=$row2_ph['cobCajeEfectivo'];
	//$fecha=$row['fechaRep'];

	if($con2_ph==1){
		$aarray2_ph="[".$con2_ph.", ".$total2_ph."],";
	}else{
		$aarray2_ph.="[".$con2_ph.", ".$total2_ph."],";
	}

	$con2_ph++;
}
//echo $aarray2;





$qu3_ph="SELECT cobCajeEfectivo, fechaRep FROM ph_poza_rica WHERE fechaRep>'2014-09-01' ";
$query3_ph=mysqli_query($conexion,$qu3_ph)or die(mysqli_error($conexion));
$nu3_ph=mysqli_num_rows($query3_ph);
$con3_ph=1;
while ($row3_ph=mysqli_fetch_array($query3_ph)) {
	$total3_ph=$row3_ph['cobCajeEfectivo'];
	//$fecha=$row['fechaRep'];

	if($con3_ph==1){
		$aarray3_ph="[".$con3_ph.", ".$total3_ph."],";
	}else{
		$aarray3_ph.="[".$con3_ph.", ".$total3_ph."],";
	}

	$con3_ph++;
}
//echo $aarray3;


/*----------------------------------------Finalaza la seccion de PH------------------------------------------------*/

 ?>































<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">
		<article class="col-sm-12">
			<!-- new widget -->
			<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">

				<header>
					<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
					<h2>Grafica de Ventas Grupo Xalapa</h2>

					<ul class="nav nav-tabs pull-right in" id="myTab">
						<li class="active">
							<a data-toggle="tab" href="#s1"><!--<i class="fa fa-clock-o"></i>--><img src="img/iconos/favicon.ico" width="20px"> <span class="hidden-mobile hidden-tablet">KFC</span></a>
						</li>

						<li>
							<a data-toggle="tab" href="#s2"><!--<i class="fa fa-facebook"></i>--><img src="img/iconos/logo_dq.png" width="25px"> <span class="hidden-mobile hidden-tablet">Dairy Queen</span></a>
						</li>
						<li>
							<a data-toggle="tab" href="#s3"><!--<i class="fa fa-dollar"></i> --><img src="img/iconos/pizzahut.ico" width="25px"><span class="hidden-mobile hidden-tablet"> Pizza Hot</span></a>
						</li>
					</ul>
				</header>

				<!-- widget div-->
				<div class="no-padding">
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">

						test
					</div>
					<!-- end widget edit box -->


					<div class="widget-body">
						<!-- content -->
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade" id="s1">
								<div class="padding-10">
									<div id="statsChart1" class="chart-large has-legend-unique"></div>	
								</div>
						</div>
							<!-- end s1 tab pane -->

							<div class="tab-pane fade active in padding-10 no-padding-bottom" id="s2">
								<div class="padding-10">
									<div id="statsChart" class="chart-large has-legend-unique"></div>
								</div>

							</div>
							<!-- end s2 tab pane -->

							<div class="tab-pane fade" id="s3">
								<div class="padding-10">
									<div id="statsChart3" class="chart-large has-legend-unique"></div>
								</div>
							</div>
							<!-- end s3 tab pane -->
						</div>

						<!-- end content -->
					</div>

				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->

		</article>
	</div>

	<!-- end row -->

	<!-- row -->

	<div class="row">

		<article class="col-sm-12 col-md-12 col-lg-6">

			<!-- new widget -->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" data-widget-fullscreenbutton="false">

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



				<!-- widget div-->
				<div>


					<div class="widget-body widget-hide-overflow no-padding">
						<!-- content goes here -->

					

						<!-- CHAT BODY -->
						<div id="chat-body" class="chat-body custom-scroll">


						</div>

					

						<!-- end content -->
					</div>

				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->

			<!-- new widget -->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-colorbutton="false">

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


		</article>



	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->
















































<script type="text/javascript">


	pageSetUp();

	
	var pagefunction = function() {
			
		loadScript("js/plugin/flot/jquery.flot.cust.min.js", loadFlotResize);
		
		function loadFlotResize() {
		    loadScript("js/plugin/flot/jquery.flot.resize.min.js", loadFlotToolTip);
		}
		
		function loadFlotToolTip() {
		    loadScript("js/plugin/flot/jquery.flot.tooltip.min.js", generatePageGraphs);
		}
		






		
		function generatePageGraphs() {
		
		    /* TAB 1: UPDATING CHART */
		    // For the demo we use generated data, but normally it would be coming from the server
		
		    var data = [],
		        totalPoints = 200,
		        $UpdatingChartColors = $("#updating-chart").css('color');
		
		    function getRandomData() {
		        if (data.length > 0)
		            data = data.slice(1);
		
		        // do a random walk
		        while (data.length < totalPoints) {
		            var prev = data.length > 0 ? data[data.length - 1] : 50;
		            var y = prev + Math.random() * 10 - 5;
		            if (y < 0)
		                y = 0;
		            if (y > 100)
		                y = 100;
		            data.push(y);
		        }
		
		        // zip the generated y values with the x values
		        var res = [];
		        for (var i = 0; i < data.length; ++i)
		            res.push([i, data[i]])
		        return res;
		    }
		
		    // setup control widget
		   /* var updateInterval = 1500;
		    $("#updating-chart").val(updateInterval).change(function () {
		
		        var v = $(this).val();
		        if (v && !isNaN(+v)) {
		            updateInterval = +v;
		            $(this).val("" + updateInterval);
		        }
		
		    });
		
		    // setup plot
		    var options = {
		        yaxis: {
		            min: 0,
		            max: 100
		        },
		        xaxis: {
		            min: 0,
		            max: 100
		        },
		        colors: [$UpdatingChartColors],
		        series: {
		            lines: {
		                lineWidth: 1,
		                fill: true,
		                fillColor: {
		                    colors: [{
		                        opacity: 0.4
		                    }, {
		                        opacity: 0
		                    }]
		                },
		                steps: false
		
		            }
		        }
		    };

		
		    var plot = $.plot($("#updating-chart"), [getRandomData()], options);
		    */

		     $(function () {
		        // jQuery Flot Chart

		        var kfc_americas = [<?php echo $aarray1; ?>];
				var kfc_boulevard = [<?php echo $aarray2; ?>];
				var kfc_brisas = [<?php echo $aarray3; ?>];
				var kfc_centro = [<?php echo $aarray4; ?>];
				var kfc_dorado = [<?php echo $aarray5; ?>];
				var kfc_xalapa = [<?php echo $aarray6; ?>];


		            data = [{
		                label: "KFC Americas",
		                data: kfc_americas,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            }, {
		                label: "KFC Brisas",
		                data: kfc_brisas,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            }, {
		                label: "KFC Independencia",
		                data: kfc_centro,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            },  {
		                label: "KFC Dorado",
		                data: kfc_dorado,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            },{
		                label: "KFC Xalapa",
		                data: kfc_xalapa,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            }];
		
		        var options = {
		            grid: {
		                hoverable: true
		            },
		            colors: ["#568A89", "#3276B1"],
		            tooltip: true,
		            tooltipOpts: {
		                //content : "Value <b>$x</b> Value <span>$y</span>",
		                defaultTheme: false
		            },
		            xaxis: {
		                ticks: [ 
		                <?php echo $aarrayfecha1; ?>
		                   /* [1, "LU"],
		                    [2, "MA"],
		                    [3, "MI"],
		                    [4, "JU"],
		                    [5, "VI"],
		                    [6, "SA"],
		                    [7, "DO"],
		                    [8, "LU"],
		                    [9, "MA"],
		                    [10, "MI"],
		                    [11, "JU"],
		                    [12, "VI"],
		                    [13, "SA"]*/
		                ]
		            },
		            yaxes: {
		
		            }
		        };
		
		        var plot3 = $.plot($("#statsChart1"), data, options);
		    });


		    $(function () {
		        // jQuery Flot Chart

		        var ph_animas = [<?php echo $aarray1_ph; ?>];
				var ph_avila_camacho = [<?php echo $aarray2_ph; ?>];
				var ph_poza_rica = [<?php echo $aarray3_ph; ?>];


		            data = [{
		                label: "PH Animas",
		                data: ph_animas,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            }, {
		                label: "PH Avila",
		                data: ph_avila_camacho,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            }, {
		                label: "PH Poza Rica",
		                data: ph_poza_rica,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            }];
		
		        var options = {
		            grid: {
		                hoverable: true
		            },
		            colors: ["#568A89", "#3276B1"],
		            tooltip: true,
		            tooltipOpts: {
		                //content : "Value <b>$x</b> Value <span>$y</span>",
		                defaultTheme: false
		            },
		            xaxis: {
		                ticks: [ 
		                <?php echo $aarrayfecha1_ph; ?>
		                   /* [1, "LU"],
		                    [2, "MA"],
		                    [3, "MI"],
		                    [4, "JU"],
		                    [5, "VI"],
		                    [6, "SA"],
		                    [7, "DO"],
		                    [8, "LU"],
		                    [9, "MA"],
		                    [10, "MI"],
		                    [11, "JU"],
		                    [12, "VI"],
		                    [13, "SA"]*/
		                ]
		            },
		            yaxes: {
		
		            }
		        };
		
		        var plot3 = $.plot($("#statsChart3"), data, options);
		    });
		
		    /* live switch */
		    $('input[type="checkbox"]#start_interval').click(function () {
		        if ($(this).prop('checked')) {
		            $on = true;
		            updateInterval = 1500;
		            update();
		        } else {
		            clearInterval(updateInterval);
		            $on = false;
		        }
		    });
		
		    function update() {
		        if ($on == true) {
		            plot.setData([getRandomData()]);
		            plot.draw();
		            setTimeout(update, updateInterval);
		
		        } else {
		            clearInterval(updateInterval)
		        }
		
		    }
		
		    var $on = false;
		
		    /*end updating chart*/




		    /* TAB 2: Social Network  */
		
		    $(function () {
		        // jQuery Flot Chart

		        var kfc_americas = [<?php echo $aarray1; ?>];
				var kfc_boulevard = [<?php echo $aarray2; ?>];
				var kfc_brisas = [<?php echo $aarray3; ?>];
				var kfc_centro = [<?php echo $aarray4; ?>];
				var kfc_dorado = [<?php echo $aarray5; ?>];
				var kfc_xalapa = [<?php echo $aarray6; ?>];


		            data = [{
		                label: "KFC Americas",
		                data: kfc_americas,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            }, {
		                label: "KFC Brisas",
		                data: kfc_brisas,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            }, {
		                label: "KFC Independencia",
		                data: kfc_centro,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            },  {
		                label: "KFC Dorado",
		                data: kfc_dorado,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            },{
		                label: "KFC Xalapa",
		                data: kfc_xalapa,
		                lines: {
		                    show: true,
		                    lineWidth: 1,
		                    fill: true,
		                    fillColor: {
		                        colors: [{
		                            opacity: 0.1
		                        }, {
		                            opacity: 0.13
		                        }]
		                    }
		                },
		                points: {
		                    show: true
		                }
		            }];
		
		        var options = {
		            grid: {
		                hoverable: true
		            },
		            colors: ["#568A89", "#3276B1"],
		            tooltip: true,
		            tooltipOpts: {
		                //content : "Value <b>$x</b> Value <span>$y</span>",
		                defaultTheme: false
		            },
		            xaxis: {
		                ticks: [ 
		                <?php echo $aarrayfecha1; ?>
		                   /* [1, "LU"],
		                    [2, "MA"],
		                    [3, "MI"],
		                    [4, "JU"],
		                    [5, "VI"],
		                    [6, "SA"],
		                    [7, "DO"],
		                    [8, "LU"],
		                    [9, "MA"],
		                    [10, "MI"],
		                    [11, "JU"],
		                    [12, "VI"],
		                    [13, "SA"]*/
		                ]
		            },
		            yaxes: {
		
		            }
		        };
		
		        var plot3 = $.plot($("#statsChart"), data, options);
		    });
		
		    // END TAB 2
		

		
		    // TAB THREE GRAPH //
		    /* TAB 3: Revenew  */
		
		    $(function () {
		
		        var trgt = [
		            [1354586000000, 153],
		            [1364587000000, 658],
		            [1374588000000, 198],
		            [1384589000000, 663],
		            [1394590000000, 801],
		            [1404591000000, 1080],
		            [1414592000000, 353],
		            [1424593000000, 749],
		            [1434594000000, 523],
		            [1444595000000, 258],
		            [1454596000000, 688],
		            [1464597000000, 364]
		        ],
		            prft = [
		                [1354586000000, 53],
		                [1364587000000, 65],
		                [1374588000000, 98],
		                [1384589000000, 83],
		                [1394590000000, 980],
		                [1404591000000, 808],
		                [1414592000000, 720],
		                [1424593000000, 674],
		                [1434594000000, 23],
		                [1444595000000, 79],
		                [1454596000000, 88],
		                [1464597000000, 36]
		            ],
		            sgnups = [
		                [1354586000000, 647],
		                [1364587000000, 435],
		                [1374588000000, 784],
		                [1384589000000, 346],
		                [1394590000000, 487],
		                [1404591000000, 463],
		                [1414592000000, 479],
		                [1424593000000, 236],
		                [1434594000000, 843],
		                [1444595000000, 657],
		                [1454596000000, 241],
		                [1464597000000, 341]
		            ],
		            toggles = $("#rev-toggles"),
		            target = $("#flotcontainer");
		
		        var data = [{
		            label: "Target Profit",
		            data: trgt,
		            bars: {
		                show: true,
		                align: "center",
		                barWidth: 30 * 30 * 60 * 1000 * 80
		            }
		        }, {
		            label: "Actual Profit",
		            data: prft,
		            color: '#3276B1',
		            lines: {
		                show: true,
		                lineWidth: 3
		            },
		            points: {
		                show: true
		            }
		        }, {
		            label: "Actual Signups",
		            data: sgnups,
		            color: '#71843F',
		            lines: {
		                show: true,
		                lineWidth: 1
		            },
		            points: {
		                show: true
		            }
		        }]
		
		        var options = {
		            grid: {
		                hoverable: true
		            },
		            tooltip: true,
		            tooltipOpts: {
		                //content: '%x - %y',
		                //dateFormat: '%b %y',
		                defaultTheme: false
		            },
		            xaxis: {
		                mode: "time"
		            },
		            yaxes: {
		                tickFormatter: function (val, axis) {
		                    return "$" + val;
		                },
		                max: 1200
		            }
		
		        };
		
		        plot2 = null;
		
		        function plotNow() {
		            var d = [];
		            toggles.find(':checkbox').each(function () {
		                if ($(this).is(':checked')) {
		                    d.push(data[$(this).attr("name").substr(4, 1)]);
		                }
		            });
		            if (d.length > 0) {
		                if (plot2) {
		                    plot2.setData(d);
		                    plot2.draw();
		                } else {
		                    plot2 = $.plot(target, d, options);
		                }
		            }
		
		        };
		
		        toggles.find(':checkbox').on('change', function () {
		            plotNow();
		        });
		        plotNow()
		
		    });
		
		}
		
		/*
		 * VECTOR MAP
		 */
		
		data_array = {
		    "US": 4977,
		    "AU": 4873,
		    "IN": 3671,
		    "BR": 2476,
		    "TR": 1476,
		    "CN": 146,
		    "CA": 134,
		    "BD": 100
		};
		
		// Load Map dependency 1 then call for dependency 2
		loadScript("js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js", loadMapFile);
		
		// Load Map dependency 2 then rendeder Map
		function loadMapFile() {
		    loadScript("js/plugin/vectormap/jquery-jvectormap-world-mill-en.js", renderVectorMap);
		}
		
		function renderVectorMap() {
		    $('#vector-map').vectorMap({
		        map: 'world_mill_en',
		        backgroundColor: '#fff',
		        regionStyle: {
		            initial: {
		                fill: '#c4c4c4'
		            },
		            hover: {
		                "fill-opacity": 1
		            }
		        },
		        series: {
		            regions: [{
		                values: data_array,
		                scale: ['#85a8b6', '#4d7686'],
		                normalizeFunction: 'polynomial'
		            }]
		        },
		        onRegionLabelShow: function (e, el, code) {
		            if (typeof data_array[code] == 'undefined') {
		                e.preventDefault();
		            } else {
		                var countrylbl = data_array[code];
		                el.html(el.html() + ': ' + countrylbl + ' visits');
		            }
		        }
		    });
		}
		
		/*
		 * FULL CALENDAR JS
		 */
		
		// Load Calendar dependency then setup calendar
		loadScript("js/plugin/fullcalendar/jquery.fullcalendar.min.js", setupCalendar);
		
		function setupCalendar() {
		
		    if ($("#calendar").length) {
		        var date = new Date();
		        var d = date.getDate();
		        var m = date.getMonth();
		        var y = date.getFullYear();
		
		        var calendar = $('#calendar').fullCalendar({
		
		            editable: true,
		            draggable: true,
		            selectable: false,
		            selectHelper: true,
		            unselectAuto: false,
		            disableResizing: false,
		
		            header: {
		                left: 'title', //,today
		                center: 'prev, next, today',
		                right: 'month, agendaWeek, agenDay' //month, agendaDay,
		            },
		
		            select: function (start, end, allDay) {
		                var title = prompt('Event Title:');
		                if (title) {
		                    calendar.fullCalendar('renderEvent', {
		                            title: title,
		                            start: start,
		                            end: end,
		                            allDay: allDay
		                        }, true // make the event "stick"
		                    );
		                }
		                calendar.fullCalendar('unselect');
		            },
		
		            events: [{
		                title: 'All Day Event',
		                start: new Date(y, m, 1),
		                description: 'long description',
		                className: ["event", "bg-color-greenLight"],
		                icon: 'fa-check'
		            }, {
		                title: 'Long Event',
		                start: new Date(y, m, d - 5),
		                end: new Date(y, m, d - 2),
		                className: ["event", "bg-color-red"],
		                icon: 'fa-lock'
		            }, {
		                id: 999,
		                title: 'Repeating Event',
		                start: new Date(y, m, d - 3, 16, 0),
		                allDay: false,
		                className: ["event", "bg-color-blue"],
		                icon: 'fa-clock-o'
		            }, {
		                id: 999,
		                title: 'Repeating Event',
		                start: new Date(y, m, d + 4, 16, 0),
		                allDay: false,
		                className: ["event", "bg-color-blue"],
		                icon: 'fa-clock-o'
		            }, {
		                title: 'Meeting',
		                start: new Date(y, m, d, 10, 30),
		                allDay: false,
		                className: ["event", "bg-color-darken"]
		            }, {
		                title: 'Lunch',
		                start: new Date(y, m, d, 12, 0),
		                end: new Date(y, m, d, 14, 0),
		                allDay: false,
		                className: ["event", "bg-color-darken"]
		            }, {
		                title: 'Birthday Party',
		                start: new Date(y, m, d + 1, 19, 0),
		                end: new Date(y, m, d + 1, 22, 30),
		                allDay: false,
		                className: ["event", "bg-color-darken"]
		            }, {
		                title: 'Smartadmin Open Day',
		                start: new Date(y, m, 28),
		                end: new Date(y, m, 29),
		                className: ["event", "bg-color-darken"]
		            }],
		
		            eventRender: function (event, element, icon) {
		                if (!event.description == "") {
		                    element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description +
		                        "</span>");
		                }
		                if (!event.icon == "") {
		                    element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon +
		                        " '></i>");
		                }
		            }
		        });
		
		    };
		
		    /* hide default buttons */
		    $('.fc-header-right, .fc-header-center').hide();
		
		}
		
		// calendar prev
		$('#calendar-buttons #btn-prev').click(function () {
		    $('.fc-button-prev').click();
		    return false;
		});
		
		// calendar next
		$('#calendar-buttons #btn-next').click(function () {
		    $('.fc-button-next').click();
		    return false;
		});
		
		// calendar today
		$('#calendar-buttons #btn-today').click(function () {
		    $('.fc-button-today').click();
		    return false;
		});
		
		// calendar month
		$('#mt').click(function () {
		    $('#calendar').fullCalendar('changeView', 'month');
		});
		
		// calendar agenda week
		$('#ag').click(function () {
		    $('#calendar').fullCalendar('changeView', 'agendaWeek');
		});
		
		// calendar agenda day
		$('#td').click(function () {
		    $('#calendar').fullCalendar('changeView', 'agendaDay');
		});
		
		/*
		 * CHAT
		 */
		
		$.filter_input = $('#filter-chat-list');
		$.chat_users_container = $('#chat-container > .chat-list-body')
		$.chat_users = $('#chat-users')
		$.chat_list_btn = $('#chat-container > .chat-list-open-close');
		$.chat_body = $('#chat-body');
		
		/*
		 * LIST FILTER (CHAT)
		 */
		
		// custom css expression for a case-insensitive contains()
		jQuery.expr[':'].Contains = function (a, i, m) {
		    return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
		};
		
		function listFilter(list) { // header is any element, list is an unordered list
		    // create and add the filter form to the header
		
		    $.filter_input.change(function () {
		        var filter = $(this).val();
		        if (filter) {
		            // this finds all links in a list that contain the input,
		            // and hide the ones not containing the input while showing the ones that do
		            $.chat_users.find("a:not(:Contains(" + filter + "))").parent().slideUp();
		            $.chat_users.find("a:Contains(" + filter + ")").parent().slideDown();
		        } else {
		            $.chat_users.find("li").slideDown();
		        }
		        return false;
		    }).keyup(function () {
		        // fire the above change event after every letter
		        $(this).change();
		
		    });
		
		}
		
		// on dom ready
		listFilter($.chat_users);
		
		// open chat list
		$.chat_list_btn.click(function () {
		    $(this).parent('#chat-container').toggleClass('open');
		})
		
		$.chat_body.animate({
		    scrollTop: $.chat_body[0].scrollHeight
		}, 500);
	
	};
	
	// end pagefunction
	
	// run pagefunction on load
	pagefunction();
	
	
</script>
