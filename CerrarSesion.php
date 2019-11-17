<?php
    session_start();

    if(isset($_SESSION['Usuario'])){

        unset($_SESSION['Usuario']);

        if(isset($_COOKIE["Usuario"])){
            $_COOKIE["Usuario"] = "";
            unset($_COOKIE["Usuario"]);
        }
    }

    if(isset($_SESSION['NombreUsuario'])){

        unset($_SESSION['NombreUsuario']);

        if(isset($_COOKIE["NombreUsuario"])){
            $_COOKIE["NombreUsuario"] = "";
            unset($_COOKIE["NombreUsuario"]);
        }
    }

    if(isset($_SESSION['CodigoInstitucion'])){

        unset($_SESSION['CodigoInstitucion']);

        if(isset($_COOKIE["CodigoInstitucion"])){
            $_COOKIE["CodigoInstitucion"] = "";
            unset($_COOKIE["CodigoInstitucion"]);
        }
    }

    if(isset($_SESSION['TipoUsuario'])){

        unset($_SESSION['TipoUsuario']);

        if(isset($_COOKIE["TipoUsuario"])){
            $_COOKIE["TipoUsuario"] = "";
            unset($_COOKIE["TipoUsuario"]);
        }
    }

    if(isset($_SESSION['NivelSeguridad'])){

        unset($_SESSION['NivelSeguridad']);

        if(isset($_COOKIE["NivelSeguridad"])){
            $_COOKIE["NivelSeguridad"] = "";
            unset($_COOKIE["NivelSeguridad"]);
        }
    }

    if(isset($_SESSION['Url'])){

        unset($_SESSION['Url']);

        if(isset($_COOKIE["Url"])){
            $_COOKIE["Url"] = "";
            unset($_COOKIE["Url"]);
        }
    }

    $_SESSION['message'] = "Sesion Cerrada Exitosamente";
?>