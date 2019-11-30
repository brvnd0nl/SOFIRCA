<?php
    session_start();
    include_once('../connection.php');
    $database = new Connection();
    $Institucion = $_POST["Institucion"];
    $TipoInforme = $_POST["Informe"];
    $Año = $_POST["Año"];
    $Mes = $_POST["Mes"];

    if($_FILES["ArchivoPDF"]["error"] > 0){
        $_SESSION['message'] = "Error Validando Archivo Adjunto: " . $_FILES["ArchivoPDF"]["error"];
        header('location: ../Ingresar/RegistrarInforme.php');
    }


    if (strlen($Año) < 4){
        $Año = date("Y");
    }

    $InformacionArchivo = pathinfo($_FILES['ArchivoPDF']['name']);
    $NombreArchivo = $_FILES['ArchivoPDF']['name'];
    $NombreArchivo = $InformacionArchivo['filename'];
    $Extension = $InformacionArchivo['extension'];
    $ArchivoPDF = $NombreArchivo.".".$Extension;

    $Ubicacion = '../files/'.$ArchivoPDF;
    copy( $_FILES['ArchivoPDF']['tmp_name'], $Ubicacion);

    $db = $database->open();
    try{
        $stmt =$db->prepare ("INSERT INTO archivosadjuntos (Ad_NombreAdjunto,Ad_RutaArchivo) VALUES (:Ad_NombreAdjunto,:Ad_RutaArchivo)");

        if ( $stmt->execute(array(':Ad_NombreAdjunto' => $NombreArchivo ,':Ad_RutaArchivo' => $Ubicacion )) ){
            $sql = "SELECT * FROM archivosadjuntos WHERE Ad_NombreAdjunto = '$NombreArchivo' AND Ad_RutaArchivo = '$Ubicacion' ";
            foreach ($db->query($sql) as $row){
                $ArchivoPDF = $row["Ad_Id"];
            }

        }else{
            $_SESSION['message'] = "Error Guardando el Archivo";
            header('location: ../Ingresar/RegistrarInforme.php');
        }
    }
    catch (PDOException $e){
        $_SESSION['message'] = $e->getMessage();
        header('location: ../Ingresar/RegistrarInforme.php');
    }


    if(is_null($ArchivoPDF)== false && $ArchivoPDF != ''){
        try{
            $stmt =$db->prepare ("INSERT INTO detalle_informe ( Di_CvIdInstitucion, Di_IfId, Di_Anio, Di_Mes, Di_CodAdjunto) VALUES (:Di_CvIdInstitucion,:Di_IfId, :Di_Anio, :Di_Mes,:Pg_CodAdjunto)");

            $_SESSION['message'] = ( $stmt->execute(array(':Di_CvIdInstitucion' => $Institucion ,':Di_IfId' => $TipoInforme , ':Di_Anio' => $Año , ':Di_Mes' => $Mes , ':Pg_CodAdjunto' => $ArchivoPDF )) ) ? 'Informe agregado correctamente' : 'No se pudo registrar el Informe';
        }
        catch (PDOException $e){
            $_SESSION['message'] = $e->getMessage();
            header('location: ../Ingresar/RegistrarInforme.php');
        }
    }

    $database->close();
    header('location: ../Ingresar/RegistrarInforme.php');
?>