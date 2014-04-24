
$(document).ready(function(){
      $('.ventanaEmpresas').hide();
			$(".live-tile,.flip-list").liveTile();
			$(".appbar").applicationBar();
    

});


/**************************EVENTOS DE LA EMPRESA*************************/
$('#divEmpresas').click(function(){
	 $('#divPanelPrincipal').addClass('magictime slideUp');
	 setTimeout(function() {
		 $('#divPanelPrincipal').hide();
		 $('.ventanaEmpresas').addClass('magictime puffIn');
     $('#frameEmpresa').show();
		 $('#frameEmpresa').attr('src','../empresas/index.php');
		 $('.ventanaEmpresas').show();
         $('#divPanelPrincipal').removeClass('magictime slideUp');
   	 },700);
    $('.ventanaEmpresas').draggable();
   
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

