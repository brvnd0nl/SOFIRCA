

<?php
    session_start();
    include_once('../connection.php');
    $NombreEvento = $_POST['NombreEvento'];
    $database = new Connection();
    $NivelSeguridad = $_SESSION['NivelSeguridad'];

    switch($NombreEvento){
        
        case 'BuscarInstitucion':
            if(isset($_POST['Datos'])){
                $db = $database->open();
                try {
                    $Datos = $_POST['Datos'];
                    $sql = "SELECT Bc_Id, Bc_NombreInstitucion FROM banco_ies WHERE Bc_NombreInstitucion LIKE '%$Datos%' ";
                    echo "<option value=''></option>";
                    foreach ($db->query($sql) as $row) {
                        echo "<option value='". $row['Bc_Id'] . "'>" . utf8_encode($row['Bc_NombreInstitucion']) ."</option>";
                    }
                    
                } catch (PDOException $e) {
                    $_SESSION['message'] = $e->getMessage();
                    //header('location: ../index.php');
                    echo $e->getMessage();
                }
                $database->close();
            }
        break;

        case 'RevisionPeriodo':
            if(isset($_POST['Datos'])){
                $db = $database->open();
                try {
                    $Datos = $_POST['Datos'];
                    $sql = "SELECT * FROM periodoacademico WHERE Pa_Anio LIKE '%$Datos%' ";
                    $tabla = "";
                    foreach ($db->query($sql) as $row) {
                        if ($NivelSeguridad == '1'){
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Pa_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" ><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Pa_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\"><span class=\"icon-bin\"></span></a>';
                        }else{
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Pa_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Pa_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-bin\"></span></a>';
                        }

                        $tabla.='{
                                    "trimestre" : "'.$row['Pa_Nombre'].'",
                                    "fechainicio" : "'.$row['Pa_FechaInicio'].'",
                                    "fechafinal" : "'.$row['Pa_FechaFin'].'",
                                    "anio" : "'.$row['Pa_Anio'].'",
                                    "estado" : "'.$row['Pa_Estado'].'",
                                    "acciones" : "'.$AccionEditar.$AccionEliminar.'"
                                    },';
                    }

                    $tabla = substr($tabla,0,strlen($tabla) - 1);
                    echo '{"data" : ['. $tabla .']}';

                } catch (PDOException $e) {
                    $_SESSION['message'] = $e->getMessage();
                    echo $sql."<br>";
                    die($e->getMessage());
                }
                $database->close();
            }
            break;



        case 'BuscarInstitucionConvenio':
            if(isset($_POST['Datos'])){
                $db = $database->open();
                try {
                    $sql = "SELECT Bc_Id, Bc_NombreInstitucion FROM banco_ies";
                    echo "<option value=''></option>";
                    foreach ($db->query($sql) as $row) {
                        echo "<option value='". $row['Bc_Id'] . "'>" . utf8_encode($row['Bc_NombreInstitucion']) ."</option>";
                    }
                    
                } catch (PDOException $e) {
                    $_SESSION['message'] = $e->getMessage();
                    //header('location: index.php');
                    echo $e->getMessage();
                }
                $database->close();
            }
        break;

        case 'BuscarPrograma':
            if(isset($_POST['Datos'])){
                $db = $database->open();
                try {
                    $Datos = $_POST['Datos'];
                    $sql = "SELECT Pg_Id, Pg_Nombre FROM programas WHERE Pg_Nombre LIKE '%$Datos%' ";
                    echo "<option value=''></option>";
                    foreach ($db->query($sql) as $row) {
                        echo "<option value='". $row['Pg_Id'] . "'>" . utf8_encode($row['Pg_Nombre']) ."</option>";
                    }

                } catch (PDOException $e) {
                    $_SESSION['message'] = $e->getMessage();
                    //header('location: ../index.php');
                    echo $e->getMessage();
                }
                $database->close();
            }
         break;

        case 'BuscarCompetencia':
            if(isset($_POST['Datos'])){
                $db = $database->open();
                try {
                    $Datos = $_POST['Datos'];
                    $sql = "SELECT Cp_Id, Cp_NombreC FROM competencia_programa WHERE 	Cp_NombreC LIKE '%$Datos%' ";
                    echo "<option value=''></option>";
                    foreach ($db->query($sql) as $row) {
                        echo "<option value='". $row['Cp_Id'] . "'>" . utf8_encode($row['Cp_NombreC']) ."</option>";
                    }

                } catch (PDOException $e) {
                    $_SESSION['message'] = $e->getMessage();
                    //header('location: ../index.php');
                    echo $e->getMessage();
                }
                $database->close();
            }
         break;

        case 'ObtenerFechasPeriodo':
            if(isset($_POST['Datos'])){
                $db = $database->open();
                try {
                    $Datos = $_POST['Datos'];
                    $sql = "SELECT Pa_FechaInicio, Pa_FechaFin FROM periodoacademico WHERE Pa_Id LIKE '%$Datos%' ";
                    foreach ($db->query($sql) as $row) {
                        echo "". $row['Pa_FechaInicio'] . "æ" .$row['Pa_FechaFin']."";
                    }

                } catch (PDOException $e) {
                    $_SESSION['message'] = $e->getMessage();
                    //header('location: ../index.php');
                    echo $e->getMessage();
                }
                $database->close();
            }
            break;

        case 'RevisionIES':
            if(isset($_POST['Datos'])){
                $db = $database->open();
                try {
                    $Datos = $_POST['Datos'];
                    $sql = "SELECT * FROM banco_ies WHERE Bc_Id = '$Datos' ";
                    $tabla = "";
                    foreach ($db->query($sql) as $row) {
                        if ($NivelSeguridad == '1'){
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Bc_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" ><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Bc_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\"><span class=\"icon-bin\"></span></a>';
                        }else{
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Bc_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Bc_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-bin\"></span></a>';
                        }

                        $tabla.='{
                                    "direccion" : "'.$row['BC_Direccion'].'",
                                    "nombrecoordinador" : "'.$row['Bc_NombreCoordinador'].'",
                                    "telefono" : "'.$row['Bc_Telefono'].'",
                                    "correoelectronico" : "'.$row['Bc_Correo'].'",
                                    "acciones" : "'.$AccionEditar.$AccionEliminar.'"
                                    },';
                    }

                    $tabla = substr($tabla,0,strlen($tabla) - 1);
                    echo '{"data" : ['. $tabla .']}';

                } catch (PDOException $e) {
                    $_SESSION['message'] = $e->getMessage();
                    echo $sql."<br>";
                    die($e->getMessage());
                }
                $database->close();
            }
            break;

        case 'RevisionConvenio':
            if(isset($_POST['Datos'])){
                $Respuesta = $_POST['Datos'];
                $db = $database->open();
                try{
                    $sql = "SELECT convenios.Cv_Id, banco_ies.Bc_NombreInstitucion, convenios.Cv_ConvenioMarco, convenios.Cv_ConvenioDerivado, convenios.Cv_EstadoConvenio FROM convenios INNER JOIN banco_ies ON convenios.Cv_IdInstitucion = banco_ies.Bc_Id ";
                    $tabla = "";
                    if(($Respuesta['Institucion'] != '') && ($Respuesta['NroConvenioMarco'] == '') && ($Respuesta['NroConvenioDerivado'] == '')){
                        $sql.= " WHERE Cv_IdInstitucion = '".$Respuesta['Institucion']."'";
                    }
                    elseif(( $Respuesta['NroConvenioMarco'] != '') && ($Respuesta['Institucion'] == '') && ($Respuesta['NroConvenioDerivado'] == '' )){
                        $sql.= " WHERE Cv_ConvenioMarco = '".$Respuesta['NroConvenioMarco']."'";
                    }
                    elseif(($Respuesta['NroConvenioMarco'] == '' ) && ($Respuesta['Institucion'] == '') && ($Respuesta['NroConvenioDerivado'] != '' )){
                        $sql.= " WHERE Cv_ConvenioDerivado = '".$Respuesta['NroConvenioDerivado']."'";
                    }
                    elseif(($Respuesta['NroConvenioMarco'] != '') && ($Respuesta['Institucion'] != '' ) && ($Respuesta['NroConvenioDerivado'] == '' )){
                        $sql.= " WHERE Cv_IdInstitucion = '".$Respuesta['Institucion']."' AND Cv_ConvenioMarco = '".$Respuesta['NroConvenioMarco']."'";
                    }
                    elseif(($Respuesta['NroConvenioMarco'] != '') && ($Respuesta['Institucion'] == '') && ($Respuesta['NroConvenioDerivado'] != '' )){
                        $sql.= " WHERE Cv_ConvenioMarco = '".$Respuesta['NroConvenioMarco']."' AND Cv_ConvenioDerivado = '".$Respuesta['NroConvenioDerivado']."'";
                    }
                    elseif(($Respuesta['NroConvenioMarco'] == '' ) && ($Respuesta['Institucion'] != '' ) && ($Respuesta['NroConvenioDerivado'] != '' )){
                        $sql.= " WHERE Cv_IdInstitucion = '".$Respuesta['Institucion']."' AND Cv_ConvenioDerivado = '".$Respuesta['NroConvenioDerivado']."'";
                    }elseif(($Respuesta['NroConvenioMarco'] != '' ) && ($Respuesta['Institucion'] != '' ) && ($Respuesta['NroConvenioDerivado'] != '' )){
                        $sql.= " WHERE Cv_IdInstitucion = '".$Respuesta['Institucion']."' AND Cv_ConvenioMarco = '".$Respuesta['NroConvenioMarco']."' AND Cv_ConvenioDerivado = '".$Respuesta['NroConvenioDerivado']."'";
                    }

                    foreach ($db->query($sql) as $row){
                        if ($NivelSeguridad == '1'){
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Cv_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" ><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Cv_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\"><span class=\"icon-bin\"></span></a>';
                        }else{
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Cv_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Cv_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-bin\"></span></a>';
                        }
                        $NombreEstado = "";
                        if($row['Cv_EstadoConvenio'] == '1'){
                            $NombreEstado = 'ACTIVO';
                        }else{
                            $NombreEstado = "DESACTIVO";
                        }

                        $tabla.='{
                            "institucion" : "'.$row['Bc_NombreInstitucion'].'",
                            "nroconveniomarco" : "'.$row['Cv_ConvenioMarco'].'",
                            "nroconvenioderivado" : "'.$row['Cv_ConvenioDerivado'].'",
                            "estado" : "'.$NombreEstado.'",
                            "acciones" : "'.$AccionEditar.$AccionEliminar.'"
                            },';
                    }

                    $tabla = substr($tabla,0,strlen($tabla) - 1);
                    echo '{"data" : ['. $tabla .']}';

                }catch (Exception $e){
                    $_SESSION['message'] = $e->getMessage();
                    die($e->getMessage());
                }
                $database->close();
            }
            break;
        
        case 'RevisionInforme':
            if(isset($_POST['Datos'])){
                $Respuesta = $_POST['Datos'];
                $db = $database->open();
                try{
                    $sql = "SELECT detalle_informe.Di_Id, banco_ies.Bc_NombreInstitucion, informes.If_Nombre, detalle_informe.Di_Anio, detalle_informe.Di_Mes, archivosadjuntos.Ad_NombreAdjunto, archivosadjuntos.Ad_RutaArchivo ";
                    $sql.= "FROM detalle_informe INNER JOIN ";
                    $sql.= "informes ON detalle_informe.Di_IfId = informes.If_Id INNER JOIN ";
                    $sql.= "banco_ies ON detalle_informe.Di_CvIdInstitucion = banco_ies.Bc_Id INNER JOIN ";
                    $sql.= "archivosadjuntos ON detalle_informe.Di_CodAdjunto = archivosadjuntos.Ad_Id ";
                    $tabla = "";
                    if(($Respuesta['Institucion'] != '') && ($Respuesta['Informe'] == '') && ($Respuesta['Año'] == '') && ($Respuesta['Mes'] == '')){
                        $sql.= " WHERE Di_CvIdInstitucion = '".$Respuesta['Institucion']."'";
                    }
                    elseif(( $Respuesta['Informe'] != '') && ($Respuesta['Institucion'] == '') && ($Respuesta['Año'] == '' ) && ($Respuesta['Mes'] == '')){
                        $sql.= " WHERE Di_IfId = '".$Respuesta['Informe']."'";
                    }
                    elseif(($Respuesta['Informe'] == '' ) && ($Respuesta['Institucion'] == '') && ($Respuesta['Año'] != '' ) && ($Respuesta['Mes'] == '')){
                        $sql.= " WHERE Di_Anio = '".$Respuesta['Año']."'";
                    }
                    elseif (($Respuesta['Informe'] == '' ) && ($Respuesta['Institucion'] == '') && ($Respuesta['Año'] == '' ) && ($Respuesta['Mes'] != '')) {
                        $sql.= " WHERE Di_Mes = '".$Respuesta['Mes']."'";
                    }
                    elseif(($Respuesta['Informe'] != '') && ($Respuesta['Institucion'] != '' ) && ($Respuesta['Año'] == '' ) && ($Respuesta['Mes'] == '')){
                        $sql.= " WHERE Di_CvIdInstitucion = '".$Respuesta['Institucion']."' AND Di_IfId = '".$Respuesta['Informe']."'";
                    }
                    elseif(($Respuesta['Informe'] != '') && ($Respuesta['Institucion'] == '') && ($Respuesta['Año'] != '' ) && ($Respuesta['Mes'] == '')){
                        $sql.= " WHERE Di_IfId = '".$Respuesta['Informe']."' AND Di_Anio = '".$Respuesta['Año']."'";
                    }
                    elseif(($Respuesta['Informe'] != '') && ($Respuesta['Institucion'] == '') && ($Respuesta['Año'] == '' ) && ($Respuesta['Mes'] != '')){
                        $sql.= " WHERE Di_IfId = '".$Respuesta['Informe']."' AND Di_Mes = '".$Respuesta['Mes']."'";
                    }
                    elseif(($Respuesta['Informe'] == '' ) && ($Respuesta['Institucion'] != '' ) && ($Respuesta['Año'] != '' ) && ($Respuesta['Mes'] == '')){
                        $sql.= " WHERE Di_CvIdInstitucion = '".$Respuesta['Institucion']."' AND Di_Anio = '".$Respuesta['Año']."'";
                    }
                    elseif(($Respuesta['Informe'] == '' ) && ($Respuesta['Institucion'] != '' ) && ($Respuesta['Año'] == '' ) && ($Respuesta['Mes'] != '')){
                        $sql.= " WHERE Di_CvIdInstitucion = '".$Respuesta['Institucion']."' AND Di_Mes = '".$Respuesta['Mes']."'";
                    }
                    elseif(($Respuesta['Informe'] == '' ) && ($Respuesta['Institucion'] == '' ) && ($Respuesta['Año'] != '' ) && ($Respuesta['Mes'] != '')){
                        $sql.= " WHERE Di_Anio = '".$Respuesta['Año']."' AND Di_Mes = '".$Respuesta['Mes']."'";
                    }
                    elseif(($Respuesta['Informe'] != '' ) && ($Respuesta['Institucion'] != '' ) && ($Respuesta['Año'] != '' ) && ($Respuesta['Mes'] != '')){
                        $sql.= " WHERE Di_CvIdInstitucion = '".$Respuesta['Institucion']."' AND Di_IfId = '".$Respuesta['Informe']."' AND Di_Anio = '".$Respuesta['Año']."' AND Di_Mes = '".$Respuesta['Mes']."'";
                    }

                    foreach ($db->query($sql) as $row){
                        $AccionDescarga = '<a href=\"'.$row['Ad_RutaArchivo'].'\" class=\"btn btn-light\"  download ><span class=\"icon-download3\"></span></a>';
                        
                        if ($NivelSeguridad == '1'){
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Di_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" ><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Di_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\"><span class=\"icon-bin\"></span></a>';
                        }else{
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Di_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Di_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-bin\"></span></a>';
                        }

                        $tabla.='{
                            "institucion" : "'.$row['Bc_NombreInstitucion'].'",
                            "informe" : "'.$row['If_Nombre'].'",
                            "año" : "'.$row['Di_Anio'].'",
                            "mes" : "'.$row['Di_Mes'].'",
                            "acciones" : "'.$AccionDescarga.$AccionEditar.$AccionEliminar.'"
                            },';
                    }

                    $tabla = substr($tabla,0,strlen($tabla) - 1);
                    echo '{"data" : ['. $tabla .']}';

                }catch (Exception $e){
                    $_SESSION['message'] = $e->getMessage();
                    die($e->getMessage());
                }
                $database->close();
            }
            break;

        case 'RevisionPrograma':
            if(isset($_POST['Datos'])){
                $db = $database->open();
                $Respuesta = $_POST['Datos'];
                try {
                    $Datos = $_POST['Datos'];
                    $sql = "SELECT programas.Pg_Id, programas.Pg_Nombre, centro_formacion.Cf_Nombre, archivosadjuntos.Ad_NombreAdjunto, archivosadjuntos.Ad_RutaArchivo ";
                    $sql.= "FROM programas INNER JOIN centro_formacion ";
                    $sql.= "ON programas.Pg_CfId = centro_formacion.Cf_Id ";
                    $sql.= "INNER JOIN archivosadjuntos ON programas.Pg_CodAdjunto = archivosadjuntos.Ad_Id ";

                    if(($Respuesta['Programa'] != '') && ($Respuesta['CentroFormacion'] == '')){
                        $sql.= " WHERE Pg_Id = '".$Respuesta['Programa']."'";
                    }elseif(($Respuesta['Programa'] == '') && ($Respuesta['CentroFormacion'] != '')){
                        $sql.= " WHERE Cf_Id = '".$Respuesta['CentroFormacion']."'";
                    }elseif(($Respuesta['Programa'] != '') && ($Respuesta['CentroFormacion'] != '')){
                        $sql.= " WHERE Pg_Id = '".$Respuesta['Programa']."' AND Cf_Id = '".$Respuesta['CentroFormacion']."'";
                    }

                    $tabla = "";
                    foreach ($db->query($sql) as $row) {
                        $AccionDescarga = '<a target=\"_blank\" href=\"'.$row['Ad_RutaArchivo'].'\" class=\"btn btn-light\" download ><span class=\"icon-download3\"></span></a>';
                        if ($NivelSeguridad == '1'){
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Pg_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" ><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Pg_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\"><span class=\"icon-bin\"></span></a>';
                        }else{
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Pg_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Pg_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-bin\"></span></a>';
                        }

                        $tabla.='{
                                    "programa" : "'.$row['Pg_Nombre'].'",
                                    "centroformacion" : "'.$row['Cf_Nombre'].'",
                                    "acciones" : "'.$AccionDescarga.$AccionEditar.$AccionEliminar.'"
                                    },';
                    }

                    $tabla = substr($tabla,0,strlen($tabla) - 1);
                    echo '{"data" : ['. $tabla .']}';

                } catch (PDOException $e) {
                    $_SESSION['message'] = $e->getMessage();
                    echo $sql."<br>";
                    die($e->getMessage());
                }
                $database->close();
            }
            break;

        case 'RevisionCompetencia':
            if(isset($_POST['Datos'])){
                $db = $database->open();
                $Respuesta = $_POST['Datos'];
                try {
                    $Datos = $_POST['Datos'];
                    $sql = "SELECT competencia_programa.Cp_Id, competencia_programa.Cp_NombreC,programas.Pg_Nombre, competencia_programa.Cp_IntensidadH ";
                    $sql.= "FROM competencia_programa INNER JOIN programas ";
                    $sql.= "ON competencia_programa.Cp_PgId = programas.Pg_Id ";

                    if(($Respuesta['Programa'] != '') && ($Respuesta['Competencia'] == '')){
                        $sql.= " WHERE Pg_Id = '".$Respuesta['Programa']."'";
                    }elseif(($Respuesta['Programa'] == '') && ($Respuesta['Competencia'] != '')){
                        $sql.= " WHERE Cp_Id = '".$Respuesta['Competencia']."'";
                    }elseif(($Respuesta['Programa'] != '') && ($Respuesta['Competencia'] != '')){
                        $sql.= " WHERE Pg_Id = '".$Respuesta['Programa']."' AND Cp_Id = '".$Respuesta['Competencia']."'";
                    }

                    $tabla = "";
                    foreach ($db->query($sql) as $row) {
                        if ($NivelSeguridad == '1'){
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Cp_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" ><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Cp_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\"><span class=\"icon-bin\"></span></a>';
                        }else{
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Cp_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Cp_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-bin\"></span></a>';
                        }

                        $tabla.='{
                                    "nombrecompetencia" : "'.$row['Cp_NombreC'].'",
                                    "programa" : "'.$row['Pg_Nombre'].'",
                                    "intensidad" : "'.$row['Cp_IntensidadH'].'",
                                    "acciones" : "'.$AccionEditar.$AccionEliminar.'"
                                    },';
                    }

                    $tabla = substr($tabla,0,strlen($tabla) - 1);
                    echo '{"data" : ['. $tabla .']}';

                } catch (PDOException $e) {
                    $_SESSION['message'] = $e->getMessage();
                    echo $sql."<br>";
                    die($e->getMessage());
                }
                $database->close();
            }
            break;

        case 'RevisionAmbiente':
            if(isset($_POST['Datos']) && isset($_SESSION['CodigoInstitucion'])){
                $db = $database->open();
                $Respuesta = $_POST['Datos'];
                $Institucion = $_SESSION['CodigoInstitucion'];
                try {
                    $Datos = $_POST['Datos'];
                    $sql = "SELECT ambientes.Ab_Id, ambientes.Ab_Nombre, ambientes.Ab_Ubicacion,convenios.Cv_IdInstitucion, banco_ies.Bc_NombreInstitucion ";
                    $sql.= "FROM ambientes INNER JOIN convenios  ";
                    $sql.= "ON ambientes.Ab_SsCodConvenio = convenios.Cv_Id ";
                    $sql.= "INNER JOIN banco_ies ";
                    $sql.= "ON convenios.Cv_IdInstitucion = banco_ies.Bc_Id ";

                    if(($Respuesta['Ambiente'] != '') && ($Respuesta['UbicaAmbiente'] == '')){
                        $sql.= " WHERE Ab_Nombre LIKE '%".$Respuesta['Ambiente']."%' AND Cv_IdInstitucion = '".$Institucion."'";
                    }
                    elseif(( $Respuesta['UbicaAmbiente'] != '') && ($Respuesta['Ambiente'] == '') && ($Respuesta['Institucion'] == '' )){
                        $sql.= " WHERE Ab_Ubicacion LIKE '%".$Respuesta['UbicaAmbiente']."%' AND Cv_IdInstitucion = '".$Institucion."'";
                    }
                    elseif(($Respuesta['UbicaAmbiente'] != '') && ($Respuesta['Ambiente'] != '' ) && ($Respuesta['Institucion'] == '' )){
                        $sql.= " WHERE Ab_Nombre LIKE '%".$Respuesta['Ambiente']."%' AND Ab_Ubicacion LIKE '%".$Respuesta['UbicaAmbiente']."%' AND Cv_IdInstitucion = '".$Institucion."'";
                    }
                    elseif(($Respuesta['UbicaAmbiente'] != '' ) && ($Respuesta['Ambiente'] != '' )){
                        $sql.= " WHERE Ab_Nombre LIKE '%".$Respuesta['Ambiente']."%' AND Ab_Ubicacion LIKE '%".$Respuesta['UbicaAmbiente']."%' AND Cv_IdInstitucion = '".$Institucion."'";
                    }else{
                        $sql.= " WHERE Cv_IdInstitucion = '".$Institucion."'";
                    }


                    $tabla = "";
                    foreach ($db->query($sql) as $row) {
                        if ($NivelSeguridad == '1'){
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Ab_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" ><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Ab_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\"><span class=\"icon-bin\"></span></a>';
                        }else{
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Ab_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Ab_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-bin\"></span></a>';
                        }

                        $tabla.='{
                                    "nombreambiente" : "'.$row['Ab_Nombre'].'",
                                    "ubicacionambiente" : "'.$row['Ab_Ubicacion'].'",
                                    "acciones" : "'.$AccionEditar.$AccionEliminar.'"
                                    },';
                    }

                    $tabla = substr($tabla,0,strlen($tabla) - 1);
                    echo '{"data" : ['. $tabla .']}';

                } catch (PDOException $e) {
                    $_SESSION['message'] = $e->getMessage();
                    echo $sql."<br>";
                    die($e->getMessage());
                }
                $database->close();
            }
            break;

        case 'RevisionInstructor':
            if(isset($_POST['Datos'])){
                $Respuesta = $_POST['Datos'];
                $Institucion = $_SESSION['CodigoInstitucion'];
                $db = $database->open();
                try{
                    $sql = "SELECT instructor.In_Id, CONCAT(instructor.In_TipoDocumento,' ',instructor.In_NumeroDocumento) AS 'In_NumeroDocumento', instructor.In_Nombres, instructor.In_Apellidos, instructor.In_Telefono, ";
                    $sql.= "instructor.In_EstudiosPregrado, instructor.In_NombreUniverdidad, DATE_FORMAT(instructor.In_FechaGrado,'%d/%m/%Y') AS 'In_FechaGrado' ";
                    $sql.= "FROM instructor INNER JOIN ";
                    $sql.= "contrato_instructor ON contrato_instructor.Cn_CodInstructor = instructor.In_Id ";

                    $tabla = "";

                    if(($Respuesta['NroIdentificacion'] != '') && ($Respuesta['Nombre'] == '') && ($Respuesta['Estudios'] == '') && ($Respuesta['Universidad'] == '')){
                        $sql.= " WHERE In_NumeroDocumento = '".$Respuesta['NroIdentificacion']."' AND In_SsCodConvenio = '".$Institucion."'";
                    }
                    elseif(( $Respuesta['Nombre'] != '') && ($Respuesta['NroIdentificacion'] == '') && ($Respuesta['Estudios'] == '' ) && ($Respuesta['Universidad'] == '')){
                        $sql.= " WHERE (In_Nombres LIKE '%".$Respuesta['Nombre']."%' OR In_Apellidos LIKE '%".$Respuesta['Nombre']."%') AND In_SsCodConvenio = '".$Institucion."'";
                    }
                    elseif(($Respuesta['Nombre'] == '' ) && ($Respuesta['NroIdentificacion'] == '') && ($Respuesta['Estudios'] != '' ) && ($Respuesta['Universidad'] == '')){
                        $sql.= " WHERE In_EstudiosPregrado LIKE '%".$Respuesta['Estudios']."%' AND In_SsCodConvenio = '".$Institucion."'";
                    }
                    elseif (($Respuesta['Nombre'] == '' ) && ($Respuesta['NroIdentificacion'] == '') && ($Respuesta['Estudios'] == '' ) && ($Respuesta['Universidad'] != '')) {
                        $sql.= " WHERE In_NombreUniverdidad LIKE '%".$Respuesta['Universidad']."%' AND In_SsCodConvenio = '".$Institucion."'";
                    }
                    elseif(($Respuesta['Nombre'] != '') && ($Respuesta['NroIdentificacion'] != '' ) && ($Respuesta['Estudios'] == '' ) && ($Respuesta['Universidad'] == '')){
                        $sql.= " WHERE In_NumeroDocumento = '".$Respuesta['NroIdentificacion']."' AND Di_IfId = '".$Respuesta['Nombre']."' AND In_SsCodConvenio = '".$Institucion."'";
                    }
                    elseif(($Respuesta['Nombre'] != '') && ($Respuesta['NroIdentificacion'] == '') && ($Respuesta['Estudios'] != '' ) && ($Respuesta['Universidad'] == '')){
                        $sql.= " WHERE (In_Nombres LIKE '%".$Respuesta['Nombre']."%' OR In_Apellidos LIKE '%".$Respuesta['Nombre']."%') AND Di_Anio = '".$Respuesta['Estudios']."' AND In_SsCodConvenio = '".$Institucion."'";
                    }
                    elseif(($Respuesta['Nombre'] != '') && ($Respuesta['NroIdentificacion'] == '') && ($Respuesta['Estudios'] == '' ) && ($Respuesta['Universidad'] != '')){
                        $sql.= " WHERE (In_Nombres LIKE '%".$Respuesta['Nombre']."%' OR In_Apellidos LIKE '%".$Respuesta['Nombre']."%') AND Di_Mes = '".$Respuesta['Universidad']."' AND In_SsCodConvenio = '".$Institucion."'";
                    }
                    elseif(($Respuesta['Nombre'] == '' ) && ($Respuesta['NroIdentificacion'] != '' ) && ($Respuesta['Estudios'] != '' ) && ($Respuesta['Universidad'] == '')){
                        $sql.= " WHERE In_NumeroDocumento = '".$Respuesta['NroIdentificacion']."' AND In_EstudiosPregrado LIKE '%".$Respuesta['Estudios']."%' AND In_SsCodConvenio = '".$Institucion."'";
                    }
                    elseif(($Respuesta['Nombre'] == '' ) && ($Respuesta['NroIdentificacion'] != '' ) && ($Respuesta['Estudios'] == '' ) && ($Respuesta['Universidad'] != '')){
                        $sql.= " WHERE In_NumeroDocumento = '".$Respuesta['NroIdentificacion']."' AND In_NombreUniverdidad LIKE '%".$Respuesta['Universidad']."%' AND In_SsCodConvenio = '".$Institucion."'";
                    }
                    elseif(($Respuesta['Nombre'] == '' ) && ($Respuesta['NroIdentificacion'] == '' ) && ($Respuesta['Estudios'] != '' ) && ($Respuesta['Universidad'] != '')){
                        $sql.= " WHERE In_EstudiosPregrado LIKE '%".$Respuesta['Estudios']."%' AND In_NombreUniverdidad LIKE '%".$Respuesta['Universidad']."%' AND In_SsCodConvenio = '".$Institucion."'";
                    }
                    elseif(($Respuesta['Nombre'] != '' ) && ($Respuesta['NroIdentificacion'] != '' ) && ($Respuesta['Estudios'] != '' ) && ($Respuesta['Universidad'] != '')){
                        $sql.= " WHERE In_NumeroDocumento = '".$Respuesta['NroIdentificacion']."' AND (In_Nombres LIKE '%".$Respuesta['Nombre']."%' OR In_Apellidos LIKE '%".$Respuesta['Nombre']."%') AND In_EstudiosPregrado LIKE '%".$Respuesta['Estudios']."%' AND In_NombreUniverdidad LIKE '%".$Respuesta['Universidad']."%' AND In_SsCodConvenio = '".$Institucion."'";
                    }else{
                        $sql.= " WHERE In_SsCodConvenio = '".$Institucion."'";
                    }

                    foreach ($db->query($sql) as $row){

                        if ($NivelSeguridad == '1'){
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['In_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" ><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['In_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\"><span class=\"icon-bin\"></span></a>';
                        }else{
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['In_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['In_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-bin\"></span></a>';
                        }

                        $tabla.='{
                            "nrodocumento" : "'.$row['In_NumeroDocumento'].'",
                            "nombre" : "'.$row['In_Nombres'].'",
                            "apellido" : "'.$row['In_Apellidos'].'",
                            "telefono" : "'.$row['In_Telefono'].'",
                            "estudios" : "'.$row['In_EstudiosPregrado'].'",
                            "universidad" : "'.$row['In_NombreUniverdidad'].'",
                            "fechagrado" : "'.$row['In_FechaGrado'].'",
                            "acciones" : "'.$AccionEditar.$AccionEliminar.'"
                            },';
                    }

                    $tabla = substr($tabla,0,strlen($tabla) - 1);
                    echo '{"data" : ['. $tabla .']}';

                }catch (Exception $e){
                    $_SESSION['message'] = $e->getMessage();
                    die($e->getMessage());
                }
                $database->close();
            }
            break;

        case 'RevisionFicha':
        if(isset($_POST['Datos'])){
            $Respuesta = $_POST['Datos'];
            $db = $database->open();
            try{
                $sql = "SELECT fichas.F_Id, banco_ies.Bc_NombreInstitucion, banco_ies.Bc_Id, programas.Pg_Nombre, programas.Pg_Id, ";
                $sql.= "DATE_FORMAT(fichas.F_FechaInicio,'%d/%m/%Y') AS 'F_FechaInicio', DATE_FORMAT(fichas.F_FechaFin,'%d/%m/%Y') AS 'F_FechaFin' ";
                $sql.= "FROM fichas INNER JOIN ";
                $sql.= "programas ON fichas.F_PgId = programas.Pg_Id ";
                $sql.= "INNER JOIN convenios ";
                $sql.= "ON fichas.F_CvId = convenios.Cv_Id ";
                $sql.= "INNER JOIN banco_ies ";
                $sql.= "ON convenios.Cv_IdInstitucion = banco_ies.Bc_Id ";

                $tabla = "";

                if(($Respuesta['NroFicha'] != '') && ($Respuesta['Convenio'] == '') && ($Respuesta['Programa'] == '') && ($Respuesta['FInicio'] == '') && ($Respuesta['FFin'] == '')){
                    $sql.= " WHERE F_Id = '".$Respuesta['NroFicha']."'";
                }
                elseif(( $Respuesta['Convenio'] != '') && ($Respuesta['NroFicha'] == '') && ($Respuesta['Programa'] == '' ) && ($Respuesta['FInicio'] == '') && ($Respuesta['FFin'] == '')){
                    $sql.= " WHERE Bc_Id = '".$Respuesta['Convenio']."'";
                }
                elseif(($Respuesta['Convenio'] == '' ) && ($Respuesta['NroFicha'] == '') && ($Respuesta['Programa'] != '' ) && ($Respuesta['FInicio'] == '') && ($Respuesta['FFin'] == '')){
                    $sql.= " WHERE Pg_Id = '".$Respuesta['Programa']."'";
                }
                elseif (($Respuesta['Convenio'] == '' ) && ($Respuesta['NroFicha'] == '') && ($Respuesta['Programa'] == '' ) && ($Respuesta['FInicio'] != '') && ($Respuesta['FFin'] == '')) {
                    $sql.= " WHERE F_FechaInicio = STR_TO_DATE('".$Respuesta['FInicio']."', '%d/%c/%Y')";
                }
                elseif (($Respuesta['Convenio'] == '' ) && ($Respuesta['NroFicha'] == '') && ($Respuesta['Programa'] == '' ) && ($Respuesta['FInicio'] == '') && ($Respuesta['FFin'] != '')) {
                    $sql.= " WHERE F_FechaFin = STR_TO_DATE('".$Respuesta['FFin']."', '%d/%c/%Y')";
                }
                elseif(($Respuesta['Convenio'] != '') && ($Respuesta['NroFicha'] != '' ) && ($Respuesta['Programa'] == '' ) && ($Respuesta['FInicio'] == '') && ($Respuesta['FFin'] == '')){
                    $sql.= " WHERE F_Id = '".$Respuesta['NroFicha']."' AND Bc_Id = '".$Respuesta['Convenio']."'";
                }
                elseif(($Respuesta['Convenio'] != '') && ($Respuesta['NroFicha'] == '') && ($Respuesta['Programa'] != '' ) && ($Respuesta['FInicio'] == '') && ($Respuesta['FFin'] == '')){
                    $sql.= " WHERE Bc_Id = '".$Respuesta['Convenio']."' AND Pg_Id = '".$Respuesta['Programa']."'";
                }
                elseif(($Respuesta['Convenio'] != '') && ($Respuesta['NroFicha'] == '') && ($Respuesta['Programa'] == '' ) && ($Respuesta['FInicio'] != '') && ($Respuesta['FFin'] == '')){
                    $sql.= " WHERE Bc_Id = '".$Respuesta['Convenio']."' AND F_FechaInicio = STR_TO_DATE('".$Respuesta['FInicio']."', '%d/%c/%Y')";
                }
                elseif (($Respuesta['Convenio'] != '' ) && ($Respuesta['NroFicha'] == '') && ($Respuesta['Programa'] == '' ) && ($Respuesta['FInicio'] == '') && ($Respuesta['FFin'] != '')) {
                    $sql.= " WHERE Bc_Id = '".$Respuesta['Convenio']."' AND F_FechaFin = STR_TO_DATE('".$Respuesta['FFin']."', '%d/%c/%Y')";
                }
                elseif(($Respuesta['Convenio'] == '' ) && ($Respuesta['NroFicha'] != '' ) && ($Respuesta['Programa'] != '' ) && ($Respuesta['FInicio'] == '') && ($Respuesta['FFin'] == '')){
                    $sql.= " WHERE F_Id = '".$Respuesta['NroFicha']."' AND Pg_Id = '".$Respuesta['Programa']."'";
                }
                elseif(($Respuesta['Convenio'] == '' ) && ($Respuesta['NroFicha'] != '' ) && ($Respuesta['Programa'] == '' ) && ($Respuesta['FInicio'] != '') && ($Respuesta['FFin'] == '')){
                    $sql.= " WHERE F_Id = '".$Respuesta['NroFicha']."' AND In_NombreUniverdidad = STR_TO_DATE('".$Respuesta['FInicio']."', '%d/%c/%Y')";
                }
                elseif(($Respuesta['Convenio'] == '' ) && ($Respuesta['NroFicha'] == '' ) && ($Respuesta['Programa'] != '' ) && ($Respuesta['FInicio'] != '') && ($Respuesta['FFin'] == '')){
                    $sql.= " WHERE Pg_Id = '".$Respuesta['Programa']."' AND F_FechaInicio = STR_TO_DATE('".$Respuesta['FInicio']."', '%d/%c/%Y')";
                }
                elseif(($Respuesta['Convenio'] == '' ) && ($Respuesta['NroFicha'] == '' ) && ($Respuesta['Programa'] != '' ) && ($Respuesta['FInicio'] == '') && ($Respuesta['FFin'] != '')){
                    $sql.= " WHERE Pg_Id = '".$Respuesta['Programa']."' AND F_FechaFin = STR_TO_DATE('".$Respuesta['FFin']."', '%d/%c/%Y')";
                }
                elseif (($Respuesta['Convenio'] == '' ) && ($Respuesta['NroFicha'] == '') && ($Respuesta['Programa'] == '' ) && ($Respuesta['FInicio'] != '') && ($Respuesta['FFin'] != '')) {
                    $sql.= " WHERE F_FechaInicio = STR_TO_DATE('".$Respuesta['FInicio']."', '%d/%c/%Y') AND F_FechaFin = STR_TO_DATE('".$Respuesta['FFin']."', '%d/%c/%Y')";
                }
                elseif(($Respuesta['Convenio'] != '' ) && ($Respuesta['NroFicha'] != '' ) && ($Respuesta['Programa'] != '' ) && ($Respuesta['FInicio'] != '') && ($Respuesta['FFin'] != '')){
                    $sql.= " WHERE F_Id = '".$Respuesta['NroFicha']."' AND Bc_Id = '".$Respuesta['Convenio']."' AND Pg_Id = '".$Respuesta['Programa']."' AND F_FechaInicio = STR_TO_DATE('".$Respuesta['FInicio']."', '%d/%c/%Y') AND F_FechaFin = STR_TO_DATE('".$Respuesta['FFin']."', '%d/%c/%Y')";
                }

                foreach ($db->query($sql) as $row){

                    if ($NivelSeguridad == '1'){
                        $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['F_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" ><span class=\"icon-search\"></span></a>';
                        $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['F_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\"><span class=\"icon-bin\"></span></a>';
                    }else{
                        $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['F_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-search\"></span></a>';
                        $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['F_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-bin\"></span></a>';
                    }

                    $tabla.='{
                            "numeroficha" : "'.$row['F_Id'].'",
                            "convenio" : "'.$row['Bc_NombreInstitucion'].'",
                            "programa" : "'.$row['Pg_Nombre'].'",
                            "fechainicio" : "'.$row['F_FechaInicio'].'",
                            "fechafin" : "'.$row['F_FechaFin'].'",
                            "acciones" : "'.$AccionEditar.$AccionEliminar.'"
                            },';
                }

                $tabla = substr($tabla,0,strlen($tabla) - 1);
                echo '{"data" : ['. $tabla .']}';

            }catch (Exception $e){
                $_SESSION['message'] = $e->getMessage();
                die($e->getMessage());
            }
            $database->close();
        }
        break;

        case 'RevisionAprendiz':
            if(isset($_POST['Datos'])){
                $Respuesta = $_POST['Datos'];
                $db = $database->open();
                try{
                    $sql = "SELECT aprendices.Ap_Id, fichas.F_Id, CONCAT(fichas.F_Id,' ',programas.Pg_Nombre) AS 'NombrePrograma', ";
                    $sql.= "aprendices.Ap_NumeroDocumento, CONCAT(aprendices.Ap_Apellidos,' ',aprendices.Ap_Nombres) AS 'Nombre', ";
                    $sql.= "aprendices.Ap_Telefono, aprendices.Ap_Correo ";
                    $sql.= "FROM aprendices INNER JOIN ";
                    $sql.= "fichas ON aprendices.Ap_FId = fichas.F_Id ";
                    $sql.= "INNER JOIN programas ";
                    $sql.= "ON fichas.F_PgId = programas.Pg_Id ";

                    $tabla = "";

                    if(($Respuesta['Ficha'] != '') && ($Respuesta['NroIdentificacion'] == '') && ($Respuesta['Nombre'] == '') && ($Respuesta['Telefono'] == '') && ($Respuesta['Email'] == '')){
                        $sql.= " WHERE F_Id = '".$Respuesta['Ficha']."'";
                    }
                    elseif(( $Respuesta['NroIdentificacion'] != '') && ($Respuesta['Ficha'] == '') && ($Respuesta['Nombre'] == '' ) && ($Respuesta['Telefono'] == '') && ($Respuesta['Email'] == '')){
                        $sql.= " WHERE Ap_NumeroDocumento = '".$Respuesta['NroIdentificacion']."'";
                    }
                    elseif(($Respuesta['NroIdentificacion'] == '' ) && ($Respuesta['Ficha'] == '') && ($Respuesta['Nombre'] != '' ) && ($Respuesta['Telefono'] == '') && ($Respuesta['Email'] == '')){
                        $sql.= " WHERE (Ap_Nombres LIKE '%".$Respuesta['Nombre']."%' OR Ap_Apellidos LIKE '%".$Respuesta['Nombre']."%')";
                    }
                    elseif (($Respuesta['NroIdentificacion'] == '' ) && ($Respuesta['Ficha'] == '') && ($Respuesta['Nombre'] == '' ) && ($Respuesta['Telefono'] != '') && ($Respuesta['Email'] == '')) {
                        $sql.= " WHERE Ap_Telefono = '".$Respuesta['Telefono']."'";
                    }
                    elseif (($Respuesta['NroIdentificacion'] == '' ) && ($Respuesta['Ficha'] == '') && ($Respuesta['Nombre'] == '' ) && ($Respuesta['Telefono'] == '') && ($Respuesta['Email'] != '')) {
                        $sql.= " WHERE Ap_Correo = '".$Respuesta['Email']."'";
                    }
                    elseif(($Respuesta['NroIdentificacion'] != '') && ($Respuesta['Ficha'] != '' ) && ($Respuesta['Nombre'] == '' ) && ($Respuesta['Telefono'] == '') && ($Respuesta['Email'] == '')){
                        $sql.= " WHERE F_Id = '".$Respuesta['Ficha']."' AND Ap_NumeroDocumento = '".$Respuesta['NroIdentificacion']."'";
                    }
                    elseif(($Respuesta['NroIdentificacion'] != '') && ($Respuesta['Ficha'] == '') && ($Respuesta['Nombre'] != '' ) && ($Respuesta['Telefono'] == '') && ($Respuesta['Email'] == '')){
                        $sql.= " WHERE Ap_NumeroDocumento = '".$Respuesta['NroIdentificacion']."' AND (Ap_Nombres LIKE '%".$Respuesta['Nombre']."%' OR Ap_Apellidos LIKE '%".$Respuesta['Nombre']."%')";
                    }
                    elseif(($Respuesta['NroIdentificacion'] != '') && ($Respuesta['Ficha'] == '') && ($Respuesta['Nombre'] == '' ) && ($Respuesta['Telefono'] != '') && ($Respuesta['Email'] == '')){
                        $sql.= " WHERE Ap_NumeroDocumento = '".$Respuesta['NroIdentificacion']."' AND Ap_Telefono = '".$Respuesta['Telefono']."'";
                    }
                    elseif (($Respuesta['NroIdentificacion'] != '' ) && ($Respuesta['Ficha'] == '') && ($Respuesta['Nombre'] == '' ) && ($Respuesta['Telefono'] == '') && ($Respuesta['Email'] != '')) {
                        $sql.= " WHERE Ap_NumeroDocumento = '".$Respuesta['NroIdentificacion']."' AND Ap_Correo = '".$Respuesta['Email']."'";
                    }
                    elseif(($Respuesta['NroIdentificacion'] == '' ) && ($Respuesta['Ficha'] != '' ) && ($Respuesta['Nombre'] != '' ) && ($Respuesta['Telefono'] == '') && ($Respuesta['Email'] == '')){
                        $sql.= " WHERE F_Id = '".$Respuesta['Ficha']."' AND (Ap_Nombres LIKE '%".$Respuesta['Nombre']."%' OR Ap_Apellidos LIKE '%".$Respuesta['Nombre']."%')";
                    }
                    elseif(($Respuesta['NroIdentificacion'] == '' ) && ($Respuesta['Ficha'] != '' ) && ($Respuesta['Nombre'] == '' ) && ($Respuesta['Telefono'] != '') && ($Respuesta['Email'] == '')){
                        $sql.= " WHERE F_Id = '".$Respuesta['Ficha']."' AND Ap_Telefono = '".$Respuesta['Telefono']."'";
                    }
                    elseif(($Respuesta['NroIdentificacion'] == '' ) && ($Respuesta['Ficha'] == '' ) && ($Respuesta['Nombre'] != '' ) && ($Respuesta['Telefono'] != '') && ($Respuesta['Email'] == '')){
                        $sql.= " WHERE (Ap_Nombres LIKE '%".$Respuesta['Nombre']."%' OR Ap_Apellidos LIKE '%".$Respuesta['Nombre']."%') AND Ap_Telefono = '".$Respuesta['Telefono']."'";
                    }
                    elseif(($Respuesta['NroIdentificacion'] == '' ) && ($Respuesta['Ficha'] == '' ) && ($Respuesta['Nombre'] != '' ) && ($Respuesta['Telefono'] == '') && ($Respuesta['Email'] != '')){
                        $sql.= " WHERE (Ap_Nombres LIKE '%".$Respuesta['Nombre']."%' OR Ap_Apellidos LIKE '%".$Respuesta['Nombre']."%') AND Ap_Correo = '".$Respuesta['Email']."'";
                    }
                    elseif (($Respuesta['NroIdentificacion'] == '' ) && ($Respuesta['Ficha'] == '') && ($Respuesta['Nombre'] == '' ) && ($Respuesta['Telefono'] != '') && ($Respuesta['Email'] != '')) {
                        $sql.= " WHERE Ap_Telefono = '".$Respuesta['Telefono']."' AND Ap_Correo = '".$Respuesta['Email']."'";
                    }
                    elseif(($Respuesta['NroIdentificacion'] != '' ) && ($Respuesta['Ficha'] != '' ) && ($Respuesta['Nombre'] != '' ) && ($Respuesta['Telefono'] != '') && ($Respuesta['Email'] != '')){
                        $sql.= " WHERE F_Id = '".$Respuesta['Ficha']."' AND Ap_NumeroDocumento = '".$Respuesta['NroIdentificacion']."' AND (Ap_Nombres LIKE '%".$Respuesta['Nombre']."%' OR Ap_Apellidos LIKE '%".$Respuesta['Nombre']."%') AND Ap_Telefono = '".$Respuesta['Telefono']."' AND Ap_Correo = '".$Respuesta['Email']."'";
                    }

                    foreach ($db->query($sql) as $row){

                        if ($NivelSeguridad == '1'){
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Ap_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" ><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Ap_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\"><span class=\"icon-bin\"></span></a>';
                        }else{
                            $AccionEditar = '<a href=\"#editar\" data-id=\"'.$row['Ap_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-search\"></span></a>';
                            $AccionEliminar = '<a href=\"#eliminar\" data-id=\"'.$row['Ap_Id'].'\" data-toggle=\"modal\" class=\"btn btn-light\" disabled><span class=\"icon-bin\"></span></a>';
                        }

                        $tabla.='{
                            "numeroficha" : "'.$row['F_Id'].'",
                            "identificacion" : "'.$row['Ap_NumeroDocumento'].'",
                            "nombreaprendiz" : "'.$row['Nombre'].'",
                            "telefono" : "'.$row['Ap_Telefono'].'",
                            "correo" : "'.$row['Ap_Correo'].'",
                            "acciones" : "'.$AccionEditar.$AccionEliminar.'"
                            },';
                    }

                    $tabla = substr($tabla,0,strlen($tabla) - 1);
                    echo '{"data" : ['. $tabla .']}';

                }catch (Exception $e){
                    $_SESSION['message'] = $e->getMessage();
                    die($e->getMessage());
                }
                $database->close();
            }
            break;

    }


?>