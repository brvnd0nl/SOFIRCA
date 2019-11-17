<?php 
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>


<?php

$NombreAmbiente=$_POST['NombreAmbiente'];
$UbicacionAmbiente=$_POST['UbicacionAmbiente'];
$Institucion=$_SESSION['CodigoInstitucion'];


include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $stmt =$db->prepare ("INSERT INTO ambientes (Ab_Nombre,Ab_Ubicacion,Ab_SsCodConvenio) VALUES (:Ab_Nombre,:Ab_Ubicacion,:Ab_SsCodConvenio)");

                   $_SESSION['message'] = ( $stmt->execute(array(':Ab_Nombre' => $_POST["NombreAmbiente"] ,':Ab_Ubicacion' => $_POST["UbicacionAmbiente"] , ':Ab_SsCodConvenio' => $_POST["Institucion"] )) ) ? 'Ambiente agregado correctamente' : 'No se pudo registrar el Ambiente';
                    }
                catch (PDOException $e){
                    $_SESSION['message'] = $e->getMessage();
                    
                }

                $database->close();
                header('location: ../Ingresar/RegistrarAmbiente.php');



?>


<?php include('..\components\footer.php'); ?>