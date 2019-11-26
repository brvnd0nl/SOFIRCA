<?php 
//EN PROCESO DE CONSTRUCCION 
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
    <h2 class="text-center">Registrar Periodo Academico</h2>
    <hr>
	
    <form  action="../RegistroBD/GuardarIES.php" method="POST">
     
    <div class="row"> 
    <div class="col-1">
    </div>
    <div class="col-2">    
    <div class="form-group">
            <label for="TXT_sNombreInstitucion">Seleccione el año</label>
            <input type="number" required min="2010" max="2040" class="form-control" placeholder="año" name="periodoanio" id="txtanio" required>
        
        </div>
        
        </div>
        <input type="button" value="consultar" id="txtanio" class="btn btn-primary" onclick="consulta()"></input>
        
        <div class="col-4" id="trimestreoculto" style="display :none">
        <div class="form-group">
            <label for="TXT_sDireccion">Seleccione trimestre</label>
                <select name="trimestre" id="trimestreacademico" class="form-control" required>
                    <option value=""></option>
                    <option value="1">TRIMESTRE I</option>
                    <option value="2">TRIMESTRE II</option>
                    <option value="3">TRIMESTRE III</option>
                    <option value="4">TRIMESTRE IV</option>
                </select>
        </div>
        </div>
        </div>






                
    </form>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    
function consulta(){



var anio = $("#txtanio").val();

if (anio==""){
    alert ("ingrese un valor");
    return;
}

$.ajax({
            type:'POST',
            url: '<?php echo $UrlBase ?>consulta.php',//aqui va tu direccion donde esta tu funcion php
            data:{Datos:{anio:anio}},//aqui tus datos
            success:function(data){
                //Obtengo la respuesta del PHP
            
                console.log(data);
                alert(data);
                

            },
            error:function(data){
                //En caso de Error, Entra Aqui
                alert("Se nos ha presento un problema tecnico, por favor contacte con el Administrador\n Error: " +data);
            }
                

});
 
 }
 
 


</script>