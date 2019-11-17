<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT * FROM banco_ies WHERE Bc_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../ajax/Modificar.php?id=<?php echo $row['Bc_Id']; ?>&Modal=ModalIES">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombre
                                    Institucion:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NombreInstitucion"
                                       value="<?php echo $row['Bc_NombreInstitucion']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Direccion:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Direccion"
                                       value="<?php echo $row['BC_Direccion']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombre del
                                    Coordinador:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NombreCoordinador"
                                       value="<?php echo $row['Bc_NombreCoordinador']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Telefono de
                                    Contacto:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Telefono"
                                       value="<?php echo $row['Bc_Telefono']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Correo:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Email"
                                       value="<?php echo $row['Bc_Correo']; ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="fa fa-close"></span>
                                Cancelar
                            </button>
                            <button type="submit" name="MoficarIES" class="btn btn-primary"><span
                                        class="fa fa-save"></span>
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