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
    <h2 class="text-center">Registrar Aprendices en Formación</h2>
    <hr>
    <form action="../RegistroBD/GuardarAprendiz.php" method="POST">
        <div class="form-group">
            <label for="LBX_sFichaFormacion">Ficha de Formacion</label>
            <select class="form-control" id="LBX_sFichaFormacion" name="FichaFormacion" required>
                <option value=""></option>
                <?php
                include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $sql = "SELECT fichas.F_Id , CONCAT(fichas.F_Id, ' - ',p.Pg_Nombre) AS 'Pg_Nombre'   FROM fichas INNER JOIN programas p on fichas.F_PgId = p.Pg_Id";
                    foreach ($db->query($sql) as $rowCBX) {
                        ?>
                        <option value="<?php echo($rowCBX['F_Id']); ?>"> <?php echo($rowCBX['Pg_Nombre']); ?></option>
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
            <input type="text" class="form-control" name="Nombre" id="TXT_sNombres" required>
        </div>
        <div class="form-group">
            <label for="TXT_sApellido">Apellidos</label>
            <input type="text" class="form-control" name="Apellido" id="TXT_sApellido" required>
        </div>
        <div class="form-group">
            <label for="TXT_sTelefono">Telefono</label>
            <input type="text" class="form-control" name="Telefono" id="TXT_sTelefono" required>
        </div>
        <div class="form-group">
            <label for="TXT_sEmail">Correo Electrónico</label>
            <input type="text" class="form-control" name="CorreoElectronico" id="TXT_sEmail" required>
        </div>
        <div class="text-center">
            <button type="submit" id="BTN_sIngresarAprendiz" name="IngresarAprendiz" class="btn btn-primary mx-auto">Ingresar</button>
        </div>        
    </form>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_RegistrarAprendiz" ).last().addClass( "Menuactive" );
    });
    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sIngresarAprendiz').submit();
        }
    });
</script>
