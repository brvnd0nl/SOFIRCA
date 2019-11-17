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
    <h2 class="text-center">Registrar Programas De Formacion Tecnica y Tecnologica</h2>
    <hr>
    <form action="../RegistroBD/GuardarPrograma.php" method="POST" enctype="multipart/form-data" >        
        <div class="form-group">
            <label for="TXT_sNomPrograma">Nombre del Programa</label>
            <input type="text" class="form-control" name="NombrePrograma" id="TXT_sNomPrograma" required>
        </div>
        <div class="form-group">
            <label for="LBX_sCentroFormacion">Centro De Formacion</label>
            <select class="form-control" id="LBX_sCentroFormacion" name="CentroFormacion" required>
                <option value=""></option>
                <?php
                include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $sql = 'SELECT Cf_Id, Cf_Nombre FROM centro_formacion';
                    foreach ($db->query($sql) as $row) {
                        ?>
                        <option value="<?php echo($row['Cf_Id']); ?>"> <?php echo($row['Cf_Nombre']); ?></option>
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
            <label for="TXT_AdjuntoPDF">Adjunte PDF del Programa de Formacion</label>
            <input type="file" class="form-control" name="ArchivoPDF" id="TXT_AdjuntoPDF" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/*" required>
        </div>
     
        <div class="text-center">
            <button type="submit" id="BTN_sCrearPrograma" name="CrearPrograma" class="btn btn-primary mx-auto">Crear Programa</button>
        </div>        
    </form>
</div>



<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_RegistrarPrograma" ).last().addClass( "Menuactive" );
    });
    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sCrearPrograma').submit();
        }
    });
</script>
