<?php
header("Content-type: text/plain; charset=iso-8859-1");
ob_end_clean();
//require('fpdf.php'); //para crear el pdf
require('numero_a_letra.php'); // funcion para convertir el total a letra
require('nusoap-0.9.5/lib/nusoap.php');
require('../../../../../../php/connector.php');
// ======================================CONEXION A LAS BD
 $conexión = mysql_connect("174.142.39.204", "root", "Guidored2013");
if (!$conexión) {
    echo "No pudo conectarse a la BD: " . mysql_error();
    exit;
}
if (!mysql_select_db("grupo_integral")) {
    echo "No ha sido posible seleccionar la BD: " . mysql_error();
    exit;
}
// =======================================

function pre($arr)
{
   if(method_exists( $arr, 'pre' )) {
      $arr->pre();
   } else {
      echo "<pre style='text-align:left; background-color:white;'>";
      print_r($arr);
      echo "</pre>";
   }
}

// =======================================

//recupero las variables

if (isset($_REQUEST['cdfi_ID'])) {
   $idCFDIActual = trim($_REQUEST['cdfi_ID']);
}else{
   $idCFDIActual = "";
}
if (isset($_REQUEST['idEmpresa'])) {
   $idEmpresa = trim($_REQUEST['idEmpresa']);
}else{
   $idEmpresa = "";
}

echo "EL ID DEL CFDI ACTUAL ES:".$idCFDIActual;
if (isset($_REQUEST['txtRFC'])) {
   $emisor_rfc = trim($_REQUEST['txtRFC']);
   $emisor_rfc_XML = "rfc=\"$emisor_rfc\" ";

}else{
   $emisor_rfc = "";
}
if (isset($_REQUEST['txtRazonSocial'])) {
   $emisor_razon_social = trim($_REQUEST['txtRazonSocial']);
   $emisor_razon_social_XML = "nombre=\"$emisor_razon_social\"";

}else{
   $emisor_razon_social = "";
}
if (isset($_REQUEST['tipo_CFD'])) {
   $emisor_funcion = trim($_REQUEST['tipo_CFD']);
   if($emisor_funcion == 'Ingreso'){
      $emisor_funcion = 'ingreso';
   }
   if($emisor_funcion == 'Egreso'){
      $emisor_funcion = 'egreso';
   }
   if($emisor_funcion == 'Traslado'){
      $emisor_funcion = 'traslado';
   }
   $emisor_funcion_XML = "tipoDeComprobante=\"$emisor_funcion\" ";

}else{
   $emisor_funcion = "";
}
if (isset($_REQUEST['txtSerie'])) {
   $emisor_serie = trim($_REQUEST['txtSerie']);
   $emisor_serie_XML = "serie=\"$emisor_serie\" ";

}else{
   $emisor_serie = "";
}
if (isset($_REQUEST['txtFolio'])) {
   $emisor_folio = trim($_REQUEST['txtFolio']);
   $emisor_folio_XML = "folio=\"$emisor_folio\" ";

}else{
   $emisor_folio = "";
}
if (isset($_REQUEST['txtRegimenFiscal'])) {
   $emisor_regimen_fiscal = trim($_REQUEST['txtRegimenFiscal']);
   $emisor_regimen_fiscal_XML = "Regimen=\"$emisor_regimen_fiscal\"";

}else{
   $emisor_regimen_fiscal = "";
}
if (isset($_REQUEST['txtFecha'])) {
   $emisor_fecha = trim($_REQUEST['txtFecha']);
   $emisor_fecha_XML = "fecha=\"$emisor_fecha\" ";

}else{
   $emisor_fecha = "";
}
if (isset($_REQUEST['txtLugarExpedicion'])) {
   $emisor_lugar_expedicion = trim($_REQUEST['txtLugarExpedicion']);
//   echo "Diegolas".$emisor_lugar_expedicion;
   $emisor_lugar_expedicion_XML = "LugarExpedicion=\"$emisor_lugar_expedicion\"";

}else{
   $emisor_lugar_expedicion = "";
}
if (isset($_REQUEST['txtEmisorCalle'])) {
   $emisor_calle = trim($_REQUEST['txtEmisorCalle']);
   $emisor_calle_XML = "calle=\"$emisor_calle\"";

}else{
   $emisor_calle = "";
}
if (isset($_REQUEST['txtEmisorNumExt'])) {
   $emisor_num_exterior = trim($_REQUEST['txtEmisorNumExt']);
   $emisor_num_exterior_XML = "noExterior=\"$emisor_num_exterior\"";
}else{
   $emisor_num_exterior = "";
}
if (isset($_REQUEST['txtEmisorNumInt'])) {
   $emisor_num_interior = trim($_REQUEST['txtEmisorNumInt']);
   $emisor_num_interior_XML = "noInterior=\"$emisor_num_interior\"";

}else{
   $emisor_num_interior = "";
}
if (isset($_REQUEST['txtEmisorColonia'])) {
   $emisor_colonia= trim($_REQUEST['txtEmisorColonia']);
   $emisor_colonia_XML = "colonia=\"$emisor_colonia\" ";

}else{
   $emisor_colonia = "";
}

if (isset($_REQUEST['txtEmisorLocalidad'])) {
   $emisor_localidad = trim($_REQUEST['txtEmisorLocalidad']);
   $emisor_localidad_XML = "localidad=\"$emisor_localidad\" ";

}else{
   $emisor_localidad = "";
}

if (isset($_REQUEST['txtEmisorMunicipio'])) {
   $emisor_municipio = trim($_REQUEST['txtEmisorMunicipio']);
   $emisor_municipio_XML = "municipio=\"$emisor_municipio\" ";

}else{
   $emisor_municipio = "";
}
if (isset($_REQUEST['txtEmisorEstado'])) {
   $emisor_estado = trim($_REQUEST['txtEmisorEstado']);
   $emisor_estado_XML = "estado=\"$emisor_estado\" ";

}else{
   $emisor_estado = "";
}
if (isset($_REQUEST['txtEmisorPais'])) {
   $emisor_pais = trim($_REQUEST['txtEmisorPais']);
   $emisor_pais_XML = "pais=\"$emisor_pais\" ";

}else{
   $emisor_pais = "";
}
if (isset($_REQUEST['txtEmisorCP'])) {
   $emisor_CP = trim($_REQUEST['txtEmisorCP']);
   $emisor_CP_XML = "codigoPostal=\"$emisor_CP\"";
}else{
   $emisor_CP = "";
}

/**************PENDIENTES******************/
if (isset($_REQUEST['selPaisExpedicion'])) {
   $emisor_pais_expedicion = trim($_REQUEST['selPaisExpedicion']);
   $emisor_pais_expedicion_XML = "pais=\"$emisor_pais_expedicion\" ";
}else{
   $emisor_pais_expedicion = "";
}

/******************PENDIENTES****************/

/*DATOS DEL RECEPTOR*/
if (isset($_REQUEST['txtReceptorCliente'])) {
   $receptor_cliente = trim($_REQUEST['txtReceptorCliente']);
   $receptor_cliente_XML = "cliente=\"$receptor_cliente\" ";
}else{
   $receptor_cliente = "";
}
if (isset($_REQUEST['txtReceptorRFC'])) {
   $receptor_RFC = trim($_REQUEST['txtReceptorRFC']);
   $receptor_RFC_XML = "rfc=\"$receptor_RFC\" ";
}else{
   $receptor_RFC = "";
}
if (isset($_REQUEST['txtReceptorRazonSocial'])) {
   $receptor_razon_social = trim($_REQUEST['txtReceptorRazonSocial']);
   $receptor_razon_social_XML = "nombre=\"$receptor_razon_social\"";
}else{
   $receptor_razon_social = "";
}
if (isset($_REQUEST['txtReceptorCalle'])) {
   $receptor_calle = trim($_REQUEST['txtReceptorCalle']);
   $receptor_calle_XML = "calle=\"$receptor_calle\" ";
}else{
   $receptor_calle = "";
}
if (isset($_REQUEST['txtReceptorNumExt'])) {
   $receptor_num_exterior = trim($_REQUEST['txtReceptorNumExt']);
   $receptor_num_exterior_XML = "noExterior=\"$receptor_num_exterior\" ";
}else{
   $receptor_num_exterior = "";
}
if (isset($_REQUEST['txtReceptorNumInt'])) {
   $receptor_num_interior = trim($_REQUEST['txtReceptorNumInt']);
   $receptor_num_interior_XML = "noInterior=\"$receptor_num_exterior\" ";
}else{
   $receptor_num_interior = "";
}
if (isset($_REQUEST['txtReceptorColonia'])) {
   $receptor_colonia = trim($_REQUEST['txtReceptorColonia']);
   $receptor_colonia_XML = "colonia=\"$receptor_colonia\" ";

}else{
   $receptor_colonia = "";
}
if (isset($_REQUEST['txtReceptorLocalidad'])) {
   $receptor_localidad = trim($_REQUEST['txtReceptorLocalidad']);
   $receptor_localidad_XML = "localidad=\"$receptor_localidad\" ";
}else{
   $receptor_localidad = "";
}

if (isset($_REQUEST['txtReceptorMunicipio'])) {
   $receptor_municipio = trim($_REQUEST['txtReceptorMunicipio']);
   $receptor_municipio_XML = "municipio=\"$receptor_municipio\" ";
}else{
   $receptor_municipio = "";
}

if (isset($_REQUEST['txtReceptorEstado'])) {
   $receptor_estado = trim($_REQUEST['txtReceptorEstado']);
   $receptor_estado_XML = "estado=\"$receptor_estado\" ";
}else{
   $receptor_estado = "";
}
if (isset($_REQUEST['txtReceptorPais'])) {
   $receptor_pais = trim($_REQUEST['txtReceptorPais']);
   $receptor_pais_XML = "pais=\"$receptor_pais\" ";   
}else{
   $receptor_pais = "";
}

/*if (isset($_REQUEST['selEntidades'])) {
   $receptor_estado = trim($_REQUEST['selEntidades']);
   $receptor_estado_XML = "estado=\"$receptor_estado\" ";
}else{
   $receptor_estado = "";
}
if (isset($_REQUEST['selPaises'])) {
   $receptor_pais = trim($_REQUEST['selPaises']);
   $receptor_pais_XML = "pais=\"$receptor_pais\" ";   
}else{
   $receptor_pais = "";
}*/

////  PARCHE POR Q NO TRAE EL VALOR DEL PAIS  //////
/*$receptor_pais = "MEXICO";
$receptor_pais_XML = "pais=\"MEXICO\" ";*/


if (isset($_REQUEST['txtReceptorCP'])) {
   $receptor_CP = trim($_REQUEST['txtReceptorCP']);
   $receptor_CP_XML = "codigoPostal=\"$receptor_CP\"";
}else{
   $receptor_CP = "";
}

/**VARIABLES DE FORMA DE PAGO*/
if (isset($_REQUEST['selPFForma_pago'])) {
   $FP_forma_pago = trim($_REQUEST['selPFForma_pago']);
   $FP_forma_pago_XML = "formaDePago=\"$FP_forma_pago\" ";
}else{
   $FP_forma_pago = "";
}

if (isset($_REQUEST['txtFPFFO'])) { //  Folio Fiscal Original (UUID)
   $FP_FFO = trim($_REQUEST['txtFPFFO']);
   $FP_FFO_XML = "FolioFiscalOrig=\"$FP_FFO\" ";

}else{
   $FP_FFO = "";
}
if (isset($_REQUEST['txtFPSFFO'])) { // SERIE FOLIO FISCAL
   $FP_SFFO = trim($_REQUEST['txtFPSFFO']);
   $FP_SFFO_XML = "SerieFolioFiscalOrig=\"$FP_SFFO\" ";

}else{
   $FP_SFFO = "";
}
if (isset($_REQUEST['txtFPMFFO'])) {
   $FP_MOFO = trim($_REQUEST['txtFPMFFO']);
   $FP_MOFO_XML = "MontoFolioFiscalOrig=\"$FP_MOFO\" ";

}else{
   $FP_MOFO = "";
}
if (isset($_REQUEST['txtFPFFFO'])) {
   $FP_FFFO = trim($_REQUEST['txtFPFFFO']);
   $FP_FFFO_XML = "FechaFolioFiscalOrig=\"$FP_FFFO\" ";

}else{
   $FP_FFFO = "";
}

if (isset($_REQUEST['parcialidad1'])) {
   $parcialidad1 = trim($_REQUEST['parcialidad1']);
   $parcialidad1_XML = "PENDIENTE=\"$parcialidad1\" ";

}else{
   $parcialidad1 = "";
}
if (isset($_REQUEST['parcialidad2'])) {
   $parcialidad2 = trim($_REQUEST['parcialidad2']);
   $parcialidad2_XML = "PENDIENTE=\"$parcialidad2\" ";

}else{
   $parcialidad2 = "";
}
if (isset($_REQUEST['txtFPCondicionesPago'])) {
   $FP_condiciones_pago = trim($_REQUEST['txtFPCondicionesPago']);
   $FP_condiciones_pago_XML = "condicionesDePago=\"$FP_condiciones_pago\" ";

}else{
   $FP_condiciones_pago = "";
}
if (isset($_REQUEST['selFPMetodoPago'])) {
   $FP_metodo_pago = trim($_REQUEST['selFPMetodoPago']);
   $FP_metodo_pago_XML = "metodoDePago=\"$FP_metodo_pago\" ";

}else{
   $FP_metodo_pago = "";
}
if (isset($_REQUEST['txtFPcuenta'])) {
   $FP_cuenta = trim($_REQUEST['txtFPcuenta']);
   $FP_cuenta_XML = "NumCtaPago=\"$FP_cuenta\" ";

}else{
   $FP_cuenta = "";
}
if (isset($_REQUEST['txtFPMotivoDescuento'])) { // NO EXISTE EN EL XML
   $FP_motivo_descuento = trim($_REQUEST['txtFPMotivoDescuento']);
   $FP_motivo_descuento_XML = "PENDIENTE=\"$FP_motivo_descuento\" ";

}else{
   $FP_motivo_descuento = "";
}
if (isset($_REQUEST['SelMoneda'])) {
   $FP_moneda = trim($_REQUEST['SelMoneda']);
   $FP_moneda_XML = "Moneda=\"$FP_moneda\" ";

}else{
   $FP_moneda = "";
}
if (isset($_REQUEST['txtFPTipoCambio'])) {
   $FP_tipo_cambio = trim($_REQUEST['txtFPTipoCambio']);

}else{
   $FP_tipo_cambio = "";
}
if (isset($_REQUEST['txtFPFechaTipoCambio'])) { // PENDIENTO PQ NO VA EN EL XML
   $FP_fecha_tipo_cambio = trim($_REQUEST['txtFPFechaTipoCambio']);
   $FP_fecha_tipo_cambio_XML = "tipoCambio=\"$FP_fecha_tipo_cambio\" ";

}else{
   $FP_fecha_tipo_cambio = "";
}

//=================================================
//Se extrae el valor del "Certificado" desde el archivo que se creo cuando se instalo el certificado.
$certificado_texto="";
$ar=fopen("C:/CSD/".$idEmpresa."/certificado.txt","r") or die("No se pudo abrir el archivo");
while (!feof($ar))
     {
      $certificado_texto.= fgets($ar);
     }
fclose($ar);
//Dado que el certificado presenta saltos de linea, se deben quitar esos saltos.
$certificado_texto = preg_replace("[\n|\r|\n\r]",'', $certificado_texto);
//Se extrae el numero de certificado, que se obtuvo al instalar el certificado. 
$num_certificado="";
$ar=fopen("C:/CSD/".$idEmpresa."/NoCertificado.txt","r") or die("No se pudo abrir el archivo");
while (!feof($ar))
     {
      $num_certificado.= fgets($ar);
     }
fclose($ar);




/***VARIABLES DE LOS TOTALES */
if (isset($_REQUEST['txtTotalesSubtotal'])) {
   $TT_subtotal = trim($_REQUEST['txtTotalesSubtotal']);
 //  $format = number_format($TT_subtotal, 2, '.','')
   $TT_subtotal_XML = "subTotal=\"$TT_subtotal\" ";

}else{
   $TT_subtotal = "";
}
if (isset($_REQUEST['txtDescuentoGeneral'])) { // ES UN CAMPO OPCIONAL
   $TT_descuento = trim($_REQUEST['txtDescuentoGeneral']);
      if($TT_descuento == 0){
         $TT_descuento = '';
      }
   $TT_descuento_XML = "descuento=\"$TT_descuento\" ";
}else{
   $TT_descuento = "";
}
if (isset($_REQUEST['txtSubtotalDescuento'])) { /// NO SE ENCUENTRA EN EL XML
   $TT_subTotalConDescuento = trim($_REQUEST['txtSubtotalDescuento']);
   $TT_subTotalConDescuento_XML = "PENDIENTE=\"$TT_subTotalConDescuento\" ";

}else{
   $TT_subTotalConDescuento = "";
}
if (isset($_REQUEST['totalImpuestoTrasladado'])) { 
   $TT_impuestosTrasladados = trim($_REQUEST['totalImpuestoTrasladado']);
   $TT_impuestosTrasladados_XML = "totalImpuestosTrasladados=\"$TT_impuestosTrasladados\" ";

}else{
   $TT_impuestosTrasladados = "";
}
if (isset($_REQUEST['totalImpuestoRetenido'])) { 
   $TT_impuestosRetenidos = trim($_REQUEST['totalImpuestoRetenido']);
   $TT_impuestosRetenidos_XML = "totalImpuestosRetenidos=\"$TT_impuestosRetenidos\"";

}else{
   $TT_impuestosRetenidos = "";
}
if (isset($_REQUEST['txtTotal'])) { 
   $TT_total = trim($_REQUEST['txtTotal']);
   $TT_total_XML = "total=\"$TT_total\" ";

}else{
   $TT_total = "";
}

if (isset($_REQUEST['txtNumeroALetra'])) { 
   $TT_numeroLetra = trim($_REQUEST['txtNumeroALetra']);

}else{
   $TT_numeroLetra = "";
}

// ==================QUERYS=====================
$query_productos = "select cf.id_cfdi_detalle,cf.cantidad, un.descripcion as unidad, cf.descripcion, cf.precio, cf.descuento, cf.importe from cfdi_detalle as cf inner join productos as pr on cf.id_producto = pr.id_producto inner join unidades as un on pr.id_unidad = un.id_unidad where cf.id_cfdi =".$idCFDIActual;
$query_impuesto_retenido = "selecT im.tipo,im.descripcion as impuesto,im.porcentaje as tasa,(cf.importe * (porcentaje / 100)) as importe From cfdi_detalle as cf inner join impuesto_detalle_cfdi as imd ON cf.id_cfdi_detalle = imd.id_cfdi_detalle inner join impuestos as im ON imd.id_impuesto = im.id_impuesto where cf.id_cfdi = ".$idCFDIActual;
$query_impuesto_trasladado = "selecT im.tipo,im.descripcion as impuesto,im.porcentaje as tasa,(cf.importe * (porcentaje / 100)) as importe From cfdi_detalle as cf inner join impuesto_detalle_cfdi as imd ON cf.id_cfdi_detalle = imd.id_cfdi_detalle inner join impuestos as im ON imd.id_impuesto = im.id_impuesto where cf.id_cfdi = ".$idCFDIActual;
$query_count_impuesto_retenido = "SELECT COUNT(*) AS TIENE  from cfdi as cf inner join cfdi_detalle as cd on cf.id_cfdi = cd.id_cfdi inner join impuesto_detalle_cfdi as im on cd.id_cfdi_detalle = im.id_cfdi_detalle inner join impuestos as imp on im.id_impuesto = imp.id_impuesto where cd.id_cfdi = ".$idCFDIActual." AND imp.tipo =2 group by imp.porcentaje";
$query_count_impuesto_trasladado = "SELECT COUNT(*) AS TIENE  from cfdi as cf inner join cfdi_detalle as cd on cf.id_cfdi = cd.id_cfdi inner join impuesto_detalle_cfdi as im on cd.id_cfdi_detalle = im.id_cfdi_detalle inner join impuestos as imp on im.id_impuesto = imp.id_impuesto where cd.id_cfdi = ".$idCFDIActual." AND imp.tipo =1 group by imp.porcentaje";
$query_tiene_impuestos ="select count(im.id_impuesto) as tieneImpuestos from cfdi_detalle as cf inner join impuesto_detalle_cfdi as imd on cf.id_cfdi_detalle = imd.id_cfdi_detalle inner join impuestos as im on imd.id_impuesto = im.id_impuesto where cf.id_cfdi =".$idCFDIActual;

/*===============CADENA ORIGINAL===================*/
//cadenaxml
   $cadena_original="||3.2|$emisor_fecha|$emisor_funcion";
   if($FP_forma_pago != ""){$cadena_original.="|$FP_forma_pago";}
   if($FP_condiciones_pago != ""){$cadena_original.="|$FP_condiciones_pago";}
   $cadena_original.="|".number_format($TT_subtotal, 2, '.','')."";
   if($TT_descuento != ""){$cadena_original.="|$TT_descuento";}
   if($FP_moneda != 'MXN'){$cadena_original.="|".number_format($FP_tipo_cambio, 4, '.','')."|$FP_moneda";}  
   $cadena_original.="|".number_format($TT_total, 2, '.','')."";
   if($FP_metodo_pago != ""){$cadena_original.="|$FP_metodo_pago";}
   $cadena_original.="|$emisor_lugar_expedicion";
   switch ($FP_metodo_pago) {
      case 'Efectivo':
        echo "entro en el 1";
         break;
      case 'No identificado':
        echo "entro al 2";
      break;
      default:
     $cadena_original.="|$FP_cuenta";
         break;
   }

   if($FP_forma_pago == "Parcialidades"){$cadena_original.="|$FP_FFO|$FP_SFFO|$FP_FFFO|$FP_MOFO";}

   //datos del emisor
   if($emisor_rfc !="" && $emisor_razon_social != ""){$cadena_original.="|$emisor_rfc|$emisor_razon_social";}
   if($emisor_calle !=""){$cadena_original.="|$emisor_calle|$emisor_num_exterior";}   
   if($emisor_num_interior!=""){$cadena_original.="|$emisor_num_interior";}  
   $cadena_original.="|$emisor_colonia";
   if($emisor_localidad!=""){$cadena_original.="|$emisor_localidad";} 
   $cadena_original.="|$emisor_municipio|$emisor_estado|$emisor_pais|$emisor_CP";
   $cadena_original.="|$emisor_pais_expedicion|$emisor_regimen_fiscal";
   //datos del receptor
   $cadena_original.="|$receptor_RFC";
   if($receptor_razon_social != ""){$cadena_original.="|$receptor_razon_social";}
   if($receptor_calle !=""){$cadena_original.="|$receptor_calle";}
   if($receptor_num_exterior!=""){$cadena_original.="|$receptor_num_exterior";}
   //if($receptor_num_interior!=""){$cadena_original.="|$receptor_num_interior";}
   if($receptor_colonia!=""){$cadena_original.="|$receptor_colonia";}  
   if($receptor_localidad!=""){$cadena_original.="|$receptor_localidad";} 
   if($receptor_municipio!=""){$cadena_original.="|$receptor_municipio";}
   if($receptor_estado!=""){$cadena_original.="|$receptor_estado";}
   $cadena_original.="|$receptor_pais";
   if ($receptor_CP != '' && $receptor_CP != 0){$cadena_original.="|$receptor_CP";}


   //detalle de conceptos
   $resultSetQP = mysql_query($query_productos);
   while ($productos = mysql_fetch_assoc($resultSetQP)){
    // $descripcion = str_replace('"', '&quot;', $descripcion);    
     {$cadena_original.="|".$productos['cantidad']."|".$productos['unidad']."|".$productos['descripcion']."|".number_format($productos['precio'], 2, '.','')."|".number_format($productos['importe'], 2, '.','');}
   }

   //detalle de impuestos  
   $countImpuestos = mysql_query($query_tiene_impuestos);
   $fila = mysql_fetch_assoc($countImpuestos);
   if ($fila['tieneImpuestos'] >= 1) { // hace un count y valida si el cfdi tiene impuestos
         $resultSetIR = mysql_query($query_impuesto_retenido); // impuestos RETENIDOS
         $auxvectorRet='';
         while ($retenido = mysql_fetch_assoc($resultSetIR)){ // impuestos RETENIDOS
             if ($retenido['tipo'] == "2") {
               $cadena_original.="|".$retenido['impuesto']."|".number_format($retenido['importe'], 2, '.','');
             }
         }
         if( $TT_impuestosRetenidos != '' ){ $cadena_original.="|".$TT_impuestosRetenidos.""; }

         $resultSetIT = mysql_query($query_impuesto_trasladado);
         $auxvectorTra='';
         while ($trasladado = mysql_fetch_assoc($resultSetIT)){ // impuestos TRASLADADOS
             if ($trasladado['tipo'] == "1") {
               $cadena_original.="|".$trasladado['impuesto']."|".$trasladado['tasa']."|".number_format($trasladado['importe'], 2, '.','');
             }
         }
         if( $TT_impuestosTrasladados != '' ){ $cadena_original.="|".$TT_impuestosTrasladados."||"; }
         
   }else{
         $cadena_original.="|IVA|0.00|IVA|16.00|0.00||";
   }


   $cadena_original=str_replace("  "," ",$cadena_original);
   $cadena_original=utf8_encode($cadena_original);
   echo $cadena_original;


//==================CODIGO PARA PROBAR=======================
/*   $sello = "";
   //Se envia a sellar, se usa openssl como sistema de algoritmos, los paremtros que recibe son, CSD como LLAVEPRIVADA.pem.txt, el archivo resultante.
   //Seran bytes que se guardaran en un archivo llamado Sellobin.txt y la cadena original, que previamente generamos.
    exec("openssl dgst -sha1 -sign pruebas/LLAVEPRIVADA.pem.txt -out pruebas/selloBin.txt librerias/pruebas/cadenaoriginal.txt");
  //  //Una ves teniendo el Sello como Bytes, debo pasar esos bytes a bse64.
    exec("openssl enc -base64 -in pruebas/selloBin.txt -out pruebas/sello.txt");
  //  //Se lee el sello para incrustarlo al XML.
  // //CODIGO COMENTADO, VIENE POR DEFECTO EN EL CODIGO DEL PROVEEDOR
   $ar=fopen("pruebas/sello.txt","r") or die("No se pudo abrir el archivo");
    while (!feof($ar))
      {
       $sello.= fgets($ar);
      }
    fclose($ar);
    //Dado que el sello se generan con saltos de linea, se le deben eliminar dichos saltos. 
    $sello = preg_replace("[\n|\r|\n\r]",'', $sello); */
//============================================================
  //=============CODIGO PARA GENERAR EL SELLO===============/*
   $key = "C:/CSD/".$idEmpresa."/Llave.key.pem"; 
   $fp = fopen($key, "r w");
   $priv_key = fread($fp, 8192);
   fclose($fp);
   $pkeyid = openssl_get_privatekey($priv_key); 
   // compute signature with SHA-512
   openssl_sign($cadena_original, $cadena_original_firmada, $pkeyid, OPENSSL_ALGO_SHA1);
   $sello = base64_encode($cadena_original_firmada);
   $sello = preg_replace("[\n|\r|\n\r]",'', $sello);
   // ==========================================================
   

   //creo el xml en memoria


   $cadena_xml='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'."\r\n";
   $cadena_xml.='<cfdi:Comprobante xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv32.xsd"';
   $cadena_xml.=' version="3.2" '.$emisor_serie_XML.''.$emisor_folio_XML.''.$emisor_fecha_XML.' sello="'.$sello.'" ';
   if ($FP_forma_pago == 'Parcialidades'){$cadena_xml.=''.$FP_forma_pago_XML.''.$FP_FFO_XML.''.$FP_SFFO_XML.''.$FP_MOFO_XML.''.$FP_FFFO_XML.'';}else{$cadena_xml.=''.$FP_forma_pago_XML.'';}
   $cadena_xml.='noCertificado="'.$num_certificado.'" certificado="'.$certificado_texto.'" '."\r\n";;
   if ($FP_condiciones_pago != ""){$cadena_xml.=''.$FP_condiciones_pago_XML.'';}
   if ($FP_metodo_pago == 'Efectivo'|| $FP_metodo_pago == 'No identificado'){$cadena_xml.=' '.$FP_metodo_pago_XML.'';}else{$cadena_xml.=' '.$FP_metodo_pago_XML.''.$FP_cuenta_XML.'';}
   if ($FP_moneda != 'MXN'){$cadena_xml.=''.$FP_moneda_XML.'TipoCambio="'.number_format($FP_tipo_cambio, 4, '.','').'" ';}
   if ($TT_descuento != ''){$cadena_xml.=''.$TT_descuento_XML.'';}

   $cadena_xml.=' subTotal="'.number_format($TT_subtotal, 2, '.','').'" total="'.number_format($TT_total, 2, '.','').'" '.$emisor_funcion_XML.''.$emisor_lugar_expedicion_XML.'>'."\r\n";
   $cadena_xml.='<cfdi:Emisor '.$emisor_rfc_XML.''.$emisor_razon_social_XML.'>'."\r\n";
   $cadena_xml.='<cfdi:DomicilioFiscal '.$emisor_calle_XML.' '.$emisor_num_exterior_XML.'';
   if($emisor_num_interior!=""){$cadena_xml.=' '.$emisor_num_interior_XML.' ';}
   $cadena_xml.=' '.$emisor_colonia_XML.''.$emisor_municipio_XML.''.$emisor_estado_XML.''.$emisor_pais_XML.''.$emisor_CP_XML.' ';      
   if ($emisor_localidad != ''){$cadena_xml.=''.$emisor_localidad_XML.'';}
   $cadena_xml.=' />'."\r\n"; 

   $cadena_xml.='<cfdi:ExpedidoEn '.$emisor_pais_expedicion_XML.' />'."\r\n";      
   $cadena_xml.='<cfdi:RegimenFiscal  '.$emisor_regimen_fiscal_XML.'/>'."\r\n";      
   $cadena_xml.='</cfdi:Emisor>'."\r\n";      
   $cadena_xml.='<cfdi:Receptor '.$receptor_RFC_XML.''.$receptor_razon_social_XML.'>'."\r\n";
   $cadena_xml.='<cfdi:Domicilio ';

   if ($receptor_calle != ''){$cadena_xml.=''.$receptor_calle_XML.'';}

   if ($receptor_num_exterior != ''){$cadena_xml.=''.$receptor_num_exterior_XML.'';}   

   //if ($receptor_num_interior != ''){$cadena_xml.=''.$receptor_num_interior_XML.'';}

   if ($receptor_colonia != ''){$cadena_xml.=''.$receptor_colonia_XML.'';}

   if ($receptor_localidad != ''){$cadena_xml.=''.$receptor_localidad_XML.'';}

   if ($receptor_municipio != ''){$cadena_xml.=''.$receptor_municipio_XML.'';}

   if ($receptor_estado != ''){$cadena_xml.=''.$receptor_estado_XML.'';}
   
   $cadena_xml.=''.$receptor_pais_XML.' ';
   if ($receptor_CP != '' && $receptor_CP != 0){$cadena_xml.=''.$receptor_CP_XML.'';}
   $cadena_xml.=' />'."\r\n";
   $cadena_xml.='</cfdi:Receptor>'."\r\n";
   $cadena_xml.='<cfdi:Conceptos>'."\r\n";
   $resultSetQP = mysql_query($query_productos);
   while ($productos = mysql_fetch_assoc($resultSetQP)){
    // $descripcion = str_replace('"', '&quot;', $descripcion); 
     $cadena_xml.='<cfdi:Concepto cantidad="'.$productos['cantidad'].'" unidad="'.$productos['unidad'].'" descripcion="'.$productos['descripcion'].'" valorUnitario="'.number_format($productos['precio'], 2, '.','').'" importe="'.number_format($productos['importe'], 2, '.','').'"/>'."\r\n";      
   }           
   $cadena_xml.='</cfdi:Conceptos>'."\r\n";
   

   $countImpuestos = mysql_query($query_tiene_impuestos);
   $fila = mysql_fetch_assoc($countImpuestos);

   if ($fila['tieneImpuestos'] >= 1) { // hace un count y valida si el cfdi tiene impuestos
        $cadena_xml.='<cfdi:Impuestos ';
         if ( $TT_impuestosTrasladados != ''){$cadena_xml.=''.$TT_impuestosTrasladados_XML.'';}
         if ( $TT_impuestosRetenidos != ''){$cadena_xml.=''.$TT_impuestosRetenidos_XML.'';}
         $cadena_xml.='>'."\r\n";
         


         $countRetencion = mysql_query($query_count_impuesto_retenido);
         $fila = mysql_fetch_assoc($countRetencion);
         if ($fila['TIENE'] >= 1 ) {
            $cadena_xml.='<cfdi:Retenciones>'."\r\n";      
            $resultSetIR = mysql_query($query_impuesto_retenido); // impuestos RETENIDOS    
            while ($retenido = mysql_fetch_assoc($resultSetIR)){
               if ($retenido['tipo'] == "2") {
                  $cadena_xml.='<cfdi:Retencion impuesto="'.$retenido['impuesto'].'"  importe="'.number_format($retenido['importe'], 2, '.','').'"/>'."\r\n";      
               }
            }
            $cadena_xml.='</cfdi:Retenciones>'."\r\n";
            
         }
         $counTraslado = mysql_query($query_count_impuesto_trasladado);
         $fila = mysql_fetch_assoc($counTraslado);
         if ($fila['TIENE'] >= 1 ) {
            $cadena_xml.='<cfdi:Traslados>'."\r\n";
            $resultSetIT = mysql_query($query_impuesto_trasladado);
            $auxvectorTra='';
            while ($trasladado = mysql_fetch_assoc($resultSetIT)){
               if ($trasladado['tipo'] == "1") {
               $cadena_xml.='<cfdi:Traslado impuesto="'.$trasladado['impuesto'].'" tasa="'.$trasladado['tasa'].'"  importe="'.number_format($trasladado['importe'], 2, '.','').'"/>'."\r\n";      
               }
            }
            $cadena_xml.='</cfdi:Traslados>'."\r\n";      
         } 
   }else{
         $cadena_xml.='<cfdi:Impuestos>';
         $cadena_xml.='<cfdi:Retenciones>'."\r\n"; 
         $cadena_xml.='<cfdi:Retencion impuesto="IVA"  importe="0.00"/>'."\r\n";      
         $cadena_xml.='</cfdi:Retenciones>'."\r\n";
         $cadena_xml.='<cfdi:Traslados>'."\r\n";
         $cadena_xml.='<cfdi:Traslado impuesto="IVA" tasa="16.00"  importe="0.00"/>'."\r\n";      
         $cadena_xml.='</cfdi:Traslados>'."\r\n";   
     

   } // cierre de la validación si tiene impuestos
   $cadena_xml.='</cfdi:Impuestos>'."\r\n";
   $cadena_xml.='</cfdi:Comprobante>';  // $cadena_xml=str_replace("  "," ",$cadena_xml);
   //Dado que un String convencional no esta adecuado para recibir acentos, se deben interpretar esos caracteres, de la siguiente manera.
  //$cadena_xml = utf8_decode($cadena_xml);                           
   //Una ves que ya tengo la cadena con los acentos debidamente codificados, aplico la codificion UTF-8 al XML.
   $cadena_xml = utf8_encode($cadena_xml); 
   //Se guarda el XML con el siguiente nombre.

   $new_xml = fopen("C:/CSD/".$idEmpresa."/xml/Factura_".$emisor_serie."_".$emisor_folio .".xml", "w");
   fwrite($new_xml,$cadena_xml);
   fclose($new_xml);
   //Cargo el XML desde archivo de la siguiente manera.
     echo $cadenaXML= simplexml_load_file("C:/CSD/".$idEmpresa."/xml/Factura_".$emisor_serie."_".$emisor_folio .".xml");
   

   //Decodifico el XML de UTF-8 sin BOM, a UTF-8
   echo $cadenaXML=utf8_decode($cadena_xml);

   //////////////////////////////////////////////////////////////////////////////////////////////////////
   ///////////////////////////////////// PARA PRUEBAS ///////////////////////////////////////////////////
   //////////////////////////////////////////////////////////////////////////////////////////////////////
 
   $datos=array('usuario'=>'DEMO050125562','password'=>'&J$nNV7ftTF%MD@','cadena'=>$cadenaXML);
   //Peticion SOAP al WebService
   $oSoapClient = new nusoap_client('https://www.fel.mx/WS-TFD/WS-TFD.asmx?wsdl',implode(",", $datos));
  // $oSoapClient->soap_defencoding = 'UTF-8';
   //$oSoapClient->decode_utf8 = false;  
   //A que metodo se apunta
  
   $function = 'TimbrarCFDPrueba';
   //Capturo la respuesta
   $respuesta = $oSoapClient->call($function, $datos); 
    print_r($respuesta); 
   if (!$error = $oSoapClient->getError()){
      $XMLTimbrado = $respuesta['TimbrarCFDPruebaResult']['string'][3];
      //El XML debe guardase como UTF-8
      $XMLTimbrado = utf8_encode($XMLTimbrado); 
      //Teniendo la variable a la mano, puedo guardar el XML.
      $new_xml_Timbrado = fopen("C:/CSD/".$idEmpresa."/xml/Factura_".$emisor_serie."_".$emisor_folio ."_Timbrado.xml", "w");
      fwrite($new_xml_Timbrado,$XMLTimbrado);
      fclose($new_xml_Timbrado);
      echo "<font color='#FF0000'> XML timbrado con éxito.</font>"; /// mostrar mensaje en caso de conexión exitosa.
   
       // ahora obtenermos el UUID y lo insertamos en la BD
        $dom = new DOMDocument('1.0','utf-8'); // método para obtener el UUID del XML
         $dom->load("C:/CSD/".$idEmpresa."/xml/Factura_".$emisor_serie."_".$emisor_folio ."_Timbrado.xml");
         foreach ($dom->getElementsByTagNameNS('http://www.sat.gob.mx/TimbreFiscalDigital', '*') as $element) {
             $UUID =  $element->getAttribute('UUID'); 
        }
        try {
           $db = getConnection();
           $updateUUID = "UPDATE cfdi SET UUID=:UUID WHERE id_cfdi=:id_cfdi";
           $stmt = $db->prepare($updateUUID);  
           $stmt->bindParam("UUID", $UUID);
           $stmt->bindParam("id_cfdi", $idCFDIActual);
           $stmt->execute();   
           $db = null;
         } catch(PDOException $e) {
               echo '{"error":{"text":'. $e->getMessage() .'}}'; 
         }  
   
   }else{
   echo "ERROR:".print_r ($error);
   exit;
  }

   //////////////////////////////////////////////////////////////////////////////////////////////////////
   ///////////////////////////////////// PARA PRODUCCION ////////////////////////////////////////////////
   //////////////////////////////////////////////////////////////////////////////////////////////////////
 
   /*$datos=array('usuario' =>'ICA050125562','password' =>'vmCxHTAaRB#','cadenaXML' =>$cadenaXML,'referencia' =>'EstoEsAlgo');
   //print_r($datos);
   //Peticion SOAP al WebService
   $oSoapClient = new nusoap_client('https://www.fel.mx/WS-TFD/WS-TFD.asmx?wsdl',implode(",", $datos));
  // $oSoapClient->soap_defencoding = 'UTF-8';
   //$oSoapClient->decode_utf8 = false;  
   //A que metodo se apunta
  
   $function = 'TimbrarCFD';
   //Capturo la respuesta
   $respuesta = $oSoapClient->call($function, $datos); 
    print_r($respuesta); 
   if (!$error = $oSoapClient->getError())

   {
     $XMLTimbrado = $respuesta['TimbrarCFDResult']['string'][3];
      //El XML debe guardase como UTF-8
      $XMLTimbrado = utf8_encode($XMLTimbrado); 
      //Teniendo la variable a la mano, puedo guardar el XML.
      $new_xml_Timbrado = fopen("C:/CSD/".$idEmpresa."/xml/Factura_".$emisor_serie."_".$emisor_folio ."_Timbrado.xml", "w");
      fwrite($new_xml_Timbrado,$XMLTimbrado);
      fclose($new_xml_Timbrado);
      echo "<font color='#FF0000'> XML timbrado con éxito.</font>"; /// mostrar mensaje en caso de conexión exitosa.
   
       // ahora obtenermos el UUID y lo insertamos en la BD
        $dom = new DOMDocument('1.0','utf-8'); // método para obtener el UUID del XML
         $dom->load("C:/CSD/".$idEmpresa."/xml/Factura_".$emisor_serie."_".$emisor_folio ."_Timbrado.xml");
         foreach ($dom->getElementsByTagNameNS('http://www.sat.gob.mx/TimbreFiscalDigital', '*') as $element) {
             $UUID =  $element->getAttribute('UUID'); 
        }
        try {
           $db = getConnection();
           $updateUUID = "UPDATE cfdi SET UUID=:UUID WHERE id_cfdi=:id_cfdi";
           $stmt = $db->prepare($updateUUID);  
           $stmt->bindParam("UUID", $UUID);
           $stmt->bindParam("id_cfdi", $idCFDIActual);
           $stmt->execute();   
           $db = null;
         } catch(PDOException $e) {
               echo '{"error":{"text":'. $e->getMessage() .'}}'; 
         }  

   }else{
     echo "ERROR:".print_r ($error);
   exit;
   }*/

   
?>