<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SOFIRCA|Inicio</title>    
    
    <!-- Compiled and minified CSS 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->

    <!-- Compiled and minified JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>        -->  

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <script>
        function opcionesMenu(m_sOpcion){
            if(m_sOpcion == 'I'){
                var m_sBotonInstitucion = document.getElementById("BTN_sOpcionI");
                var m_sBotonFuncionario = document.getElementById("BTN_sOpcionF");
                document.getElementById("Instituciones").hidden = false;
                document.getElementById("HDN_sTipoUsuario").value = "I";
                $("#LBX_Institucion").attr('required', '');
                m_sBotonFuncionario.classList.remove("OpcionSelecccionada");
                m_sBotonInstitucion.classList.add("OpcionSelecccionada");
            } else if(m_sOpcion == 'F'){
                var m_sBotonInstitucion = document.getElementById("BTN_sOpcionI");
                var m_sBotonFuncionario = document.getElementById("BTN_sOpcionF");
                document.getElementById("Instituciones").hidden = true;
                document.getElementById("HDN_sTipoUsuario").value = "F";
                $("#LBX_Institucion").removeAttr('required');
                m_sBotonInstitucion.classList.remove("OpcionSelecccionada");
                m_sBotonFuncionario.classList.add("OpcionSelecccionada");
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">SOFIRCA</h2>

        <?php 
            session_start();
            if(isset($_SESSION['message'])){
        ?>
                <div class="alert alert-dismissible alert-danger" style="margin-top:20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $_SESSION['message']; ?>
                </div>
        <?php

                unset($_SESSION['message']);
            }
        ?>

        <div class=" col-xs-12 col-md-6 formulario mx-auto">
            <form action="ValidarUsuario.php" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <button id="BTN_sOpcionF" type="button" class="btn btn-primary btn-block Opcion" onclick="opcionesMenu('F');">Funcionarios</button>
                        </div>
                        <div class="col-6">
                            <button id="BTN_sOpcionI" type="button" class="btn btn-block Opcion" onclick="opcionesMenu('I');" >Institucion</button>
                        </div>
                    </div>                   
                </div>
                <div class="form-group" id="Instituciones">
                    <label for="exampleFormControlSelect1">Institucion</label>
                    <select class="form-control" id="LBX_Institucion" name="Institucion">
                        <option value=""></option>
                        <?php
                            include_once('connection.php');

                            $database = new Connection();
                            $db = $database->open();
                            try{
                                $sql = 'SELECT Bc_Id, Bc_NombreInstitucion FROM banco_ies';
                                foreach ($db->query($sql) as $row) {
                        ?>
                                    <option value="<?php echo($row['Bc_Id']); ?>"> <?php echo($row['Bc_NombreInstitucion']); ?></option>
                        <?php
                                }
                            }catch (PDOException $e){
                                $_SESSION['message'] = $e->getMessage();
                                header('location: index.php');
                            }
                            
                            $database->close();
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="TXT_sUsuario">Usuario</label>
                    <input type="text" class="form-control" id="TXT_sUsuario" name="Usuario" placeholder="Ingrese Usuario" required>
                </div>
                <div class="form-group">
                    <label for="TXT_Contrasenia">Contraseña</label>
                    <input type="password" class="form-control" id="TXT_Contrasenia" name="Contrasenia" placeholder="Ingrese la contraseña" required>
                </div>
                <div class="form-group form-check">
                <label>
                    <input type="checkbox" name="RecordarUsuario" class="filled-in" />
                    <span>Recordar Usuario</span>
                </label>
                </div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
                <input type="hidden" id="HDN_sTipoUsuario" name="TipoUsuario">
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $( document ).ready(function() {
            console.log( "ready!" );            
            document.getElementById("HDN_sTipoUsuario").value = "F";
            var m_sBotonFuncionario = document.getElementById("BTN_sOpcionF");
            m_sBotonFuncionario.classList.add("OpcionSelecccionada");
            $("#LBX_Institucion").removeAttr('required');

            var m_sTipoUsuario = document.getElementById("HDN_sTipoUsuario").value

            if (m_sTipoUsuario == 'F'){
                document.getElementById("Instituciones").hidden = true;
            }
        });
    </script>    
</body>
</html>