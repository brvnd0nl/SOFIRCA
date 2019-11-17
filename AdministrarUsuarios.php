<?php 
session_start();
$_SESSION['Url'] = __FILE__;
include('components\header.php');
?>
<div class="container contenedor">
    <h2 class="text-center">Administrar Usuarios</h2>
    <hr>
    <form>
        <div class="form-group">
            <label for="TXT_sUsuario">Número de Usuario</label>
            <input type="text" class="form-control" name="Usuario" id="TXT_sUsuario" required>
        </div>
        <div class="form-group">
            <label for="TXT_sContraseña">Contraseña</label>
            <input type="password" class="form-control" name="Contraseña" id="TXT_sContraseña" required>
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
                    header('location: index.php');
                }

                $database->close();
                ?>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" id="BTN_sIngresarUsuario" name="IngresarUsuario" class="btn btn-primary mx-auto">Ingresar</button>
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
</script>
