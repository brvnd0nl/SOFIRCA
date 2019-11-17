<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT instructor.In_Id, instructor.In_TipoDocumento, instructor.In_NumeroDocumento, instructor.In_Nombres, instructor.In_Apellidos, instructor.In_Telefono, ";
        $sql.= "instructor.In_EstudiosPregrado, instructor.In_NombreUniverdidad, DATE_FORMAT(instructor.In_FechaGrado,'%d/%m/%Y') AS 'In_FechaGrado' ";
        $sql.= "FROM instructor INNER JOIN ";
        $sql.= "contrato_instructor ON contrato_instructor.Cn_CodInstructor = instructor.In_Id ";
        $sql.= "WHERE In_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <p class="text-center">¿Estas seguro en borrar los datos de?</p>
                <h3 class="text-center">Tipo de Documento: <?php echo $row['In_TipoDocumento']; ?></h3>
                <h3 class="text-center">Numero de Identificacion: <?php echo $row['In_NumeroDocumento']; ?></h3>
                <h3 class="text-center">Nombres: <?php echo $row['In_Nombres']; ?></h3>
                <h3 class="text-center">Apellidos: <?php echo $row['In_Apellidos']; ?></h3>
                <h3 class="text-center">Telefono: <?php echo $row['In_Telefono']; ?></h3>
                <h3 class="text-center">Estudios Pregrado: <?php echo $row['In_EstudiosPregrado']; ?></h3>
                <h3 class="text-center">Nombre Universidad: <?php echo $row['In_NombreUniverdidad']; ?></h3>
                <h3 class="text-center">Fecha Grado: <?php echo $row['In_FechaGrado']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="../ajax/Eliminar.php?id=<?php echo $row['In_Id']; ?>&Modal=ModalInstructor" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
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