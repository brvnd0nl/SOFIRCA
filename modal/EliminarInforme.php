<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT detalle_informe.Di_Id, banco_ies.Bc_Id, banco_ies.Bc_NombreInstitucion, informes.If_Id, informes.If_Nombre, detalle_informe.Di_Anio, detalle_informe.Di_Mes, archivosadjuntos.Ad_NombreAdjunto, archivosadjuntos.Ad_RutaArchivo ";
        $sql.= "FROM detalle_informe INNER JOIN ";
        $sql.= "informes ON detalle_informe.Di_IfId = informes.If_Id INNER JOIN ";
        $sql.= "banco_ies ON detalle_informe.Di_CvIdInstitucion = banco_ies.Bc_Id INNER JOIN ";
        $sql.= "archivosadjuntos ON detalle_informe.Di_CodAdjunto = archivosadjuntos.Ad_Id ";
        $sql.= "WHERE Di_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <p class="text-center">¿Estas seguro en borrar los datos de?</p>
                <h3 class="text-center">Nombre Institucion: <?php echo $row['Bc_NombreInstitucion']; ?></h3>
                <h3 class="text-center">Informe: <?php echo $row['If_Nombre']; ?></h3>
                <h3 class="text-center">Año: <?php echo $row['Di_Anio']; ?></h3>
                <h3 class="text-center">Mes: <?php echo $row['Di_Mes']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="../ajax/Eliminar.php?id=<?php echo $row['Di_Id']; ?>&Modal=ModalInforme" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
            </div>
            <?php
        }

    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
        //header('location: ../index.php');
        echo $e->getMessage();
    }
    $database->close();
}
?>