<?php
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>
<div class="container contenedor">
    <h2 class="text-center">Consultar Aprendices en Formación</h2>
    <hr>
    <form>
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
        <div class="form-group">
            <label for="LBX_sFichaFormacion">Ficha de Formacion</label>
            <select class="form-control" id="LBX_sFichaFormacion" name="FichaFormacion" required>
                <option value=""></option>
                <?php
                $database = new Connection();
                $db = $database->open();
                try {
                    $sql = "SELECT fichas.F_Id , CONCAT(fichas.F_Id, ' - ',p.Pg_Nombre) AS 'Pg_Nombre'   FROM fichas INNER JOIN programas p on fichas.F_PgId = p.Pg_Id";
                    foreach ($db->query($sql) as $rowCBX) {
                        ?>
                        <option value="<?php echo($rowCBX['F_Id']); ?>"> <?php echo($rowCBX['Pg_Nombre']); ?></option>
                        <?php
                    }
                } catch (PDOException $e) {
                    $_SESSION['message'] = $e->getMessage();
                    header('location: index.php');
                }

                $database->close();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="TXT_sNumIdentificacion">Número de Identificación</label>
            <input type="text" class="form-control" name="NumeroIdentificacion" id="TXT_sNumIdentificacion" required>
        </div>
        <div class="form-group">
            <label for="TXT_sNombre">Nombre Completo</label>
            <input type="text" class="form-control" name="NombreCompleto" id="TXT_sNombreCompleto" required>
        </div>
        <div class="form-group">
            <label for="TXT_sTelefono">Telefono</label>
            <input type="text" class="form-control" name="Telefonos" id="TXT_sTelefono" required>
        </div>
        <div class="form-group">
            <label for="TXT_sEmail">Correo Electrónico</label>
            <input type="text" class="form-control" name="CorreoElectronico" id="TXT_sEmail" required>
        </div>
        <div class="text-center">
            <button type="submit" id="BTN_sConsultaAprendiz" name="ConsultaAprendiz" class="btn btn-primary mx-auto">Consultar</button>
        </div>        
    </form>
    <hr>
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Numero de ficha</th>
            <th>Numero de Identificacion</th>
            <th>Nombre Completo</th>
            <th>Telefono</th>
            <th>Correo Electronico</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>

    <!-- Editar -->
    <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Editar Aprendiz</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="contenidoModal">

                </div>

            </div>
        </div>
    </div>

    <!-- Eliminar -->
    <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Eliminar Aprendiz</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="contenidoModal">

                </div>
            </div>
        </div>
    </div>

<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_Consulta" ).last().addClass( "Menuactive" );

        $('#editar').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : '../modal/ModificarAprendiz.php',
                data :  'Id='+ rowid,
                success : function(data){
                    $('#editar .contenidoModal').html(data);
                }
            });
        });

        $('#eliminar').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : '../modal/EliminarAprendiz.php', //Here you will fetch records
                data :  'Id='+ rowid, //Pass $id
                success : function(data){
                    $('#eliminar .contenidoModal').html(data);//Show fetched data from database
                }
            });
        });
    });

    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sConsultaAprendiz').submit();
        }
    });
    $(document).on("click","#BTN_sConsultaAprendiz",function(event){
        try{
            event.preventDefault();
            var DatosFicha =  $("#LBX_sFichaFormacion").val();
            var DatosIdentificacion =  $("#TXT_sNumIdentificacion").val();
            var DatosNombre =  $("#TXT_sNombreCompleto").val().toUpperCase();
            var DatosTelefono =  $("#TXT_sTelefono").val();
            var DatosEmail =  $("#TXT_sEmail").val().toLowerCase();
            if(DatosFicha == null || DatosIdentificacion == null || DatosNombre == null || DatosTelefono == null || DatosEmail == null){
                return;
            }
            $('#example').DataTable( {
                "bDeferRender": true,
                "sPaginationType": "full_numbers",
                "destroy": true,
                "ajax": {
                    "url": "../ajax/Eventos.php",
                    "type": "POST",
                    "data": {NombreEvento: 'RevisionAprendiz', Datos: {Ficha : DatosFicha, NroIdentificacion : DatosIdentificacion, Nombre : DatosNombre, Telefono : DatosTelefono, Email : DatosEmail} }
                },
                "columns": [
                    { "data": "numeroficha" },
                    { "data": "identificacion" },
                    { "data": "nombreaprendiz" },
                    { "data": "telefono" },
                    { "data": "correo" },
                    { "data": "acciones" }
                ],
                "oLanguage": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu": 'Mostrar <select>'+
                        '<option value="10">10</option>'+
                        '<option value="20">20</option>'+
                        '<option value="30">30</option>'+
                        '<option value="40">40</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">All</option>'+
                        '</select> registros',
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Filtrar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Por favor espere - cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });

        }catch(e){
            console.error('Error: ' + e);
        }
    });
</script>
