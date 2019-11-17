<?php
session_start();
$Ficha = $_POST["FichaFormacion"];
$TipoDocumento = $_POST["TipoDocumento"];
$NumIdentificacion = $_POST["NumeroIdentificacion"];
$NombreAprendiz = $_POST["Nombre"];
$ApellidoAprendiz = $_POST["Apellido"];
$TelefonoAprendiz = $_POST["Telefono"];
$EmailAprendiz = $_POST["CorreoElectronico"];


include_once('../connection.php');
$database = new Connection();

$db = $database->open();

try {
    $stmt = $db->prepare("INSERT INTO aprendices ( Ap_FId , Ap_TipoDocumento, Ap_NumeroDocumento, Ap_Nombres,
                        Ap_Apellidos, Ap_Telefono, Ap_Correo  )
                        VALUES (:Ap_FId,:Ap_TipoDocumento,:Ap_NumeroDocumento,:Ap_Nombres ,:Ap_Apellidos, :Ap_Telefono , :Ap_Correo)");

    $_SESSION['message'] = ($stmt->execute(array(':Ap_FId' => $Ficha, ':Ap_TipoDocumento' => $TipoDocumento,
        ':Ap_NumeroDocumento' => $NumIdentificacion, ':Ap_Nombres' => $NombreAprendiz,
        ':Ap_Apellidos' => $ApellidoAprendiz, ':Ap_Telefono' => $TelefonoAprendiz,
        ':Ap_Correo' => $EmailAprendiz))) ? 'Aprendiz agregado correctamente' : 'No se pudo registrar al Aprendiz';
} catch (PDOException $e) {
    $_SESSION['message'] = $e->getMessage();
}

header('location: ../Ingresar/RegistrarAprendiz.php');
?>