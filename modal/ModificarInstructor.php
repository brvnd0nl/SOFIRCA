<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT instructor.In_Id, instructor.In_TipoDocumento, instructor.In_NumeroDocumento, instructor.In_Nombres, instructor.In_Apellidos, instructor.In_Telefono, ";
        $sql .= "instructor.In_EstudiosPregrado, instructor.In_NombreUniverdidad, instructor.In_FechaGrado AS 'In_FechaGrado' ";
        $sql .= "FROM instructor INNER JOIN ";
        $sql .= "contrato_instructor ON contrato_instructor.Cn_CodInstructor = instructor.In_Id ";
        $sql .= "WHERE In_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST"
                          action="../ajax/Modificar.php?id=<?php echo $row['In_Id']; ?>&Modal=ModalInstructor">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Tipo de
                                    Documento:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" id="LBX_sTipoDocumento" name="TipoDocumento" required>
                                    <option value=""></option>
                                    <?php
                                    if ($row["In_TipoDocumento"] == "TI") {
                                        ?>
                                        <option value="TI" selected>Tarjeta de Identidad</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="TI">Tarjeta de Identidad</option>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($row["In_TipoDocumento"] == "CC") {
                                        ?>
                                        <option value="CC" selected>Cédula de Ciudadania</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="CC">Cédula de Ciudadania</option>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($row["In_TipoDocumento"] == "CE") {
                                        ?>
                                        <option value="CE" selected>Cédula Extranjería</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="CE">Cédula Extranjería</option>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($row["In_TipoDocumento"] == "PA") {
                                        ?>
                                        <option value="PA" selected>Pasaporte</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="PA">Pasaporte</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Noº Documento:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NumIdentificacion"
                                       value="<?php echo $row['In_NumeroDocumento']; ?>" required readonly>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombres:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Nombres"
                                       value="<?php echo $row['In_Nombres']; ?>" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Apellidos:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Apellidos"
                                       value="<?php echo $row['In_Apellidos']; ?>" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Telefono:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Telefono"
                                       value="<?php echo $row['In_Telefono']; ?>" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Estudios
                                    Pre-Grado:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Estudios"
                                       value="<?php echo $row['In_EstudiosPregrado']; ?>" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombre
                                    Universidad:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NombreUniversidad"
                                       value="<?php echo $row['In_NombreUniverdidad']; ?>" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Fecha Grado:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="FechaGrado"
                                       value="<?php echo $row['In_FechaGrado']; ?>" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="fa fa-close"></span>
                                Cancelar
                            </button>
                            <button type="submit" name="MoficarAmbiente" class="btn btn-primary"><span
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