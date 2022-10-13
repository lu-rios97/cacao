<?php 
$contrasena = "9r1vJdpMbzJrf1md45gg";
$usuario = "uhuokqqyezux4t8n";
$nombre_bd = "beqwb29khwketxj13qor";

try {
	$bd = new PDO (
		'mysql:host=beqwb29khwketxj13qor-mysql.services.clever-cloud.com;
		beqwb29khwketxj13qor='.$nombre_bd,
		$usuario,
		$contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>