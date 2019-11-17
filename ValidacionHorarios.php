<?php
session_start();
$_SESSION['Url'] = __FILE__;
include_once("connection.php");
?>


<?php


$Datos = $_POST['Datos'];

$PeriodoAcademico = $Datos['PeriodoAcademico'];
$fechainicio=$Datos["FechaInicio"];

$horainicio=$Datos["HoraInicio"];
$horafin=$Datos["HoraFin"];

$fechafin=$Datos["FechaFin"];

$Ambiente = $Datos['Ambiente'];
$Instructor = $Datos['Instructor'];

/*$FichaFormacion = $Datos['FichaFormacion'];
$Competencia = $Datos['Competencia'];*/

if ($Datos["SemanaLunes"] == "false"){
    $dias_lunes=0;
}else{
    $dias_lunes=1;
}

if ($Datos["SemanaMartes"] == "false"){
    $dias_martes=0;
}else{
    $dias_martes=1;
}

if ($Datos["SemanaMiercoles"] == "false"){
    $dias_miercoles=0;
}else{
    $dias_miercoles=1;
}

if ($Datos["SemanaJueves"] == "false"){
    $dias_jueves=0;
}else{
    $dias_jueves=1;
}

if ($Datos["SemanaViernes"] == "false"){
    $dias_viernes=0;
}else{
    $dias_viernes=1;
}

if ($Datos["SemanaSabado"] == "false"){
    $dias_sabados=0;
}else{
    $dias_sabados=1;
}

$dias_domingos=0;

// 1) Conexión

    try{
        $mysqli = new mysqli('localhost', 'root', '', 'dbsofirca');
        $mysqli->set_charset("utf8");

        // 2) Preparar la orden SQL
        $consulta = "SELECT * FROM carga_academica WHERE carga_academica.Ca_InId = '".$Instructor."' ";

        // 3) Ejecutar la orden y obtener datos
        //mysql_select_db("dbsofirca");
        //$datos = mysql_query($consulta);
        $res = $mysqli->query($consulta);
        $i = 0;
        // 4) Ir Imprimiendo las filas resultantes
        while ($consulta_array = $res->fetch_array()) {

            $fechafinal[$i] = $consulta_array["Ca_FechaFin"];
            $semanas_lunes[$i] = $consulta_array["Ca_Lunes"];
            $semanas_martes[$i] = $consulta_array["Ca_Martes"];
            $semanas_miercoles[$i] = $consulta_array["Ca_Miercoles"];
            $semanas_jueves[$i] = $consulta_array["Ca_Jueves"];
            $semanas_viernes[$i] = $consulta_array["Ca_Viernes"];
            $semanas_sabados[$i] = $consulta_array["Ca_Sabado"];
            $semanas_domingos[$i] = $consulta_array["Ca_Domingo"];
            $horafinal[$i] = $consulta_array["Ca_HoraFin"];
            $horainicial[$i] = $consulta_array["Ca_HoraInicio"];

            $i++;

        }

    }catch (Exception $e){

    }


/*if ($conexión = mysql_connect("localhost:90", "root", "")) {

    // 2) Preparar la orden SQL
    $consulta = "SELECT*FROM carga_academica WHERE carga_academica.Ca_InId=$Instructor";

    // 3) Ejecutar la orden y obtener datos
    //mysql_select_db("dbsofirca");
    //$datos = mysql_query($consulta);
    $res = $mysqli->query($consulta);
    $i = 0;
    // 4) Ir Imprimiendo las filas resultantes
    while ($consulta_array = mysql_fetch_array($datos)) {

        $fechafinal[$i] = $consulta_array["Ca_FechaFin"];
        $semanas_lunes[$i] = $consulta_array["Ca_Lunes"];
        $semanas_martes[$i] = $consulta_array["Ca_Martes"];
        $semanas_miercoles[$i] = $consulta_array["Ca_Miercoles"];
        $semanas_jueves[$i] = $consulta_array["Ca_Jueves"];
        $semanas_viernes[$i] = $consulta_array["Ca_Viernes"];
        $semanas_sabados[$i] = $consulta_array["Ca_Sabado"];
        $semanas_domingos[$i] = $consulta_array["Ca_Domingo"];
        $horafinal[$i] = $consulta_array["Ca_HoraFin"];
        $horainicial[$i] = $consulta_array["Ca_HoraInicio"];

        $i++;

    }
}*/

$cruce = 0;

if (isset($fechafinal) && is_null($fechafinal) == false){
    if ($dias_lunes == 1) {
        for ($i = 0; $i < count($fechafinal); $i++) {
            if ($fechainicio <= $fechafinal[$i]) {
                if ($semanas_lunes[$i] == 1) {
                    if ($horafinal[$i] > $horainicio) {
                        if ($horainicial[$i] < $horafin || $horainicial[$i] < $horainicio) {
                            $cruce++;
                        }
                    }
                }
            }
        }
    }

    if ($dias_martes == 1) {
        for ($i = 0; $i < count($fechafinal); $i++) {
            if ($fechainicio <= $fechafinal[$i]) {
                if ($semanas_martes[$i] == 1) {
                    if ($horafinal[$i] > $horainicio) {
                        if ($horainicial[$i] < $horafin || $horainicial[$i] < $horainicio) {
                            $cruce++;
                        }
                    }
                }
            }
        }
    }

    if ($dias_miercoles == 1) {
        for ($i = 0; $i < count($fechafinal); $i++) {
            if ($fechainicio <= $fechafinal[$i]) {
                if ($semanas_miercoles[$i] == 1) {
                    if ($horafinal[$i] > $horainicio) {
                        if ($horainicial[$i] < $horafin || $horainicial[$i] < $horainicio) {
                            $cruce++;
                        }
                    }
                }
            }
        }
    }

    if ($dias_jueves == 1) {
        for ($i = 0; $i < count($fechafinal); $i++) {
            if ($fechainicio <= $fechafinal[$i]) {
                if ($semanas_jueves[$i] == 1) {
                    if ($horafinal[$i] > $horainicio) {
                        if ($horainicial[$i] < $horafin || $horainicial[$i] < $horainicio) {
                            $cruce++;
                        }
                    }
                }
            }
        }
    }

    if ($dias_viernes == 1) {
        for ($i = 0; $i < count($fechafinal); $i++) {
            if ($fechainicio <= $fechafinal[$i]) {
                if ($semanas_viernes[$i] == 1) {
                    if ($horafinal[$i] > $horainicio) {
                        if ($horainicial[$i] < $horafin || $horainicial[$i] < $horainicio) {
                            $cruce++;
                        }
                    }
                }
            }
        }
    }

    if ($dias_sabados == 1) {
        for ($i = 0; $i < count($fechafinal); $i++) {
            if ($fechainicio <= $fechafinal[$i]) {
                if ($semanas_sabados[$i] == 1) {
                    if ($horafinal[$i] > $horainicio) {
                        if ($horainicial[$i] < $horafin || $horainicial[$i] < $horainicio) {
                            $cruce++;
                        }
                    }
                }
            }
        }
    }


    /*if ($cruce == 0) {

    } else {
        echo("hay cruce");
    }*/
}



echo $cruce;


?>