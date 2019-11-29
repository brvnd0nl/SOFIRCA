<?php 
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>
<div class="container contenedor">
    <h2 class="text-center">Apartado de Consultas</h2>    
    <div class="container">
        <?php
            if ($NivelSeguridad == "1" || $NivelSeguridad == "2"){
        ?>
        <hr>
        <div class="row">
            <div class="col"><a class="btn btn-light btn-lg" href="ConsultaIES.php">IES</a></div>
            <div class="col"><a class="btn btn-light btn-lg" href="ConsultaConvenio.php">Convenio</a></div>
            <div class="col"><a class="btn btn-light btn-lg" href="ConsultaInformes.php">Informe</a></div>

        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col"><a class="btn btn-light btn-lg" href="ConsultaPrograma.php" >Programa de Formacion</a></div>
            <div class="col"><a class="btn btn-light btn-lg" href="ConsultaCompetencia.php" >Competencia</a></div>
            <div class="col"><a class="btn btn-light btn-lg" href="ConsultaFichas.php" >Fichas</a></div>
            <div class="col"><a class="btn btn-light btn-lg" href="ConsultaAprendices.php" >Aprendices</a></div>
            <div class="col"><a class="btn btn-light btn-lg" href="ConsultaPeriodo.php" >Periodo Academico</a></div>
       
        </div>
        <?php   
            }else{
        ?>
        <hr>
        <div class="row">
            <div class="col"><a class="btn btn-light btn-lg" href="ConsultaAmbientes.php" >Ambiente</a></div>
            <div class="col"><a class="btn btn-light btn-lg" href="ConsultaInstructor.php" >Instructor</a></div>
            <div class="col"><a class="btn btn-light btn-lg" href="ConsultaCargaAcademica.php" >Carga Academica</a></div>
        </div>
        <?php
            }
        ?>                
        <br>        
    </div>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_Consulta" ).last().addClass( "Menuactive" );
    });
</script>
