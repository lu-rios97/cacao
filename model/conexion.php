<?php 
$contrasena = "yhrl2Gnr1Y4DDswbjilx";
$usuario = "uixlomrvj0wuf5wx";
$nombre_bd = "baugdpok0nt0ypdbsita";

try {
	$bd = new PDO (
		'mysql:host=baugdpok0nt0ypdbsita-mysql.services.clever-cloud.com;
		baugdpok0nt0ypdbsita='.$nombre_bd,
		$usuario,
		$contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>