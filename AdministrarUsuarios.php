<?php 
session_start();
$_SESSION['Url'] = __FILE__;
include('components\header.php');

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
    <h2 class="text-center">Administrar Usuarios</h2>
    <hr>
    <form action="RegistroBD\GuardarUsuario.php" method="POST">
        <div class="form-group">
            <label for="TXT_sUsuario">Número de Usuario</label>
            <input type="text" class="form-control" name="Usuario" id="TXT_sUsuario" required>
        </div>
        <div class="form-group">
            <label for="TXT_sUsuario">Nombre de Usuario</label>
            <input type="text" class="form-control" name="NombreUsuario" id="TXT_sNombreUsuario" required>
        </div>
        <div class="row">
    <div class="col">
    <label for="inputPassword4">Contraseña</label>
      <input type="password" class="form-control" id="TXT_sContraseña1" name="TXT_sContraseña1" placeholder="" required>
    </div>
    <div class="col">
    <label for="inputPassword4">Confirma Contraseña</label>
      <input type="password" class="form-control" id="TXT_sContraseña2" name="TXT_sContraseña2" placeholder="" required>
    </div>
  </div>  
        <div class="form-group">
            <label for="LBX_sNivelAcceso">Nivel de Acceso</label>
            <select class="form-control" id="LBX_sNivelAcceso" onchange="activarPermisoInstitucion();" name="NivelAcceso" required>
                <option value=""></option>
                <option value="2">USUARIO ESTANDAR</option>
                <option value="1">ADMINISTRADOR</option>
                <option value="3">INSTITUCION</option>
            </select>
        </div>
        <div class="form-group" id="DivPermisosInstitucion" hidden>
            <label for="LBX_sInstitucionPermiso">Permiso de Institucion</label>
            <select class="form-control" id="LBX_sInstitucionPermiso" name="PermisoInstitucion">
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
                    header('location: AdministrarUsuarios.php');
                }

                $database->close();
                ?>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" onclick="validar();" id="BTN_sIngresarUsuario" name="IngresarUsuario" class="btn btn-primary mx-auto">Ingresar</button>
        </div>        
    </form>
</div>
<?php include('components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_AdministrarUsuarios" ).last().addClass( "Menuactive" ); 
    });
    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sIngresarUsuario').submit();
        }
    });

function validar(){

var pass1 =  $("#TXT_sContraseña1").val();
var pass2 = $("#TXT_sContraseña2").val();

if (pass1!=pass2){
    alert("las contraseñas ingresadas no coinciden, Por favor verifique");
    return;
}



}




</script>
