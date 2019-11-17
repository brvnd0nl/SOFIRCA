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
    <h2 class="text-center">Registrar Ambiente</h2>
    <hr>
    <form action="../RegistroBD/GuardarAmbiente.php" method="POST">
        <div class="form-group">
            <label for="TXT_sNombreAmbiente">Nombre del Ambiente</label>
            <input type="text" class="form-control" name="NombreAmbiente" id="TXT_sNombreAmbiente" required>
        </div>
        <div class="form-group">
            <label for="TXT_sUbicacionAmbiente">Ubicación del Ambiente</label>
            <input type="text" class="form-control" name="UbicacionAmbiente" id="TXT_sUbicacionAmbiente" required>
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
            <button type="submit" id="BTN_sIngresarAmbiente" name="IngresarAmbiente" class="btn btn-primary mx-auto">Ingresar</button>
        </div>        
    </form>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_RegistrarAmbiente" ).last().addClass( "Menuactive" );
    });
    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sIngresarAmbiente').submit();
        }
    });
</script>
