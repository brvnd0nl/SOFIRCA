<?php
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');

?>


<?php


$PeriodoAcademico = $_POST['PeriodoAcademico'];
$fechainicio = $_POST['FechaInicio'];
$horainicio = $_POST['HHInicio'] . $_POST['MMInicio'];
$FechaFin = $_POST['FechaFin'];
$HoraFin = $_POST['HHFin'] . $_POST['MMFin'];
$Ambiente = $_POST['Ambiente'];
$Instructor = $_POST['Instructor'];
$Institucion = $_SESSION['CodigoInstitucion'];


$FichaFormacion = $_POST['FichaFormacion'];
$Competencia = $_POST['Competencia'];

if (isset($_POST["SemanaLunes"])) {
    $dias_lunes = 1;
} else {
    $dias_lunes = 0;
}

if (isset($_POST["SemanaMartes"])) {
    $dias_martes = 1;
} else {
    $dias_martes = 0;
}

if (isset($_POST["SemanaMiercoles"])) {
    $dias_miercoles = 1;
} else {
    $dias_miercoles = 0;
}

if (isset($_POST["SemanaJueves"])) {
    $dias_jueves = 1;
} else {
    $dias_jueves = 0;
}

if (isset($_POST["SemanaViernes"])) {
    $dias_viernes = 1;
} else {
    $dias_viernes = 0;
}

if (isset($_POST["SemanaSabado"])) {
    $dias_sabados = 1;
} else {
    $dias_sabados = 0;
}

$dias_domingos = 0;


include_once($UrlBase . 'connection.php');
$database = new Connection();
$db = $database->open();
try {
    $stmt = $db->prepare("INSERT INTO carga_academica (Ca_FechaInicio,Ca_FechaFin,Ca_HoraInicio,Ca_HoraFin,Ca_FId,Ca_CpId,Ca_AbId,Ca_InId,Ca_PaId,Ca_Lunes,Ca_Martes,Ca_Miercoles,Ca_Jueves,Ca_Viernes,Ca_Sabado,Ca_Domingo, Ca_SsCodConvenio) VALUES (:Ca_FechaInicio,:Ca_FechaFin,:Ca_HoraInicio,:Ca_HoraFin,:Ca_FId,:Ca_CpId,:Ca_AbId,:Ca_InId,:Ca_PaId,:Ca_Lunes,:Ca_Martes,:Ca_Miercoles,:Ca_Jueves,:Ca_Viernes,:Ca_Sabado,:Ca_Domingo,:Institucion)");

    $_SESSION['message'] = ($stmt->execute(array(':Ca_FechaInicio' => $_POST["FechaInicio"], ':Ca_FechaFin' => $_POST["FechaFin"], ':Ca_HoraInicio' => $horainicio, ':Ca_HoraFin' => $HoraFin, ':Ca_FId' => $_POST["FichaFormacion"], ':Ca_CpId' => $_POST["Competencia"], ':Ca_AbId' => $_POST["Ambiente"], ':Ca_InId' => $_POST["Instructor"], ':Ca_PaId' => $_POST["PeriodoAcademico"], ':Ca_Lunes' => $dias_lunes, ':Ca_Martes' => $dias_martes, ':Ca_Miercoles' => $dias_miercoles, ':Ca_Jueves' => $dias_jueves, ':Ca_Viernes' => $dias_viernes, ':Ca_Sabado' => $dias_sabados, ':Ca_Domingo' => $dias_domingos, ':Institucion' => $Institucion))) ? 'Ambiente agregado correctamente' : 'No se pudo registrar el Ambiente';
} catch (PDOException $e) {
    $_SESSION['message'] = $e->getMessage();

}

$database->close();
header('location: ../Ingresar/RegistrarCargaAcademica.php');


?>