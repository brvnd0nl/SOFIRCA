<?php
    session_start();
    $NumeroFicha = $_POST["NroFicha"];
    $Convenio = $_POST["Convenio"];
    $Programa = $_POST["ProgramaFormacion"];
    $FechaInicio = $_POST["FechaInicio"];
    $FechaFin = $_POST["FechaFin"];

    include_once('../connection.php');
    $database = new Connection();

    $db = $database->open();

    try{
        $stmt =$db->prepare ("INSERT INTO fichas ( F_Id , F_CvId, F_PgId, F_FechaInicio, F_FechaFin  ) VALUES (:F_Id,:F_CvId,:F_PgId,:F_FechaInicio ,:F_FechaFin)");

        $_SESSION['message'] = ( $stmt->execute(array(':F_Id' => $NumeroFicha , ':F_CvId' => $Convenio ,':F_PgId' => $Programa , ':F_FechaInicio' => $FechaInicio,  ':F_FechaFin' => $FechaFin )) ) ? 'Ficha agregada correctamente' : 'No se pudo registrar la Ficha';
    }
    catch (PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }

    header('location: ../Ingresar/RegistrarFicha.php');
?>