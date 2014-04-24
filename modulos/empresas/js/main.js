var paisURL = "api/pais";
var estadoURL = "api/estado";
var municipioURL = "api/municipio";
var empresasURL = "api/emisores";
var idPais = '';
var idEstado = '';
var idMunicipio = '';
var idEmisor = '';
var datosEmisor = new FormData($('#formEmisor')[0]);
$(document).ready(function(){
$('#formEmisor').hide();
findAll();
llenarSelPaises();
$('.fa-external-link').hide();
$('.divRegimenFiscal').hide();	


});


/****************************EVENTOS*******************************/
$('#btnSiAgregarRF').click(function(){
  $('.divAlertaRegimenFis').hide();
  $('.divRegimenFiscal').show();
});
$('#btnNoAgregarRF').click(function(){
  limpiarFormulario();
  $('.divAlertaRegimenFis').hide();
  $('.divRegimenFiscal').hide();
});

$('#listaEmpresas').on('click','i', function() {
    if ($(this).data('ideditemisor')) {
		idEmisor = $(this).data('ideditemisor');
		mostrarDatosEmisor(idEmisor);

    }
    if ($(this).data('iddelemisor')) {
		idEmisor = $(this).data('iddelemisor');
         if ($(this).data('status') == '1'){
         	 if( confirm('Desea Inactivar la Empresa') ){
         	 	 alert('si');
         	 }else{
         	 	alert('no');
         	 }
         } else{
         	 if( confirm('Desea Activar la Empresa') ){
         	 	 alert('si');
         	 }else{
         	 	alert('no');
         	 }  		     
         }
    }
    
	$(this).each(function() {
		 // $(this).css('color','black');
		  $(this).removeClass('seleccionado');
		});
	$(this).addClass('seleccionado');
	
});

$('#btnMinimizar').click(function(){
  $('.panel-body').hide();
  $('#btnMaximizar').show();
  $(this).hide();
});
$('#btnMaximizar').click(function(){
  $('.panel-body').show();
  $('#btnMinimizar').show();
  $(this).hide();
});

$('#btnCerrar').click(function(){
	if(confirm('¿Desea Cerrar la ventana?') == true){
	  var padre = $(window.parent.document);
	  $(padre).find('#divPanelPrincipal').addClass('magictime slideUpRetourn');
	  $(padre).find('#divPanelPrincipal').show();
      $(padre).find("#frameEmpresa").attr('src','');
      $(padre).find("#frameEmpresa").hide();
	//  $(padre).find('#divPanelPrincipal').addClass('magictime slideUp');
	 setTimeout(function() {
   	 },700);

	}else{
		alert('no');
	}
});




$('#btnNuevaEmpresa').click(function(){
   $('#btnGuardarCambios').hide();
   $('#formEmisor').fadeIn('fast');
   $('#btnAgregarEmpresa').show();
});

$('#btnLimpiarForm').click(function(){
	limpiarFormulario();
});

function limpiarFormulario(){
	$('#formEmisor')[0].reset();
	//$('#selPais option').remove();
	$('#selEstado option').remove();
	$('#selMunicipio option').remove();
}

$('#btnAgregarEmpresa').click(function(){
	if ( $('#txtNombreEmpresa').val() == '' ){ 
		alert('Debe completar el campo ');
		return false;
	}     
	if ( $('#txtRFC').val() == '' ){ 
		alert('Debe completar el campo ');
		return false;
	}
	if ( $('#txtCalle').val() == '' ){ 
		alert('Debe completar el campo ');
		return false;
	}
	if ( $('#txtNumExt').val() == '' ){ 
		alert('Debe completar el campo ');
		return false;
	}
	if ( $('#txtColonia').val() == '' ){ 
		alert('Debe completar el campo ');
		return false;
	}
	if ( $('#txtRazonSocial').val() == '' ){ 
		alert('Debe completar el campo ');
		return false;
	}
	if ( idMunicipio == '' ){ 
		alert('Debe completar el campo ');
		return false;
	}
	insertarEmisor()
});

$('#btnGuardarCambios').click(function(){
  actualizarEmisor();
});
/********************ACTUALIZAR REGISTRO EN LA BSSE DE DATOS *******/
function actualizarEmisor(){
	$.ajax({
		type: 'POST',
		url: "api/actualizarEmisor.php",
		data: datosFormEmisor(),
		processData: false,
		cache: false,
		contentType :  false,
	    mimeType    : false,
		success: function(data, textStatus, jqXHR){
		 if (data == 1) {
				new PNotify({
				    title: '¡Bien Hecho!',
				    text: 'Los Datos se actualizarón con Exito.',
				    type: 'success'
				});
				
		 }else{

		 }
		findAll();
		},
		error: function(jqXHR, textStatus, errorThrown){
		    new PNotify({
			    title: 'Oh No!',
			    text: ''+textStatus,
			    type: 'error'
			});
		}
	});
}
/*******************INSERTS A LA BASE DE DATOS***********************/
    function datosFormEmisor(){
		//metodo para obtener valores del formulario popup
		  inputArchivo = document.getElementById('archivo');
		  archivo = inputArchivo.files[0];
		 		
		  datosEmisor.append('RazonSocial',  $('#txtRazonSocial').val());
		  datosEmisor.append('NombreEmpresa',$('#txtNombreEmpresa').val());
		  datosEmisor.append('RFC',		     $('#txtRFC').val().toUpperCase());
		  datosEmisor.append('Calle',        $('#txtCalle').val());
		  datosEmisor.append('Colonia',	     $('#txtColonia').val());
		  datosEmisor.append('NumExt',	     $('#txtNumExt').val());
		  datosEmisor.append('NumInt',	     $('#txtNumInt').val());
		  datosEmisor.append('CP',		     $('#txtCP').val()); 
		  datosEmisor.append('Telefono',     $('#txtTelefono').val());
		  datosEmisor.append('Fax',          $('#txtFax').val());
		  datosEmisor.append('Email',        $('#txtEmail').val());		
		  datosEmisor.append('idMunicipio',  idMunicipio);		
	 	  datosEmisor.append('archivo',      archivo);
     	  datosEmisor.append('idEmisor',  idEmisor);		
		  return datosEmisor; 	    				
    }
function insertarEmisor(){
	$.ajax({
		type: 'POST',
		url: "api/insertarEmisor.php",
		data: datosFormEmisor(),
		processData: false,
		cache: false,
		contentType :  false,
	    mimeType    : false,
		success: function(data, textStatus, jqXHR){
		 if (data == 1) {
				new PNotify({
				    title: '¡Bien Hecho!',
				    text: 'La empresa de dio de alta, con Exito.',
				    type: 'success'
				});
				
		 }else{

		 }
		findAll();
		},
		error: function(jqXHR, textStatus, errorThrown){
		    new PNotify({
			    title: 'Oh No!',
			    text: ''+textStatus,
			    type: 'error'
			});
		}
	});
}
/*
		function insertarEmisor() {
			$.ajax({
				type: 'POST',
				contentType: 'application/json',
				dataType: "json",
				data: datosEmisor(),
				url: urlDepenteUsuarios+'/'+idUsuarioActual,
				success: function(data) {
					console.log(data);
				    $('#selected-color3').css('background-color', '');
				    $('#selected-color3').val('');
			
				}
			});
		}


		function datosEmisor() {
			return JSON.stringify({
				"txtRazonSocial"  : $('#txtRazonSocial').val(),
				"txtNombreEmpresa": $('#txtNombreEmpresa').val(),
				"txtRFC"		  : $('#txtRFC').val(),
				"txtCalle"		  : $('#txtCalle').val(),
				"txtColonia"      : $('#txtColonia').val(),
				"txtNumExt"       : $('#txtNumExt').val(),
				"txtNumInt"       : $('#txtNumInt').val(),
				"txtCP"			  : $('#txtCP').val(),
				"txtTelefono"	  : $('#txtTelefono').val(),
				"txtFax"		  : $('#txtFax').val(),
				"txtEmail"	      : $('#txtEmail').val(),
				"idMunicipio"	  : idMunicipio
				});
		}
*/
	

/***************CONSULTAS A LAS BASE DE DATOS******************/

/*********************METODO PARA MOSTRAR LA LISTA DE USUARIOS*************************/



function mostrarDatosEmisor(idEmisor){
	$.ajax({
		type: 'GET',
		url: empresasURL + '/' + idEmisor,
		dataType: "json", // data type of response
		success: function(data){
		   renderEmisor(data);
		}
	});
}

function renderEmisor(data){
	    $('#btnGuardarCambios').show();
	    $('#btnAgregarEmpresa').hide();
	    $('#formEmisor').fadeIn('fast');
		$('#txtRazonSocial').val(data.razon_social);
		$('#txtNombreEmpresa').val(data.nombre)
		$('#txtRFC').val(data.rfc);
		$('#txtCalle').val(data.calle);
		$('#txtColonia').val(data.colonia);
		$('#txtNumInt').val(data.num_interior)
		$('#txtNumExt').val(data.numero_exterior);
		$('#txtCP').val(data.cp);
		$('#txtTelefono').val(data.telefono)
		$('#txtFax').val(data.fax);
		$('#txtEmail').val(data.correo_electronico);
		idMunicipio = data.idMunicipio;
		llenarSelPaises(data.idPais);
		llenarSelEstados(data.idPais, data.idEstado)
		llenarSelMunicipios(data.idEstado,data.idMunicipio);
 	    archivo = data.foto.replace(/\s/g,'');
    	var url_imagen = "../../img/logosEmpresas/"+data.idEmisor+'/'+archivo;
    	$('#imgdefault').html("<img src='"+url_imagen+"'style='max-width: 200px; max-height: 150px; line-height: 20px;'/>");
    	
}

function findAll() {
	$.ajax({
		type: 'GET',
		url: empresasURL,
		dataType: "json", // data type of response
		beforeSend: function(){
			// $('#mensaje').html('<img src="img/ajax-loader.gif" alt="Cargando..."/> Cargando usuarios...');
		},
		success: renderList
	});
}


/*METODO PARA  IMPRIMIR EN LA VISTA LOS USUARIOS*/
function renderList(data) {
	//$('#mensaje').html('Selecciona un usuario.');
	var list = data == null ? [] : (data.emisores instanceof Array ? data.emisores : [data.emisores]);
	$('#listaEmpresas a').remove();
	$.each(list, function(index, emisor) {	
	    if ( emisor.activo == 1) { // si el usuario es 1 esta activo
			$('#listaEmpresas').append('<a class="list-group-item"><div class="activo"><i class="fa fa-check" data-status='+emisor.activo+' data-idDelEmisor='+emisor.idEmisor+'></i></div><div class="editarEmisor"><i class="fa fa-pencil" data-idEditEmisor='+emisor.idEmisor+'></i></div>'+emisor.nombre+'</a>');		
	    } else{
			$('#listaEmpresas').append('<a class="list-group-item"><div class="inactivo"><i class="fa fa-times" data-status='+emisor.activo+' data-idDelEmisor='+emisor.idEmisor+'></i></div><div class="editarEmisor"><i class="fa fa-pencil" data-idEditEmisor='+emisor.idEmisor+'></i></div>'+emisor.nombre+'</a>');		
	    }		
	});
}

/***********************************************METODOS PARA EL BUSCADOR********************************************/

function search(searchKey) {  // Método que valida si va vacio el campo de texto muestra de nuevo todos los usuarios
	if (searchKey == '') 
		findAll();
	else
		findByName(searchKey);  // Agarra lo escrito y hace la busqueda    
}

function findByName(searchKey) {  
	$.ajax({
		type: 'GET',
		url: rootURL + '/search/' + searchKey,
		dataType: "json",
		success: renderList 
	});
}

/***************************METODOS PARA SELECCIONAR UN USUARIO Y MOSTRAR EN EL FORMULARIO***************************/ 

function llenarSelPaises(idPais){
	$.ajax({
		type: 'GET',
		url: paisURL,
		dataType: "json", // data type of response
		success: function(data){
			     var list = data == null ? [] : (data.paises instanceof Array ? data.paises : [data.paises]);
			      $('#selPais option').remove();
				  $('#selPais').append('<option value="" selected>Seleccionar País...</option>');
					  $.each(list, function(index, pais) {	
						if (idPais == pais.idPais) {
							$('#selPais').append('<option value="'+pais.idPais+'" selected>'+pais.descripcion+'</option>');		
						}else{
							$('#selPais').append('<option value="'+pais.idPais+'">'+pais.descripcion+'</option>');		
						}
					  });
		}
	});
}

$('#selPais').change(function(){
	idPais = $(this).val();
	llenarSelEstados(idPais,'');
});


function llenarSelEstados(idPais,idEstado){
	$.ajax({
		type: 'GET',
		url: estadoURL+ '/' + idPais,
		dataType: "json", // data type of response
		success: function(data){
			     var list = data == null ? [] : (data.estados instanceof Array ? data.estados : [data.estados]);
			      $('#selEstado option').remove();
				  $('#selEstado').append('<option value="" selected>Seleccionar Estado...</option>');
					  $.each(list, function(index, estado) {
					    if(idEstado == estado.idEstado) {
							$('#selEstado').append('<option value="'+estado.idEstado+'" selected>'+estado.descripcion+'</option>');		
					    }else{
							$('#selEstado').append('<option value="'+estado.idEstado+'">'+estado.descripcion+'</option>');		
					    }	
					  });
		}
	});
}

$('#selEstado').change(function(){
	idEstado = $(this).val();
	llenarSelMunicipios(idEstado, '');
});



function llenarSelMunicipios(idEstado , idMunicipio){
	$.ajax({
		type: 'GET',
		url: municipioURL + '/' + idEstado,
		dataType: "json", // data type of response
		success: function(data){
			     var list = data == null ? [] : (data.municipios instanceof Array ? data.municipios : [data.municipios]);
			      $('#selMunicipio option').remove();
				  $('#selMunicipio').append('<option value="" selected>Seleccionar Municipio...</option>');
					  $.each(list, function(index, municipio) {	
					  	  if(idMunicipio == municipio.idMunicipio){
							$('#selMunicipio').append('<option value="'+municipio.idMunicipio+'" selected>'+municipio.descripcion+'</option>');		
					  	  }else{
							$('#selMunicipio').append('<option value="'+municipio.idMunicipio+'">'+municipio.descripcion+'</option>');							  	  	
					  	  }
					  });
		}
	});
}

$('#selMunicipio').change(function(){
	idMunicipio = $(this).val();
});


/**********************************************************************/


/*

function formToJSONModalReset() {
	return JSON.stringify({
		"idUsuario": usuarioActualID,
		"Clave": $('#clavemodelReset').val()
		});
}

*/