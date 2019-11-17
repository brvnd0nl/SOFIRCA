<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT fichas.F_Id, banco_ies.Bc_NombreInstitucion,Cv_Id, banco_ies.Bc_Id, programas.Pg_Nombre, programas.Pg_Id, ";
        $sql.= "DATE_FORMAT(fichas.F_FechaInicio,'%d/%m/%Y') AS 'F_FechaInicio', FORMAT(fichas.F_FechaFin,'%d/%m/%Y') AS 'F_FechaFin', ";
        $sql.= "CONCAT(Bc_NombreInstitucion, ' MARCO ', Cv_ConvenioMarco, ' DERIVADO ', Cv_ConvenioDerivado) AS Convenio ";
        $sql.= "FROM fichas INNER JOIN ";
        $sql.= "programas ON fichas.F_PgId = programas.Pg_Id ";
        $sql.= "INNER JOIN convenios ";
        $sql.= "ON fichas.F_CvId = convenios.Cv_Id ";
        $sql.= "INNER JOIN banco_ies ";
        $sql.= "ON convenios.Cv_IdInstitucion = banco_ies.Bc_Id ";
        $sql.= "WHERE  F_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <p class="text-center">¿Estas seguro en borrar los datos de?</p>
                <h3 class="text-center">Nro de Ficha: <?php echo $row['F_Id']; ?></h3>
                <h3 class="text-center">Convenio: <?php echo $row['Convenio']; ?></h3>
                <h3 class="text-center">Programa de Formacion: <?php echo $row['Pg_Nombre']; ?></h3>
                <h3 class="text-center">Fecha Inicio: <?php echo $row['F_FechaInicio']; ?></h3>
                <h3 class="text-center">Fecha Fin: <?php echo $row['F_FechaFin']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="../ajax/Eliminar.php?id=<?php echo $row['F_Id']; ?>&Modal=ModalFicha" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
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