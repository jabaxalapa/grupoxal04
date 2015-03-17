<?php 





echo $fecha_captura=$_POST['fecha_captura'];
echo $venta_total=$_POST['venta_total'];
echo $venta_voucher=$_POST['venta_voucher'];
echo $venta_orfis=$_POST['venta_orfis'];
echo $num_deposito=$_POST['num_deposito'];

for ($i=1; $i <= $num_deposito ; $i++) { 
	echo $cantidad_$i=$_POST['cantidad_'.$i];
	echo $tipo_lock_$i=$_POST['tipo_lock_'.$i];
	echo $numero_ficha_$i=$_POST['numero_ficha_'.$i];
}



 ?>
