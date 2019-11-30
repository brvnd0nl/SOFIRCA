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
<!--        <script>
            $(document).ready(function() {
                $(".alert-success").hide();
                $(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
                    $(".alert-success").slideUp(500);
                });
            });
        </script>-->
        <?php

        unset($_SESSION['message']);
    }
    ?>
    <h2 class="text-center">Registrar Informe de Formacion Profesional</h2>
    <hr>
    <form action="../RegistroBD/GuardarInforme.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="LBX_sInstitucion">Institucion</label>
            <select class="form-control" id="LBX_sInstitucion" name="Institucion" required>
                <option value=""></option>
                <?php
                include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $sql = "SELECT Bc_Id, CONCAT(Bc_NombreInstitucion, ' MARCO ', Cv_ConvenioMarco, ' DERIVADO ', Cv_ConvenioDerivado) AS Convenio FROM banco_ies INNER JOIN convenios ON banco_ies.Bc_Id = convenios.Cv_IdInstitucion WHERE convenios.Cv_EstadoConvenio = '1'  ";
                    foreach ($db->query($sql) as $row) {
                        ?>
                        <option value="<?php echo($row['Bc_Id']); ?>"> <?php echo($row['Convenio']); ?></option>
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
            <label for="LBX_sInforme">Informe</label>
            <select class="form-control" id="LBX_sInforme" name="Informe" required>
                <option value=""></option>
                <?php
                include_once($UrlBase.'connection.php');
                $database = new Connection();
                $db = $database->open();
                try{
                    $sql = 'SELECT If_Id, If_Nombre FROM informes';
                    foreach ($db->query($sql) as $row) {
                        ?>
                        <option value="<?php echo($row['If_Id']); ?>"> <?php echo($row['If_Nombre']); ?></option>
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
            <label for="TXT_sAño">Año</label>
            <input type="text" class="form-control" maxlength="4" name="Año" id="TXT_sAño" required>
        </div>
        <div class="form-group">
            <label for="LBX_sMes">Mes</label>
            <select class="form-control" id="LBX_sMes" name="Mes" required>
                <option value=""></option>
                <option value="01">ENERO</option>
                <option value="02">FEBRERO</option>
                <option value="03">MARZO</option>
                <option value="04">ABRIL</option>
                <option value="05">MAYO</option>
                <option value="06">JUNIO</option>
                <option value="07">JULIO</option>
                <option value="08">AGOSTO</option>
                <option value="09">SEPTIEMBRE</option>
                <option value="10">OCTUBRE</option>
                <option value="11">NOVIEMBRE</option>
                <option value="12">DICIEMBRE</option>
            </select>
        </div>
        <div class="form-group">
            <label for="TXT_sAdjuntoPDF">Archivo PDF</label>
            <input type="file" class="form-control" name="ArchivoPDF" id="TXT_sAdjuntoPDF" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/*" required>
        </div>
        <div class="text-center">
            <button type="submit" id="BTN_sIngresarInforme" name="IngresarInforme" class="btn btn-primary mx-auto">Ingresar</button>
        </div>        
    </form>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_RegistrarInforme" ).last().addClass( "Menuactive" );
    });
    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sIngresarInforme').submit();
        }
    });
    $('#TXT_sAño').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g,'');
    });
</script>
