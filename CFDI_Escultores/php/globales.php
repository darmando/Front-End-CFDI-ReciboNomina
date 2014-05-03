<?php
  ob_start();
  session_start();



  echo "<script type='text/javascript'>".
        "window.id_cliente=".$_SESSION["id_cliente"].";".
        "window.usuario=".$_SESSION["usuario"].";".
        "window.contrasena=".$_SESSION["contrasena"]."; alert(".$_SESSION["id_cliente"].");".
    "</script>";

/*
if (!isset($_SESSION['user_id']))
    header("location: http://174.142.39.204/erp_ffa/login.php");
*/      


?>