<?php
    $NivelSeguridad = $_SESSION['NivelSeguridad'];
    if ($NivelSeguridad == "1") {
        $NombreNivelSeguridad = "Administrador";
    } else if ($NivelSeguridad == "2") {
        $NombreNivelSeguridad = "Usuario Invitado";
    } else if ($NivelSeguridad == "3") {
        $NombreNivelSeguridad = "Usuario Institución";
    }

    $UrlConexion = $_SESSION['Url'];
    $UrlConexion = basename($UrlConexion);
    if($UrlConexion != "Menu.php" && $UrlConexion != "AdministrarUsuarios.php"){
        $UrlBase = "../";
    }else{
        $UrlBase = "";
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SOFIRCA|Ingresando Como <?php echo ($_SESSION['NombreUsuario']); ?></title>

    <!-- Compiled and minified CSS 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->

    <!-- Compiled and minified JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>        -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="../js/jquery.js"></script>
    <script src="<?php echo $UrlBase ?>js\script.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.20/r-2.2.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
    <link rel="stylesheet" href="<?php echo $UrlBase ?>css\style.css">
    <link rel="stylesheet" href="<?php echo $UrlBase ?>css\style-font.css">
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">SOFIRCA</div>
            <div class="list-group list-group-flush">
                <div class="card-header bg-light d-sm-none">
                    <?php echo ('Usuario: ' . $_SESSION['NombreUsuario']); ?>
                    <?php echo ('<br>Rol: ' . $NombreNivelSeguridad); ?>
                </div>
                <?php
                $UrlConexion = $_SESSION['Url'];
                $UrlConexion = basename($UrlConexion);
                if($UrlBase == "../"){
                    include_once("..\connection.php");
                }else{                    
                    include_once("connection.php");
                }

                $NivelSeguridad = $_SESSION['NivelSeguridad'];

                if ($NivelSeguridad == "1") {
                    //El Usuario es Administrador
                    ?>
                    <a href="#modulo1" class="list-group-item list-group-item-action bg-light" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><span class="hidden-sm-down">Modulo N°1 </span><span class="icon-circle-down"></span></a>
                    <div class="collapse" id="modulo1">
                        <a id="MNU_RegistrarIES" href="<?php echo $UrlBase ?>Ingresar\RegistrarIES.php" class="list-group-item list-group-item-action bg-light">Registrar IES</a>
                        <a id="MNU_RegistrarConvenio" href="<?php echo $UrlBase ?>Ingresar\RegistrarConvenio.php" class="list-group-item list-group-item-action bg-light">Registrar Convenio</a>
                        <a id="MNU_RegistrarInforme" href="<?php echo $UrlBase ?>Ingresar\RegistrarInforme.php" class="list-group-item list-group-item-action bg-light">Registrar Informe de Formacion Profesional</a>
                    </div>
                    <a href="#modulo2" class="list-group-item list-group-item-action bg-light" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><span class="hidden-sm-down">Modulo N°2 </span><span class="icon-circle-down"></span></a>
                    <div class="collapse" id="modulo2">
                        <a id="MNU_RegistrarPrograma" href="<?php echo $UrlBase ?>Ingresar\RegistrarProgramaFormacion.php" class="list-group-item list-group-item-action bg-light">Registrar Programas de Formacion</a>
                        <a id="MNU_RegistrarCompetencia" href="<?php echo $UrlBase ?>Ingresar\RegistrarCompetencias.php" class="list-group-item list-group-item-action bg-light">Registrar Competencias</a>
                        <a id="MNU_RegistrarFicha" href="<?php echo $UrlBase ?>Ingresar\RegistrarFicha.php" class="list-group-item list-group-item-action bg-light">Registrar Fichas de Caracterizacion</a>
                        <a id="MNU_RegistrarAprendiz" href="<?php echo $UrlBase ?>Ingresar\RegistrarAprendiz.php" class="list-group-item list-group-item-action bg-light">Registrar Aprendices en Formación</a>
                    </div>
                    <a href="#modulo3" class="list-group-item list-group-item-action bg-light" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><span class="hidden-sm-down">Modulo N°3 </span><span class="icon-circle-down"></span></a>
                    <div class="collapse" id="modulo3">
                        <a id="MNU_Consulta" href="<?php echo $UrlBase ?>Consulta\Consultas.php" class="list-group-item list-group-item-action bg-light">Consultas</a>
                        <a id="MNU_AdministrarUsuarios" href="<?php echo $UrlBase ?>AdministrarUsuarios.php" class="list-group-item list-group-item-action bg-light">Administrar Usuarios</a>
                    </div>
                <?php
                } else if ($NivelSeguridad == "2") {
                    //El Usuario es Estandar (SOLO CONSULTA)
                    ?>
                    <a href="<?php echo $UrlBase ?>Consulta\Consultas.php" class="list-group-item list-group-item-action bg-light">Consultas</a>
                <?php
                } else  if ($NivelSeguridad == "3") {
                    //El Usuario es Institucion
                    ?>
                    <a id="MNU_RegistrarApmbiente" href="<?php echo $UrlBase ?>Ingresar\RegistrarAmbiente.php" class="list-group-item list-group-item-action bg-light">Registrar Ambiente</a>
                    <a id="MNU_RegistrarInstructor" href="<?php echo $UrlBase ?>Ingresar\RegistrarInstructor.php" class="list-group-item list-group-item-action bg-light">Registrar Instructor</a>
                    <a id="MNU_RegistrarContratoInstructor" href="<?php echo $UrlBase ?>Ingresar\RegistrarContratoInstructor.php" class="list-group-item list-group-item-action bg-light">Registrar Contrato</a>
                    <a id="MNU_RegistrarCargaAcademica" href="<?php echo $UrlBase ?>Ingresar\RegistrarCargaAcademica.php" class="list-group-item list-group-item-action bg-light">Registrar Carga Academica</a>
                    <a id="MNU_Consulta" href="<?php echo $UrlBase ?>Consulta\Consultas.php" class="list-group-item list-group-item-action bg-light">Consultas</a>
                <?php
                }
                ?>
                <a onclick="cerrarsesion();" class="list-group-item list-group-item-action bg-light d-sm-none">Cerrar Sesion</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-light" id="menu-toggle"><span class="navbar-toggler-icon"></span> Menu</button>

                <button class="navbar-toggler d-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tooltip" onclick="cerrarsesion();" data-placement="bottom" title="Cerrar Sesión"><span class="icon-exit"></span></a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <?php echo ($_SESSION['NombreUsuario']); ?>
                    </span>
                </div>
            </nav>