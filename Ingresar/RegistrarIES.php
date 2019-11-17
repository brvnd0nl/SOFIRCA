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
    <h2 class="text-center">Registrar IES</h2>
    <hr>
    <form  action="../RegistroBD/GuardarIES.php" method="POST">
        <div class="form-group">
            <label for="TXT_sNombreInstitucion">Nombre Institucion</label>
            <input type="text" class="form-control" name="NombreInstitucion" id="TXT_sNombreInstitucion" required>
        </div>
        <div class="form-group">
            <label for="TXT_sDireccion">Direccion</label>
            <input type="text" class="form-control" name="Direccion" id="TXT_sDireccion" required>
        </div>
        <div class="form-group">
            <label for="TXT_sNombreCoordinador">Nombre del Coordinador</label>
            <input type="text" class="form-control" name="NombreCoordinador" id="TXT_sNombreCoordinador" required>
        </div>
        <div class="form-group">
            <label for="TXT_sDireccion">Telefono de Contacto</label>
            <input type="text" class="form-control" name="Telefono" id="TXT_sTelefono">
        </div>
        <div class="form-group">
            <label for="TXT_sDireccion">Correo</label>
            <input type="text" class="form-control" name="Email" id="TXT_sCorreo" required>
        </div>
        <div class="text-center">
            <button type="submit" id="BTN_sIngresarIES" name="IngresarIES" class="btn btn-primary mx-auto">Ingresar</button>
        </div>        
    </form>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_RegistrarIES" ).last().addClass( "Menuactive" );
    });
    $('body').keypress(function(e){
    if (e.keyCode == 13)
    {
        $('#BTN_sIngresarIES').submit();
    }
    });
</script>

