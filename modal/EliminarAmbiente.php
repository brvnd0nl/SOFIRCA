<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT ambientes.Ab_Id, ambientes.Ab_Nombre, ambientes.Ab_Ubicacion ";
        $sql.= "FROM ambientes INNER JOIN convenios  ";
        $sql.= "ON ambientes.Ab_SsCodConvenio = convenios.Cv_IdInstitucion ";
        $sql.= "WHERE Ab_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <p class="text-center">¿Estas seguro en borrar los datos de?</p>
                <h3 class="text-center">Nombre Ambiente: <?php echo $row['Ab_Nombre']; ?></h3>
                <h3 class="text-center">Ubicacion Ambiente: <?php echo $row['Ab_Ubicacion']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="../ajax/Eliminar.php?id=<?php echo $row['Ab_Id']; ?>&Modal=ModalAmbiente" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
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