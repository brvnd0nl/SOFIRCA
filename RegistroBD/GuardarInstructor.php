<?php
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>


<?php

$TipoDocumento = $_POST['TipoDocumento'];
$NumeroIdentificacion = $_POST['NumeroIdentificacion'];
$Nombres = $_POST['Nombres'];
$Apellidos = $_POST['Apellidos'];
$Telefono = $_POST['Telefono'];
$EstudiosPregrado = $_POST['EstudiosPregrado'];
$NombreUniversidad = $_POST['NombreUniversidad'];
$FechaGrado = $_POST['FechaGrado'];
$CodConvenio = $_SESSION['CodigoInstitucion'];


if ($_FILES["AdjunteHV"]["error"] > 0) {
    $_SESSION['message'] = "Error Validando Archivo Adjunto: " . $_FILES["AdjunteHV"]["error"];
    header('location: ../Ingresar/RegistrarInstructor.php');
}

$InformacionArchivo = pathinfo($_FILES['AdjunteHV']['name']);
$NombreArchivo = $_FILES['AdjunteHV']['name'];
$NombreArchivo = $InformacionArchivo['filename'];
$Extension = $InformacionArchivo['extension'];
$ArchivoPDF = $NombreArchivo . "." . $Extension;

$Ubicacion = '../files/' . $ArchivoPDF;
copy($_FILES['AdjunteHV']['tmp_name'], $Ubicacion);


include_once($UrlBase . 'connection.php');
$database = new Connection();
$db = $database->open();
try {
    $stmt = $db->prepare("INSERT INTO archivosadjuntos (Ad_NombreAdjunto,Ad_RutaArchivo) VALUES (:Ad_NombreAdjunto,:Ad_RutaArchivo)");

    if ($stmt->execute(array(':Ad_NombreAdjunto' => $NombreArchivo, ':Ad_RutaArchivo' => $Ubicacion))) {
        $sql = "SELECT * FROM archivosadjuntos WHERE Ad_NombreAdjunto = '$NombreArchivo' AND Ad_RutaArchivo = '$Ubicacion' ";
        foreach ($db->query($sql) as $row) {
            $ArchivoPDF = $row["Ad_Id"];
        }
    } else {
        $_SESSION['message'] = "Error Guardando el Archivo";
        header('location: ../Ingresar/RegistrarInstructor.php');
    }

    if (is_null($ArchivoPDF) == false && $ArchivoPDF != '') {
        $stmt = $db->prepare("INSERT INTO instructor (In_TipoDocumento,In_NumeroDocumento,In_Nombres,In_Apellidos,In_Telefono,In_EstudiosPregrado,In_NombreUniverdidad,In_FechaGrado,In_CodAdjunto,In_SsCodConvenio) VALUES (:In_TipoDocumento,:In_NumeroDocumento,:In_Nombres,:In_Apellidos,:In_Telefono,:In_EstudiosPregrado,:In_NombreUniverdidad,:In_FechaGrado,:In_CodAdjunto,:In_SsCodConvenio)");

        $_SESSION['message'] = ($stmt->execute(array(':In_TipoDocumento' => $_POST["TipoDocumento"], ':In_NumeroDocumento' => $_POST["NumeroIdentificacion"], ':In_Nombres' => $_POST["Nombres"], ':In_Apellidos' => $_POST["Apellidos"], ':In_Telefono' => $_POST["Telefono"], ':In_EstudiosPregrado' => $_POST["EstudiosPregrado"], ':In_NombreUniverdidad' => $_POST["NombreUniversidad"], ':In_FechaGrado' => $_POST["FechaGrado"], ':In_CodAdjunto' => $ArchivoPDF, ':In_SsCodConvenio' => $CodConvenio))) ? 'Instructor agregado correctamente' : 'No se pudo registrar el instructor';
    }
} catch (PDOException $e) {
    $_SESSION['message'] = $e->getMessage();

}

$database->close();
header('location: ../Ingresar/RegistrarInstructor.php');


?>


<?php include('..\components\footer.php'); ?>