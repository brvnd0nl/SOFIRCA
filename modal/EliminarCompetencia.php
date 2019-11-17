<?php
session_start();
include_once('../connection.php');
$database = new Connection();
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    $db = $database->open();

    try {
        $sql = "SELECT competencia_programa.Cp_Id, competencia_programa.Cp_NombreC, programas.Pg_Id, programas.Pg_Nombre, competencia_programa.Cp_IntensidadH ";
        $sql.= "FROM competencia_programa INNER JOIN programas ";
        $sql.= "ON competencia_programa.Cp_PgId = programas.Pg_Id ";
        $sql.= "WHERE  Cp_Id = '$id' ";
        foreach ($db->query($sql) as $row) {
            ?>
            <div class="modal-body">
                <p class="text-center">¿Estas seguro en borrar los datos de?</p>
                <h3 class="text-center">Programa de Formacion: <?php echo $row['Pg_Nombre']; ?></h3>
                <h3 class="text-center">Nombre de Competencia: <?php echo $row['Cp_NombreC']; ?></h3>
                <h3 class="text-center">Duracion: <?php echo $row['Cp_IntensidadH']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="../ajax/Eliminar.php?id=<?php echo $row['Cp_Id']; ?>&Modal=ModalCompetencia" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
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