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
            <script>
                $(document).ready(function() {
                    $(".alert-success").hide();
                    $(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
                            $(".alert-success").slideUp(500);
                        });
                });
            </script>
            <?php

            unset($_SESSION['message']);
        }
    ?>
    <h2 class="text-center">Registrar Fichas de Caracterizacion</h2>
    <hr>
    <form action="../RegistroBD/GuardarFicha.php" method="POST">
        <div class="form-group">
            <label for="TXT_sIdFicha">N° de Ficha</label>
            <input type="text" class="form-control" name="NroFicha" id="TXT_sIdFicha" required>
        </div>
        <div class="form-group">
            <label for="LBX_sConvenios">Convenio</label>
            <select class="form-control" id="LBX_sConvenios" name="Convenio" required>
                <option value=""></option>
                <?php
                include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $sql = "SELECT Cv_Id, CONCAT(Bc_NombreInstitucion, ' MARCO ', Cv_ConvenioMarco, ' DERIVADO ', Cv_ConvenioDerivado) AS Convenio FROM banco_ies INNER JOIN convenios ON banco_ies.Bc_Id = convenios.Cv_IdInstitucion WHERE convenios.Cv_EstadoConvenio = '1'  ";
                    foreach ($db->query($sql) as $row) {
                        ?>
                        <option value="<?php echo($row['Cv_Id']); ?>"> <?php echo($row['Convenio']); ?></option>
                        <?php
                    }
                }catch (PDOException $e){
                    $_SESSION['message'] = $e->getMessage();
                    header('location: ../Ingresar/RegistrarFicha.php');
                }

                $database->close();
                ?>
            </select>
        </div>
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
                    header('location: ../Ingresar/RegistrarFicha.php');
                }

                $database->close();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="TXT_sFInicio">Fecha Inicio</label>
            <input type="date" class="form-control" name="FechaInicio" id="TXT_sFInicio" required>
        </div>
        <div class="form-group">
            <label for="TXT_sFFin">Fecha Fin</label>
            <input type="date" class="form-control" name="FechaFin" id="TXT_sFFin" required>
        </div>
        <div class="text-center">
            <button type="submit" id="BTN_sIngresarFicha" name="IngresarFicha" class="btn btn-primary mx-auto">Ingresar</button>
        </div>        
    </form>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_RegistrarFicha" ).last().addClass( "Menuactive" );
    });
    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sIngresarFicha').submit();
        }
    });
</script>
