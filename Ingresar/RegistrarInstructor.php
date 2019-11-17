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
    <h2 class="text-center">Registrar Instructor</h2>
    <hr>
    <form action="../RegistroBD/GuardarInstructor.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="LBX_sTipoDocumento">Tipo de Documento</label>
            <select class="form-control" id="LBX_sTipoDocumento" name="TipoDocumento" required>
                <option value=""></option>
                <option value="TI">Tarjeta de Identidad</option>
                <option value="CC">Cédula de Ciudadania</option> 
                <option value="CE">Cédula Extranjería</option> 
                <option value="PA">Pasaporte</option>          
            </select>
        </div>
        <div class="form-group">
            <label for="TXT_sNumIdentificacion">Número de Identificación</label>
            <input type="text" class="form-control" name="NumeroIdentificacion" id="TXT_sNumIdentificacion" required>
        </div>
        <div class="form-group">
            <label for="TXT_sNombre">Nombres</label>
            <input type="text" class="form-control" name="Nombres" id="TXT_sNombres" required>
        </div>
        <div class="form-group">
            <label for="TXT_sApellido">Apellidos</label>
            <input type="text" class="form-control" name="Apellidos" id="TXT_sApellidos" required>
        </div>
        <div class="form-group">
            <label for="TXT_sTelefono">Telefono</label>
            <input type="text" class="form-control" name="Telefono" id="TXT_sTelefono" required>
        </div>
        <div class="form-group">
            <label for="TXT_sEstudiosPregrado">Estudios Pregrado</label>
            <input type="text" class="form-control" name="EstudiosPregrado" id="TXT_sEstudiosPregrado" required>
        </div>
        <div class="form-group">
            <label for="TXT_sNombreUniversidad">Nombre Universidad</label>
            <input type="text" class="form-control" name="NombreUniversidad" id="TXT_sNombreUniversidad" required>
        </div>
        <div class="form-group">
            <label for="TXT_DFechaGrado">Fecha Grado</label>
            <input type="date" class="form-control" name="FechaGrado" id="TXT_DFechaGrado" required>
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
        </div>-->
        <div class="form-group">
            <label for="AdjuntarCCV">Adjunte Hoja de Vida</label>
            <input type="file" class="form-control" name="AdjunteHV" id="AdjuntarCCV" required>
        </div>
        <div class="text-center">
            <button type="submit" id="BTN_sIngresarInstructor" name="IngresarInstructor" class="btn btn-primary mx-auto">Ingresar</button>
        </div>        

    </form>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_RegistrarInstructor" ).last().addClass( "Menuactive" );
    });
    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sIngresarInstructor').submit();
        }
    });
</script>
