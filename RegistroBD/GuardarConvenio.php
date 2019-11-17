<?php
session_start();
$Institucion = $_POST["Institucion"];
$NumConvenioMarco = $_POST["NumeroConvenioMarco"];
$NumConvenioDerivado = $_POST["NumeroConvenioDerivado"];
$EstadoConvenio = $_POST["EstadoConvenio"];

include_once('../connection.php');
$database = new Connection();

$db = $database->open();

try{

    $stmt =$db->prepare ("SELECT * FROM convenios
                                                WHERE Cv_IdInstitucion = ':Institucion' 
                                                  AND Cv_EstadoConvenio = ':Estado'
                                                  AND Cv_ConvenioDerivado = ':NroCDeriv'
                                                  AND Cv_ConvenioMarco = ':NroCMarco'");

    if ( $stmt->execute(array( ':Institucion' => $Institucion,
            ':Estado' => $EstadoConvenio ,':NroCDeriv' => $NumConvenioDerivado,
            ':NroCMarco' => $NumConvenioMarco)) && $stmt->rowCount() > 0 ){
        $_SESSION['message'] = "Convenio ya ingresado en el sistema";
    }else{
        $stmt =$db->prepare ("INSERT INTO convenios ( Cv_ConvenioMarco, Cv_ConvenioDerivado,
                        Cv_EstadoConvenio, Cv_IdInstitucion)
                        VALUES (:NroCMarco,:NroCDeriv,:Estado,:Institucion)");

        $_SESSION['message'] = ( $stmt->execute(array(':NroCMarco' => $NumConvenioMarco , ':NroCDeriv' => $NumConvenioDerivado ,
            ':Estado' => $EstadoConvenio , ':Institucion' => $Institucion )) )
            ? 'Convenio agregado correctamente' : 'No se pudo registrar el Convenio';
    }

}catch (Exception $e){
    $_SESSION['message'] = $e->getMessage();
}

header('location: ../Ingresar/RegistrarConvenio.php');

?>