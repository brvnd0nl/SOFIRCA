<?php
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>
<div class="container contenedor">
    <h2 class="text-center">Consultar Instructor</h2>
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
        <!--<div class="form-group">
            <label for="LBX_sTipoDocumento">Tipo de Documento</label>
            <select class="form-control" id="LBX_sTipoDocumento" name="TipoDocumento" required>
                <option value=""></option>
                <option value="TI">Tarjeta de Identidad</option>
                <option value="CC">Cédula de Ciudadania</option> 
                <option value="CE">Cédula Extranjería</option> 
                <option value="PA">Pasaporte</option>          
            </select>
        </div>-->
        <div class="form-group">
            <label for="TXT_sNumIdentificacion">Número de Identificación</label>
            <input type="text" class="form-control" name="NumeroIdentificacion" id="TXT_sNumIdentificacion" required>
        </div>
        <div class="form-group">
            <label for="TXT_sNombre">Nombre Completo</label>
            <input type="text" class="form-control" name="Nombre" id="TXT_sNombres" required>
        </div>
        <!--<div class="form-group">
            <label for="TXT_sApellido">Apellidos</label>
            <input type="text" class="form-control" name="Apellido" id="TXT_sApellido" required>
        </div>-->
        <!--<div class="form-group">
            <label for="TXT_sTelefono">Telefono</label>
            <input type="text" class="form-control" name="Telefono" id="TXT_sTelefono" required>
        </div>-->
        <div class="form-group">
            <label for="TXT_sEstudiosPregrado">Estudios Pregrado</label>
            <input type="text" class="form-control" name="EstudiosPregrado" id="TXT_sEstudiosPregrado" required>
        </div>
        <div class="form-group">
            <label for="TXT_sNombreUniversidad">Nombre Universidad</label>
            <input type="text" class="form-control" name="NombreUniversidad" id="TXT_sNombreUniversidad" required>
        </div>
        <!--<div class="form-group">
            <label for="TXT_DFechaGrado">Fecha Grado</label>
            <input type="date" class="form-control" name="FechaGrado" id="TXT_DFechaGrado" required>
        </div> -->
        <div class="text-center">
            <button type="submit" id="BTN_sConsultarInstructor" name="ConsultarInstructor" class="btn btn-primary mx-auto">Consultar</button>
        </div>        
    </form>
    <hr>
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Numero de Indentificacion</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Estudios Pregrado</th>
            <th>Nombre Universidad</th>
            <th>Fecha Grado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>


    <!-- Editar -->
    <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Editar Instructor</h4></center>
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
                    <center><h4 class="modal-title" id="myModalLabel">Eliminar Instructor</h4></center>
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
                url : '../modal/ModificarInstructor.php',
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
                url : '../modal/EliminarInstructor.php', //Here you will fetch records
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
            $('#BTN_sConsultarInstructor').submit();
        }
    });
    $(document).on("click","#BTN_sConsultarInstructor",function(event){
        try{
            event.preventDefault();
            var DatosIdentificacion =  $("#TXT_sNumIdentificacion").val();
            var DatosNombre =  $("#TXT_sNombres").val().toUpperCase();
            var DatosEstudio =  $("#TXT_sEstudiosPregrado").val().toUpperCase();
            var DatosUniversidad =  $("#TXT_sNombreUniversidad").val().toUpperCase();
            if(DatosIdentificacion == null || DatosNombre == null || DatosEstudio == null || DatosUniversidad == null){
                return;
            }
            $('#example').DataTable( {
                "bDeferRender": true,
                "sPaginationType": "full_numbers",
                "destroy": true,
                "ajax": {
                    "url": "../ajax/Eventos.php",
                    "type": "POST",
                    "data": {NombreEvento: 'RevisionInstructor', Datos: {NroIdentificacion : DatosIdentificacion, Nombre : DatosNombre, Estudios : DatosEstudio, Universidad : DatosUniversidad} }
                },
                "columns": [
                    { "data": "nrodocumento" },
                    { "data": "nombre" },
                    { "data": "apellido" },
                    { "data": "telefono" },
                    { "data": "estudios" },
                    { "data": "universidad" },
                    { "data": "fechagrado" },
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
