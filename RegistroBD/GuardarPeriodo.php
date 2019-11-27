<?php
session_start();

$anio = $_SESSION['anio'];
$trimestre = $_POST["listado"];
$inicio = $_POST["fechainicio"];
$fin = $_POST["fechafin"];
$estado = $_POST["estado"];

include_once('../connection.php');
    $database = new Connection();

    $db = $database->open();

    try{
        $stmt =$db->prepare ("INSERT INTO periodoacademico (Pa_Nombre,Pa_FechaInicio,Pa_FechaFin,Pa_Anio,Pa_Estado) VALUES (:Pa_Nombre,:Pa_FechaInicio,:Pa_FechaFin,:Pa_Anio,:Pa_Estado)");

        $_SESSION['message'] = ( $stmt->execute(array(':Pa_Nombre' => $trimestre, ':Pa_FechaInicio' => $inicio,':Pa_FechaFin' => $fin, ':Pa_Anio' => $anio,  ':Pa_Estado' => $estado)) ) ? 'Periodo Academico agregado correctamente' : 'No se pudo registrar el Periodo';
    }
    catch (PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }

    
    header('location: ../Ingresar/RegistrarPeriodo.php');
?>