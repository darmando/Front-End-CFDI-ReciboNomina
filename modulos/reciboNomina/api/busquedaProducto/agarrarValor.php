<?php
header('Content-Type: text/html; charset=UTF-8'); 

function conexion(){

$con = mysql_connect("174.142.39.204","root","Guidored2013");

if (!$con){

die('Could not connect: ' . mysql_error());
}

mysql_select_db("grupo_integral", $con);

return($con);

}


$codigo=$_POST['vcod'];
//echo $codigo;
$con=conexion();

$sql="select * from clientes where id_cliente='".$codigo."'";
$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){

 echo '<b>No hay dato</b>';

}else{

 $fila=mysql_fetch_array($res);
 echo "<input type='hidden' value='".$codigo."'  id='idClienteEcontrado'  > ";

}



?>