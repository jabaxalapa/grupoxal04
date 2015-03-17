<?php 
class Conexion_BD{
private $dbhost = 'localhost';
private $dbuser = 'root';
private $dbpass = 'crmauto1';
private $dbname = 'grupoxalapa';

	public function Conenecta() {
		$link_id = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
		mysqli_set_charset($link_id, "utf8");
		if ($link_id ->connect_error) {
			echo "Error de Connexion// ($link_id->connect_errno)
			$link_id->connect_error\n";
			header('Location: error-conexion.php');
			exit;
		} else {
			return $link_id;
		}
	}
}




class Checa_Guarda extends Conexion_BD{

	function image_exists($url,$suc)
	{
		$conexion=$this->Conenecta();

	    if(getimagesize($url)){
	    	echo "SIII-->>";	
	    		$query=mysqli_query($conexion,"UPDATE status SET status='1' WHERE id_sucursal='$suc'")or die(mysqli_error($conexion));	    		
	    }else{
	        echo "NOO--->>";
	        $query=mysqli_query($conexion,"UPDATE status SET status='0' WHERE id_sucursal='$suc'")or die(mysqli_error($conexion));
	 }
	}
}





$consulta = new Checa_Guarda();

$kfcxalapa=$consulta->image_exists('http://kfcxalapa.dyndns.org/reporteador/tricon/images/newlogo4.jpg',1);
$kfcamericas=$consulta->image_exists('http://kfcamericas.dyndns.org/reporteador/tricon/images/newlogo4.jpg',2);
$kfcbrisas=$consulta->image_exists('http://kfcbrisas.dyndns.org/reporteador/tricon/images/newlogo4.jpg',3);
$kfcindependencia=$consulta->image_exists('http://kfcindependencia.dyndns.org/reporteador/images/newlogo4.jpg',4);
$kfcdorado=$consulta->image_exists('http://kfcdorado.dyndns.org/reporteador/images/newlogo4.jpg',5);
$kfcboule=$consulta->image_exists('http://kfcboule.dyndns.org/reporteador/tricon/images/newlogo4.jpg',6);
$phanimas=$consulta->image_exists('http://phanimas.dyndns.org/reporteador/tricon/images/newlogo4.jpg',7);
$phavila=$consulta->image_exists('http://phavila.dyndns.org/reporteador/tricon/images/newlogo4.jpg',8);
$phpozarica=$consulta->image_exists('http://phpozarica.dyndns.org/reporteador/tricon/images/newlogo4.jpg',9);

?>