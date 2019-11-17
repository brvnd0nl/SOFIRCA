<?php
    session_start();
    $NombrePrograma = $_POST["NombrePrograma"];
    $CentroFormacion = $_POST["CentroFormacion"];

    include_once('../connection.php');
    $database = new Connection();    

     if($_FILES["ArchivoPDF"]["error"] > 0){
        $_SESSION['message'] = "Error Validando Archivo Adjunto: " . $_FILES["ArchivoPDF"]["error"];
        header('location: ../Ingresar/RegistrarProgramaFormacion.php');
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
           die("Error Guardando el Archivo");
           header('location: ../Ingresar/RegistrarProgramaFormacion.php');
       }
    }
    catch (PDOException $e){
        $_SESSION['message'] = $e->getMessage();
        header('location: ../Ingresar/RegistrarProgramaFormacion.php');
    }

    if(is_null($ArchivoPDF)== false && $ArchivoPDF != ''){
        try{
            $stmt =$db->prepare ("INSERT INTO programas ( Pg_Nombre, Pg_CfId, Pg_CodAdjunto) VALUES (:Pg_Nombre,:Pg_CfId,:Pg_CodAdjunto)");
    
           $_SESSION['message'] = ( $stmt->execute(array(':Pg_Nombre' => $NombrePrograma ,':Pg_CfId' => $CentroFormacion , ':Pg_CodAdjunto' => $ArchivoPDF )) ) ? 'Programa agregado correctamente' : 'No se pudo registrar el Programa';
        }
        catch (PDOException $e){
            $_SESSION['message'] = $e->getMessage();
            header('location: ../Ingresar/RegistrarProgramaFormacion.php');
        }
    }

    $database->close();
    header('location: ../Ingresar/RegistrarProgramaFormacion.php');
?>