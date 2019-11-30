<?php
session_start();

$numerousuario = $_POST["Usuario"];
$nombreusuario = $_POST["NombreUsuario"];
$contrasenia = $_POST["TXT_sContraseña1"];
$acceso = $_POST["NivelAcceso"];

if (isset($_POST["PermisoInstitucion"]) && !empty($_POST["PermisoInstitucion"]) ){

    $institucion = $_POST["PermisoInstitucion"];

}else{

    $institucion=null;
}


include_once('../connection.php');
$database = new Connection();

$db = $database->open();


try {
        $stmt = $db->prepare("INSERT INTO usuarios (Us_Id,Us_Nombre,Us_Pass,Us_NSeguridad,Us_CvIdInstitucion) VALUES (:Us_Id,:Us_Nombre,:Us_Pass,:Us_NSeguridad,:Us_CvIdInstitucion)");

        $_SESSION['message'] = ($stmt->execute(array(':Us_Id' => $numerousuario, ':Us_Nombre' => $nombreusuario, ':Us_Pass' => $contrasenia,':Us_NSeguridad' => $acceso, ':Us_CvIdInstitucion' => $institucion))) ? 'Usuario agregado correctamente' : 'No se pudo registrar el usuario';
    }
 catch (Exception $e) {
    $_SESSION['message'] = $e->getMessage();
}

header('location:..\AdministrarUsuarios.php');

?>