<?php
//se llama la librería del framework Slim
//header('Access-Control-Allow-Origin: *');
require '../../Slim/Slim.php';
require '../../../php/connector.php';
//require '../../Slim/Middleware/HttpBasicAuth.php';

\Slim\Slim::registerAutoloader();
$app=new \Slim\Slim();
//$app->add(new HttpBasicAuth('user', 'pass'));
$app->config('debug', false);
$app->response()->header('Content-Type', 'application/json;charset=utf-8');
//se crea variable para nueva APP
//Área de API restful

$app->get('/tipo/', 'obtenerTiposCfdi');


function obtenerTiposCfdi(){
	$request = \Slim\Slim::getInstance()->request();
	$usuario = json_decode($request->getBody());
	$sql = "SELECT * FROM cat_tipo_cfdi WHERE NOT id_tipo_cfdi IN(10)";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$tipos_cfdi = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"tipos_cfdi": ' . json_encode($tipos_cfdi) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}



/*Ejecución de todas las apps*/
$app->run();

?>