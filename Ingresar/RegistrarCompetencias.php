<?php 
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>

<div class="container contenedor">
    <?php

        if(isset($_SESSION['message'])){
            ?>
            <div class="alert alert-dismissible alert-success" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> <?php echo $_SESSION['message']; ?>
            </div>
            <?php

            unset($_SESSION['message']);
        }
    ?>
    <h2 class="text-center">Registrar Competencias</h2>
    <hr>
    <form action="../RegistroBD/GuardarCompetencia.php" method="POST">
        <div class="form-group">
            <label for="LBX_sProgramaFormacion">Programa de Formación</label>
            <select class="form-control" id="LBX_sProgramaFormacion" name="ProgramaFormacion" required>
                <option value=""></option>
                <?php
                include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $sql = "SELECT Pg_Id , Pg_Nombre FROM programas ";
                    foreach ($db->query($sql) as $row) {
                        ?>
                        <option value="<?php echo($row['Pg_Id']); ?>"> <?php echo($row['Pg_Nombre']); ?></option>
                        <?php
                    }
                }catch (PDOException $e){
                    $_SESSION['message'] = $e->getMessage();
                    header('location: index.php');
                }

                $database->close();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="TXT_sNomCompetencia">Nombre de la Competencia</label>
            <input type="text" class="form-control" name="NombreCompetencia" id="TXT_sNomCompetencia" required>
        </div>
         <div class="form-group">
            <label for="TXT_sDuracionCompetencia">Duracion de Competencia (HRS)</label>
            <input type="number" class="form-control" name="DuracionCompetencia" id="TXT_sDuracionCompetencia" required>
        </div>
        <div class="text-center">
            <button type="submit" id="BTN_sIngresarCompetencia" name="CrearCompetencia" class="btn btn-primary mx-auto">Registrar Competencia</button>
        </div>        
    </form>
</div>


<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_RegistrarCompetencia" ).last().addClass( "Menuactive" );
    });
    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sIngresarCompetencia').submit();
        }
    });
    $('#TXT_sDuracionCompetencia').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g,'');
    });
</script>
