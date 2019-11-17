<!--    En este archivo se guardaran todos los eventos de Modificar de los Modales,
        se usará un Switch para Identificar la ventana donde se está modificando -->
<!--    En este PHP se reciben solo dos variables:
        * (id) es el identificador del registro que se desea modificar
        * (Modal) es la variable con la que se identificara la ventana que está realizando el cambio.-->

<?php
session_start();
include_once('../connection.php');
$id = $_GET['id'];
$Modal = $_GET['Modal'];
$database = new Connection();
$NivelSeguridad = $_SESSION['NivelSeguridad'];

switch ($Modal){
    case 'ModalIES' :
    if(isset($id) && is_null($id) == false && $id != ""){
        $NombreInstitucion = $_POST["NombreInstitucion"];
        $Direccion = $_POST["Direccion"];
        $NombreCoordinador = $_POST["NombreCoordinador"];
        $Telefono = $_POST["Telefono"];
        $CorreoElectronico = $_POST["Email"];
        $db = $database->open();
        try{
            /*$sql = "SELECT * FROM archivosadjuntos WHERE Ad_NombreAdjunto = '$NombreArchivo' AND Ad_RutaArchivo = '$Ubicacion' ";
            foreach ($db->query($sql) as $row){
                $ArchivoPDF = $row["Ad_Id"];
            }*/

            $stmt =$db->prepare ("SELECT * FROM banco_ies
                                                WHERE Bc_Id = ':id'
                                                  AND Bc_NombreInstitucion = ':NombreInst' 
                                                  AND Bc_Correo = ':Correo'
                                                  AND BC_Direccion = ':Direccion'
                                                  AND Bc_Telefono = ':Telefono'
                                                  AND Bc_NombreCoordinador = ':NombreCoordinador'");

            if ( $stmt->execute(array(  ':id' => $id ,':NombreInst' => $NombreInstitucion,
                ':Direccion' => $Direccion ,':NombreCoordinador' => $NombreCoordinador,
                ':Telefono' => $Telefono ,':Correo' => $CorreoElectronico)) && $stmt->rowCount() > 0 ){
                $_SESSION['message'] = "El registro tiene los datos ya asignados";
            }else{
                $sql = "UPDATE banco_ies
                            SET     Bc_NombreCoordinador = '".$NombreCoordinador."',
                                    Bc_Correo = '".$CorreoElectronico."',
                                    BC_Direccion = '".$Direccion."',
                                    Bc_Telefono = '".$Telefono."',
                                    Bc_NombreInstitucion = '".$NombreInstitucion."'
                            WHERE Bc_Id = '".$id."'";

                $Respuesta = ( $db->exec($sql) ) ? '1' : '0';

                if ( $Respuesta == "0") {
                    $_SESSION['message'] = "Error Modificando Registro";
                }else{
                    $_SESSION['message'] = 'Registro Modificado correctamente';
                }
            }
        }
        catch (PDOException $e){
            $_SESSION['message'] = $e->getMessage();
            $Respuesta == "0";
        }
        $database->close();
        header('location: ../Consulta/ConsultaIES.php');
    }
    break;

    case 'ModalConvenio' :
        if(isset($id) && is_null($id) == false && $id != ""){
            $Institucion = $_POST["Institucion"];
            $NroConvenioMarco = $_POST["NumeroConvenioMarco"];
            $NroConvenioDerivado = $_POST["NumeroConvenioDerivado"];
            $EstadoConvenio = $_POST["EstadoConvenio"];
            $db = $database->open();
            try{
                /*$sql = "SELECT * FROM archivosadjuntos WHERE Ad_NombreAdjunto = '$NombreArchivo' AND Ad_RutaArchivo = '$Ubicacion' ";
                foreach ($db->query($sql) as $row){
                    $ArchivoPDF = $row["Ad_Id"];
                }*/

                $stmt =$db->prepare ("SELECT * FROM convenios
                                                WHERE Cv_Id = ':id'
                                                  AND Cv_IdInstitucion = ':Institucion' 
                                                  AND Cv_EstadoConvenio = ':Estado'
                                                  AND Cv_ConvenioDerivado = ':NroCDeriv'
                                                  AND Cv_ConvenioMarco = ':NroCMarco'");

                if ( $stmt->execute(array(  ':id' => $id ,':Institucion' => $Institucion,
                    ':Estado' => $EstadoConvenio ,':NroCDeriv' => $NroConvenioDerivado,
                    ':NroCMarco' => $NroConvenioMarco)) && $stmt->rowCount() > 0 ){
                    $_SESSION['message'] = "El registro tiene los datos ya asignados";
                }else{
                    $sql = "UPDATE convenios
                            SET     Cv_ConvenioMarco = '".$NroConvenioMarco."',
                                    Cv_ConvenioDerivado = '".$NroConvenioDerivado."',
                                    Cv_EstadoConvenio = '".$EstadoConvenio."',
                                    Cv_IdInstitucion = '".$Institucion."'
                            WHERE Cv_Id = '".$id."'";

                    $Respuesta = ( $db->exec($sql) ) ? '1' : '0';

                    if ( $Respuesta == "0") {
                        $_SESSION['message'] = "Error Modificando Registro";
                    }else{
                        $_SESSION['message'] = 'Registro Modificado correctamente';
                    }
                }
            }
            catch (PDOException $e){
                $_SESSION['message'] = $e->getMessage();
                $Respuesta == "0";
            }
            $database->close();
            header('location: ../Consulta/ConsultaConvenio.php');
        }
        break;

    case 'ModalInforme' :
        if(isset($id) && is_null($id) == false && $id != ""){
            $Institucion = $_POST["Institucion"];
            $Informe = $_POST["Informe"];
            $Año = $_POST["Anio"];
            $Mes = $_POST["Mes"];
            $db = $database->open();
            try{
                /*$sql = "SELECT * FROM archivosadjuntos WHERE Ad_NombreAdjunto = '$NombreArchivo' AND Ad_RutaArchivo = '$Ubicacion' ";
                foreach ($db->query($sql) as $row){
                    $ArchivoPDF = $row["Ad_Id"];
                }*/

                $stmt =$db->prepare ("SELECT * FROM detalle_informe
                                                WHERE Di_Id = ':id'
                                                  AND Di_Mes = ':Mes' 
                                                  AND Di_Anio = ':Año'
                                                  AND Di_IfId = ':Informe'
                                                  AND Di_CvIdInstitucion = ':Institucion'");

                if ( $stmt->execute(array(  ':id' => $id ,':Mes' => $Mes,
                    ':Año' => $Año ,':Informe' => $Informe,
                    ':Institucion' => $Institucion)) && $stmt->rowCount() > 0 ){
                    $_SESSION['message'] = "El registro tiene los datos ya asignados";
                }else{
                    $sql = "UPDATE detalle_informe
                            SET     Di_Mes = '".$Mes."',
                                    Di_Anio = '".$Año."',
                                    Di_IfId = '".$Informe."',
                                    Di_CvIdInstitucion = '".$Institucion."'
                            WHERE Di_Id = '".$id."'";

                    $Respuesta = ( $db->exec($sql) ) ? '1' : '0';

                    if ( $Respuesta == "0") {
                        $_SESSION['message'] = "Error Modificando Registro";
                    }else{
                        $_SESSION['message'] = 'Registro Modificado correctamente';
                    }
                }
            }
            catch (PDOException $e){
                $_SESSION['message'] = $e->getMessage();
                $Respuesta == "0";
            }
            $database->close();
            header('location: ../Consulta/ConsultaInformes.php');
        }
        break;

    case 'ModalPrograma' :
        if(isset($id) && is_null($id) == false && $id != ""){
            $NombrePrograma = $_POST["Programa"];
            $CentroFormacion = $_POST["CentroFormacion"];
            $db = $database->open();
            try{
                /*$sql = "SELECT * FROM archivosadjuntos WHERE Ad_NombreAdjunto = '$NombreArchivo' AND Ad_RutaArchivo = '$Ubicacion' ";
                foreach ($db->query($sql) as $row){
                    $ArchivoPDF = $row["Ad_Id"];
                }*/

                $stmt =$db->prepare ("SELECT * FROM programas
                                                WHERE Pg_Id = ':id'
                                                  AND Pg_Nombre = ':NombrePrograma' 
                                                  AND Pg_CfId = ':CentroFormacion'");

                if ( $stmt->execute(array(  ':id' => $id ,':NombrePrograma' => $NombrePrograma,
                    ':CentroFormacion' => $CentroFormacion)) && $stmt->rowCount() > 0 ){
                    $_SESSION['message'] = "El registro tiene los datos ya asignados";
                }else{
                    $sql = "UPDATE programas
                            SET     Pg_CfId = '".$CentroFormacion."',
                                    Pg_Nombre = '".$NombrePrograma."'
                            WHERE Pg_Id = '".$id."'";

                    $Respuesta = ( $db->exec($sql) ) ? '1' : '0';

                    if ( $Respuesta == "0") {
                        $_SESSION['message'] = "Error Modificando Registro";
                    }else{
                        $_SESSION['message'] = 'Registro Modificado correctamente';
                    }
                }
            }
            catch (PDOException $e){
                $_SESSION['message'] = $e->getMessage();
                $Respuesta == "0";
            }
            $database->close();
            header('location: ../Consulta/ConsultaPrograma.php');
        }
        break;

    case 'ModalFicha' :
        if(isset($id) && is_null($id) == false && $id != ""){
            $NumeroFicha = $_POST["NumeroFicha"];
            $Convenio = $_POST["Convenio"];
            $Programa = $_POST["ProgramaFormacion"];
            $FechaInicio = $_POST["FechaInicio"];
            $FechaFin = $_POST["FechaFin"];
            $db = $database->open();
            try{
                /*$sql = "SELECT * FROM archivosadjuntos WHERE Ad_NombreAdjunto = '$NombreArchivo' AND Ad_RutaArchivo = '$Ubicacion' ";
                foreach ($db->query($sql) as $row){
                    $ArchivoPDF = $row["Ad_Id"];
                }*/

                $stmt =$db->prepare ("SELECT * FROM fichas
                                                WHERE F_Id = ':id'
                                                  AND F_PgId = ':Programa' 
                                                  AND F_CvId = ':Convenio'
                                                  AND F_FechaInicio = ':FechaInicio'
                                                  AND F_FechaFin =  ':FechaFin'");

                if ( $stmt->execute(array(  ':id' => $id ,':Programa' => $Programa,
                    ':Convenio' => $Convenio ,':FechaInicio' => $FechaInicio,
                    ':FechaFin' => $FechaFin)) && $stmt->rowCount() > 0 ){
                    $_SESSION['message'] = "El registro tiene los datos ya asignados";
                }else{
                    $sql = "UPDATE fichas
                            SET     F_PgId = '".$Programa."',
                                    F_CvId = '".$Convenio."',
                                    F_FechaInicio = '".$FechaInicio."',
                                    F_FechaFin = '".$FechaFin."'
                            WHERE F_Id = '".$id."'";

                    $Respuesta = ( $db->exec($sql) ) ? '1' : '0';

                    if ( $Respuesta == "0") {
                        $_SESSION['message'] = "Error Modificando Registro";
                    }else{
                        $_SESSION['message'] = 'Registro Modificado correctamente';
                    }
                }
            }
            catch (PDOException $e){
                $_SESSION['message'] = $e->getMessage();
                $Respuesta == "0";
            }
            $database->close();
            header('location: ../Consulta/ConsultaFichas.php');
        }
        break;

    case 'ModalAprendiz' :
        if(isset($id) && is_null($id) == false && $id != ""){
            $Ficha = $_POST["FichaFormacion"];
            $TipoDocumento = $_POST["TipoDocumento"];
            $NumeroIdentificacion = $_POST["NumIdentificacion"];
            $Nombres = $_POST["Nombres"];
            $Apellidos = $_POST["Apellidos"];
            $Telefono = $_POST["Telefono"];
            $CorreoElectronico = $_POST["Email"];
            $db = $database->open();
            try{
                /*$sql = "SELECT * FROM archivosadjuntos WHERE Ad_NombreAdjunto = '$NombreArchivo' AND Ad_RutaArchivo = '$Ubicacion' ";
                foreach ($db->query($sql) as $row){
                    $ArchivoPDF = $row["Ad_Id"];
                }*/

                $stmt =$db->prepare ("SELECT * FROM aprendices
                                                WHERE Ap_Id = ':id'
                                                  AND Ap_Apellidos = ':Apellidos' 
                                                  AND Ap_Nombres = ':Nombres'
                                                  AND Ap_TipoDocumento = ':TipoDocumento'
                                                  AND Ap_NumeroDocumento = ':NumDocumento'
                                                  AND Ap_Telefono = ':Telefono'
                                                  AND Ap_Correo = ':Correo'
                                                  AND Ap_FId = ':Ficha'");

                if ( $stmt->execute(array(  ':id' => $id ,':Apellidos' => $Apellidos,
                    ':Nombres' => $Nombres ,':TipoDocumento' => $TipoDocumento,
                    ':NumDocumento' => $NumeroIdentificacion ,':Correo' => $CorreoElectronico,
                    ':Telefono' => $Telefono, ':Ficha' => $Ficha,
                    ':Correo' => $CorreoElectronico)) && $stmt->rowCount() > 0 ){
                    $_SESSION['message'] = "El registro tiene los datos ya asignados";
                }else{
                    $sql = "UPDATE aprendices
                            SET     Ap_Apellidos = '".$Apellidos."',
                                    Ap_Nombres = '".$Nombres."',
                                    Ap_TipoDocumento = '".$TipoDocumento."',
                                    Ap_NumeroDocumento = '".$NumeroIdentificacion."',
                                    Ap_Telefono = '".$Telefono."',
                                    Ap_Correo = '".$CorreoElectronico."'
                            WHERE Ap_Id = '".$id."'";

                    $Respuesta = ( $db->exec($sql) ) ? '1' : '0';

                    if ( $Respuesta == "0") {
                        $_SESSION['message'] = "Error Modificando Registro";
                    }else{
                        $_SESSION['message'] = 'Registro Modificado correctamente';
                    }
                }
            }
            catch (PDOException $e){
                $_SESSION['message'] = $e->getMessage();
                $Respuesta == "0";
            }
            $database->close();
            header('location: ../Consulta/ConsultaInstructor.php');
        }
        break;

    case 'ModalCompetencia' :
    if(isset($id) && is_null($id) == false && $id != ""){
        $NombreCompetencia = $_POST["NombreCompetencia"];
        $Programa = $_POST["ProgramaFormacion"];
        $IntensidadHrs = $_POST["IntensidadHoras"];
        $db = $database->open();
        try{
            /*$sql = "SELECT * FROM archivosadjuntos WHERE Ad_NombreAdjunto = '$NombreArchivo' AND Ad_RutaArchivo = '$Ubicacion' ";
            foreach ($db->query($sql) as $row){
                $ArchivoPDF = $row["Ad_Id"];
            }*/

            $stmt =$db->prepare ("SELECT * FROM competencia_programa
                                                WHERE Cp_Id = ':id'
                                                  AND Cp_NombreC = ':NombreCompetencia' 
                                                  AND Cp_IntensidadH = ':Intensidad'
                                                  AND Cp_PgId = ':Programa'");

            if ( $stmt->execute(array(  ':id' => $id ,':NombreCompetencia' => $NombreCompetencia,
                ':Intensidad' => $IntensidadHrs ,':Programa' => $Programa)) && $stmt->rowCount() > 0 ){
                $_SESSION['message'] = "El registro tiene los datos ya asignados";
            }else{
                $sql = "UPDATE competencia_programa
                            SET     Cp_NombreC = '".$NombreCompetencia."',
                                    Cp_IntensidadH = '".$IntensidadHrs."',
                                    Cp_PgId = '".$Programa."'
                            WHERE Cp_Id = '".$id."'";

                $Respuesta = ( $db->exec($sql) ) ? '1' : '0';

                if ( $Respuesta == "0") {
                    $_SESSION['message'] = "Error Modificando Registro";
                }else{
                    $_SESSION['message'] = 'Registro Modificado correctamente';
                }
            }
        }
        catch (PDOException $e){
            $_SESSION['message'] = $e->getMessage();
            $Respuesta == "0";
        }
        $database->close();
        header('location: ../Consulta/ConsultaInstructor.php');
    }
    break;

    case 'ModalAmbiente' :
        if(isset($id) && is_null($id) == false && $id != ""){
            $NombreAmbiente = $_POST["NombreAmbiente"];
            $UbicacionAmbiente = $_POST["UbicacionAmbiente"];
            $Institucion = $_SESSION['CodigoInstitucion'];
            //die($NombreAmbiente."<br>".$UbicacionAmbiente."<br>".$Institucion);
            $db = $database->open();
            try{
                /*$sql = "SELECT * FROM archivosadjuntos WHERE Ad_NombreAdjunto = '$NombreArchivo' AND Ad_RutaArchivo = '$Ubicacion' ";
                foreach ($db->query($sql) as $row){
                    $ArchivoPDF = $row["Ad_Id"];
                }*/

                $stmt =$db->prepare ("SELECT * FROM ambientes
                                                WHERE Ab_Id = :id
                                                AND Ab_Nombre = :NombreAmbiente
                                                AND Ab_Ubicacion = :Ubicacion
                                                AND Ab_SsCodConvenio = :Institucion");

                if ( $stmt->execute(array(  ':id' => $id ,':NombreAmbiente' => $NombreAmbiente,
                    ':Ubicacion' => $UbicacionAmbiente ,':Institucion' => $Institucion)) && $stmt->rowCount() > 0  ){
                    $_SESSION['message'] = "El registro tiene los datos ya asignados";
                }else{
                    $sql = "UPDATE ambientes
                            SET     Ab_Nombre = '".$NombreCompetencia."',
                                    Ab_Ubicacion = '".$UbicacionAmbiente."'
                            WHERE Ab_Id = '".$id."' AND
                                  Ab_SsCodConvenio = '".$Institucion."' ";

                    $Respuesta = ( $db->exec($sql) ) ? '1' : '0';

                    if ( $Respuesta == "0") {
                        $_SESSION['message'] = "Error Modificando Registro";
                    }else{
                        $_SESSION['message'] = 'Registro Modificado correctamente';
                    }
                }
            }
            catch (PDOException $e){
                $_SESSION['message'] = $e->getMessage();
                $Respuesta == "0";
            }
            $database->close();
            header('location: ../Consulta/ConsultaAmbientes.php');

        }
        break;


    case 'ModalInstructor' :
        if(isset($id) && is_null($id) == false && $id != ""){
            $TipoDocumento = $_POST["TipoDocumento"];
            $NumeroIdentificacion = $_POST["NumIdentificacion"];
            $Nombres = $_POST['Nombres'];
            $Apellidos = $_POST['Apellidos'];
            $Telefono = $_POST['Telefono'];
            $Estudios = $_POST['Estudios'];
            $NombreUniversidad = $_POST['NombreUniversidad'];
            $FechaGrado = $_POST['FechaGrado'];
            $Institucion = $_SESSION['CodigoInstitucion'];
            $db = $database->open();
            try{
                /*$sql = "SELECT * FROM archivosadjuntos WHERE Ad_NombreAdjunto = '$NombreArchivo' AND Ad_RutaArchivo = '$Ubicacion' ";
                foreach ($db->query($sql) as $row){
                    $ArchivoPDF = $row["Ad_Id"];
                }*/

                $stmt =$db->prepare ("SELECT * FROM instructor
                                                WHERE In_Id = ':id'
                                                  AND In_Nombres = ':Nombres' 
                                                  AND In_Apellidos = ':Apellidos'
                                                  AND In_EstudiosPregrado = ':Estudios'
                                                  AND In_FechaGrado = ':FechaGrado'
                                                  AND In_NombreUniverdidad = ':Universidad'
                                                  AND In_NumeroDocumento = ':NumDocumento'
                                                  AND In_TipoDocumento = ':TipoDocumento'
                                                  AND In_Telefono = ':Telefono'
                                                  AND In_SsCodConvenio = ':Institucion'");

                if ( $stmt->execute(array(  ':id' => $id ,':Nombres' => $Nombres,
                    ':Apellidos' => $Apellidos ,':Estudios' => $Estudios,
                    ':FechaGrado' => $FechaGrado ,':Universidad' => $NombreUniversidad,
                    ':NumDocumento' => $NumeroIdentificacion ,':TipoDocumento' => $TipoDocumento,
                    ':Telefono' => $Telefono ,':Institucion' => $Institucion,)) && $stmt->rowCount() > 0 ){
                    $_SESSION['message'] = "El registro tiene los datos ya asignados";
                }else{
                    $sql = "UPDATE instructor
                            SET     In_Nombres = '".$Nombres."',
                                    In_Apellidos = '".$Apellidos."',
                                    In_EstudiosPregrado = '".$Estudios."',
                                    In_FechaGrado = '".$FechaGrado."',
                                    In_NombreUniverdidad = '".$NombreUniversidad."',
                                    In_NumeroDocumento = '".$NumeroIdentificacion."',
                                    In_TipoDocumento = '".$TipoDocumento."',
                                    In_Telefono = '".$Telefono."'
                            WHERE In_Id = '".$id."' AND
                                  In_SsCodConvenio = '".$Institucion."' ";

                    $Respuesta = ( $db->exec($sql) ) ? '1' : '0';

                    if ( $Respuesta == "0") {
                        $_SESSION['message'] = "Error Modificando Registro";
                    }else{
                        $_SESSION['message'] = 'Registro Modificado correctamente';
                    }
                }
            }
            catch (PDOException $e){
                $_SESSION['message'] = $e->getMessage();
                $Respuesta == "0";
            }
            $database->close();
            header('location: ../Consulta/ConsultaInstructor.php');
        }
        break;
}
?>