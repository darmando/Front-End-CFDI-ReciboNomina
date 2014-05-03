<?php
  //  require '../../../../php/seguridad.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Recibo de Nómina</title>
</head>
	<meta charset='utf-8'> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/pnotify.custom.min.css">
<body>
  <?php
      ob_start();
      require '../api/connector.php';
  ?>
<div class="form-horizontal">
<!-- INICIO DE MI CONTENIDO -->
<div class="container">
  <div class="row">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title">Patrón</h3>
	  </div>
	  <div class="panel-body">
	      <div class="row">
	      	  <div class="col-md-6">
	      	     <label for="txtRFCEmisor">RFC</label>
	      	  	 <input id="txtRFCEmisor" type="text" class="form-control" >
	      	  </div>
	      	  <div class="col-md-6">
	      	     <label for="txtEmisorRazonSocial">Razón social</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      </div>
	      <div class="row">
	      	  <div class="col-md-6">
	      	     <label for="txtRFCEmisor">Lugar de expedición:</label>
	      	  	 <input id="txtRFCEmisor" type="text" class="form-control" >
	      	  </div>
	      	  <div class="col-md-6">
	      	     <label for="txtEmisorRazonSocial">País de expedición:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      </div>
	      <div class="row">
	      	  <div class="col-md-6">
	      	     <label for="txtRFCEmisor">Fecha</label>
	      	  	 <input id="txtRFCEmisor" type="text" class="form-control" >
	      	  </div>
	      	  <div class="col-md-6">
	      	     <label for="txtEmisorRazonSocial">Régimen Fiscal:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" readonly>	      	  	
	      	  </div>
	      </div>
	      <div class="row">
 	      	  <div class="col-md-6">
    		        <label class="checkbox">
			            <input type="checkbox" id="chkEmisorInfoPatron"> Ver información del patrón        
			        </label>
			  </div>
	      </div>
		  <br>
		  <div class="row divInfoPatron">
		    <div class="col-md-12">
		  	  <div class="well">
			      <div class="row">
			      	  <div class="col-md-6">
			      	     <label for="txtRFCEmisor">Calle</label>
			      	  	 <input id="txtRFCEmisor" type="text" class="form-control" readonly>
			      	  </div>
			      	  <div class="col-md-6">
			      	     <label for="txtEmisorRazonSocial">Num. Exterior</label>
			      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" readonly>	      	  	
			      	  </div>
			      </div>
			      <div class="row">
			      	  <div class="col-md-6">
			      	     <label for="txtRFCEmisor">Num. Interior</label>
			      	  	 <input id="txtRFCEmisor" type="text" class="form-control" readonly>
			      	  </div>
			      	  <div class="col-md-6">
			      	     <label for="txtEmisorRazonSocial">Colonia</label>
			      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" readonly>	      	  	
			      	  </div>
			      </div>
			      <div class="row">
			      	  <div class="col-md-6">
			      	     <label for="txtRFCEmisor">Localidad</label>
			      	  	 <input id="txtRFCEmisor" type="text" class="form-control" readonly>
			      	  </div>
			      	  <div class="col-md-6">
			      	     <label for="txtEmisorRazonSocial">Estado</label>
			      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" readonly>	      	  	
			      	  </div>
			      </div>
			      <div class="row">
			      	  <div class="col-md-6">
			      	     <label for="txtRFCEmisor">Municipio</label>
			      	  	 <input id="txtRFCEmisor" type="text" class="form-control" readonly>
			      	  </div>
			      	  <div class="col-md-6">
			      	     <label for="txtEmisorRazonSocial">País</label>
			      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" readonly>	      	  	
			      	  </div>
			      </div>
			      <div class="row">
			      	  <div class="col-md-6">
			      	     <label for="txtRFCEmisor">C.P.</label>
			      	  	 <input id="txtRFCEmisor" type="text" class="form-control" readonly>
			      	  </div>
			      	  <div class="col-md-6">
			      	     <label for="txtEmisorRazonSocial">Registro Patronal</label>
			      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" readonly>	      	  	
			      	  </div>
			      </div>
              </div>
            </div>
		  </div> <!-- FIN DEL ROW -->

	  </div>
	</div>
  </div>
</div>

<!-- *************************************************************************************************************** -->

<div class="container">
  <div class="row">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title">Trabajador</h3>
	  </div>
	  <div class="panel-body">
	      <div class="row">
	      	  <div class="col-md-12">
	      	     <label for="txtRFCEmisor">Busqueda de trabajador:</label>
	      	  	 <input id="txtRFCEmisor" type="text" placeholder="Escriba el nombre del empleado..." class="form-control" >
	      	  </div>
	      </div>
	      <div class="row">
	      	  <div class="col-md-6">
	      	     <label for="txtRFCEmisor">RFC:</label>
	      	  	 <input id="txtRFCEmisor" type="text" class="form-control" >
	      	  </div>
	      	  <div class="col-md-6">
	      	     <label for="txtEmisorRazonSocial">Razón social:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      </div>

	    <!-- *****************************FECHA DE PAGO****************************** -->


		     <div class="row">
		     	<div class="col-md-3">
		     		<label>Fecha Inicial</label>      
		 		
		                <div class='input-group date' id='divDateFechaInicial' data-date-format='DD/MM/YYYY HH:mm:ss'>
		                    <input type='text' class="form-control" />
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
		            			      	
		     	</div>
		     	<div class="col-md-3">
		     		<label>Fecha Final</label>
				   
		                <div class='input-group date' id='divDateFechaFinal' data-date-format='DD/MM/YYYY HH:mm:ss'>
		                    <input type='text' class="form-control" />
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>				   
		     	</div>
		     	<div class="col-md-3">
		     		<label>Fecha de Pago</label>
		     		
		                <div class='input-group date' id='divDateFechaPago' data-date-format='DD/MM/YYYY HH:mm:ss'>
		                    <input type='text' class="form-control" />
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>		     		
		     	</div>
		     	<div class="col-md-3">
		     		<label>Número de dias trabajos</label>
		            <input type='number' class="form-control" />
		     	</div>
		     </div>

	      <div class="row">
 	      	  <div class="col-md-6">
    		        <label class="checkbox">
			            <input type="checkbox" id="chkReceptorInfoTrabajador"> Ver información del Trabajador        
			        </label>
			  </div>
	      </div>
		  <br>
		  <div class="row divInfoTrabajador">
		    <div class="col-md-12">
		  	  <div class="well">
			      <div class="row">
			      	  <div class="col-md-6">
			      	     <label for="txtRFCEmisor">Calle</label>
			      	  	 <input id="txtRFCEmisor" type="text" class="form-control" readonly>
			      	  </div>
			      	  <div class="col-md-6">
			      	     <label for="txtEmisorRazonSocial">Num. Exterior</label>
			      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" readonly>	      	  	
			      	  </div>
			      </div>
			      <div class="row">
			      	  <div class="col-md-6">
			      	     <label for="txtRFCEmisor">Colonia</label>
			      	  	 <input id="txtRFCEmisor" type="text" class="form-control" readonly>
			      	  </div>
			      	  <div class="col-md-6">
			      	     <label for="txtEmisorRazonSocial">CURP</label>
			      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" readonly>	      	  	
			      	  </div>
			      </div>
			      <div class="row">
			      	  <div class="col-md-6">
			      	     <label for="txtRFCEmisor">Estado</label>
			      	  	 <input id="txtRFCEmisor" type="text" class="form-control" readonly>
			      	  </div>
			      	  <div class="col-md-6">
			      	     <label for="txtEmisorRazonSocial">Municipio</label>
			      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" readonly>	      	  	
			      	  </div>
			      </div>
			      <div class="row">
			      	  <div class="col-md-6">
			      	     <label for="txtRFCEmisor">País</label>
			      	  	 <input id="txtRFCEmisor" type="text" class="form-control" readonly>
			      	  </div>
			      	  <div class="col-md-6">
			      	     <label for="txtEmisorRazonSocial">C.P.</label>
			      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" readonly>	      	  	
			      	  </div>
			      </div>
			      <div class="row">
			      	  <div class="col-md-6">
			      	     <label for="txtRFCEmisor">Tipo Regimen</label>
			      	  	 <input id="txtRFCEmisor" type="text" class="form-control" readonly>
			      	  </div>
			      	  <div class="col-md-6">
			      	     <label for="txtEmisorRazonSocial">No. Seguro Social</label>
			      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" readonly>	      	  	
			      	  </div>
			      </div>
              </div>
            </div>
		  </div>

	  </div>
	</div>
  </div>
</div>
<!-- *************************************************************************************************************** -->

<div class="container">
  <div class="row">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title">Forma de Pago</h3>
	  </div>
	  <div class="panel-body">
	      <div class="row" align="center">
 	      	  <div class="col-md-12">
					<div id="grupoChkFormaPago">
					  <label class="">
					    <input type="checkbox" name="grupoChkFP" value="FormaPago"  id="chkFormaPago" checked> Forma de pago 
					  </label>
					  <label class=""> 
					    <input type="checkbox" name="grupoChkFP" value="MetodoPago" id="chkMetodoPago" checked>Método de pago 
					  </label>
					  <label class=""> 
					    <input type="checkbox" name="grupoChkFP" value="Moneda"  id="chkMoneda" checked>Moneda
					  </label>
					</div>					
        	  </div>
	      </div>
		  </br>
	    <!-- ************************* FORMA DE PAGO********************************** -->
		<div class="panel panel-default divFormaPago">
		  <div class="panel-body">
			  <label>Forma de Pago</label>
   			  <select name="tipo" id="selPFForma_pago" class="form-control" id="selFPMetodoPago">
			    <option value="">Seleccionar</option>
		      </select>
		  </div>
		</div>
	    <!-- ***************************METODO DE PAGO******************************** -->
		<div class="panel panel-default divMetodoPago">
		  <div class="panel-body">
		     <div class="row">
		       <div class="col-md-12">
			   	  <label>Método de pago</label>
			   	  <select name="tipo" class="form-control" id="selFPMetodoPago">
				     <option value="">Seleccionar</option>
			   	  </select>
			   </div>		    	
		     </div>
		     <div class="row">
		        <div class="col-xs-4">
				    <label>Cuenta</label>
			     	<input type="number" id="txtFPFechaTipoCambio" class="form-control" maxlength="4" placeholder="Escribe los ultimos 4 digitos de la tarjeta"> 	
			    </div>
		     </div>
		   </div>
		</div>
	    <!-- ****************************MONEDA******************************* -->
		<div class="panel panel-default divMoneda">
		  <div class="panel-body">

		     <div class="row">
		     	<div class="col-md-4">
		     		  <label>Moneda</label>
					  <select name="tipo" class="form-control" id="selFPMetodoPago">
						<option value="">Seleccionar</option>
					  </select>	
		     	</div>
		     	<div class="col-md-4">
		     		<label>Tipo de Cambio</label>
				    <input type="text" class="form-control"  id="txtFPTipoCambio">	
		     	</div>
		     	<div class="col-md-4">
		     		<label>Fecha Tipo Cambio</label>
		     		<input type="text" id="txtFPFechaTipoCambio" class="form-control" readonly="">
		     	</div>
		     </div>

		   </div>
		</div>

	    <!-- *********************************************************** -->

	  </div>
	</div>
  </div>
</div>

<!-- *************************************************************************************************************** -->

<div class="container">	
	<div class="row">
	  <div class="col-md-12">
		<div class="page-header">
		  <h2>Percepciones</h2>
	    </div>
	   </div>
	</div>
</div>

<!-- *************************************************************************************************************** -->

<div class="container">
  <div class="row">
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar percepciones</h3>
	  </div>
	  <div class="panel-body">
	      <div class="row">
	      	  <div class="col-md-12">
	      	     <label for="txtRFCEmisor">Busqueda de persepción:</label>
	      	  	 <input id="txtRFCEmisor" type="text" placeholder="Escriba el nombre del empleado..." class="form-control" >
	      	  </div>
	      </div>
	      </br>
	      <div class="row">
	      	  <div class="col-md-2">
	      	     <label for="txtRFCEmisor">Nombre de la persepción:</label>
	      	  	 <input id="txtRFCEmisor" type="text" class="form-control" >
	      	  </div>
	      	  <div class="col-md-1">
	      	     <label for="txtEmisorRazonSocial">Clave Agrupadora:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      	  <div class="col-md-1">
	      	     <label for="txtEmisorRazonSocial">Clave de persepción:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      	  <div class="col-md-5">
	      	     <label for="txtEmisorRazonSocial">Descripcíon:</label>
	      	  	 <textarea id="txtEmisorRazonSocial" type="text" class="form-control"></textarea>      	  	
	      	  </div>
	      	  <div class="col-md-1">
	      	     <label for="txtEmisorRazonSocial">Importe Gravado:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control">     	  	
	      	  </div>
	      	  <div class="col-md-1">
	      	     <label for="txtEmisorRazonSocial">Importe Excento:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control">      	  	
	      	  </div>
	      	  <div class="col-md-1">
	      	    <label for="txtEmisorRazonSocial"></label>
				<button type="button" class="btn btn-primary">Agregar</button>
	      	  </div>
	      </div>
		  </br>
		  <div class="row">
		    <div class="col-md-12">
		  	  
				<div class="panel panel-default">
				      <!-- Default panel contents -->
				      <div class="panel-heading">Tus percepciones</div>

				      <!-- Table -->
				      <table class="table">
				        <thead>
				          <tr>
				            <th>Nombre</th>
				            <th>Clave Agrupadora</th>
				            <th>Clave persepción</th>
				            <th>Importe Gravado</th>
				            <th>Importe Excento</th>
				            <th>Editar</th>
				            <th>Eliminar</th>				        
				        </thead>
				        <tbody>
				          <tr>
				            <td>1</td>
				            <td>Mark</td>
				            <td>Otto</td>
				            <td>@mdo</td>
				            <td>@mdo</td>
				            <td>@mdo</td>
				            <td>@mdo</td>
				          </tr>
				        </tbody>
				      </table>
				    </div>

            </div>
		  </div>

	  </div>
	</div>
  </div>
</div>

<!-- *************************************************************************************************************** -->

<div class="container">
  <div class="row">
	<div class="panel panel-danger">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar deducciones</h3>
	  </div>
	  <div class="panel-body">
	      <div class="row">
	      	  <div class="col-md-12">
	      	     <label for="txtRFCEmisor">Busqueda de deducción:</label>
	      	  	 <input id="txtRFCEmisor" type="text" placeholder="Escriba el nombre del empleado..." class="form-control" >
	      	  </div>
	      </div>
	      </br>
	      <div class="row">
	      	  <div class="col-md-2">
	      	     <label for="txtRFCEmisor">Nombre de la deducción:</label>
	      	  	 <input id="txtRFCEmisor" type="text" class="form-control" >
	      	  </div>
	      	  <div class="col-md-1">
	      	     <label for="txtEmisorRazonSocial">Clave Agrupadora:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      	  <div class="col-md-1">
	      	     <label for="txtEmisorRazonSocial">Clave de deducción:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      	  <div class="col-md-5">
	      	     <label for="txtEmisorRazonSocial">Descripcíon:</label>
	      	  	 <textarea id="txtEmisorRazonSocial" type="text" class="form-control"></textarea>      	  	
	      	  </div>
	      	  <div class="col-md-1">
	      	     <label for="txtEmisorRazonSocial">Importe Gravado:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control">     	  	
	      	  </div>
	      	  <div class="col-md-1">
	      	     <label for="txtEmisorRazonSocial">Importe Excento:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control">      	  	
	      	  </div>
	      	  <div class="col-md-1">
	      	    <label for="txtEmisorRazonSocial"></label>
				<button type="button" class="btn btn-primary">Agregar</button>
	      	  </div>
	      </div>
		  </br>
		  <div class="row">
		    <div class="col-md-12">
		  	  
				<div class="panel panel-default">
				      <!-- Default panel contents -->
				      <div class="panel-heading">Tus deducciones</div>

				      <!-- Table -->
				      <table class="table">
				        <thead>
				          <tr>
				            <th>Nombre</th>
				            <th>Clave Agrupadora</th>
				            <th>Clave Deducción</th>
				            <th>Importe Gravado</th>
				            <th>Importe Excento</th>
				            <th>Editar</th>
				            <th>Eliminar</th>				        
				        </thead>
				        <tbody>
				          <tr>
				            <td>1</td>
				            <td>Mark</td>
				            <td>Otto</td>
				            <td>@mdo</td>
				            <td>@mdo</td>
				            <td>@mdo</td>
				            <td>@mdo</td>
				          </tr>
				        </tbody>
				      </table>
				    </div>

            </div>
		  </div>

	  </div>
	</div>
  </div>
</div>

<!-- *************************************************************************************************************** -->

<div class="container">
  <div class="row">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title">Incapacidades</h3>
	  </div>
	  <div class="panel-body">
	      </br>
	      <div class="row">
	      	  <div class="col-md-3">
	      	     <label for="txtRFCEmisor">Dias Incapacidad:</label>
	      	  	 <input id="txtRFCEmisor" type="text" class="form-control" >
	      	  </div>
	      	  <div class="col-md-3">
	      	     <label for="txtEmisorRazonSocial">Tipo de incapacidad:</label>
				 <select name="disability_type" id="disability_type" class="form-control">
					 <option value="">Seleccione uno</option>
					 <option value="1">Riesgo de Trabajo</option>
					 <option value="2">Enfermedad en general</option>
					 <option value="3">Maternidad</option>
				 </select>
	      	  </div>
	      	  <div class="col-md-3">
	      	     <label for="txtEmisorRazonSocial">Descuento por la incapacidad:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      	  <div class="col-md-3">
	      	    <label for="txtEmisorRazonSocial"></label>
				<button type="button" class="btn btn-primary">Agregar</button>
	      	  </div>
	      </div>
		  </br>
		  <div class="row">
		    <div class="col-md-12">
		  	  
				<div class="panel panel-default">
				      <!-- Default panel contents -->
				      <div class="panel-heading">Tus deducciones</div>

				      <!-- Table -->
				      <table class="table">
				        <thead>
				          <tr>
				            <th>Dias de Incapacidad</th>
				            <th>Tipo de incapacidad</th>
				            <th>Descuento por la incapacidad</th>
				            <th>Editar</th>
				            <th>Eliminar</th>
				          </tr>
				        </thead>
				        <tbody>
				          <tr>
				            <td>1</td>
				            <td>Mark</td>
				            <td>Otto</td>
				            <td>@mdo</td>
				            <td>@mdo</td>
				          </tr>
				        </tbody>
				      </table>
				    </div>

            </div>
		  </div>

	  </div>
	</div>
  </div>
</div>
<!-- *************************************************************************************************************** -->

<div class="container">
  <div class="row">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title">Horas Extra</h3>
	  </div>
	  <div class="panel-body">
	      </br>
	      <div class="row">
	      	  <div class="col-md-3">
	      	     <label for="txtRFCEmisor">Numero de Dias en que el trabajor realizo horas extra:</label>
	      	  	 <input id="txtRFCEmisor" type="text" class="form-control" >
	      	  </div>
	      	  <div class="col-md-2">
	      	     <label for="txtEmisorRazonSocial">Tipo de pago de horas extra:</label>
				 <select name="hours_extra_type" id="hours_extra_type" class="form-control">
                    <option value="">Seleccione uno</option>
                    <option value="1">Dobles</option>
                    <option value="2">Triples</option>
                 </select>	      	  
			  </div>
	      	  <div class="col-md-2">
	      	     <label for="txtEmisorRazonSocial">Numero de Horas extra:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      	  <div class="col-md-2">
	      	     <label for="txtEmisorRazonSocial">Importe pagado:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      	  <div class="col-md-2">
	      	     <label for="txtEmisorRazonSocial">Total:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      	  <div class="col-md-1">
	      	    <label for="txtEmisorRazonSocial"></label>
				<button type="button" class="btn btn-primary">Agregar</button>
	      	  </div>
	      </div>
		  </br>
		  <div class="row">
		    <div class="col-md-12">
		  	  
				<div class="panel panel-default">
				      <!-- Default panel contents -->
				      <div class="panel-heading">Tus deducciones</div>

				      <!-- Table -->
				      <table class="table">
				        <thead>
				          <tr>
				            <th>Dias de Incapacidad</th>
				            <th>Tipo de incapacidad</th>
				            <th>Descuento por la incapacidad</th>
				            <th>Editar</th>
				            <th>Eliminar</th>
				          </tr>
				        </thead>
				        <tbody>
				          <tr>
				            <td>1</td>
				            <td>Mark</td>
				            <td>Otto</td>
				            <td>@mdo</td>
				            <td>@mdo</td>
				          </tr>
				        </tbody>
				      </table>
				    </div>

            </div>
		  </div>

	  </div>
	</div>
  </div>
</div>


<!-- *************************************************************************************************************** -->

<div class="container">
  <div class="row">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title">Totals</h3>
	  </div>
	  <div class="panel-body">
	      </br>
	      <div class="row">
	      	  <div class="col-md-10">
	      	     <label>Importe con Letra</label>
				 <input type="text"  class="form-control" id="txtNumeroALetra" readonly>
	      	  </div>
	      	  <div class="col-md-2">
					<div class="span2" id="groupRadioIdioma">					
						<label class="radio">
						     <input type="radio" name="opcionIdioma" id="opcionIdioma1" value="esp" checked>
						  	 Español
						</label>
						<label class="radio">
						     <input type="radio" name="opcionIdioma" id="opcionIdioma2" value="ing">
						  	 Ingles
						</label>
					</div>
          	   </div>
	      </div>
		  </br>
		  <div class="row" align="right">
			    <div class="col-md-4">
	            </div>
			    <div class="col-md-4">
	            </div>
			    <div class="col-md-4">
					<div class="form-group">
					    <label for="inputEmail3" class="col-sm-4 control-label">Subtotal</label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="inputEmail3">
					    </div>
					</div>
	            </div>
		  </div>
		  <div class="row" align="right">
			    <div class="col-md-4">
	 				<label class="checkbox col-sm-4 control-label">
	 				   <div class="col-sm-8">
				         <input type="checkbox" id="chkInfoFFO"> Redondear total   
				       </div>  
				     </label>	
			    </div>
			    <div class="col-md-4">
	 				<label class="checkbox col-sm-12 control-label">
	 				   <div class="col-sm-8">
				         <input type="checkbox" id="chkInfoFFO"> Ajustar cifras totales manualmente 
				       </div>  
				     </label>	
		        </div>
			    <div class="col-md-4">
					<div class="form-group">
					    <label for="inputEmail3" class="col-sm-4 control-label">Persepciones</label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="inputEmail3">
					    </div>
					</div>
	            </div>
		  </div>
		  <div class="row" align="right">
			    <div class="col-md-4">
	            </div>
			    <div class="col-md-4">
	            </div>
			    <div class="col-md-4">
					<div class="form-group">
					    <label for="inputEmail3" class="col-sm-4 control-label">Descuento</label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="inputEmail3">
					    </div>
					</div>
	            </div>
		  </div>
		  <div class="row" align="right">
			    <div class="col-md-4">
	            </div>
			    <div class="col-md-4">
	            </div>
			    <div class="col-md-4">
					<div class="form-group">
					    <label for="inputEmail3" class="col-sm-4 control-label">ISR</label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="inputEmail3">
					    </div>
					</div>
	            </div>
		  </div>
		  <div class="row" align="right">
			    <div class="col-md-4">
	            </div>
			    <div class="col-md-4">
	            </div>
			    <div class="col-md-4">
					<div class="form-group">
					    <label for="inputEmail3" class="col-sm-4 control-label">Total</label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="inputEmail3">
					    </div>
					</div>
	            </div>
		  </div>

	  </div>
	</div>
  </div>
</div>



<!-- FIN DE MI CONTENIDO -->
</div>
    <script src="../js/jquery-1.11.0.min.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript" src="../js/moment.min.js"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript" ></script>
	<script src="../js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<!--	<script src="../js/bootstrap-datetimepicker.es.js" type="text/javascript"></script> -->
	<script src="../js/pnotify.custom.min.js" type="text/javascript" ></script>
</body>
</html>