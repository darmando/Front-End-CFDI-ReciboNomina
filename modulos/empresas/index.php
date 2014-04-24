<?php
  //  require '../../../../php/seguridad.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Empresas</title>
</head>
	<meta charset='utf-8'> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap-fileupload.css">
	<link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.10.4.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/pnotify.custom.min.css">
<body>

	
<!--
	<div class="panel panel-primary ventanaEmpresas">
	      <div class="panel-heading">
	         <div class="row">  
	           <div class="col-md-6">
			        <h3 class="panel-title">Empresas</h3> 
	           </div>
	           <div class="col-md-6" align="right">
	           <i class="fa fa-minus" id="btnMinimizar"> </i>&nbsp;
	           <i class="fa fa-external-link" id="btnMaximizar"> </i>&nbsp;
	           <i class="fa fa-times" id="btnCerrar"> </i>
	           </div>
	         </div>
	      </div>
	      <div class="panel-body">
	      -->
	       <!-- INICIO PANEL BODY -->
			<div class="row">
			  <div class="col-md-4">
			  	<!-- INICIO DEL COL MD 3 -->
					<div class="row">
						   <div class="col-md-12">

								<form class="form-inline">
								  <div class="form-group">
								    <label class="sr-only" for="exampleInputEmail2">Email address</label>
								    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Buscar">
								  </div>
								  <button type="submit" class="btn btn-default">Encontrar</button>
								</form>

						   </div>
					</div>
					<br>
					<div class="list-group">
					      <ul class="list-group" id="listaEmpresas">

						  </ul>
				    </div>
			  	<!-- FIN -->
			  </div>
			  <div class="col-md-8">
			    <!-- INICIO DEL COL MD 9 -->
			    <div class="row">
			    	 <button type="button" id="btnNuevaEmpresa" class="btn btn-primary">Nueva Empresa</button>
			    </div>
			    <form id="formEmisor">
			    	<div class="row">
			    		  <div class="col-md-12">
			                      <label class="control-label" for="imagen">Imagen de usuario: </label>
			                      <div class="controls">
			                          <div class="fileupload fileupload-new" data-provides="fileupload">
			                            <div id="imgdefault" class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
			                              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" />
			                            </div>
			                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
			                            <div>
			                              <div class="btn btn-default btn-file">
			                                <span class="fileupload-new">Adjuntar</span>
			                                <span class="fileupload-exists">Cambiar</span>
			                                <input type="file" id="archivo" accept="image/*" />
			                              </div>
			                              <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Quitar</a>
			                            </div>
			                          </div>
			                      </div>
			    		  </div>

			    	</div>
			    	<div class="row">
			    		  <div class="col-md-12">
	                           <div class="form-group">
								    <label for="txtRazonSocial">Razón Social (Este dato es el que apareceráa en su Comprobante Fiscal)</label>
								    <input type="text" class="form-control" id="txtRazonSocial">
							   </div>
			    		  </div>

			    	</div>
			    	<div class="row">
			    		  <div class="col-md-6">
	                           <div class="form-group">
								    <label for="txtNombreEmpresa">Nombre</label>
								    <input type="text" class="form-control" id="txtNombreEmpresa">
							   </div>
			    		  </div>
			    		  <div class="col-md-6">
			    		  	   <div class="form-group">
								    <label for="txtRFC">RFC</label>
								    <input type="text" class="form-control" id="txtRFC">
							   </div>
			    		  </div>
			    	</div>
			    	<div class="row">
			    		  <div class="col-md-4">
	                           <div class="form-group">
								    <label for="txtCalle">Calle</label>
								    <input type="text" class="form-control" id="txtCalle">
							   </div>
			    		  </div>
			    		  <div class="col-md-4">
	                           <div class="form-group">
								    <label for="txtColonia">Colonia</label>
								    <input type="text" class="form-control" id="txtColonia">
							   </div>
			    		  </div>
			    		  <div class="col-md-2">
			    		  	   <div class="form-group">
								    <label for="txtNumExt">Num. Ext</label>
								    <input type="number" class="form-control" id="txtNumExt">
							   </div>
			    		  </div>
			    		  <div class="col-md-2">
			    		  	   <div class="form-group">
								    <label for="txtNumInt">Num. Int</label>
								    <input type="number" class="form-control" id="txtNumInt">
							   </div>
			    		  </div>
			    	</div>
			    	<div class="row">
			    		  <div class="col-md-2">
	                           <div class="form-group">
								    <label for="txtCP">C.P.</label>
								    <input type="number" class="form-control" id="txtCP">
							   </div>
			    		  </div>
			    		  <div class="col-md-3">
	                           <div class="form-group">
								    <label for="txtTelefono">Télefono</label>
								    <input type="number" class="form-control" id="txtTelefono">
							   </div>
			    		  </div>
			    		  <div class="col-md-3">
			    		  	   <div class="form-group">
								    <label for="txtFax">Fax</label>
								    <input type="number" class="form-control" id="txtFax">
							   </div>
			    		  </div>
			    		  <div class="col-md-4">
			    		  	   <div class="form-group">
								    <label for="txtEmail">Correo Electronico</label>
								    <input type="email" class="form-control" id="txtEmail">
							   </div>
			    		  </div>
			    	</div>
			    	<div class="row">
			    		  <div class="col-md-4">
	                           <div class="form-group">
								    <label for="selPais">Pais</label>
								    <select id="selPais" class="form-control">
									</select>
							   </div>
			    		  </div>
			    		  <div class="col-md-4">
			    		  	   <div class="form-group">
								    <label for="selEstado">Estado</label>
								    <select id="selEstado" class="form-control">
									</select>
							   </div>
			    		  </div>
			    		  <div class="col-md-4">
			    		  	   <div class="form-group">
								    <label for="selMunicipio">Municipio</label>
								    <select id="selMunicipio" class="form-control">
									</select>
							   </div>
			    		  </div>
			    	</div>
			    	<!-- 
			    	<div class="row divAlertaRegimenFis">
			    		<div class="alert alert-info fade in">
					      <h4>¿Desea Agregar Algún regimen Fiscal a esta empresa?</h4>
					        <button type="button" id="btnSiAgregarRF" class="btn btn-primary">Si</button>
					        <button type="button" id="btnNoAgregarRF" class="btn btn-default">En otro momento</button>
					  
					    </div>
			    	</div>
			    	<div class="row divRegimenFiscal" >
			    		  <div class="col-md-10">
	                           <div class="form-group">
								    <label for="selRegimenFiscal">Regimen Fiscal</label>
								    <select id="selRegimenFiscal" class="form-control">
									</select>
							   </div>
			    		  </div>
			    		  <div class="col-md-2">
							   <button type="button" id="btnAgregarEmpresa" class="btn btn-primary">Agregar</button>
			    		  </div>
			

			    	</div>
			    	-->
			    	<p>
					  <button type="button" id="btnAgregarEmpresa" class="btn btn-primary">Agregar Empresa</button>
					  <button type="button" id="btnGuardarCambios" class="btn btn-primary">Guardar Cambios</button>
					  <button type="button" id="btnLimpiarForm" class="btn btn-default">Limpiar</button>
					</p>
			     <form>		
			     <!-- FIN -->
			  </div>
			</div>
	

		   <!-- FIN DEL PANEL BOY -->
    <!--
	      </div>
	</div>
     -->



<!-- FIN DE MI CONTENIDO -->
    <script src="../../js/jquery-1.11.0.min.js"></script>
	<script src="../../js/jquery-ui-1.10.4.min.js" type="text/javascript" ></script>
	<script src="js/main.js"></script>
	<script src="../../js/bootstrap.min.js" type="text/javascript" ></script>
	<script type="text/javascript" src="../../js/bootstrap-fileupload.js"></script>
	<script src="../../js/pnotify.custom.min.js" type="text/javascript" ></script>
</body>
</html>