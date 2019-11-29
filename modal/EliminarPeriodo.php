<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT * FROM periodoacademico WHERE Pa_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <p class="text-center">¿Estas seguro en borrar los datos de?</p>
                <h3 class="text-center">Periodo Academico : <?php echo $row['Pa_Nombre']; ?></h3>
                <h3 class="text-center">Año : <?php echo $row['Pa_Anio']; ?></h3>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="../ajax/Eliminar.php?id=<?php echo $row['Pa_Id']; ?>&Modal=Modalperiodo" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
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