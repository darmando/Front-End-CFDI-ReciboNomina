<!DOCTYPE html>
<html lang="es">
<head>
	<title>CFDI</title>
</head>
	<meta charset='utf-8'> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<body>
<div class="form-horizontal">
<!-- INICIO DE MI CONTENIDO -->

<div class="container">
  <div class="row">
	<div class="panel panel-default">
	  <div class="panel-body">
	      <div class="row"> 
	        <div class="col-md-6">
	          	<label>Seleccione Tipo de CFDI:</label>	
				 <select name="tiposcomprobante" class="form-control" id="tiposcomprobante">
				</select>
	        </div>
	        <div class="col-md-6">
	          	<label>Seleccione su Paquete:</label>	
				 <select name="tiposcomprobante" class="form-control" id="tiposcomprobante">
				</select>
	        </div>
	      </div>
	  </div>
	</div>
  </div>
</div>

<!-- ********************************************************************* -->
<div class="container">
  <div class="row">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title">Emisor</h3>
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
			            <input type="checkbox" id="chkEmisonInfoCliente"> Ver información del patrón        
			        </label>
			  </div>
	      </div>

		  <div class="row">
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
	    <h3 class="panel-title">Receptor</h3>
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
	      <div class="row">
 	      	  <div class="col-md-6">
    		        <label class="checkbox">
			            <input type="checkbox" id="chkEmisonInfoCliente"> Ver información del patrón        
			        </label>
			  </div>
	      </div>

		  <div class="row">
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
					<div class="btn-group btn-group-lg">
					        <button type="button" id="chkFPFP" class="btn btn-default">Forma de pago</button>
					        <button type="button" id="chkFPMetodoPago" class="btn btn-default">Método de pago</button>
					        <button type="button" id="chkFPMoneda" class="btn btn-default">Moneda</button>
					        <button type="button" id="chkFechaPago" class="btn btn-default">Fecha de pago </button>
					</div>
        	  </div>
	      </div>
		  </br>
	    <!-- ************************* FORMA DE PAGO********************************** -->
		<div class="panel panel-default">
		  <div class="panel-body">

		     <div class="row">
		     	<div class="col-md-12">
					<label>Forma de Pago</label>
		   			<select name="tipo" id="selPFForma_pago" class="form-control" id="selFPMetodoPago">
					   <option value="">Seleccionar</option>
				    </select>
		     	</div>
		      </div>
			  </br>
				<!-- ***************************************************** -->
						 <div class="panel panel-default">
							  <div class="panel-body">
							  
							     <div class="row">
							     	<div class="col-md-3">
 										<label>Folio Fiscal Original (UUID):</label>
								 		<input type="text" class="form-control" id="txtFPFFO">
							     	</div>
							     	<div class="col-md-3">
 										<label>Serie Folio Fiscal Original:</label>
								 		<input type="text" class="form-control" id="txtFPFFO">
							     	</div>
							     	<div class="col-md-3">
 										<label>Fecha Folio Fiscal Original::</label>
								 		<input type="text" class="form-control" id="txtFPFFO">
							     	</div>
							     	<div class="col-md-3">
 										<label>Monto Folio Fiscal Original:</label>
								 		<input type="text" class="form-control" id="txtFPFFO">
							     	</div>
							     </div>
							     </br>
							     <div class="row">
							     	<div class="col-md-3">
										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">Pago:</label>
										    <div class="col-sm-10">
										      <input type="email" class="form-control" id="inputEmail3">
										    </div>
										  </div>			
							     	</div>
							     	<div class="col-md-3">
										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">De:</label>
										    <div class="col-sm-10">
										      <input type="email" class="form-control" id="inputEmail3">
										    </div>
										  </div>							     	
								    </div>
							      </div>
					   
							  </div>
							</div>
				<!-- ***************************************************** -->
   
		  </div>
		</div>
	    <!-- ************************* CONDICIONES DE PAGO********************************** -->
		<div class="panel panel-default">
		  <div class="panel-body">
			  <label>Condiciones de Pago</label>
			  <input type="text" class="form-control" id="txtFPMotivoDescuento">		   
		  </div>
		</div>
	    <!-- ***************************METODO DE DESCUENTO******************************** -->
		<div class="panel panel-default">
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
		       <div class="col-md-12">
		         <label>Cuenta</label>
			     <input type="text" class="form-control camposNumericos" id="txtFPcuenta" maxlength="4" placeholder="Escribe los ultimos 4 digitos de la tarjeta">
		       </div>
		    </div>
			 	
		   </div>
		</div>
	    <!-- ***************************MOTIVO DE PAGO******************************** -->
		<div class="panel panel-default">
		  <div class="panel-body">
			  <label>Motivo de descuento</label>
			  <input type="text" class="form-control" id="txtFPMotivoDescuento">		   
		  </div>
		</div>
	    <!-- ****************************MONEDA******************************* -->
		<div class="panel panel-default">
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
		  <h2>Conceptos</h2>
	    </div>
	   </div>
	</div>
</div>

<!-- *************************************************************************************************************** -->

<div class="container">
  <div class="row">
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar Conceptos</h3>
	  </div>
	  <div class="panel-body">
	  	  <div class="row">
	  	    <div class="col-md-6">
	  	    	<label class="checkbox">Impuesto trasladado:</label>
		  	  	 <label class="checkbox"><input data-impuestoid="impuesto.id_impuesto" name="impuestosTrasladado" type="checkbox" value="impuesto.id_impuesto"  class="chkGrupoFormaPago" >IVA, (IVA, 16%)</label>	  	    	
	  	    </div>
	  	    <div class="col-md-6">
	  	    	<label class="checkbox">Impuesto retenido:</label>
		  	  	 <label class="checkbox"><input data-impuestoid="impuesto.id_impuesto" name="impuestosTrasladado" type="checkbox" value="impuesto.id_impuesto"  class="chkGrupoFormaPago" >IVA, (IVA, 16%)</label>	  	    	
	  	    </div>
	  	  </div>
	  	  </br>
	      <div class="row">
	      	  <div class="col-md-12">
	      	     <label for="txtRFCEmisor">Busqueda de concepto:</label>
	      	  	 <input id="txtRFCEmisor" type="text" placeholder="Escriba el nombre del concepto..." class="form-control" >
	      	  </div>
	      </div>
	      </br>
	      <div class="row">
	      	  <div class="col-md-1">
	      	     <label for="txtRFCEmisor">Cantidad:</label>
	      	  	 <input id="txtRFCEmisor" type="text" class="form-control" >
	      	  </div>
	      	  <div class="col-md-1">
	      	     <label for="txtEmisorRazonSocial">Unidad:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      	  <div class="col-md-5">
	      	     <label for="txtEmisorRazonSocial">Descripción:</label>
	      	  	 <textarea id="txtEmisorRazonSocial" type="text" class="form-control"></textarea>      	  	
	      	  </div>
	      	  <div class="col-md-2">
	      	     <label for="txtEmisorRazonSocial">Precio Unitario:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control" >	      	  	
	      	  </div>
	      	  <div class="col-md-1">
	      	     <label for="txtEmisorRazonSocial">Descuento:</label>
	      	  	 <input id="txtEmisorRazonSocial" type="text" class="form-control">     	  	
	      	  </div>
	      	  <div class="col-md-1">
	      	     <label for="txtEmisorRazonSocial">Importe:</label>
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
				      <div class="panel-heading">Tus Conceptos</div>

				      <!-- Table -->
				      <table class="table">
				        <thead>
				          <tr>
				            <th>#</th>
				            <th>Cantidad</th>
				            <th>Unidad</th>
				            <th>Descripción</th>
				            <th>Precio</th>
				            <th>Descuento</th>
				            <th>Importe</th>				        
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
					    <label for="inputEmail3" class="col-sm-4 control-label">Subtotal generado</label>
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
					    <label for="inputEmail3" class="col-sm-4 control-label">Trasladados</label>
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
					    <label for="inputEmail3" class="col-sm-4 control-label">Retenidos</label>
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
	<script src="../js/bootstrap.min.js" type="text/javascript" ></script>
</body>
</html>