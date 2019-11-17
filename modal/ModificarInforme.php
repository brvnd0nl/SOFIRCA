<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT detalle_informe.Di_Id, banco_ies.Bc_Id, informes.If_Id, detalle_informe.Di_Anio, detalle_informe.Di_Mes, archivosadjuntos.Ad_NombreAdjunto, archivosadjuntos.Ad_RutaArchivo ";
        $sql .= "FROM detalle_informe INNER JOIN ";
        $sql .= "informes ON detalle_informe.Di_IfId = informes.If_Id INNER JOIN ";
        $sql .= "banco_ies ON detalle_informe.Di_CvIdInstitucion = banco_ies.Bc_Id INNER JOIN ";
        $sql .= "archivosadjuntos ON detalle_informe.Di_CodAdjunto = archivosadjuntos.Ad_Id ";
        $sql .= "WHERE Di_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>

            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST"
                          action="../ajax/Modificar.php?id=<?php echo $row['Di_Id']; ?>&Modal=ModalInforme">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Institucion:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" id="LBX_sInstitucion" name="Institucion" required>
                                    <option value=""></option>
                                    <?php
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = "SELECT Bc_Id , Bc_NombreInstitucion FROM banco_ies ";
                                        foreach ($db->query($sql) as $rowLBX) {
                                            if ($rowLBX['Bc_Id'] == $row['Bc_Id']) {
                                                ?>
                                                <option value="<?php echo($rowLBX['Bc_Id']); ?>"
                                                        selected> <?php echo($rowLBX['Bc_NombreInstitucion']); ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo($rowLBX['Bc_Id']); ?>"> <?php echo($rowLBX['Bc_NombreInstitucion']); ?></option>
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
                                <label class="control-label" style="position:relative; top:7px;">Informe:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" id="LBX_sInforme" name="Informe" required>
                                    <option value=""></option>
                                    <?php
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT If_Id, If_Nombre FROM informes';
                                        foreach ($db->query($sql) as $rowLBX) {
                                            if ($rowLBX['If_Id'] == $row['If_Id']) {
                                                ?>
                                                <option value="<?php echo($rowLBX['If_Id']); ?>"
                                                        selected> <?php echo($rowLBX['If_Nombre']); ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo($rowLBX['If_Id']); ?>"> <?php echo($rowLBX['If_Nombre']); ?></option>
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
                                <label class="control-label" style="position:relative; top:7px;">Año:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Anio" maxlength="4"
                                       value="<?php echo $row['Di_Anio']; ?>" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Mes:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" name="Mes" required>
                                    <option value=""></option>
                                    <?php
                                    if ($row['Di_Mes'] == '01') {
                                        ?>
                                        <option value="01" selected>ENERO</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="01">ENERO</option>
                                        <?php
                                    }

                                    if ($row['Di_Mes'] == '02') {
                                        ?>
                                        <option value="02" selected>FEBRERO</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="02">FEBRERO</option>
                                        <?php
                                    }

                                    if ($row['Di_Mes'] == '03') {
                                        ?>
                                        <option value="03" selected>MARZO</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="03">MARZO</option>
                                        <?php
                                    }

                                    if ($row['Di_Mes'] == '04') {
                                        ?>
                                        <option value="04" selected>ABRIL</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="04">ABRIL</option>
                                        <?php
                                    }

                                    if ($row['Di_Mes'] == '05') {
                                        ?>
                                        <option value="05" selected>MAYO</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="05">MAYO</option>
                                        <?php
                                    }

                                    if ($row['Di_Mes'] == '06') {
                                        ?>
                                        <option value="06" selected>JUNIO</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="06">JUNIO</option>
                                        <?php
                                    }

                                    if ($row['Di_Mes'] == '07') {
                                        ?>
                                        <option value="07" selected>JULIO</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="07">JULIO</option>
                                        <?php
                                    }

                                    if ($row['Di_Mes'] == '08') {
                                        ?>
                                        <option value="08" selected>AGOSTO</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="08">AGOSTO</option>
                                        <?php
                                    }

                                    if ($row['Di_Mes'] == '09') {
                                        ?>
                                        <option value="09" selected>SEPTIEMBRE</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="09">SEPTIEMBRE</option>
                                        <?php
                                    }

                                    if ($row['Di_Mes'] == '10') {
                                        ?>
                                        <option value="10" selected>OCTUBRE</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="10">OCTUBRE</option>
                                        <?php
                                    }

                                    if ($row['Di_Mes'] == '11') {
                                        ?>
                                        <option value="11" selected>NOVIEMBRE</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="11">NOVIEMBRE</option>
                                        <?php
                                    }

                                    if ($row['Di_Mes'] == '12') {
                                        ?>
                                        <option value="12" selected>DICIEMBRE</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="12">DICIEMBRE</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="fa fa-close"></span> Cancelar
                            </button>
                            <button type="submit" name="MoficarInforme" class="btn btn-primary"><span
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