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
	
    <form  id ="lista" action="../RegistroBD/GuardarPeriodo.php" method="POST">
     
    <div class="row"> 
    <div class="col-1">
    </div>
    <div class="col-2">    
    <div class="form-group">
            <label for="TXT_sNombreInstitucion">Seleccione el año</label>
            <input type="number" required class="form-control" placeholder="Año" name="anio" id="periodoanio" required>
        
        </div>
    
        </div>
        <div id ="btn1">
            
            <input type="button" style="margin-top:20px" estyle="margin-right:20px" value="Consultar " id="txtanio" class="btn btn-primary" onclick="consulta()"></input>
            
        </div>

        <div id ="btn2" style=" display : none">
            <a href="../Ingresar/RegistrarPeriodo.php">
            <input type="button" style="margin-top:20px" estyle="margin-right:20px" value="Editar Año" id="txtanio" class="btn btn-primary"></input></a>
            
        </div>



        <div class="col-4" id="trimestreoculto" style="display :none">
        <div class="form-group">
            <label for="TXT_sDireccion">Seleccione trimestre :</label>
                <select name="listado" id="listado" class="form-control">
               
                </select>
        </div>
        </div>
        </div>

        <br>

        
        <div class="row"> 
    <div class="col-1">
    </div>
    <div class="col-4" id="1" style="display :none">    
    <div class="form-group">
            <label for="TXT_sNombreInstitucion">Seleccione fecha de inicio para el periodo :</label>
            <input type="date" class="form-control col-6" placeholder="fecha de inicio" name="fechainicio" id="fechainicio" required>
        
        </div>
        
        </div>
        <div class="col-4"  id="2" style="display :none">    
    <div class="form-group">
            <label for="TXT_sNombreInstitucion">Seleccione fecha fin para el periodo :</label>
            <input type="date" class="form-control col-6" placeholder="fecha de inicio" name="fechafin" id="fechafin" required>
        
        </div>
        </div>

        <br>
        </div>    
        <div class="row"> 
    <div class="col-1">
    </div>

        <div class="col-4" id="3" style="display :none">
        <div class="form-group">
            <label for="TXT_sDireccion">Seleccione estado :</label>
                <select required name="estado" id="estado" class="form-control">
               <option value=""></option>
               <option value="1">ACTIVO</option>
               <option value="0">INACTIVO</option>
                </select>
                    <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
</div></div>









    </form>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    
function consulta(){



var anio = $("#periodoanio").val();

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
                var listado =  data.replace("\r\n","").replace("\r","").replace("\n","").split(',');
                console.log(listado);

                if (listado == "1"){

                    alert("Por favor seleccione otro año: periodos ya registrados");
                    return;

                } else {
                $('#btn2').removeAttr('style');
                $('#btn1').css("display","none");
                $('#trimestreoculto').removeAttr('style');
                $('#1').removeAttr('style');
                $('#2').removeAttr('style');
                $('#3').removeAttr('style');
                $('#periodoanio').attr("disabled","");

                function cargar_listado() {
                    document.getElementById("listado").innerHTML += "<option value='"+""+"'>"+""+"</option>";
                for(var i in listado){ 
                document.getElementById("listado").innerHTML += "<option value='"+listado[i]+"'>"+listado[i]+"</option>"; 
                }   }

                cargar_listado();
                                
                                
                }


            },
            error:function(data){
                //En caso de Error, Entra Aqui
                alert("Se nos ha presento un problema tecnico, por favor contacte con el Administrador\n Error: " +data);
            }
                

});
 
 }
 
 


</script>