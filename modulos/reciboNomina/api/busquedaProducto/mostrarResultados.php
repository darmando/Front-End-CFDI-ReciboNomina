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


$q=$_POST['q'];
$idempresa=$_POST['idempresa'];
$con=conexion();

$sql="select * from productos where descripcion LIKE '%".$q."%' AND tipo_cfdi = 1 AND idempresa=".$idempresa."; ";

$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){

 echo '<b>No hay sugerencias</b>';

}else{


 while($fila=mysql_fetch_array($res)){
	echo '<ul id="ulResultListClient" class="nav nav-tabs nav-stacked"><li><a onclick="mostrarInfoProducto('.$fila["id_producto"].'); RecibirProductoEncontrado('.$fila["id_producto"].');" >'.sanear_string($fila['descripcion']).'</a></li></ul>';
 }


// onclick="myFunction2("'.$fila["id_producto"].'")


}


function sanear_string($string)
{

    $string = trim($string);

    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );

    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );

    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );

    return $string;
}

?>