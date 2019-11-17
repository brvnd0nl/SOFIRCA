<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        //$sql = "SELECT * FROM banco_ies WHERE Bc_Id = '$id' ";
        $sql = "SELECT competencia_programa.Cp_Id, competencia_programa.Cp_NombreC,programas.Pg_Id, competencia_programa.Cp_IntensidadH ";
        $sql .= "FROM competencia_programa INNER JOIN programas ";
        $sql .= "ON competencia_programa.Cp_PgId = programas.Pg_Id ";
        $sql .= "WHERE  Cp_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../ajax/Modificar.php?id=<?php echo $row['Cp_Id']; ?>&Modal=ModalCompetencia">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombre
                                    Competencia:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NombreCompetencia"
                                       value="<?php echo $row['Cp_NombreC']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Programa:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" id="LBX_sProgramaFormacion" name="ProgramaFormacion"
                                        required>
                                    <option value=""></option>
                                    <?php
                                    include_once($UrlBase . 'connection.php');
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = "SELECT Pg_Id , Pg_Nombre FROM programas ";
                                        foreach ($db->query($sql) as $rowLBX) {
                                            if ($row['Pg_Id'] == $rowLBX['Pg_Id']) {
                                                ?>
                                                <option value="<?php echo($rowLBX['Pg_Id']); ?>"
                                                        selected> <?php echo($rowLBX['Pg_Nombre']); ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo($rowLBX['Pg_Id']); ?>"> <?php echo($rowLBX['Pg_Nombre']); ?></option>
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
                                <label class="control-label" style="position:relative; top:7px;">Intensidad
                                    (Hrs):</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="IntensidadHoras"
                                       value="<?php echo $row['Cp_IntensidadH']; ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="fa fa-close"></span> Cancelar
                            </button>
                            <button type="submit" name="MoficarCompetencia" class="btn btn-primary"><span
                                        class="fa fa-save"></span> Actualizar
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