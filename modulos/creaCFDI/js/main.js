var tipocfdiURL = "api/tipo";
$(document).ready(function(){

//llenarSelectTipoCFDI();

});

function llenarSelectTipoCFDI(){
	$.ajax({
		type: 'GET',
		url: tipocfdiURL,
		dataType: "json", // data type of response
		success: function(data){
			     var list = data == null ? [] : (data.tipos_cfdi instanceof Array ? data.tipos_cfdi : [data.tipos_cfdi]);
			      $('#selTipoCfdi option').remove();
				  $('#selTipoCfdi').append('<option>Seleccionar...</option>');
					  $.each(list, function(index, cfdi) {	
						$('#selTipoCfdi').append('<option data-idtipo_comprobante="'+cfdi.id_tipo_cfdi+'" value="'+cfdi.descripcion+'" selected>'+cfdi.descripcion+'</option>');		
					  });
	
		}
	});
}
