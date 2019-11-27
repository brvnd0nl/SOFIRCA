<?php
session_start();
$_SESSION['Url'] = __FILE__;
include_once("connection.php");
?>

<?php


$Datos = $_POST['Datos'];
$anio=implode ("",$Datos);

        $mysqli = new mysqli('localhost', 'root', '', 'dbsofirca');
        $mysqli->set_charset("utf8");

        // 2) Preparar la orden SQL
        $consulta = "SELECT * FROM periodoacademico WHERE periodoacademico.Pa_Año = '".$anio."' ";

        $res = $mysqli->query($consulta);
        $i = 0;
        // 4) Ir Imprimiendo las filas resultantes
        while ($consulta_array = $res->fetch_array()) {

            $trimestre[$i] = $consulta_array["Pa_Nombre"];
            $i++;
            
        }

        $opciones=["1 TRIMESTRE","2 TRIMESTRE","3 TRIMESTRE","4 TRIMESTRE"];

                if ($i>0){
                 for ($n=0; $n<4; $n++){
                    for ($l=0; $l<$i; $l++){
                        if ($opciones[$n]==$trimestre[$l]){
                            $opciones[$n]="";
                        }}}}
            $o=0;
            for ($n=0; $n<4; $n++){
            if ($opciones[$n]==""){
            unset ($opciones[$n]);
            $o++;
            }
            }

            if ($i>0){
                    if ($i==4){
                    echo "1";
                    }   else {
                            $imprimir = implode(",",$opciones);
                            echo $imprimir;}
            }else {
                $imprimir = implode(",",$opciones);
                echo $imprimir;
            }

                
            

                        

                ?>