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
        $sql = "SELECT aprendices.Ap_Id, fichas.F_Id, aprendices.Ap_TipoDocumento, CONCAT(fichas.F_Id,' ',programas.Pg_Nombre) AS 'NombrePrograma', ";
        $sql .= "aprendices.Ap_NumeroDocumento, aprendices.Ap_Apellidos, aprendices.Ap_Nombres, ";
        $sql .= "aprendices.Ap_Telefono, aprendices.Ap_Correo ";
        $sql .= "FROM aprendices INNER JOIN ";
        $sql .= "fichas ON aprendices.Ap_FId = fichas.F_Id ";
        $sql .= "INNER JOIN programas ";
        $sql .= "ON fichas.F_PgId = programas.Pg_Id ";
        $sql .= "WHERE  Ap_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../ajax/Modificar.php?id=<?php echo $row['Ap_Id']; ?>&Modal=ModalAprendiz">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Ficha de
                                    Formacion:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" id="LBX_sFichaFormacion" name="FichaFormacion" required>
                                    <option value=""></option>
                                    <?php
                                    include_once($UrlBase . 'connection.php');
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = "SELECT F_Id, CONCAT(F_Id,' ',programas.Pg_Nombre) AS 'NOMBREPROGRAMA', programas.Pg_Nombre FROM fichas INNER JOIN programas on fichas.F_PgId = programas.Pg_Id ";
                                        foreach ($db->query($sql) as $rowLBX) {
                                            if ($row['F_Id'] == $rowLBX['F_Id']) {
                                                ?>
                                                <option value="<?php echo($rowLBX['F_Id']); ?>"
                                                        selected> <?php echo($rowLBX['NOMBREPROGRAMA']); ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo($rowLBX['F_Id']); ?>"> <?php echo($rowLBX['NOMBREPROGRAMA']); ?></option>
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
                                <label class="control-label" style="position:relative; top:7px;">Tipo de
                                    Documento:</label>
                            </div>
                            <div class="col-sm-10">
                                <select class="form-control" id="LBX_sTipoDocumento" name="TipoDocumento" required>
                                    <option value=""></option>
                                    <?php
                                    if ($row['Ap_TipoDocumento'] == 'TI') {
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
                                    if ($row['Ap_TipoDocumento'] == 'CC') {
                                        ?>
                                        <option value="CC" SELECTED>Cédula de Ciudadania</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="CC">Cédula de Ciudadania</option>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($row['Ap_TipoDocumento'] == 'CE') {
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
                                    if ($row['Ap_TipoDocumento'] == 'PA') {
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
                                <label class="control-label" style="position:relative;top:7px; ">Numero de
                                    Identificacion:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NumIdentificacion"
                                       value="<?php echo $row['Ap_NumeroDocumento']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombres:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Nombres"
                                       value="<?php echo $row['Ap_Nombres']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Apellidos:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Apellidos"
                                       value="<?php echo $row['Ap_Apellidos']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Telefono:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Telefono"
                                       value="<?php echo $row['Ap_Telefono']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Correo
                                    Electronico: </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Email"
                                       value="<?php echo $row['Ap_Correo']; ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="fa fa-close"></span> Cancelar
                            </button>
                            <button type="submit" name="MoficarAprendiz" class="btn btn-primary"><span
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