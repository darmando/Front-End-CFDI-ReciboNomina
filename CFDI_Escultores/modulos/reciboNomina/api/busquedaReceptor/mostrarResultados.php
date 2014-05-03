<?php


function conexion(){
$con = mysql_connect("174.142.39.204","root","Guidored2013");
if (!$con){
die('Could not connect: ' . mysql_error());
}
mysql_select_db("grupo_integral", $con);
return($con);
}


$q=$_POST['q'];
$idempresa = $_POST['idempresa'];
$con=conexion();

$sql="select * from clientes where razon_social LIKE '%".$q."%' AND idempresa = ".$idempresa." ";

$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){

 echo '<b>No hay sugerencias</b>';

}else{


 while($fila=mysql_fetch_array($res)){
	echo '<ul id="ulResultListClient" class="nav nav-tabs nav-stacked"><li><a onclick="mostrarInfoReceptor('.$fila["id_cliente"].'); recibirValorEmisor('.$fila["id_cliente"].');" >'.$fila['razon_social'].'</a></li></ul>';
 }

}



?>