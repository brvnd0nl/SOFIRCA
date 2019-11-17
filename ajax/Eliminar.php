<!--    En este archivo se guardaran todos los eventos de Eliminar de los Modales,
        se usará un Switch para Identificar la ventana donde se está eliminando -->
<!--    En este PHP se reciben solo dos variables:
        * (id) es el identificador del registro que se desea eliminar
        * (Modal) es la variable con la que se identificara la ventana que está realizando el cambio.-->

<?php
session_start();
include_once('../connection.php');
$id = $_GET['id'];
$Modal = $_GET['Modal'];
$database = new Connection();
$NivelSeguridad = $_SESSION['NivelSeguridad'];
$Respuesta = "0";

switch ($Modal){
    case 'ModalIES' :
        if(isset($id) && is_null($id) == false && $id != ""){
            $db = $database->open();
            try{
                $sql = "DELETE FROM banco_ies WHERE Bc_Id = '".$id."'";

                $Respuesta = ( $db->exec($sql) ) ? '1' : '0';


                if ( $Respuesta == "0") {
                    $_SESSION['message'] = "Error Eliminando Registro";
                }else{
                    $_SESSION['message'] = 'Registro eliminado correctamente';
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
            $db = $database->open();
            try{
                $sql = "DELETE FROM convenios WHERE Cv_Id = '".$id."'";

                $Respuesta = ( $db->exec($sql) ) ? '1' : '0';


                if ( $Respuesta == "0") {
                    $_SESSION['message'] = "Error Eliminando Registro";
                }else{
                    $_SESSION['message'] = 'Registro eliminado correctamente';
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
            $db = $database->open();
            try{
                //Primero consulto el archivo adjunto en caso de que se tenga que eliminar.

                $sql = "SELECT * FROM detalle_informe INNER JOIN archivosadjuntos a on detalle_informe.Di_CodAdjunto = a.Ad_Id WHERE Di_Id = '$id'";
                foreach ($db->query($sql) as $row){
                    $RutaPDF = $row["Ad_RutaArchivo"];
                    $IdArchivoAdjunto = $row["Ad_Id"];
                    //Eliminando Archivo

                    $ResElimiando = unlink($RutaPDF);
                    if(!$ResElimiando){
                        $_SESSION['message'] = "Error Eliminando Registro";
                        $Respuesta == "0";
                        break 2;
                    }else{
                        //Eliminando Regitros del Archivo Adjunto

                        $sql = "DELETE FROM archivosadjuntos WHERE Ad_Id = '".$IdArchivoAdjunto."'";

                        $db->exec($sql);

                        //Y al finalizar, Eliminar  el regitro del Informe

                        $sql = "DELETE FROM detalle_informe WHERE Di_Id = '".$id."'";

                        $Respuesta = ( $db->exec($sql) ) ? '1' : '0';

                        if ( $Respuesta == "0") {
                            $_SESSION['message'] = "Error Eliminando Registro";
                        }else{
                            $_SESSION['message'] = 'Registro eliminado correctamente';
                        }

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
            $db = $database->open();
            try{
                //Primero consulto el archivo adjunto en caso de que se tenga que eliminar.

                $sql = "SELECT * FROM programas INNER JOIN archivosadjuntos ON programas.Pg_CodAdjunto = archivosadjuntos.Ad_Id WHERE  Pg_Id = '$id'";
                foreach ($db->query($sql) as $row){
                    $RutaPDF = $row["Ad_RutaArchivo"];
                    $IdArchivoAdjunto = $row["Ad_Id"];
                    //Eliminando Archivo

                    $ResElimiando = unlink($RutaPDF);
                    if(!$ResElimiando){
                        $_SESSION['message'] = "Error Eliminando Registro";
                        $Respuesta == "0";
                        break 2;
                    }else{
                        //Eliminando Regitros del Archivo Adjunto

                        $sql = "DELETE FROM archivosadjuntos WHERE Ad_Id = '".$IdArchivoAdjunto."'";

                        $db->exec($sql);

                        //Y al finalizar, Eliminar  el regitro del Programa

                        $sql = "DELETE FROM programas WHERE Pg_Id = '".$id."'";

                        $Respuesta = ( $db->exec($sql) ) ? '1' : '0';


                        if ( $Respuesta == "0") {
                            $_SESSION['message'] = "Error Eliminando Registro";
                        }else{
                            $_SESSION['message'] = 'Registro eliminado correctamente';
                        }

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

    case 'ModalCompetencia' :
        if(isset($id) && is_null($id) == false && $id != ""){
            $db = $database->open();
            try{
                $sql = "DELETE FROM competencia_programa WHERE Cp_Id = '".$id."'";

                $Respuesta = ( $db->exec($sql) ) ? '1' : '0';


                if ( $Respuesta == "0") {
                    $_SESSION['message'] = "Error Eliminando Registro";
                }else{
                    $_SESSION['message'] = 'Registro eliminado correctamente';
                }
            }
            catch (PDOException $e){
                $_SESSION['message'] = $e->getMessage();
                $Respuesta == "0";
            }
            $database->close();
            header('location: ../Consulta/ConsultaCompetencia.php');
        }
        break;

    case 'ModalFicha' :
        if(isset($id) && is_null($id) == false && $id != ""){
            $db = $database->open();
            try{
                $sql = "DELETE FROM fichas WHERE F_Id = '".$id."'";

                $Respuesta = ( $db->exec($sql) ) ? '1' : '0';


                if ( $Respuesta == "0") {
                    $_SESSION['message'] = "Error Eliminando Registro";
                }else{
                    $_SESSION['message'] = 'Registro eliminado correctamente';
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
            $db = $database->open();
            try{
                $sql = "DELETE FROM aprendices WHERE Ap_Id = '".$id."'";

                $Respuesta = ( $db->exec($sql) ) ? '1' : '0';


                if ( $Respuesta == "0") {
                    $_SESSION['message'] = "Error Eliminando Registro";
                }else{
                    $_SESSION['message'] = 'Registro eliminado correctamente';
                }
            }
            catch (PDOException $e){
                $_SESSION['message'] = $e->getMessage();
                $Respuesta == "0";
            }
            $database->close();
            header('location: ../Consulta/ConsultaAprendices.php');
        }
        break;

    case 'ModalAmbiente' :
        if(isset($id) && is_null($id) == false && $id != ""){
            $db = $database->open();
            try{
                $sql = "DELETE FROM ambientes WHERE Ab_Id = '".$id."'";

                $Respuesta = ( $db->exec($sql) ) ? '1' : '0';


                if ( $Respuesta == "0") {
                    $_SESSION['message'] = "Error Eliminando Registro";
                }else{
                    $_SESSION['message'] = 'Registro eliminado correctamente';
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
            $db = $database->open();
            //Antes de eliminar el registro principal, es necesario saber si tambien se tienen que eliminar los contratos.
            //De ser así, hay que consultar si tiene activo algun contrato, desactivarlo y/o eliminar los registros.

            try{
                $sql = "DELETE FROM instructor WHERE In_Id = '".$id."'";

                $Respuesta = ( $db->exec($sql) ) ? '1' : '0';


                if ( $Respuesta == "0") {
                    $_SESSION['message'] = "Error Eliminando Registro";
                }else{
                    $_SESSION['message'] = 'Registro eliminado correctamente';
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
