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
        $sql.= "ON ambientes.Ab_SsCodConvenio = convenios.Cv_Id ";
        $sql.= "WHERE Ab_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../ajax/Modificar.php?id=<?php echo $row['Ab_Id']; ?>&Modal=ModalAmbiente">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombre Ambiente:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NombreAmbiente"  value="<?php echo $row['Ab_Nombre']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Ubicacion Ambiente:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="UbicacionAmbiente" value="<?php echo $row['Ab_Ubicacion']; ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                                Cancelar
                            </button>
                            <button type="submit" name="MoficarAmbiente" class="btn btn-primary"><span class="fa fa-save"></span>
                                Actualizar
                            </button>
                        </div>
                    </form>

                </div>
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