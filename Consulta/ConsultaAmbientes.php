<?php
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>

<div class="container contenedor">
    <h2 class="text-center">Consultar Ambientes</h2>
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
            <label for="TXT_sNombreAmbiente">Nombre del Ambiente</label>
            <input type="text" class="form-control" name="NombreAmbiente" id="TXT_sNombreAmbiente" required>
        </div>
        <div class="form-group">
            <label for="TXT_sUbicacionAmbiente">Ubicación del Ambiente</label>
            <input type="text" class="form-control" name="UbicacionAmbiente" id="TXT_sUbicacionAmbiente" required>
        </div>
<!--        <div class="form-group">
            <label for="LBX_sInstitucion">Institucion</label>
            <div class="input-group" id="BuscarInstitucion">
                <input type="text" class="form-control" id="TXT_sBuscarInstitucion">
                <select class="form-control" id="LBX_sInstitucion" name="Institucion" hidden>
                    <option value=""></option>
                </select>
                <span class="input-group-btn">
                    <button id="BTN_sBuscarInstitucion" onclick="BuscarInstitucion();" class="btn btn-light" type="button">Buscar</button>
                    <button id="BTN_sVolverABuscarInstitucion" onclick="regresarBuscarInstitucion();" class="btn btn-light" type="button" hidden>Volver a Buscar</button>
				</span>
            </div>

        </div>-->
        <div class="text-center">
            <button type="submit" id="BTN_sConsultarAmbiente" name="ConsultarAmbiente" class="btn btn-primary mx-auto">Consultar</button>
        </div>        
    </form>
    <hr>

    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Nombre del Ambiente</th>
            <th>Ubicacion del Ambiente</th>
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
                    <center><h4 class="modal-title" id="myModalLabel">Editar Ambiente</h4></center>
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
                    <center><h4 class="modal-title" id="myModalLabel">Eliminar Ambiente</h4></center>
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
                url : '../modal/ModificarAmbientes.php', //Here you will fetch records
                data :  'Id='+ rowid, //Pass $id
                success : function(data){
                    $('#editar .contenidoModal').html(data);//Show fetched data from database
                }
            });
        });

        $('#eliminar').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : '../modal/EliminarAmbiente.php', //Here you will fetch records
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
            $('#BTN_sConsultarAmbiente').submit();
        }
    });
    $(document).on("click","#BTN_sConsultarAmbiente",function(event){
        try{
            event.preventDefault();
            var DatosAmbiente =  $("#TXT_sNombreAmbiente").val().toUpperCase();
            var DatosUbiAmbiente =  $("#TXT_sUbicacionAmbiente").val().toUpperCase();
            if(DatosAmbiente == null || DatosUbiAmbiente == null){
                return;
            }
            $('#example').DataTable( {
                "bDeferRender": true,
                "sPaginationType": "full_numbers",
                "destroy": true,
                "ajax": {
                    "url": "../ajax/Eventos.php",
                    "type": "POST",
                    "data": {NombreEvento: 'RevisionAmbiente', Datos: {Ambiente : DatosAmbiente, UbicaAmbiente : DatosUbiAmbiente} }
                },
                "columns": [
                    { "data": "nombreambiente" },
                    { "data": "ubicacionambiente" },
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
