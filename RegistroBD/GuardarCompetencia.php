<?php
    session_start();
    $Programa = $_POST["ProgramaFormacion"];
    $NombreCompetencia = $_POST["NombreCompetencia"];
    $HorasCompetencia = $_POST["DuracionCompetencia"];

    include_once('../connection.php');
    $database = new Connection();

    $db = $database->open();

    try{
        $stmt =$db->prepare ("INSERT INTO competencia_programa ( Cp_PgId, Cp_NombreC, Cp_IntensidadH  ) VALUES (:Cp_PgId,:Cp_NombreC,:Cp_IntensidadH)");

        $_SESSION['message'] = ( $stmt->execute(array(':Cp_PgId' => $Programa ,':Cp_NombreC' => $NombreCompetencia , ':Cp_IntensidadH' => $HorasCompetencia )) ) ? 'Competencia agregada correctamente' : 'No se pudo registrar la Competencia';
    }
    catch (PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }

    header('location: ../Ingresar/RegistrarCompetencias.php');

?>