var f = new Date();
var fechaActual = '';
$(document).ready(function(){
      window.id_cliente     =  sessionStorage.getItem('id_cliente');
      window.usuario        = sessionStorage.getItem('usuario');
      window.contrasena     = sessionStorage.getItem('contrasena');
      window.nombre_empresa = sessionStorage.getItem('nombre_empresa');
/* ACTIVAR EN PRODUCCION
      if(window.usuario == null || window.usuario == null || window.contrasena == null){
         alert('Lo sentimos debe logearse');
         window.location = '../escultoresCFDI/';
      }
*/
     
      $('.ventanaEmpresas').hide();
      $('.ventanaCFDI').hide();
      $(".live-tile,.flip-list").liveTile();
      $(".appbar").applicationBar();
      $('#aMostrarMenu').hide();
$('#aNombreEmpresa').html('Bienvenido '+window.usuario );
      
   mueveReloj();    
});

/************************** METODOS *************************/

function mueveReloj(){ 
  var dateObj = new Date();
    var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
    var curr_date = dateObj.getDate();
    var curr_month = dateObj.getMonth();
    curr_month = curr_month + 1;
    var curr_year = dateObj.getFullYear();
    var curr_min = dateObj.getMinutes();
    var curr_hr= dateObj.getHours();
    var curr_sc= dateObj.getSeconds();
    if(curr_month.toString().length == 1)
    curr_month = '0' + curr_month;      
    if(curr_date.toString().length == 1)
    curr_date = '0' + curr_date;
    if(curr_hr.toString().length == 1)
    curr_hr = '0' + curr_hr;
    if(curr_min.toString().length == 1)
    curr_min = '0' + curr_min;

    curr_sc = (curr_sc<10)?"0"+curr_sc:curr_sc;
    window.fechaActual=  curr_year+"-"+curr_month +"-"+curr_date+ " "+curr_hr+":"+curr_min+":"+curr_sc;       
    
    $('#lblfechaActual').html(window.fechaActual);
    setTimeout("mueveReloj()",1000) 
} 

$('#aMostrarMenu').click(function(){
    $('#divPanelPrincipal').addClass('magictime slideDown');
     setTimeout(function() {
         $('#divPanelPrincipal').removeClass('slideDown');
         $('#divPanelPrincipal').show();
       },700);
   $(this).hide();
   $('#aOcultarMenu').show();
});


$('#aOcultarMenu').click(function(){
   $('#divPanelPrincipal').addClass('magictime slideUp');
     setTimeout(function() {
           $('#divPanelPrincipal').removeClass('slideUp');
           $('#divPanelPrincipal').hide();
     },700);
   $(this).hide();
   $('#aMostrarMenu').show();
});


/**************************EVENTOS DE LA EMPRESA*************************/
$('#liSalir').click(function(){
  window.location = '../escultoresCFDI/';
  sessionStorage.clear(); // Limpiamos las variables
});



$('#divCFDI').click(function(){
//   $('#divPanelPrincipal').addClass('magictime slideUp');
   setTimeout(function() {
 //    $('#divPanelPrincipal').hide();
     $('.ventanaCFDI').addClass('magictime puffIn');
     $('#frameCFDI').show();
     $('#frameCFDI').attr('src','modulos/creaCFDI/index.php');
     $('.ventanaCFDI').show();
         $('#divPanelPrincipal').removeClass('magictime slideUp');
     },700);
    $('.ventanaCFDI').draggable();
   
});

$('#btnMinimizarCFDI').click(function(){
  $('.panel-body').hide();
  $('#btnMaximizarCFDI').show();
  $(this).hide();
});
$('#btnMaximizarCFDI').click(function(){
  $('.panel-body').show();
  $('#btnMinimizarCFDI').show();
  $(this).hide();
});

$('#btnCerrarCFDI').click(function(){
  if(confirm('¿Desea Cerrar la ventana?') == true){
    var padre = $(window.parent.document);
    $(padre).find('#divPanelPrincipal').addClass('magictime slideUpRetourn');
    $(padre).find('#divPanelPrincipal').show();
      $(padre).find("#frameEmpresa").attr('src','');
      $(padre).find("#frameEmpresa").hide();
    $('.ventanaEmpresas').hide();
    setTimeout(function() {
     },700);

  }else{
    alert('no');
  }
});



/************************ PROGRAMACION VENTANA EMPRESAS ***************************/
$('#divEmpresas').click(function(){
   $('#divPanelPrincipal').addClass('magictime slideUp');
   setTimeout(function() {
     $('#divPanelPrincipal').hide();
     $('.ventanaEmpresas').addClass('magictime puffIn');
     $('#frameEmpresa').show();
     $('#frameEmpresa').attr('src','modulos/empresas/index.php');
     $('.ventanaEmpresas').show();
         $('#divPanelPrincipal').removeClass('magictime slideUp');
     },700);
    $('.ventanaEmpresas').draggable();
   
});
$('#btnMinimizarEm').click(function(){
  $('.panel-body').hide();
  $('#btnMaximizarEm').show();
  $(this).hide();
});
$('#btnMaximizarEm').click(function(){
  $('.panel-body').show();
  $('#btnMinimizarEm').show();
  $(this).hide();
});

$('#btnCerrarEm').click(function(){
  if(confirm('¿Desea Cerrar la ventana?') == true){
    var padre = $(window.parent.document);
    $(padre).find('#divPanelPrincipal').addClass('magictime slideUpRetourn');
    $(padre).find('#divPanelPrincipal').show();
      $(padre).find("#frameEmpresa").attr('src','');
      $(padre).find("#frameEmpresa").hide();
    $('.ventanaEmpresas').hide();
    setTimeout(function() {
     },700);

  }else{
    alert('no');
  }
});


/**********************************************************************/
function doIframe() {
    var $iframes = $("iframe"); 
    $iframes.each(function() {
        var iframe = this;
        $(iframe).load(function() {
            setHeight(iframe);
        });
    });
}

function setHeight(e) {
  e.height = e.contentWindow.document.body.scrollHeight + 35;
}

$(window).load(function() {
    doIframe();
});

