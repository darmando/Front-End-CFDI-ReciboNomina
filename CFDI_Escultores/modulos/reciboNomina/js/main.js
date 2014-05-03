
$(document).ready(function(){
$('.divInfoPatron').hide();
$('.divInfoTrabajador').hide();

new PNotify({
    title: 'Font Awesome Icon',
    text: 'I have an icon that uses the Font Awesome icon styles.',
    hide: false,
    icon: 'fa fa-envelope-o',
    buttons: {
        closer_hover: false	
    }
});


$('#divDateFechaInicial').datetimepicker({
    pick12HourFormat: false,
    language: 'es'
});
$('#divDateFechaFinal').datetimepicker({
    pick12HourFormat: false,
    language: 'es'
});
$('#divDateFechaPago').datetimepicker({
	pick12HourFormat: false,
    language: 'es'

});

     
});

/************************************************MODULO PATRON******************************************************/

$("#chkEmisorInfoPatron").click(function() {  
   if($(this).is(':checked')) {  
     $('.divInfoPatron').fadeIn('slow');
    } else {  
     $('.divInfoPatron').fadeOut('slow');
    }
}); 

$("#chkReceptorInfoTrabajador").click(function() {  
   if($(this).is(':checked')) {  
     $('.divInfoTrabajador').fadeIn('slow');
    } else {  
     $('.divInfoTrabajador').fadeOut('slow');
    }
}); 


/************************************************MODULO TRABAJADOR****************************************************/



/************************************************MODULO FORMA PAGO****************************************************/





$('#chkFormaPago').click(function(){
   if($(this).is(':checked')) {  
     $('.divFormaPago').fadeIn('slow');
    } else {  
     $('.divFormaPago').fadeOut('slow');
    }	
});

$('#chkMetodoPago').click(function(){
   if($(this).is(':checked')) {  
     $('.divMetodoPago').fadeIn('slow');
    } else {  
     $('.divMetodoPago').fadeOut('slow');
    }	
});
$('#chkMoneda').click(function(){
   if($(this).is(':checked')) {  
     $('.divMoneda').fadeIn('slow');
    } else {  
     $('.divMoneda').fadeOut('slow');
    }	
});



