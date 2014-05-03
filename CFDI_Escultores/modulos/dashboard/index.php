<?php
  //  require '../../../../php/seguridad.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Panel Principal</title>
</head>
	<meta charset='utf-8'> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap-fileupload.css">
	<link rel="stylesheet" type="text/css" href="../../css/magic.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.10.4.min.css">
	<link rel="stylesheet" type="text/css" href="css/MetroJs.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/pnotify.custom.min.css">
<body>

<!--MENU-->

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li class="active"><a href="./">Fixed top</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

<!--FIN MENU-->
<br>
<br>
<br>

<div class="row" id="divPanelPrincipal">
	  <div class="col-md-4">
	   <!-- INICIO PANEL 1 -->
		<div class="panel panel-default">
		  <div class="panel-heading">Catálogos</div>
		  <div class="panel-body">
		     

			 
			 <div class="row">
			 	<div class="col-md-4" id="divEmpresas">
						    <div id="tile2" class="live-tile colorUno divMetroUI" data-direction="horizontal" data-initdelay="500" data-delay="3000">     
						        <div>
						           <p><a class="metroLarger" href="#">Empresas</a></p>
						        </div>
						        <div>
						            <img class="full" src="http://www.drewgreenwell.com/images/sample/1tw.gif" alt="first" />
						        </div>   
						    </div>
						
			 	</div>
			 	<div class="col-md-4">
		 		
						    <div id="tile2" class="live-tile colorDos" data-direction="vertical" data-initdelay="500" data-delay="3000">     
						        <div>
						            <p>this tile flips horizontally and swaps between images randomly
						            </p>
						        </div>
						        <div>
						            <img class="full" src="http://www.drewgreenwell.com/images/sample/1tw.gif" alt="first" />
						        </div>   
						    </div>
	
			 	</div>
			 	<div class="col-md-4">
			 		
						    <div id="tile2" class="live-tile colorTres" data-direction="vertical" data-initdelay="500" data-delay="3000">     
						        <div>
						            <p>this tile flips horizontally and swaps between images randomly
						            <span class="tile-title">front title</span>
						            </p>
						        </div>
						        <div>
						            <img class="full" src="http://www.drewgreenwell.com/images/sample/1tw.gif" alt="first" />
						            <span class="tile-title">back title</span>
						        </div>   
						    </div>

			 	</div>
			 </div>

			 <div class="row">
			 	<div class="col-md-4">
			 		
			 		 <div class="live-tile slide ha">
						<div style="background-color: red;" class="slide-front ha">
						  test 1
						</div>
						<div class="slide-back ha"></div>
					 </div>

			 	</div>
			 	<div class="col-md-4">
		 		
				     <div class="live-tile slide ha">
						<div style="background-color: red;" class="slide-front ha">
						  test 1
						</div>
						<div class="slide-back ha"></div>
					 </div>
	
			 	</div>
			 	<div class="col-md-4">
			 		
						    <div id="tile2" class="live-tile colorUno" data-direction="vertical" data-initdelay="500" data-delay="3000">     
						        <div>
						            <p>Impuestos
						            </p>
						        </div>
						        <div>
						            <img class="full" src="img/impuestos.png" alt="first" />
						        </div>   
						    </div>

			 	</div>
			 </div>


		  </div>
		</div>
	   <!--FIN DEL PANEL 1 -->
	  </div>
	  <div class="col-md-4">
	   <!-- INICIO PANEL 2 -->
		<div class="panel panel-default">
		  <div class="panel-heading">Procesos</div>
		  <div class="panel-body" align="center">
		    <!-- -->

			 <div class="row" align="center">

			 	<div class="col-md-4" id="divCFDI">
			 		
						    <div id="tile2" class="live-tile colorUno divMetroUI" data-direction="horizontal" data-initdelay="500" data-delay="3000">     
						        <div>
						           <p><a class="metroLarger" href="#">CFDI</a></p>
						        </div>
						        <div>
						            <img class="full" src="http://www.drewgreenwell.com/images/sample/1tw.gif" alt="first" />
						        </div>   
						    </div>
			 	</div>
			 	<div class="col-md-4">
		 		
				     <div class="live-tile slide ha">
						<div style="background-color: red;" class="slide-front ha">
						  test 1
						</div>
						<div class="slide-back ha"></div>
					 </div>
	
			 	</div>
			 	<div class="col-md-4">
		 		
				     <div class="live-tile slide ha">
						<div style="background-color: red;" class="slide-front ha">
						  test 1
						</div>
						<div class="slide-back ha"></div>
					 </div>
	
			 	</div>

			 </div>

			<!-- -->
		  </div>
		</div>
	   <!--FIN DEL PANEL 2 -->
	   <!-- INICIO PANEL 2 -->
		<div class="panel panel-default">
		  <div class="panel-heading">Reportes</div>
		  <div class="panel-body">
		    <!-- -->
			<div class="row" align="center">

			 	<div class="col-md-4">
			 		
			 		 <div class="live-tile slide ha">
						<div style="background-color: red;" class="slide-front ha">
						  test 1
						</div>
						<div class="slide-back ha"></div>
					 </div>

			 	</div>

			 </div>		    
			<!-- -->
		  </div>
		</div>
	   <!--FIN DEL PANEL 2 -->
	  </div>
	  <div class="col-md-4">
	   <!-- INICIO PANEL 3 -->
		<div class="panel panel-default">
		  <div class="panel-heading">Configuración</div>
		  <div class="panel-body">
		  <!-- -->
		  
		  <div class="row" align="center">

			 	<div class="col-md-4">
			 		
			 		 <div class="live-tile slide ha">
						<div style="background-color: red;" class="slide-front ha">
						  test 1
						</div>
						<div class="slide-back ha"></div>
					 </div>

			 	</div>
			 	<div class="col-md-4">
		 		
				     <div class="live-tile slide ha">
						<div style="background-color: red;" class="slide-front ha">
						  test 1
						</div>
						<div class="slide-back ha"></div>
					 </div>
	
			 	</div>


			 </div>

		  <!-- -->
		  </div>
		</div>
	   <!--FIN DEL PANEL 3 -->
	  </div>
</div>
<!-- FIN DE MI CONTENIDO PANEL PRINCIPAL -->

<!-- INICIO DE LOS OBJETS -->
<div class="container ventanaEmpresas" style="width: 80%;">
  <div class="col-md-12 ">
     <div class="panel panel-primary">
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
			<iframe id="frameEmpresa" frameborder='0' width="100%" height="900px"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- FIN DE LOS OBJECTS -->
<!-- INICIO DE LOS OBJETS -->
<div class="container ventanaCFDI" style="width: 80%;">
  <div class="col-md-12 ">
     <div class="panel panel-primary">
	      <div class="panel-heading">
	         <div class="row">  
	           <div class="col-md-6">
			        <h3 class="panel-title">Generar CFDI</h3> 
	           </div>
	           <div class="col-md-6" align="right">
	           <i class="fa fa-minus" id="btnMinimizar"> </i>&nbsp;
	           <i class="fa fa-external-link" id="btnMaximizar"> </i>&nbsp;
	           <i class="fa fa-times" id="btnCerrar"> </i>
	           </div>
	         </div>
	      </div>
      <div class="panel-body">
			<iframe id="frameCFDI" frameborder='0' width="100%" height="900px"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- FIN DE LOS OBJECTS -->
    <script src="../../js/jquery-1.11.0.min.js"></script>
    <script src="../../js/jquery-ui-1.10.4.min.js" type="text/javascript" ></script>
	<script src="js/MetroJs.min.js"></script>
	<script src="js/main.js"></script>
	<script src="../../js/bootstrap.min.js" type="text/javascript" ></script>
	<script type="text/javascript" src="../../js/bootstrap-fileupload.js"></script>
	<script src="../../js/pnotify.custom.min.js" type="text/javascript" ></script>
</body>
</html>
<!-- chikitobebe123 -->