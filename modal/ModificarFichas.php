<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        //$sql = "SELECT * FROM banco_ies WHERE Bc_Id = '$id' ";
        /*$sql = "SELECT competencia_programa.Cp_Id, competencia_programa.Cp_NombreC,programas.Pg_Id, competencia_programa.Cp_IntensidadH ";
        $sql.= "FROM competencia_programa INNER JOIN programas ";
        $sql.= "ON competencia_programa.Cp_PgId = programas.Pg_Id ";*/
        $sql = "SELECT fichas.F_Id, banco_ies.Bc_NombreInstitucion,Cv_Id, banco_ies.Bc_Id, programas.Pg_Nombre, programas.Pg_Id, ";
        $sql .= "fichas.F_FechaInicio AS 'F_FechaInicio', fichas.F_FechaFin AS 'F_FechaFin' ";
        $sql .= "FROM fichas INNER JOIN ";
        $sql .= "programas ON fichas.F_PgId = programas.Pg_Id ";
        $sql .= "INNER JOIN convenios ";
        $sql .= "ON fichas.F_CvId = convenios.Cv_Id ";
        $sql .= "INNER JOIN banco_ies ";
        $sql .= "ON convenios.Cv_IdInstitucion = banco_ies.Bc_Id ";
        $sql .= "WHERE  F_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../ajax/Modificar.php?id=<?php echo $row['F_Id']; ?>&Modal=ModalFicha">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Numero de la
                                    Ficha:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NumeroFicha"
                                       value="<?php echo $row['F_Id']; ?>" required readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Tipo de
                                    Convenio:</label>
                            </div>
                            <div class="col-sm-10">
                                <!--                                <input type="text" class="form-control" name="TipoConvenio" value="-->
                                <?php //echo $row['Ap_NumeroDocumento']; ?><!--">-->
                                <select class="form-control" id="LBX_sConvenio" name="Convenio" required>
                                    <option value=""></option>
                                    <?php
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = "SELECT Cv_Id, CONCAT(Bc_NombreInstitucion, ' MARCO ', Cv_ConvenioMarco, ' DERIVADO ', Cv_ConvenioDerivado) AS Convenio FROM banco_ies INNER JOIN convenios ON banco_ies.Bc_Id = convenios.Cv_IdInstitucion WHERE convenios.Cv_EstadoConvenio = '1'  ";
                                        foreach ($db->query($sql) as $rowLBX) {
                                            if ($row['Cv_Id'] == $rowLBX['Cv_Id']) {
                                                ?>
                                                <option value="<?php echo($rowLBX['Cv_Id']); ?>"
                                                        selected> <?php echo($rowLBX['Convenio']); ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo($rowLBX['Cv_Id']); ?>"> <?php echo($rowLBX['Convenio']); ?></option>
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
                                <label class="control-label" style="position:relative; top:7px;">Programa de
                                    Formacion:</label>
                            </div>
                            <div class="col-sm-10">
                                <!--                                <input type="text" class="form-control" name="ProgramaFormacion" value="-->
                                <?php //echo $row['Ap_NumeroDocumento']; ?><!--">-->
                                <select class="form-control" id="LBX_sProgramaFormacion" name="ProgramaFormacion"
                                        required>
                                    <option value=""></option>
                                    <?php
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = "SELECT * FROM programas ";
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
                                <label class="control-label" style="position:relative; top:7px;">Fecha Inicio:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="FechaInicio"
                                       value="<?php echo $row['F_FechaInicio']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Fecha Fin:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="FechaFin"
                                       value="<?php echo $row['F_FechaFin']; ?>" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="fa fa-close"></span> Cancelar
                            </button>
                            <button type="submit" name="MoficarFicha" class="btn btn-primary"><span
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