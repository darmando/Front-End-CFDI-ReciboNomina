<?php
// ======================================CONEXION A LAS BD
 $conexión = mysql_connect("174.142.39.204", "root", "Guidored2013");
if (!$conexión) {
    echo "No pudo conectarse a la BD: " . mysql_error();
    exit;
}
if (!mysql_select_db("erp_ffa")) {
    echo "No ha sido posible seleccionar la BD: " . mysql_error();
    exit;
}
$idCFDIActual = 50;

$query_datos_emisor = "select em.idempresa,em.razonsocial,em.calle,em.colonia,em.localidad,em.municipio,em.cp,em.pais,em.logotipo,em.rfc,cf.folio_interno,cf.serie,rf.descripcion as regimen_fiscal from cfdi as cf inner join sucursales as su ON cf.idsucursal = su.idsucursal inner join empresas as em ON su.idempresa = em.idempresa inner join empresas_has_regimen_fiscal erf on em.idempresa = erf.idempresa inner join regimen_fiscal as rf  on erf.id_regimen_fiscal = rf.id_regimen_fiscal where cf.id_cfdi =".$idCFDIActual;
$query_sucursal = "select su.calle,su.num_int,su.num_ext,su.colonia, su.localidad,su.municipio, en.descripcion as estado, pa.descripcion as pais, su.cp from cfdi as cf inner join sucursales as su on cf.idsucursal = su.idsucursal inner join pais as pa on su.pais = pa.pais inner join entidad as en on pa.pais = en.pais and su.pais = en.pais and su.entidad = en.estado where cf.id_CFDI =".$idCFDIActual;
$query_productos = "select * from cfdi_detalle where id_cfdi=".$idCFDIActual;


require '../../../../../../php/pdfClases/dompdf_config.inc.php';
$html='
<!DOCTYPE html>
<html lang="es">
<head>
   <meta http-equiv="Content-Type" content="text/html;/>
   <meta charset="utf-8"> 
   <meta http-equiv="Content-Type" content="text/html;/>
   <link rel="stylesheet" type="text/css" href="../../../../../../css/bootstrap/bootstrap.min.css">

   <title>CFDI</title>
<style type="text/css">
body{
  font-size: 11px;
}
.alinear-centro {
}
.centrar {
  text-align: center;
}
.derecha {
  text-align: right;
}

    #footer { position: fixed; left: 0px; bottom: -50px; right: 0px; height: 50px;}
    #footer .page:after { content: counter(page, upper-roman); }

</style>
</head>
<body>';
$query_emisor = mysql_query($query_datos_emisor);
$emisor = mysql_fetch_assoc($query_emisor);
$html .='
<table width="100%" border="1" cellspacing="0">
  <tr>
    <td width="32%" class="centrar">
      <img src="../../../../../empresas_proyectos/img/logos/'.$emisor['idempresa'].'/'.$emisor['logotipo'].'" width="229" height="103" ">
    </td>
    <td width="43%" class="centrar">
      <p><strong>'.$emisor['razonsocial'].'</strong></p>
      <strong>DOMICILIO FISCAL</strong><br/>
      '.$emisor['calle'].'
      '.$emisor['colonia'].'
      <br/>'.$emisor['localidad'].', '.$emisor['municipio'].' C.P '.$emisor['cp'].'
      <br/>RFC: '.$emisor['rfc'].'
      <br/>'.$emisor['regimen_fiscal'].'      
    </td>
    <td width="25%" rowspan="3" class="centrar"><span class="alinear-centro">FACTURA</span><br />
      <table width="100%" border="1">
      <tr>
        <td>
          <table class="centrar" width="100%" border="1">
            <tr>
              <td>Serie y Folio</td>
            </tr>
            <tr>
              <td>'.$emisor['serie'].'  '.$emisor['folio_interno'].'</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table class="centrar" width="100%" border="1">
            <tr>
              <td>&nbsp;</td>
            </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
      <tr>
        <td>
          <table class="centrar" width="100%" border="1">
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table class="centrar" width="100%" border="1">
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table class="centrar" width="100%" border="1">
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table class="centrar" width="100%" border="1">
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    .    </td>
  </tr>
  <tr class="centrar">
    <td height="25">DATOS DEL RECEPTOR</td>
    <td>DIRECCION DEL EMISOR, CP,TEL,ETC.</td>
  </tr>
  <tr class="centrar">
    <td><p>SFDDF</p>
    <p>DSFSD</p></td>
    <td>SUCURSAL DATOS DE DIRECCION DEL EMISOR</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="1">
<tbody>
  <tr class="centrar">
   <td width="16%">CODIGO</td>
    <td width="16%">CANTIDAD</td>
    <td width="16%">UNIDAD</td>
    <td width="16%">DESCRIPCION</td>
    <td width="16%">P.UNITARIO</td>
    <td width="16%">IMPORTE</td>
  </tr>
  <tr>';
   $resultSetQP = mysql_query($query_productos);
   while ($producto = mysql_fetch_assoc($resultSetQP)){
    
   $html .='
      <td width="9%">'.$producto['id_cfdi_detalle'].'</td>
      <td width="9%">'.$producto['cantidad'].'</td>
      <td width="9%">'.$producto['unidad'].'</td>
      <td width="36%">'.$producto['descripcion'].'</td>
      <td width="19%" class="derecha">'.$producto['precio'].'</td>
      <td width="18%" class="derecha">'.$producto['importe'].'</td>';
    }
  $html .='
  </tr>
  <tr>
    <td colspan="4">AQUI VA EL TOTAL CON LETRA </td>
    <td class="centrar">sdfsd</td>
    <td class="centrar">sdf</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="1">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  </tbody>
</table>
<p>&nbsp;</p>
 <div id="footer">
    <p>Este documento es una representaci&oacute;n impresa de un CFDI</p>
  </div>
</body>
</html>
';

 # Instanciamos un objeto de la clase DOMPDF.
  $mipdf = new DOMPDF();
   
  # Definimos el tamaño y orientación del papel que queremos.
  # O por defecto cogerá el que está en el fichero de configuración.
  $mipdf ->set_paper("A4", "portrait");
   
  # Cargamos el contenido HTML.
  $mipdf ->load_html(utf8_encode($html));
  ini_set("memory_limit","32M");
  # Renderizamos el documento PDF.
  $mipdf ->render();
   
  # Enviamos el fichero PDF al navegador.
  //$mipdf ->stream('FicheroEjemplo.pdf')
   //$mipdf->stream($outfile);
   $mipdf->stream('my.pdf',array('Attachment'=>0));

?>