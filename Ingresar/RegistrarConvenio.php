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
    <h2 class="text-center">Registrar Convenio</h2>
    <hr>
    <form action="../RegistroBD/GuardarConvenio.php" method="POST">
        <div class="form-group">
            <label for="TXT_sNombreInstitucion">Institucion</label>
            <select class="form-control" id="LBX_sInstitucion" name="Institucion" required>
                <option value=""></option>
                <?php
                include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $sql = 'SELECT Bc_Id, Bc_NombreInstitucion FROM banco_ies';
                    foreach ($db->query($sql) as $row) {
                        ?>
                        <option value="<?php echo($row['Bc_Id']); ?>"> <?php echo($row['Bc_NombreInstitucion']); ?></option>
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
            <label for="TXT_sNumConvenioMarco">Número de Convenio Marco</label>
            <input type="text" class="form-control" name="NumeroConvenioMarco" id="TXT_sNumConvenioMarco" required>
        </div>
        <div class="form-group">
            <label for="TXT_sNumConvenioDerivado">Número de Convenio Derivado</label>
            <input type="text" class="form-control" name="NumeroConvenioDerivado" id="TXT_sNumConvenioDerivado" required>
        </div>
        <div class="form-group">
            <label for="LBX_sEstadoConvenio">Estado del Convenio</label>
            <select class="form-control" id="LBX_sEstadoConvenio" name="EstadoConvenio" required>
                <option value=""></option>
                <option value="1">ACTIVO</option>
                <option value="0">DESACTIVADO</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" id="BTN_sIngresarConvenio" name="IngresarConvenio" class="btn btn-primary mx-auto">Ingresar</button>
        </div>        
    </form>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_RegistrarConvenio" ).last().addClass( "Menuactive" );
    });
    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sIngresarConvenio').submit();
        }
    });
</script>
