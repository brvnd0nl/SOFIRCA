<?php 
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>


<?php

$NumeroContrato=$_POST['NumeroContrato'];
$Instructor=$_POST['Instructor'];
$FechaInicioContrato=$_POST['FechaInicioContrato'];
$FechaFinContrato=$_POST['FechaFinContrato'];
$CentroFormacion=$_POST['CentroFormacion'];
$Institucion=$_SESSION['CodigoInstitucion'];




include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $stmt =$db->prepare ("INSERT INTO contrato_instructor (Cn_NumContrato,Cn_CodInstructor,Cn_FechaInicio,Cn_FechaFin,Cn_CfId,Cn_SsCodConvenio,Cn_EstadoContrato) VALUES (:Cn_NumContrato,:Cn_CodInstructor,:Cn_FechaInicio,:Cn_FechaFin,:Cn_CfId,:Cn_SsCodConvenio,1)");

                   $_SESSION['message'] = ( $stmt->execute(array(':Cn_NumContrato' => $_POST["NumeroContrato"] ,':Cn_CodInstructor' => $_POST["Instructor"] , ':Cn_FechaInicio' => $_POST["FechaInicioContrato"] , ':Cn_FechaFin' => $_POST["FechaFinContrato"] , ':Cn_CfId' => $_POST["CentroFormacion"], ':Cn_SsCodConvenio' => $Institucion  )) ) ? 'Contrato agregado correctamente' : 'No se pudo registrar el Contrato';
                    }
                catch (PDOException $e){
                    $_SESSION['message'] = $e->getMessage();
                    
                }

                $database->close();
                header('location: ../Ingresar/RegistrarContratoInstructor.php');






?>