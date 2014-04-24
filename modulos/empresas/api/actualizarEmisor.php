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
        if (isset($_REQUEST['idEmisor'])) { // id usado para el update
        $idEmisor = $_REQUEST['idEmisor'];
        } else {
        $idEmisor = "";
        }

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

        if(empty($_FILES['archivo']['name'])) {
            
        }else{
            $nombreArchivo = $_FILES['archivo']['name'];
            $tipoArchivo   = $_FILES['archivo']['type'];
            $tamanoArchivo = $_FILES['archivo']['size'];
            $tmpArchivo    = $_FILES['archivo']['tmp_name']; 
            $nombreRecortado = str_replace(' ', '', $nombreArchivo);  
        }   



         if(empty($_FILES['archivo'])){ //ACTUALIZA TODOS LOS DATOS MENOS EL IMG
                 if (!file_exists($upload_folder . '/'.$idEmisor.'/')) {
                      mkdir($upload_folder . '/'.$idEmisor.'/', 0777, true);
                 }

                 $sql = "UPDATE `emisor` ".
                        "SET ".
                        "`nombre`             = :nombre ,".
                        "`rfc`                = :rfc ,".
                        "`calle`              = :calle ,".
                        "`numero_exterior`    = :numero_exterior ,".
                        "`num_interior`       = :num_interior ,".
                        "`colonia`            = :colonia ,".
                        "`cp`                 = :cp ,".
                        "`telefono`           = :telefono ,".
                        "`fax`                = :fax ,".
                        "`correo_electronico` = :correo_electronico ,".
                        "`razon_social`       = :razon_social ,".
                        "`idMunicipio`        = :idMunicipio ".
                        "WHERE `idEmisor`     = :idEmisor";
                    try {
                        $db = getConnection();
                        $stmt = $db->prepare($sql);  
                        $stmt->bindParam("nombre",             $nombreEmpresa);
                        $stmt->bindParam("rfc",                $RFC);
                        $stmt->bindParam("calle",              $calle);
                        $stmt->bindParam("numero_exterior",    $numExt);
                        $stmt->bindParam("num_interior",       $numInt);
                        $stmt->bindParam("colonia",            $colonia);
                        $stmt->bindParam("cp",                 $CP);
                        $stmt->bindParam("telefono",           $telefono);
                        $stmt->bindParam("fax",                $fax);
                        $stmt->bindParam("correo_electronico", $email);
                        $stmt->bindParam("razon_social",       $razonSocial);
                        $stmt->bindParam("idMunicipio",        $idMunicipio);
                        $stmt->bindParam("idEmisor",           $idEmisor);
                        $stmt->execute();
                        $db = null;
                        echo 1;
                    } catch(PDOException $e) {
                        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
                    }
         }else{  // ACTUALIZA TODOS LOS DATOS CON IMAGEN
           
                  if (!file_exists($upload_folder . '/'.$idEmisor.'/')) {
                      mkdir($upload_folder . '/'.$idEmisor.'/', 0777, true);
                    }

                        // MÉTODO PARA QUITAR ACENTOS Y CARACTERES RAROS
                        function normaliza($cadena){
                            $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
                            ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
                            $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
                            bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
                            $cadena = utf8_decode($cadena);
                            $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
                            $cadena = strtolower($cadena);
                            return utf8_encode($cadena);
                        }
                        
                        $url_filtrada = normaliza($nombreRecortado);
                        $archivador = $upload_folder . '/'.$idEmisor.'/'. $url_filtrada;
                            
                     $sql = "UPDATE `emisor` ".
                            "SET ".
                            "`nombre`             = :nombre ,".
                            "`rfc`                = :rfc ,".
                            "`calle`              = :calle ,".
                            "`numero_exterior`    = :numero_exterior ,".
                            "`num_interior`       = :num_interior ,".
                            "`colonia`            = :colonia ,".
                            "`cp`                 = :cp ,".
                            "`telefono`           = :telefono ,".
                            "`fax`                = :fax ,".
                            "`correo_electronico` = :correo_electronico ,".
                            "`foto`               = :foto ,".
                            "`razon_social`       = :razon_social ,".
                            "`idMunicipio`        = :idMunicipio ".
                            "WHERE `idEmisor`     = :idEmisor";
                        try {
                            $db = getConnection();
                            $stmt = $db->prepare($sql);  
                            $stmt->bindParam("nombre",             $nombreEmpresa);
                            $stmt->bindParam("rfc",                $RFC);
                            $stmt->bindParam("calle",              $calle);
                            $stmt->bindParam("numero_exterior",    $numExt);
                            $stmt->bindParam("num_interior",       $numInt);
                            $stmt->bindParam("colonia",            $colonia);
                            $stmt->bindParam("cp",                 $CP);
                            $stmt->bindParam("telefono",           $telefono);
                            $stmt->bindParam("fax",                $fax);
                            $stmt->bindParam("correo_electronico", $email);
                            $stmt->bindParam("foto",               $nombreRecortado);
                            $stmt->bindParam("razon_social",       $razonSocial);
                            $stmt->bindParam("idMunicipio",        $idMunicipio);
                            $stmt->bindParam("idEmisor",           $idEmisor);
                            $stmt->execute();
                            $db = null;
                            echo 1;
                        } catch(PDOException $e) {
                            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
                        }

                    // CODIGO PARA SUBIR EL ARCHIVO
                if (!move_uploaded_file($tmpArchivo, $archivador)) {
                        $return = Array('ok' => FALSE, 'msg' => "Ocurrio un error al subir el archivo. No pudo guardarse.", 'status' => 'error');
                }else{

                        $old=$archivador;
                        $new = preg_replace('/\s+/', '', $archivador);
                        $new = strtr( $new, $unwanted_array );
                        rename($old , $new);
                        echo $archivador;
                        $archivadorBD=substr($archivador, 3);
                        echo $archivadorBD;
                       
                } 

         }

?>