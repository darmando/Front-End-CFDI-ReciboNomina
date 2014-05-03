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

$app->get('/pais/', 'obtenerPaises');
$app->get('/estado/:idPais', 'obtenerEstados');
$app->get('/municipio/:idEstado', 'obtenerMunicipios');
$app->post('/emisor', 'insertarEmisor');
$app->get('/emisores/', 'obtenerEmisores');
$app->get('/emisores/:idEmisor', 'obtenerDatosEmisor');
$app->get('/search/:query','encontrarEmisor');   // EN USO

  	function encontrarEmisor($query) {
		$sql = "SELECT * FROM emisor WHERE UPPER(nombre) LIKE :query ORDER BY nombre";
		try {
			$db = getConnection();
			$stmt = $db->prepare($sql);
			$query = "%".$query."%";  
			$stmt->bindParam("query", $query);
			$stmt->execute();
			$wines = $stmt->fetchAll(PDO::FETCH_OBJ);
			$db = null;
			echo '{"emisores": ' . json_encode($wines) . '}'; // el json se llama igual que getUsuarios para mandar los datos al mismo li
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		}
	}


function obtenerDatosEmisor($idEmisor) {
	$sql =  "SELECT * FROM emisor AS EM ". 
		    "Inner JOIN municipio as MU ON ". 
		    "EM.idMunicipio = MU.idMunicipio ".
		    "INNER JOIN estado as ES ON ".
		    "MU.idEstado = ES.idEstado ". 
		    "INNER JOIN pais as PA ON ".
		    "ES.idPais = PA.idPais ". 
		    "WHERE idEmisor = :idEmisor";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("idEmisor", $idEmisor);
		$stmt->execute();
		$emisor = $stmt->fetchObject();  
		$db = null;
		echo json_encode($emisor); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerEmisores(){
	$request = \Slim\Slim::getInstance()->request();
	$usuario = json_decode($request->getBody());
	$sql = "SELECT * FROM emisor";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$emisores = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"emisores": ' . json_encode($emisores) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function insertarEmisor(){
	$request = \Slim\Slim::getInstance()->request();
	$usuActividad = json_decode($request->getBody());
	$sql="INSERT INTO `emisor`".
		 "(`nombre`,".
		 "`rfc`,".
		 "`calle`,".
		 "`numero_exterior`,".
		 "`num_interior`,".
		 "`colonia`,".
		 "`cp`,".
		 "`telefono`,".
		 "`fax`,".
		 "`correo_electronico`,".
		 "`foto`,".
		 "`fecha_alta`,".
		 "`razon_social`,".
		 "`idMunicipio,`".
		 "`activo`)".
		 "VALUES".
		 "(:nombre ,".
		 ":rfc ,".
		 ":calle ,".
		 ":numero_exterior ,".
		 ":num_interior ,".
		 ":colonia ,".
		 ":cp ,".
		 ":telefono ,".
		 ":fax ,".
		 ":correo_electronico ,".
		 ":foto ,".
		 "NOW(),".
		 ":razon_social ,".
		 ":idMunicipio ,".
		 "1);";

	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("nombre", $usuActividad->nombre);
		$stmt->bindParam("rfc", $usuActividad->rfc);
		$stmt->bindParam("calle", $usuActividad->calle);
		$stmt->bindParam("numero_exterior", $usuActividad->numero_exterior);
		$stmt->bindParam("num_interior", $usuActividad->num_interior);
		$stmt->bindParam("colonia", $usuActividad->colonia);
		$stmt->bindParam("cp", $usuActividad->cp);
		$stmt->bindParam("telefono", $usuActividad->telefono);
		$stmt->bindParam("fax", $usuActividad->fax);
		$stmt->bindParam("correo_electronico", $usuActividad->correo_electronico);
		$stmt->bindParam("foto", $usuActividad->foto);
		$stmt->bindParam("razon_social", $usuActividad->razon_social);
		$stmt->bindParam("idMunicipio", $usuActividad->idMunicipio);
		$stmt->execute();
		$usuActividad->id = $db->lastInsertId();
		$db = null;
		echo json_encode($usuActividad); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerPaises(){
	$request = \Slim\Slim::getInstance()->request();
	$usuario = json_decode($request->getBody());
	$sql = "SELECT * FROM pais";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$paises = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"paises": ' . json_encode($paises) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function obtenerEstados($idPais){
	$request = \Slim\Slim::getInstance()->request();
	$usuario = json_decode($request->getBody());
	$sql = "SELECT * FROM estado where idPais = ".$idPais;
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$estados = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"estados": ' . json_encode($estados) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerMunicipios($idEstado){
	$request = \Slim\Slim::getInstance()->request();
	$usuario = json_decode($request->getBody());
	$sql = "SELECT * FROM municipio where idEstado = ".$idEstado;
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$municipios = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"municipios": ' . json_encode($municipios) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}



/*Ejecución de todas las apps*/
$app->run();

?>