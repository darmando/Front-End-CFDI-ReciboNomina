<?php
ob_start();
session_start();
require '../../../php/connector.php';

        if (isset($_REQUEST['usuario'])) {
        $usuario = $_REQUEST['usuario'];
        } else {
        $usuario = "";
        }

        if (isset($_REQUEST['contrasena'])) {
        $contrasena = $_REQUEST['contrasena'];
        } else {
        $contrasena = "";
        }

            $sql = "SELECT * FROM CLIENTES WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
            try {
                $db = getConnection(); 
                $stmt = $db->query($sql);    
                $emisor = $stmt->fetchObject();
                $stmt->execute();
			    $num_rows = $stmt->fetchColumn();
			    if($num_rows >= 1){ // si es mayor o igual a 1 significa que trae registro
                    $_SESSION["id_cliente"] = $emisor->id_cliente;
                    $_SESSION["usuario"] = $emisor->usuario;
                    $_SESSION["contrasena"] = $emisor->contrasena;
	                echo json_encode($emisor); 
			    }else{
  				   echo 0;
			    }


             
                $db = null;
            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
?>