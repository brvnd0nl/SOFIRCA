<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT programas.Pg_Id, programas.Pg_Nombre, centro_formacion.Cf_Id, centro_formacion.Cf_Nombre, archivosadjuntos.Ad_NombreAdjunto, archivosadjuntos.Ad_RutaArchivo ";
        $sql.= "FROM programas INNER JOIN centro_formacion ";
        $sql.= "ON programas.Pg_CfId = centro_formacion.Cf_Id ";
        $sql.= "INNER JOIN archivosadjuntos ON programas.Pg_CodAdjunto = archivosadjuntos.Ad_Id ";
        $sql.= "WHERE programas.Pg_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <p class="text-center">¿Estas seguro en borrar los datos de?</p>
                <h3 class="text-center">Nombre Programa: <?php echo $row['Pg_Nombre']; ?></h3>
                <h3 class="text-center">Centro de Formacion: <?php echo $row['Cf_Nombre']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="../ajax/Eliminar.php?id=<?php echo $row['Pg_Id']; ?>&Modal=ModalPrograma" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
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