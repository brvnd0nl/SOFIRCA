<?php
session_start();

$NombreInstitucion = $_POST["NombreInstitucion"];
$Direccion = $_POST["Direccion"];
$NombreCoordinador = $_POST["NombreCoordinador"];
$Telefono = $_POST["Telefono"];
$Correo = $_POST["Email"];

include_once('../connection.php');
$database = new Connection();

$db = $database->open();


try {
    $stmt = $db->prepare("SELECT * FROM banco_ies
                                                WHERE Bc_NombreInstitucion = ':NombreInst' 
                                                  AND Bc_Correo = ':Correo'
                                                  AND BC_Direccion = ':Direccion'
                                                  AND Bc_Telefono = ':Telefono'
                                                  AND Bc_NombreCoordinador = ':NombreCoordinador'");

    if ($stmt->execute(array(':NombreInst' => $NombreInstitucion,
            ':Direccion' => $Direccion, ':NombreCoordinador' => $NombreCoordinador,
            ':Telefono' => $Telefono, ':Correo' => $Correo)) && $stmt->rowCount() > 0) {
        $_SESSION['message'] = "Institucion ya existente";
    } else {
        $stmt = $db->prepare("INSERT INTO banco_ies ( Bc_NombreCoordinador , Bc_Telefono, BC_Direccion, Bc_Correo,
                        Bc_NombreInstitucion  )
                        VALUES (:Coordinador,:Telefono,:Direccion,:Correo ,:Institucion)");

        $_SESSION['message'] = ($stmt->execute(array(':Coordinador' => $NombreCoordinador, ':Telefono' => $Telefono,
            ':Direccion' => $Direccion, ':Correo' => $Correo, ':Institucion' => $NombreInstitucion)))
            ? 'Institucion agregado correctamente' : 'No se pudo registrar la Institucion';
    }
} catch (Exception $e) {
    $_SESSION['message'] = $e->getMessage();
}

header('location: ../Ingresar/RegistrarIES.php');

?>