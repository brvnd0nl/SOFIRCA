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

    <h2 class="text-center">Registrar Contrato</h2>
    <hr>
    <form action="../RegistroBD/GuardarContrato.php" method="POST">        
        <div class="form-group">
            <label for="TXT_sNumContrato">Número de Contrato</label>
            <input type="text" class="form-control" name="NumeroContrato" id="TXT_sNumContrato" required>
        </div>
        <div class="form-group">
            <label for="LBX_sInstructor">Instructor</label>
            <select class="form-control" id="LBX_sInstructor" name="Instructor" required>
                <option value=""></option>         
                <?php
                include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $sql = 'SELECT In_Id,In_Nombres, In_Apellidos FROM instructor';
                    foreach ($db->query($sql) as $row) {
                        ?>
                        <option value="<?php echo($row['In_Id']); ?>"> <?php echo($row['In_Nombres']." ".$row['In_Apellidos']); ?></option>
                        <?php
                    }
                }catch (PDOException $e){
                    $_SESSION['message'] = $e->getMessage();
                    header('location: RegistrarInstructor.php');
                }

                $database->close();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="TXT_FInicio">Fecha Inicio del Contrato</label>
            <input type="date" class="form-control" name="FechaInicioContrato" id="TXT_FInicio" required>
        </div>
        <div class="form-group">
            <label for="TXT_FFin">Fecha Fin del Contrato</label>
            <input type="date" class="form-control" name="FechaFinContrato" id="TXT_FFin" required>
        </div>
        <div class="form-group">
            <label for="LBX_sCentroFormacion">Centro de Formacion</label>
            <select class="form-control" id="LBX_sCentroFormacion" name="CentroFormacion" required>
                <option value=""></option>   
                        <?php
                include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $sql = 'SELECT Cf_Id,Cf_Nombre FROM centro_formacion';
                    foreach ($db->query($sql) as $row) {
                        ?>
                        <option value="<?php echo($row['Cf_Id']); ?>"> <?php echo($row['Cf_Nombre']); ?></option>
                        <?php
                    }
                }catch (PDOException $e){
                    $_SESSION['message'] = $e->getMessage();
                    header('location: RegistrarInstructor.php');
                }

                $database->close();
                ?>

            </select>
        </div> 
        <!--<div class="form-group">
            <label for="LBX_sInstitucion">Institucion</label>
            <select class="form-control" id="LBX_sInstitucion" name="Institucion" required>
                <option value=""></option>
                <?php
/*                include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $sql = 'SELECT Bc_Id, Bc_NombreInstitucion FROM banco_ies';
                    foreach ($db->query($sql) as $row) {
                        */?>
                        <option value="<?php /*echo($row['Bc_Id']); */?>"> <?php /*echo($row['Bc_NombreInstitucion']); */?></option>
                        <?php
/*                    }
                }catch (PDOException $e){
                    $_SESSION['message'] = $e->getMessage();
                    header('location: index.php');
                }

                $database->close();
                */?>
            </select>
        </div> -->
        <div class="text-center">
            <button type="submit" id="BTN_sIngresarContrato" name="IngresarContrato" class="btn btn-primary mx-auto">Ingresar</button>
        </div>        
    </form>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_RegistrarContratoInstructor" ).last().addClass( "Menuactive" );
    });
    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sIngresarContrato').submit();
        }
    });
</script>
