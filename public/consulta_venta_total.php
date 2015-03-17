<?php 
//$conexion=mysqli_connect('localhost','root','crmauto1','grupoxalapa');
$conexion=mysqli_connect('localhost','root','crmauto1','grupoxalapa');

if (isset($_GET['date'])){
	
	$fecha=$_GET['date'];
	$id_sucursal=$_GET['id_sucursal'];
	$sucursal=$_GET['sucursal'];
	$fecha_actual=date('Y-m-d');

	if (strtotime($fecha)<=strtotime($fecha_actual)) {

		//consulta vouchaer

		$query_income=mysqli_query($conexion,"SELECT id FROM incomes WHERE `date`='$fecha' and `id_branch`='$id_sucursal' ");

		$existe_income=mysqli_num_rows($query_income);

		if($existe_income<=0){
			$query=mysqli_query($conexion,"SELECT cobCajeEfectivo,gaTotalReCliente FROM $sucursal WHERE fechaRep='$fecha' ");
				$fila=mysqli_fetch_array($query);
				//echo $fila['cobCajeEfectivo'];
				echo $ventaTotal = $fila['cobCajeEfectivo'] - $fila['gaTotalReCliente']; 	
		}else{
			echo "ya_existe";
		}
	}else{
		echo "fecha_futura";
	}

}
?>