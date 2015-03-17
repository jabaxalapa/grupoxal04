<?php 
  class Conexion{

  function dqmontemagno(){
    $con=mssql_connect('dqmontemagno.dyndns.org\AASA','sa','Dpt.sgx2013'); 
    $con=mssql_select_db('DQ14', $con);
    return $con;
  }

  function dqsantalucia(){
    $con=mssql_connect('dqsantalucia.dyndns.org','sa','Dpt.sgx2013'); 
    $con=mssql_select_db('DQ14', $con);
    return $con;
  }

  function dqeldorado(){
    $con=mssql_connect('dqeldorado.dyndns.org\AASA','sa','Dpt.sgx2013'); 
    $con=mssql_select_db('DQ14', $con);
    return $con;
  }

  function dqveracruz(){
    $con=mssql_connect('dqveracruz.dyndns.org\AASA','sa','Dpt.sgx2013'); 
    $con=mssql_select_db('DQ14', $con);
    return $con;
  }

}

class DqSucursales extends Conexion{
  function consulta($sucursal){
    $conexion=$this->$sucursal();
    //$fec=date("Y-m-d");
    //$fec = "2015-01-12";
    //$fecha=$fec." 00:00:00";

    $suma_total=0;
$suma_cantidad=0;
$suma_preciou=0;
    $fecha = "2015-01-10 00:00:00";


      $sqlmm="SELECT P.Descripcion AS Des, COUNT(Cant) cantidad, SUM(PU) AS supu  FROM RE_Platillos P INNER JOIN RE_RemisionesLinea R ON P.Cod=R.Cod WHERE R.fecha='$fecha' AND PU > 0 GROUP BY P.Descripcion ORDER BY cantidad DESC ";
      $querymm=mssql_query($sqlmm);
      $num_reg=mssql_num_rows($querymm);

     while ($rowmm=mssql_fetch_array($querymm)) {
        $cantidad=$rowmm['cantidad'];
        $sup=$rowmm['supu'];
        $descripcion=$rowmm['Des'];
        
        $multiplicacion=$cantidad*$sup;
        $suma_total+=$multiplicacion;
        $suma_cantidad+=$cantidad;
        $suma_preciou+=$sup;
      }

      echo $cantidad."<br>";
      echo $suma_total."<br>";
      echo $suma_cantidad."<br>";
      echo $suma_preciou."<br>";
      echo "<hr>";

  }



 function main(){

    //$myArray=array('dqmontemagno','dqsantalucia','dqeldorado','dqveracruz'); 
   // $myArray=array('dqmontemagno','dqeldorado','dqveracruz');
    $sucursales['dqmontemagno'] = "DQ Monte Magno";
    $sucursales['dqsantalucia'] = "DQ Santa Lucia";
    $sucursales['dqeldorado'] = "DQ Dorado";
    $sucursales['dqveracruz'] = "DQ Veracruz";


     

    $resultado="";
    foreach ($sucursales as $curusal => $nombre) {
      $resultado.=$this->consulta($curusal);
    }

  }

}
$reporte=new DqSucursales();
$reporte->main();



 ?>