<?php
  /*  1 - Administrador
      2 - Usuario (SOLO CONSULTA)
      3 - Institucion
  */
  session_start();
  include_once('connection.php');

  $database = new Connection();
  $db = $database->open();

  $CodigoInstitucion = $_POST['Institucion'];
  $Usuario = $_POST['Usuario'];
  $ContraseniaF = $_POST['Contrasenia'];
  $RecordarContrasenia = "0";
  $TipoUsuario = $_POST['TipoUsuario'];
  $NombreUsuario = "";
  $ValidacionExitosa = false;
  

  if(isset($_POST['RecordarUsuario'])){
    $RecordarContrasenia = "1";   
  }else{
    $RecordarContrasenia = "0";
  }

  try{
    $sql = 'SELECT * FROM usuarios WHERE Us_Id = "'.$Usuario.'"';
    foreach ($db->query($sql) as $row) {
      $NombreUsuario = $row['Us_Nombre'];
      $NivelSeguridad = $row['Us_NSeguridad'];
      $Contrasenia = $row['Us_Pass'];
      $CodigoInstitucionBD = $row['Us_CvIdInstitucion'];
    }

    if ($TipoUsuario == "I"){
      if($NivelSeguridad != 3){
        $ValidacionExitosa = false;
        $_SESSION['message'] = 'Usuario no existe.';
        header('location: index.php');
        return;
      }else{
          if($CodigoInstitucionBD != $CodigoInstitucion || $CodigoInstitucionBD == '' || $CodigoInstitucionBD == null){
              $ValidacionExitosa = false;
              $_SESSION['message'] = 'El usuario no tiene permitido ingresar a la Institución seleccionada.';
              header('location: index.php');
              return;
          }
      }
    }else if($TipoUsuario == "F"){
      if($NivelSeguridad != 1 && $NivelSeguridad != 2){
        $ValidacionExitosa = false;
        $_SESSION['message'] = 'Usuario no existe.';
        header('location: index.php');
        return;
      }
    }

    if($NombreUsuario != '' && is_null($NombreUsuario) == false){      
  
      if($Contrasenia != $ContraseniaF ){
        $ValidacionExitosa = false;
        $_SESSION['message'] = 'Contraseña Incorrecta, Intente Nuevamente';
        header('location: index.php');
      }else{
        $ValidacionExitosa = true;
        if($RecordarContrasenia == "1"){
          setcookie("NombreUsuario" , $NombreUsuario);
          setcookie("NivelSeguridad" , $NivelSeguridad);
          setcookie("Usuario" , $Usuario);
          setcookie("Password" , $ContraseniaF);
          setcookie("CodigoInstitucion" , $CodigoInstitucion);
        }        
      }
    }else{
      $ValidacionExitosa = false;
      $_SESSION['message'] = 'Usuario no existe.';
        header('location: index.php');
        return;
    }   
  }catch(PDOException $e){
    $ValidacionExitosa = false;
    $_SESSION['message'] = $e->getMessage();
    header('location: index.php');
    return;
  }

  $_SESSION['Usuario'] = $Usuario;
  $_SESSION['NombreUsuario'] = $NombreUsuario;
  if ($TipoUsuario == "I"){
      $_SESSION['CodigoInstitucion'] = $CodigoInstitucion;
  }
  $_SESSION['TipoUsuario'] = $TipoUsuario;
  $_SESSION['NivelSeguridad'] = $NivelSeguridad;

  $database->close();

  if($ValidacionExitosa == true){
    //$_SESSION['message'] = 'Bienvenido(a) Sr(a) '.$NombreUsuario;
    header('location: Menu.php');
  }

?>