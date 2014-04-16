<?php
//se llama la librería del framework Slim
require '../../../../Slim/Slim.php';
require '../../../../../php/connector.php';
//require '../../Slim/Middleware/HttpBasicAuth.php';

\Slim\Slim::registerAutoloader();
$app=new \Slim\Slim();
//$app->add(new HttpBasicAuth('user', 'pass'));
$app->config('debug', false);
$app->response()->header('Content-Type', 'application/json;charset=utf-8');
//se crea variable para nueva APP
//Área de API restful
$app->get('/buscadorCFDI/:folio/:idEmpresa/:idSucursal','obtenerValoresCFDI');
$app->post('/buscadorCFDI/sucursales/:idEmpresa','obtenerSelectSucursales');
$app->get('/emisor/infoEmpresa/:idEmpresa','obtenerInfoEmpresa');
$app->get('/receptor/infoReceptor/:idCliente','obtenerInfoReceptor');
$app->put('/receptor/:idCliente','actualizarReceptor');
$app->get('/paises/','mostrarPaises');
$app->get('/receptor/entidades/','mostrarEntidad');
$app->put('/conceptos/productos/:idProducto', 'actualizarProducto');
$app->post('/cfdi/','insertarCFDI');
$app->put('/cfdi/:id_cfdi','actualizarCFDI');
$app->get('/sucursal/:idempresa/:tipo_comprobante','obtenerSucursales');
$app->post('/sucursal/:idEmpresa/:idSucursal/:tipo_cfdi','obtenerFolioSucursal');
$app->get('/regimenfiscal/:idEmpresa/:idSucursal','obtenerRegimenFiscal');
$app->get('/tipo/', 'obtenerTiposCfdi');
$app->get('/moneda/','obtenerTipoMoneda');
$app->get('/metodopago/','obtenerMetodoPago');
$app->get('/formapago/','obtenerFormaPago');
$app->get('/productos/infoProducto/:idProducto','obtenerInfoProducto');
$app->post('/productos/','insertarProducto');
$app->get('/productos/:id_cfdi', 'obtenerTablaProductos');
$app->get('/productos/subtotales/:id_cfdi', 'obtenerSubTotalesYDescuento');
$app->delete('/productos/:id_producto','eliminarProducto');
$app->get('/impuestos/', 'obtenerImpuestos');
$app->post('/impuestos/:id_cfdi_detalle/:vectortrae', 'insertarImpuestos');
$app->get('/impuestos/:id', 'obtenerImpuestosPorID');
$app->get('/regimencliente/:id', 'obtenerImpuestosPorID');
/**************************ACTUALIZAR RECEPTOR****************************/
function actualizarReceptor($idCliente) {
	$request = \Slim\Slim::getInstance()->request();
	$body = $request->getBody();
	$empleado = json_decode($body);
	$sql="UPDATE `clientes` SET `rfc`=:rfc, `razon_social` = :razon_social, `calle` = :calle,`num_exterior` = :num_exterior,`num_interior` = :num_interior,`pais` = :pais,`entidad` = :entidad,`municipio` = :municipio, `localidad` = :localidad,`colonia` = :colonia, cp = :cp  WHERE `id_cliente` = :id_cliente";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("rfc", $empleado->rfc);
		$stmt->bindParam("razon_social", $empleado->razon_social);
		$stmt->bindParam("calle", $empleado->calle);
		$stmt->bindParam("num_exterior", $empleado->num_exterior);
		$stmt->bindParam("num_interior", $empleado->num_interior);
		$stmt->bindParam("pais", $empleado->pais);
		$stmt->bindParam("entidad", $empleado->entidad);
		$stmt->bindParam("municipio", $empleado->municipio);
		$stmt->bindParam("localidad", $localidad);
		$stmt->bindParam("colonia", $empleado->colonia);
		$stmt->bindParam("cp", $empleado->cp);
		$stmt->bindParam("id_cliente", $idCliente);
		$stmt->execute();
		$db = null;
		echo json_encode($empleado); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
/*******************OBTENER INFORMACION DEL SELECT BUSCADO*****************/
function obtenerSelectSucursales($idempresa){
	$sql = "SELECT su.idsucursal,su.descripcion from sucursales as su inner join sucursales_tipo_comprobante as stc on su.idsucursal = stc.idsucursal inner join tipo_comprobante as tc on stc.idtipo_comprobante = tc.idtipo_comprobante WHERE stc.idtipo_comprobante not in(2) AND su.idempresa =".$idempresa;
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$sucursalesEncontradas = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"sucursalesEncontradas": ' . json_encode($sucursalesEncontradas) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

/*******************OBTENER INFORMACION DEL CFDI BUSCADO*****************/
function obtenerValoresCFDI($folio, $idEmpresa, $idSucursal){
	$sql ="CALL CFDI_encontrar_CFDI_por_folio(".$folio.",".$idEmpresa.",".$idSucursal.",@return)";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$cfdi = $stmt->fetchObject();
		$db = null;
		echo  json_encode($cfdi);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
/***************METODO PARA OBTENER LISTA DE PAISES********************/

function obtenerSubTotalesYDescuento($id_cfdi){
		$sql ="select format((subtotal),2) as subtotal, format((subtotal_generado),2) as subtotal_generado,format((trasladado),2) as trasladado, format((retenido),2) as retenido, IFNULL((descuento),0) AS descuento, format(((subtotal - descuento + trasladado - retenido)),2) as Total, format((subtotal_generado),2) as subtotal_generado from (select sum(importe) subtotal, sum(descuento) descuento, sum(importe) - sum(descuento) subtotal_generado, IFNULL((select sum(a.importe * (porcentaje / 100)) from cfdi_detalle a, impuesto_detalle_cfdi b, impuestos i where a.id_cfdi_detalle = b.id_cfdi_detalle and a.id_cfdi = ".$id_cfdi." and b.id_impuesto = i.id_impuesto and i.tipo = 1),0) trasladado, IFNULL((select sum(a.importe * (porcentaje / 100)) from cfdi_detalle a, impuesto_detalle_cfdi b, impuestos i where a.id_cfdi_detalle = b.id_cfdi_detalle and a.id_cfdi = ".$id_cfdi." and b.id_impuesto = i.id_impuesto and i.tipo = 2),0) retenido from cfdi_detalle where id_cfdi = ".$id_cfdi.") as t"; 
		try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$totales = $stmt->fetchObject();
		$db = null;
	    echo  json_encode($totales);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

/***************METODO PARA OBTENER LISTA DE PAISES********************/
function mostrarPaises() {
	$sql = "SELECT TRIM(pa.Pais) as Pais, TRIM(pa.Descripcion) as Descripcion FROM pais as pa";
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

/***************METODO PARA OBTENER LISTA DE ENTIDAD********************/
function mostrarEntidad() {
	$sql = "SELECT TRIM(en.Pais) AS Pais, TRIM(en.Estado) AS Estado, TRIM(en.Descripcion) AS Descripcion FROM entidad as en";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$entidades = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"entidades": ' . json_encode($entidades) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
/*******************************************************************/
function obtenerTablaProductos($id_cfdi){
		$sql = "select cf.id_cfdi_detalle, cf.cantidad,un.descripcion as unidad,cf.descripcion,cf.precio,cf.descuento,cf.importe,cf.id_cfdi,cf.id_producto from cfdi_detalle as cf inner join productos as pr 	on cf.id_producto = pr.id_producto 	inner join unidades as un on pr.id_unidad = un.id_unidad	where cf.id_cfdi = ".$id_cfdi;
		try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$productos = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
	    echo '{"productos": ' . json_encode($productos) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerImpuestos(){
		$sql = "SELECT * FROM impuestos";
		try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$impuestos = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
	    echo '{"impuestos": ' . json_encode($impuestos) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerInfoProducto($idProducto){
	$sql = "SELECT pr.id_producto,pr.descripcion, IFNULL(FORMAT((pr.precio),0),0) as precio,pr.id_unidad , un.descripcion as unidad_descripcion FROM productos as pr inner join unidades as un on un.id_unidad = pr.id_unidad  WHERE pr.id_producto =".$idProducto;
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$producto = $stmt->fetchObject();
		$db = null;
		echo  json_encode($producto);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerFormaPago(){
	$sql = "SELECT * FROM tipo_forma_pago";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$formasPago = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"formasPago": ' . json_encode($formasPago) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerMetodoPago(){
	$sql = "SELECT * FROM tipo_metodo_pago";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$metodosPago = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"metodosPago": ' . json_encode($metodosPago) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerTipoMoneda(){
	$sql = "SELECT * FROM moneda";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$tipos_moneda = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"tipos_moneda": ' . json_encode($tipos_moneda) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerInfoReceptor($idCliente){
	$sql = "SELECT TRIM(cl.razon_social) as razon_social,TRIM(cl.rfc) as rfc,TRIM(cl.calle) as calle,TRIM(cl.num_exterior) as num_exterior,TRIM(cl.num_interior) as num_interior,TRIM(cl.colonia) as colonia, TRIM(cl.localidad) as localidad,TRIM(cl.municipio) as municipio,TRIM(cl.entidad) as entidad,TRIM(cl.pais) as pais,TRIM(cl.cp) as cp FROM CLIENTES AS cl WHERE id_cliente=".$idCliente;
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$detalles = $stmt->fetchObject();
		$db = null;
		echo  json_encode($detalles);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerTiposCfdi(){
	$sql = "SELECT * FROM TIPO_COMPROBANTE";
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


function obtenerSucursales($idempresa,$tipo_comprobante){
	$sql = "SELECT su.idsucursal,su.descripcion from sucursales as su inner join sucursales_tipo_comprobante as stc on su.idsucursal = stc.idsucursal inner join tipo_comprobante as tc on stc.idtipo_comprobante = tc.idtipo_comprobante WHERE tc.idtipo_comprobante = ".$tipo_comprobante." AND su.idempresa =".$idempresa;
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$sucursales = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"sucursales": ' . json_encode($sucursales) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerFolioSucursal($idEmpresa, $idSucursal, $tipo_cfdi){
	$sql = "CALL `CFDI_Calcular_Folios`(".$idEmpresa.", ".$idSucursal.",".$tipo_cfdi.",@return)";  // SE MANDA 0 PORQUE NO ES UN RECIBO DE NOMINA 
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$folio = $stmt->fetchObject();
		$db = null;
		echo json_encode($folio);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}


function insertarCFDI(){
 $prueba = '';
 $UUIDDET = 1;
	$request = \Slim\Slim::getInstance()->request();
	$cfdi = json_decode($request->getBody());
	//echo $prueba.'|'.$cfdi->folio_internoDET.'|'.$UUIDDET.'|'.$cfdi->serieDET.'|'.$cfdi->fechaDET.'|'.$cfdi->sucursalDET.'|'.$cfdi->lugar_expedicionDET.'|'.$cfdi->ffo_uuidDET.'|'.$cfdi->ffo_uuidDET.'|'.$cfdi->ffo_uuidDET.'|'.$cfdi->sffoDET.'|'.$cfdi->fffoDET.'|'.$cfdi->mffoDET.'|'.$cfdi->condiciones_pagoDET.'|'.$cfdi->motivoDescuentoDET.'|'.$cfdi->tipo_cambioDET.'|'.$cfdi->fecha_tipo_cambioDET.'|'.$cfdi->tipo_CDFI_ID.'|'.$cfdi->tipoMonedaID.'|'.$cfdi->tipoFormaPagoID.'|'.$cfdi->tipoMetodoPagoID.'|'.$cfdi->sucursalID.'|'.$cfdi->clienteID.'|'.$cfdi->tipoaccionDET ;
	$sql="CALL CFDI_insert_update( :cfdiID, :folio_internoDET, :serieDET, :fechaDET,:lugar_expedicionDET,:ffo_uuidDET,:sffoDET,:fffoDET,:mffoDET, :condiciones_pagoDET, :motivoDescuentoDET, :tipo_cambioDET, :fecha_tipo_cambioDET, :cuenta, :parcialidad1, :parcialidad2, :tipoMonedaID, :tipoMetodoPagoID, :tipoFormaPagoID, :sucursalID, :clienteID, :pais, :tipoaccionDET, @return);";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("cfdiID", $cfdi->cfdiID);
		$stmt->bindParam("folio_internoDET", $cfdi->folio_internoDET);
		$stmt->bindParam("serieDET", $cfdi->serieDET);
		$stmt->bindParam("fechaDET", $cfdi->fechaDET);
		$stmt->bindParam("lugar_expedicionDET", $cfdi->lugar_expedicionDET);
		$stmt->bindParam("ffo_uuidDET", $cfdi->ffo_uuidDET);
		$stmt->bindParam("sffoDET", $cfdi->sffoDET);
		$stmt->bindParam("fffoDET", $cfdi->fffoDET);
		$stmt->bindParam("mffoDET", $cfdi->mffoDET);
		$stmt->bindParam("condiciones_pagoDET", $cfdi->condiciones_pagoDET);
		$stmt->bindParam("motivoDescuentoDET", $cfdi->motivoDescuentoDET);
		$stmt->bindParam("tipo_cambioDET", $cfdi->tipo_cambioDET);
		$stmt->bindParam("fecha_tipo_cambioDET", $cfdi->fecha_tipo_cambioDET);
		$stmt->bindParam("cuenta", $cfdi->cuenta);
		$stmt->bindParam("parcialidad1", $cfdi->parcialidad1);
		$stmt->bindParam("parcialidad2", $cfdi->parcialidad2);
		$stmt->bindParam("tipoMonedaID", $cfdi->tipoMonedaID);
		$stmt->bindParam("tipoFormaPagoID", $cfdi->tipoFormaPagoID);
		$stmt->bindParam("tipoMetodoPagoID", $cfdi->tipoMetodoPagoID);
		$stmt->bindParam("sucursalID", $cfdi->sucursalID);
		$stmt->bindParam("clienteID", $cfdi->clienteID);
		$stmt->bindParam("pais", $cfdi->pais);
		$stmt->bindParam("tipoaccionDET", $cfdi->tipoaccionDET);
		$stmt->execute();
		$resultSet = $stmt->fetchObject();
		$db = null;	
		echo json_encode($resultSet); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function actualizarCFDI($id_cfdi){
$prueba = '';
 $UUIDDET = 1;
	$request = \Slim\Slim::getInstance()->request();
	$cfdi = json_decode($request->getBody());
	//echo $prueba.'|'.$cfdi->folio_internoDET.'|'.$UUIDDET.'|'.$cfdi->serieDET.'|'.$cfdi->fechaDET.'|'.$cfdi->sucursalDET.'|'.$cfdi->lugar_expedicionDET.'|'.$cfdi->ffo_uuidDET.'|'.$cfdi->ffo_uuidDET.'|'.$cfdi->ffo_uuidDET.'|'.$cfdi->sffoDET.'|'.$cfdi->fffoDET.'|'.$cfdi->mffoDET.'|'.$cfdi->condiciones_pagoDET.'|'.$cfdi->motivoDescuentoDET.'|'.$cfdi->tipo_cambioDET.'|'.$cfdi->fecha_tipo_cambioDET.'|'.$cfdi->tipo_CDFI_ID.'|'.$cfdi->tipoMonedaID.'|'.$cfdi->tipoFormaPagoID.'|'.$cfdi->tipoMetodoPagoID.'|'.$cfdi->sucursalID.'|'.$cfdi->clienteID.'|'.$cfdi->tipoaccionDET ;
	$sql="CALL CFDI_insert_update( :cfdiID , :folio_internoDET, :serieDET, :fechaDET,:lugar_expedicionDET,:ffo_uuidDET,:sffoDET,:fffoDET,:mffoDET, :condiciones_pagoDET, :motivoDescuentoDET, :tipo_cambioDET, :fecha_tipo_cambioDET, :cuenta, :parcialidad1, :parcialidad2, :tipoMonedaID, :tipoMetodoPagoID, :tipoFormaPagoID, :sucursalID, :clienteID, :pais, :tipoaccionDET, @return);";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("cfdiID", $id_cfdi);
		$stmt->bindParam("folio_internoDET", $cfdi->folio_internoDET);
		$stmt->bindParam("serieDET", $cfdi->serieDET);
		$stmt->bindParam("fechaDET", $cfdi->fechaDET);
		$stmt->bindParam("lugar_expedicionDET", $cfdi->lugar_expedicionDET);
		$stmt->bindParam("ffo_uuidDET", $cfdi->ffo_uuidDET);
		$stmt->bindParam("sffoDET", $cfdi->sffoDET);
		$stmt->bindParam("fffoDET", $cfdi->fffoDET);
		$stmt->bindParam("mffoDET", $cfdi->mffoDET);
		$stmt->bindParam("condiciones_pagoDET", $cfdi->condiciones_pagoDET);
		$stmt->bindParam("motivoDescuentoDET", $cfdi->motivoDescuentoDET);
		$stmt->bindParam("tipo_cambioDET", $cfdi->tipo_cambioDET);
		$stmt->bindParam("fecha_tipo_cambioDET", $cfdi->fecha_tipo_cambioDET);
		$stmt->bindParam("cuenta", $cfdi->cuenta);
		$stmt->bindParam("parcialidad1", $cfdi->parcialidad1);
		$stmt->bindParam("parcialidad2", $cfdi->parcialidad2);
		$stmt->bindParam("tipoMonedaID", $cfdi->tipoMonedaID);
		$stmt->bindParam("tipoFormaPagoID", $cfdi->tipoFormaPagoID);
		$stmt->bindParam("tipoMetodoPagoID", $cfdi->tipoMetodoPagoID);
		$stmt->bindParam("sucursalID", $cfdi->sucursalID);
		$stmt->bindParam("clienteID", $cfdi->clienteID);
		$stmt->bindParam("pais", $cfdi->pais);
		$stmt->bindParam("tipoaccionDET", $cfdi->tipoaccionDET);
		$stmt->execute();
		$resultSet = $stmt->fetchObject();
		$db = null;	
		echo json_encode($resultSet); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerInfoEmpresa($idEmpresa){
	$sql ="SELECT TRIM(em.idempresa) AS idempresa,TRIM(em.rfc) as rfc,TRIM(em.razonsocial) as razonsocial,TRIM(em.calle) as calle,TRIM(em.num_exterior) as num_exterior,TRIM(em.num_interior) as num_interior,TRIM(em.colonia) as colonia,TRIM(em.localidad) as localidad,TRIM(em.municipio) as municipio,TRIM(em.entidad) as entidad,TRIM(em.pais) as pais,TRIM(em.cp) as cp,TRIM(em.registro_patronal_nomina) as registro_patronal_nomina, CONCAT(em.idempresa,'/',em.logotipo) as logotipo FROM EMPRESAS AS em where em.idempresa =".$idEmpresa;

	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$clientes = $stmt->fetchObject();
		$db = null;
		echo  json_encode($clientes);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerRegimenFiscal($idEmpresa, $idSucursal){
	$sql ="SELECT TRIM(rf.id_regimen_fiscal) AS id_regimen_fiscal, TRIM(rf.descripcion) AS descripcion FROM sucursales as su inner join empresas as em on su.idempresa = em.idempresa inner join empresas_has_regimen_fiscal as erf on em.idempresa = erf.idempresa inner join regimen_fiscal as rf on erf.id_regimen_fiscal = rf.id_regimen_fiscal where su.idsucursal = ".$idSucursal." and su.idempresa =".$idEmpresa;
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$regimen_fiscal = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
	    echo '{"regimen_fiscal": ' . json_encode($regimen_fiscal) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function insertarProducto(){
$request = \Slim\Slim::getInstance()->request();
	$producto = json_decode($request->getBody());
	$sql = "CALL `sp_CFDI_update_o_insert_cfdi_detalle`( '', :cantidadDET, :unidadDET, :descripcionDET, :precioDET, :descuentoDET, :importeDET, :id_cfdiID, :productoID, :tipoaccion, @return);";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql); 
		$stmt->bindParam("cantidadDET", $producto->cantidadDET);
		$stmt->bindParam("unidadDET", $producto->unidadDET);
		$stmt->bindParam("precioDET", $producto->precioDET);
		$stmt->bindParam("descuentoDET", $producto->descuentoDET);
		$stmt->bindParam("importeDET", $producto->importeDET);
		$stmt->bindParam("descripcionDET", $producto->descripcionDET);
		$stmt->bindParam("id_cfdiID", $producto->id_cfdiID);
		$stmt->bindParam("productoID", $producto->productoID);
		$stmt->bindParam("tipoaccion", $producto->tipoaccion);
		$stmt->execute();
		$resultado = $stmt->fetchObject();
		$db = null;	
		echo json_encode($resultado); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function obtenerImpuestosPorID($id_cfdi){ 
	$sql = "select i.tipo,i.descripcion,i.porcentaje,format(sum(a.importe*(porcentaje/100)),2) as totalImpuesto from cfdi_detalle a, impuesto_detalle_cfdi b, impuestos i where a.id_cfdi_detalle=b.id_cfdi_detalle and a.id_cfdi=".$id_cfdi." and b.id_impuesto=i.id_impuesto group by i.id_impuesto";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  	
		$listaImpuestos = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
	    echo '{"listaImpuestos": ' . json_encode($listaImpuestos) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}


function insertarImpuestos($id_cfdi_detalle, $vectortrae){
	$ArrayimpuestosRetenido = explode(",", $vectortrae);
	foreach ($ArrayimpuestosRetenido as $valor) {
	 $sql = "INSERT INTO `impuesto_detalle_cfdi`(`id_cfdi_detalle`, `id_impuesto`) VALUES ('".$id_cfdi_detalle."', '".$valor."');";
	  try {
	    	$db = getConnection();
			$stmt = $db->prepare($sql); 							
			$stmt->execute();		
			$db = null;					
			echo '{"exitoso":{"text":"exitoso"}}';
		   } catch (PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		   }
	}
}	
function eliminarProducto($id_producto) {
	$sql = "DELETE FROM cfdi_detalle WHERE id_cfdi_detalle=".$id_producto;
	$sqlEliminarImpuestos = "DELETE FROM `impuesto_detalle_cfdi` WHERE `id_cfdi_detalle`=".$id_producto;
	try {
		$db = getConnection();
		$stmt = $db->prepare($sqlEliminarImpuestos);  
		$stmt->execute();
		$stmt = $db->prepare($sql);  
		$stmt->execute();
		$db = null;
		echo '{"exitoso":{"text":"exitoso"}}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}


function actualizarProducto($idProducto){
$request = \Slim\Slim::getInstance()->request();
	$producto = json_decode($request->getBody());
	$sql = " :rfc, :razon_social, :calle, :num_interior, :num_exterior, :colonia, :localidad, :municipio, :entidad, :pais,:cp, :idempresa, :tipoaccion, @return);";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("concepto_descuento_general", $producto->concepto_descuento_general);
		$stmt->bindParam("concepto_identificacion", $producto->concepto_identificacion);
		$stmt->bindParam("cantidad", $producto->cantidad);
		$stmt->bindParam("concepto_unidad", $producto->concepto_unidad);
		$stmt->bindParam("concepto_precio_unitario", $producto->concepto_precio_unitario);
		$stmt->bindParam("concepto_descuento", $producto->concepto_descuento);
		$stmt->bindParam("concepto_importe", $producto->concepto_importe);
		$stmt->bindParam("concepto_descripcion", $producto->concepto_descripcion);
		$stmt->execute();
		$resultSet = $stmt->fetchObject();
		$db = null;	
		echo json_encode($resultSet); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}




/*Ejecución de todas las apps*/
$app->run();

?>