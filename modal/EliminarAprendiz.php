<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT aprendices.Ap_Id, fichas.F_Id, aprendices.Ap_TipoDocumento, CONCAT(fichas.F_Id,' ',programas.Pg_Nombre) AS 'NombrePrograma', ";
        $sql.= "aprendices.Ap_NumeroDocumento, aprendices.Ap_Apellidos, aprendices.Ap_Nombres, ";
        $sql.= "aprendices.Ap_Telefono, aprendices.Ap_Correo ";
        $sql.= "FROM aprendices INNER JOIN ";
        $sql.= "fichas ON aprendices.Ap_FId = fichas.F_Id ";
        $sql.= "INNER JOIN programas ";
        $sql.= "ON fichas.F_PgId = programas.Pg_Id ";
        $sql.= "WHERE  Ap_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <p class="text-center">¿Estas seguro en borrar los datos de?</p>
                <h3 class="text-center">Ficha de Formacion: <?php echo $row['F_Id']; ?></h3>
                <h3 class="text-center">Tipo de Documento: <?php echo $row['Ap_TipoDocumento']; ?></h3>
                <h3 class="text-center">Numero de Identificacion: <?php echo $row['Ap_NumeroDocumento']; ?></h3>
                <h3 class="text-center">Nombres: <?php echo $row['Ap_Nombres']; ?></h3>
                <h3 class="text-center">Apellidos: <?php echo $row['Ap_Apellidos']; ?></h3>
                <h3 class="text-center">Telefono: <?php echo $row['Ap_Telefono']; ?></h3>
                <h3 class="text-center">Correo: <?php echo $row['Ap_Correo']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="../ajax/Eliminar.php?id=<?php echo $row['Ap_Id']; ?>&Modal=ModalAprendiz" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
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