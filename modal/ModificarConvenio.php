<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT convenios.Cv_Id, banco_ies.Bc_Id, convenios.Cv_ConvenioMarco, convenios.Cv_ConvenioDerivado, convenios.Cv_EstadoConvenio FROM convenios INNER JOIN banco_ies ON convenios.Cv_IdInstitucion = banco_ies.Bc_Id WHERE convenios.Cv_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST"
                          action="../ajax/Modificar.php?id=<?php echo $row['Cv_Id']; ?>&Modal=ModalConvenio">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Institucion:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" id="LBX_sInstitucion" name="Institucion" required>
                                    <option value=""></option>
                                    <?php
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT Bc_Id, Bc_NombreInstitucion FROM banco_ies';
                                        foreach ($db->query($sql) as $rowCBX) {
                                            if ($rowCBX["Bc_Id"] == $row["Bc_Id"]) {
                                                ?>
                                                <option value="<?php echo($rowCBX['Bc_Id']); ?>"
                                                        selected> <?php echo($rowCBX['Bc_NombreInstitucion']); ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo($rowCBX['Bc_Id']); ?>"> <?php echo($rowCBX['Bc_NombreInstitucion']); ?></option>
                                                <?php
                                            }
                                        }
                                    } catch (PDOException $e) {
                                        $_SESSION['message'] = $e->getMessage();
                                        header('location: index.php');
                                    }

                                    $database->close();
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Numero de Convenio
                                    Marco:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NumeroConvenioMarco"
                                       value="<?php echo $row['Cv_ConvenioMarco']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Numero de Convenio
                                    Derivado:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NumeroConvenioDerivado"
                                       value="<?php echo $row['Cv_ConvenioDerivado']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Estado:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" id="LBX_sEstadoConvenio" name="EstadoConvenio" required>
                                    <option value=""></option>
                                    <?php
                                    if ($row["Cv_EstadoConvenio"] == "1") {
                                        ?>
                                        <option value="1" selected>ACTIVO</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="1">ACTIVO</option>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($row["Cv_EstadoConvenio"] == "0") {
                                        ?>
                                        <option value="0" selected>DESACTIVADO</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="0">DESACTIVADO</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="fa fa-close"></span>
                                Cancelar
                            </button>
                            <button type="submit" name="MoficarConvenio" class="btn btn-primary"><span
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