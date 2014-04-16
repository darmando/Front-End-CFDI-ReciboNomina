<?php
//Área de conexión a base de datos
function getConnection() {

	/*$dbhost="redmkt.com.mx";
	$dbuser="u129844_root";
	$dbpass="Guidored01";
	$dbname="u1298844_gastosv2";*/
	$dbhost="127.0.0.1:3306";
	$dbuser="root";
	$dbpass="";
	$dbname="escultores_web";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh -> exec("set names utf8");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}
?>

