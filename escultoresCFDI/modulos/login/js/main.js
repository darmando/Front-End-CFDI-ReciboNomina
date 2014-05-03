
$(document).ready(function(){




});




$('#btnEntrar').click(function(event) {
    if( $('#txtUsuario').val() == '' ){
       new PNotify({
          title: 'Usuario',
          text: 'Debes escribir tu usuario.',
          type: 'error'
        });
       return false;
    }
    if( $('#txtContrasena').val() == '' ){
       new PNotify({
          title: 'Contraseña',
          text: 'Debes escribir tu contraseña.',
          type: 'error'
        });
       return false;
    }


    validarLogin($("#txtUsuario").val(),$("#txtContrasena").val()); 
});


function validarLogin(usuario, contrasena){
      var valores = "usuario="+usuario.toLowerCase()+"&contrasena="+contrasena.toLowerCase();
      $.ajax({
      type: "GET",
      url: 'modulos/login/api/index.php', 
      data: valores,
      success: function(data){
               console.log(data);
                 data = $.parseJSON(data);
               if (data == 0) {
                    new PNotify({
                        title: 'Alerta',
                        text: 'Lo Sentimos tu Usuario y Contraseña son incorrectos.'
                    });

               } else{

                    new PNotify({
                        title: 'Autenticación Correcta',
                        text: 'Entrando al sistema...',
                        type: 'success'
                    });
                  
                    sessionStorage.setItem('id_cliente', data.id_cliente);
                    sessionStorage.setItem('usuario', data.usuario);
                    sessionStorage.setItem('contrasena', data.contrasena);
                    sessionStorage.setItem('nombre_empresa', data.nombre_empresa);
                    window.location = '../CFDI_'+data.ruta_acceso;
                   
               };



        //  $.mobile.changePage("dashboard/index.php", { transition: "slideup", changeHash: false });
         // window.location="dashboard/index.php";

       },
      error: function(XMLHttpRequest, textStatus, errorThrown){
        console.log(errorThrown);   
        new PNotify({
          title: 'Hubo un error de conexión:(',
          text: ''+errorThrown,
          type: 'error'
         });        
      }
   });
}