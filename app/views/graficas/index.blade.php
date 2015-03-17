@if(Auth::check())

<?php require_once("inc/init.php");

$conexion=mysqli_connect('localhost','root','HEwFUiiHbr','grupoxalapa');

$qut4="SELECT MAX(fechaRep) AS fecha FROM kfc_americas";
  $aa=mysqli_query($conexion,$qut4);
  $rrr=mysqli_fetch_array($aa);
  $feccc=$rrr['fecha'];
$nuevafecha = strtotime ( '-10 day' , strtotime ( $feccc ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
//echo $nuevafecha;



/*----------------------------------------Inicializa la seccion de KFC------------------------------------------------*/
$qu1="SELECT cobCajeEfectivo, fechaRep FROM kfc_americas WHERE fechaRep>'$nuevafecha' ORDER BY fechaRep DESC";
$query1=mysqli_query($conexion,$qu1)or die(mysqli_error($conexion));
$nu1=mysqli_num_rows($query1);




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




$qu3="SELECT cobCajeEfectivo, fechaRep FROM kfc_brisas WHERE fechaRep>'$nuevafecha' ORDER BY fechaRep DESC  ";
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






$qu4="SELECT cobCajeEfectivo, fechaRep FROM kfc_independencia WHERE fechaRep>'$nuevafecha' ORDER BY fechaRep DESC  ";
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



$qu5="SELECT cobCajeEfectivo, fechaRep FROM kfc_dorado WHERE fechaRep>'$nuevafecha' ORDER BY fechaRep DESC  ";
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






$qu6="SELECT cobCajeEfectivo, fechaRep FROM kfc_xalapa WHERE fechaRep>'$nuevafecha' ORDER BY fechaRep DESC ";
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
$qu1_ph="SELECT cobCajeEfectivo, fechaRep FROM ph_animas WHERE fechaRep>'$nuevafecha' ORDER BY fechaRep DESC ";
$query1_ph=mysqli_query($conexion,$qu1_ph)or die(mysqli_error($conexion));
$nu1_ph=mysqli_num_rows($query1_ph);



$con1_ph=1;
while ($row1_ph=mysqli_fetch_array($query1_ph)) {
  $total1_ph=$row1_ph['cobCajeEfectivo'];
  $fecha1_ph=$row1_ph['fechaRep'];

  if($con1_ph==1){
    $aarray1_ph="[".$con1_ph.", ".$total1_ph."],";
  }else{
    $aarray1_ph.="[".$con1_ph.", ".$total1_ph."],";
  }



   $Y=date("Y", strtotime($fecha1_ph));
   $d=date("d", strtotime($fecha1_ph));
   $m=date("m", strtotime($fecha1_ph));

  $diaSemana = diaSemana($Y,$m,$d);
  //echo $diaSemana;

  if($con1_ph==1){
    $aarrayfecha1_ph="[".$con1_ph.", \" ".$diaSemana." ".$d."\"],";
  }else{
    $aarrayfecha1_ph.="[".$con1_ph.", \"".$diaSemana." ".$d."\"],";
  }

  
  $con1_ph++;
}
//echo $aarray1;
 $aarrayfecha1_ph;



$qu2_ph="SELECT cobCajeEfectivo, fechaRep FROM ph_avila_camacho WHERE fechaRep>'$nuevafecha' ORDER BY fechaRep DESC ";
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






$qu3_ph="SELECT cobCajeEfectivo, fechaRep FROM ph_poza_rica WHERE fechaRep>'$nuevafecha' ORDER BY fechaRep DESC ";
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

/*
$nombre_tienda="dqmontemagno";
$server = 'DQ14.dyndns.org\AASA';

$con=mssql_connect($server,'sa','Dpt.sgx2013'); 
$d=mssql_select_db('DQ14', $con); 



echo $fecha=date('Y-m-d')." 00:00:00";

$sqlmm="SELECT P.Descripcion AS Des, COUNT(Cant) cantidad, SUM(PU) AS supu FROM RE_Platillos P INNER JOIN RE_RemisionesLinea R ON P.Cod=R.Cod WHERE R.fecha='$fecha' AND P.CodAlfa<5000  GROUP BY P.Descripcion ORDER BY supu DESC ";
$querymm=mssql_query($sqlmm);
echo $num_reg=mssql_num_rows($querymm);
$acodq=1;
while ($rowmm=mssql_fetch_array($querymm)) {
  //echo " CodAlfa: ".$row['CodAlfa'];  
  echo $descripcion=$rowmm['Des'];
  echo $suma=$rowmm['supu'];
  echo $cuenta=$rowmm['cantidad'];
  //echo "Folio: ".$row['Folio'];
//  echo " Descriocion: ".$row['Des'];
  //echo " Precio: ".$row['PU']."<br>";
//  echo " Suma: ".$row['supu'];  

    

  if($acodq==1){
    $tot="{x: '".$descripcion." - $".$suma."', y: ".$cuenta." },";  
  }else{
    $tot.="{x: '".$descripcion." - $".$suma."', y: ".$cuenta." },";
  }
$acodq++;
}

echo "Este es el to ".$tot;
*/
?>

<div class="row">
  <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
    <h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span> My Dashboard</span></h1>
  </div>


</div>
<!-- widget grid -->
<section id="widget-grid" class="">

  <!-- row -->
  <div class="row">
    <article class="col-sm-12">
      <!-- new widget -->
      <div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">

        <header>
          <span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
          <h2>Graficas Grupo Xalapa </h2>

          <ul class="nav nav-tabs pull-right in" id="myTab">
            <li class="active">
              <a data-toggle="tab" href="#s1"><img src="img/iconos/favicon.ico" width="20px"> <span class="hidden-mobile hidden-tablet">KFC</span></a>
            </li>
            <li>
              <a data-toggle="tab" href="#s2"><img src="img/iconos/pizzahut.ico" width="25px"><span class="hidden-mobile hidden-tablet"> Pizza Hut</span></a>
            </li>
            <li>
              <a data-toggle="tab" href="#s3"><img src="img/iconos/logo_dq.png" width="25px"> <span class="hidden-mobile hidden-tablet">Dairy Queen</span></a>
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





              <!--KFC -->
              <div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
                <div class="row no-space">
                    <div id="statsChartKFC" class="chart-large has-legend-unique">KFC</div>
                </div>
              </div>
              <!-- end s1 tab pane -->



              <!--PIZZA HUT-->
              <div class="tab-pane fade" id="s2">
                <div class="padding-10">
                  <div id="statsChartPH" class="chart-large has-legend-unique">PH</div>
                </div>
              </div>
              <!-- end s2 tab pane -->



              <!--Dary QUEEN-->
              <div class="tab-pane fade" id="s3">
                <div class="padding-10">
                  <!--<div id="flotcontainer" class="chart-large has-legend-unique"></div>-->
                  <!--<div id="statsChartDQ" class="chart-large has-legend-unique">DQ</div>-->
                  <!--<div id="bar-graph" class="chart-large no-padding"></div>-->
                </div>
                
              </div>
              <!-- end s3 tab pane -->



<!--
<div id="bar-graph" class="chart no-padding"></div>-->













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
      <!--<div id="bar-graph" class="chart no-padding"></div>-->
    </article>

    <article class="col-sm-12 col-md-12 col-lg-6">
    </article>

  </div>



</section>




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
      

      //Grafica de KFC
       // $(function () {
            var kfc_americas = [<?php echo $aarray1; ?>];

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
                },  {
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
                    defaultTheme: false
                },
                xaxis: {
                    ticks: [<?php echo $aarrayfecha1; ?>]
                },
                yaxes: {
    
                }
            };
    
            var plot3 = $.plot($("#statsChartKFC"), data, options);
           
        //});








      //Grafica de PH
        //$(function () {
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
                    defaultTheme: false
                },
                xaxis: {
                    ticks: [<?php echo $aarrayfecha1_ph; ?>]
                },
                yaxes: {
    
                }
            };
    
            var plot3 = $.plot($("#statsChartPH"), data, options);
        //});










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








  };






  pagefunction(); 




/****Grafica de Barras***/


  var pagefunction2 = function() {

    if ($('#bar-graph').length){ 
      
      Morris.Bar({
        element: 'bar-graph',
        data: [

          {x: '2011 Q1', y: 0},
          {x: '2011 Q2', y: 1},
          {x: '2011 Q3', y: 2},
          {x: '2011 Q4', y: 3},
          {x: '2012 Q1', y: 4},
          {x: '2012 Q2', y: 5},
          {x: '2012 Q3', y: 6},
          {x: '2012 Q4', y: 7},
          {x: '2013 Q1', y: 8}],

        xkey: 'x',
        ykeys: ['y'],
        labels: ['Cantidad'],
        barColors: function (row, series, type) {
          if (type === 'bar') {
            var red = Math.ceil(150 * row.y / this.ymax);
            return 'rgb(' + red + ',0,0)';
          }
          else {
            return '#000';
          }
        }
      });
    
    }
  };  

    // Load morris dependencies and run pagefunction
  loadScript("js/plugin/morris/raphael.min.js", function(){
    loadScript("js/plugin/morris/morris.min.js", pagefunction2);
  });



</script>

@endif