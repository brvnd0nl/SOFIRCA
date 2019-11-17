<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT programas.Pg_Id, programas.Pg_Nombre, centro_formacion.Cf_Id, archivosadjuntos.Ad_NombreAdjunto, archivosadjuntos.Ad_RutaArchivo ";
        $sql .= "FROM programas INNER JOIN centro_formacion ";
        $sql .= "ON programas.Pg_CfId = centro_formacion.Cf_Id ";
        $sql .= "INNER JOIN archivosadjuntos ON programas.Pg_CodAdjunto = archivosadjuntos.Ad_Id ";
        $sql .= "WHERE programas.Pg_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST"
                          action="../ajax/Modificar.php?id=<?php echo $row['Pg_Id']; ?>&Modal=ModalPrograma">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Programa:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Programa"
                                       value="<?php echo $row["Pg_Nombre"]; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Centro de
                                    Formacion:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" id="LBX_sCentroFormacion" name="CentroFormacion" required>
                                    <option value=""></option>
                                    <?php
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT Cf_Id, Cf_Nombre FROM centro_formacion';
                                        foreach ($db->query($sql) as $rowLBX) {
                                            if ($rowLBX['Cf_Id'] == $row['Cf_Id']) {
                                                ?>
                                                <option value="<?php echo($rowLBX['Cf_Id']); ?>"
                                                        selected> <?php echo($rowLBX['Cf_Nombre']); ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo($rowLBX['Cf_Id']); ?>"> <?php echo($rowLBX['Cf_Nombre']); ?></option>
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="fa fa-close"></span>
                                Cancelar
                            </button>
                            <button type="submit" name="ModificarPrograma" class="btn btn-primary"><span
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