<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT * FROM periodoacademico WHERE Pa_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../ajax/Modificar.php?id=<?php echo $row['Pa_Id']; ?>&Modal=Modalperiodo">
                    <div class="row form-group">
                    <div class="col-sm-12">
                                <input type="text" class="form-control text-center" name="NombreInstitucion"
                                       value="<?php echo $row['Pa_Nombre']." DEL AÑO ".$row['Pa_Anio']; ?>" required disabled>
                            </div></div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label" style="position:relative; top:7px;">Fecha de inicio: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="NombreInstitucion"
                                       value="<?php echo $row['Pa_FechaInicio']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label" style="position:relative; top:7px;">Fecha Fin: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="Direccion"
                                       value="<?php echo $row['Pa_FechaFin']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label" style="position:relative; top:7px;">Estado :</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="NombreCoordinador"
                                       value="<?php echo $row['Pa_Estado']; ?>" required>
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