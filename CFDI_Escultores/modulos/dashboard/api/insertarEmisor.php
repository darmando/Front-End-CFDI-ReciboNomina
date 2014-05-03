<?php

    require '../../../php/connector.php';
	$unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
    $return = Array('ok'=>true);
    $upload_folder ='../../../img/logosEmpresas';
    $nombreArchivo="";
    $tipoArchivo="";
    $tamanoArchivo="";
    $tmpArchivo="";

/*************************VARIABLES DEL FORMULARIO***********************/
        if (isset($_REQUEST['RazonSocial'])) {
        $razonSocial = $_REQUEST['RazonSocial'];
        } else {
        $razonSocial = "";
        }

        if (isset($_REQUEST['NombreEmpresa'])) {
        $nombreEmpresa = $_REQUEST['NombreEmpresa'];
        } else {
        $nombreEmpresa = "";
        }

        if (isset($_REQUEST['RFC'])) {
        $RFC = $_REQUEST['RFC'];
        } else {
        $RFC = "";
        }

        if (isset($_REQUEST['Calle'])) {
        $calle = $_REQUEST['Calle'];
        } else {
        $calle = "";
        }

        if (isset($_REQUEST['Colonia'])) {
        $colonia = $_REQUEST['Colonia'];
        } else {
        $colonia = "";
        }

         if (isset($_REQUEST['NumExt'])) {
        $numExt = $_REQUEST['NumExt'];
        } else {
        $numExt = "";
        }

        if (isset($_REQUEST['NumInt'])) {
        $numInt = $_REQUEST['NumInt'];
        } else {
        $numInt = "";
        }

         if (isset($_REQUEST['CP'])) {
        $CP = $_REQUEST['CP'];
        } else {
        $CP = "";
        }

        if (isset($_REQUEST['Telefono'])) {
        $telefono = $_REQUEST['Telefono'];
        } else {
        $telefono = "";
        }
        if (isset($_REQUEST['Fax'])) {
        $fax = $_REQUEST['Fax'];
        } else {
        $fax = "";
        }
        if (isset($_REQUEST['Email'])) {
        $email = $_REQUEST['Email'];
        } else {
        $email = "";
        }
        if (isset($_REQUEST['idMunicipio'])) {
        $idMunicipio = $_REQUEST['idMunicipio'];
        } else {
        $idMunicipio = "";
        }

       


/*******OBTENER ULTIMO VALOR DE LA BD INSERTADO**************/            
            $sql = "SELECT IFNULL(MAX(idEmisor), 0) AS idEmisor FROM emisor";
            try {
                $db = getConnection(); 
                $stmt = $db->query($sql);    
                $emisor = $stmt->fetchObject();
           //     echo "idEmisor:". $emisor->idEmisor;
                $ultimoid = $emisor->idEmisor;
                $stmt->execute();
                $db = null;
            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
/**********************************CODIGO PARA EL INSERT*****************************************************/
       if (empty($_FILES['archivo'])) {
            
        }else{
            $nombreArchivo = $_FILES['archivo']['name'];
            $tipoArchivo   = $_FILES['archivo']['type'];
            $tamanoArchivo = $_FILES['archivo']['size'];
            $tmpArchivo    = $_FILES['archivo']['tmp_name'];
        }
        $nombreRecortado = str_replace(' ', '', $nombreArchivo);  // ELIMINA TODOS LOS ESPACIOS EN BLANCO DEL ARCHIVO
        if($ultimoid == 0){
           $ultimoid = 1; 
        }else{
           $idEmisor = $ultimoid+1;    //CALCULA EL ID PROXIMO A INSERTAR             
        }

        $archivador = $upload_folder . '/'.$idEmisor.'/'.'logotipo_'.$nombreRecortado;
     //   echo "| archivador:".$archivador;
        if (!file_exists($upload_folder . '/'.$idEmisor.'/')) {
            mkdir($upload_folder . '/'.$idEmisor.'/', 0777, true);
            }
                 /*********************************************************************/
                 // $sql ="INSERT INTO `usuarios`(`Nombre`,`Clave`,`NombreCompleto`,`url_imagen`,`Admin`,`Cuenta`,`StockMinimo`,`id_perfil`,`id_horario`,`Inactivo`,`RFC`,`email`) VALUES(:Nombre,:Clave,:NombreCompleto,:url_imagen,'0',:Cuenta,:StockMinimo,:id_perfil,:id_horario,'0',:RFC,:email)";
               //   $sql = "CALL `sp_insertarUsuario`(:Nombre,:Clave,:NombreCompleto,:url_imagen,:Cuenta,:StockMinimo,:id_perfil,:id_horario,:RFC, :email, @return);";
                  
                $sql="INSERT INTO `emisor`".
                     "(`nombre`,".
                     "`rfc`,".
                     "`calle`,".
                     "`numero_exterior`,".
                     "`num_interior`,".
                     "`colonia`,".
                     "`cp`,".
                     "`telefono`,".
                     "`fax`,".
                     "`correo_electronico`,".
                     "`foto`,".
                     "`fecha_alta`,".
                     "`razon_social`,".
                     "`idMunicipio`,".
                     "`activo`)".
                     "VALUES".
                     "(:nombre ,".
                     ":rfc ,".
                     ":calle ,".
                     ":numero_exterior ,".
                     ":num_interior ,".
                     ":colonia ,".
                     ":cp ,".
                     ":telefono ,".
                     ":fax ,".
                     ":correo_electronico ,".
                     ":foto,".
                     "NOW(),".
                     ":razon_social ,".
                     ":idMunicipio ,".
                     "1);";
                  try {
                    $db = getConnection();
                    $stmt = $db->prepare($sql);  
                    $stmt->bindParam("nombre", $nombreEmpresa);
                    $stmt->bindParam("rfc", $RFC);
                    $stmt->bindParam("calle", $calle);
                    $stmt->bindParam("numero_exterior", $numExt);
                    $stmt->bindParam("num_interior", $numInt);
                    $stmt->bindParam("colonia", $colonia);
                    $stmt->bindParam("cp", $CP);
                    $stmt->bindParam("telefono", $telefono);
                    $stmt->bindParam("fax", $fax );
                    $stmt->bindParam("correo_electronico", $email);
                    $stmt->bindParam("foto", $nombreRecortado);
                    $stmt->bindParam("razon_social", $razonSocial);     
                    $stmt->bindParam("idMunicipio", $idMunicipio);     
                    $stmt->execute();     
                    $db = null;
                    echo 1;
                  } catch(PDOException $e) { 
                    echo '{"error":{"text":'. $e->getMessage() .'}}'; 
                 }  











               /*******************************************************************/
        
         
        if (!move_uploaded_file($tmpArchivo, $archivador)) {
            $return = Array('ok' => FALSE, 'msg' => "Ocurrio un error al subir el archivo. No pudo guardarse.", 'status' => 'error');
        }
        else{

            $old=$archivador;
            $new = preg_replace('/\s+/', '', $archivador);
            $new = strtr( $new, $unwanted_array );
            rename($old , $new);
      //      echo "archivador: ".$archivador;
            $archivadorBD=substr($archivador, 3);
          //  echo $archivadorBD;
           
        } 
/**********************************CODIGO PARA EL INSERT**********************************************/


?>