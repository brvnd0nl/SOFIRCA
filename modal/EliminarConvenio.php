<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT convenios.Cv_Id, banco_ies.Bc_Id, banco_ies.Bc_NombreInstitucion, convenios.Cv_ConvenioMarco, convenios.Cv_ConvenioDerivado, convenios.Cv_EstadoConvenio FROM convenios INNER JOIN banco_ies ON convenios.Cv_IdInstitucion = banco_ies.Bc_Id WHERE convenios.Cv_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <p class="text-center">¿Estas seguro en borrar los datos de?</p>
                <h3 class="text-center">Nombre Institucion: <?php echo $row['Bc_NombreInstitucion']; ?></h3>
                <h3 class="text-center">Nro de Convenio Marco: <?php echo $row['Cv_ConvenioMarco']; ?></h3>
                <h3 class="text-center">Nro de Convenio Derivado: <?php echo $row['Cv_ConvenioDerivado']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="../ajax/Eliminar.php?id=<?php echo $row['Cv_Id']; ?>&Modal=ModalConvenio" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
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