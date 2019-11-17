<?php
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>
<div class="container contenedor">
    <h2 class="text-center">Consulta Convenio</h2>
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
            
        </div>
        <div class="form-group">
            <label for="TXT_sNumeroConvenioMarco">Numero de Convenio Marco</label>
            <input type="text" class="form-control" id="TXT_sNumeroConvenioMarco" name="NumeroConvenioMarco">
        </div>
        <div class="form-group">
            <label for="TXT_sNumeroConvenioDerivado">Numero de Convenio Derivado</label>
            <input type="text" class="form-control" id="TXT_sNumeroConvenioDerivado" name="NumeroConvenioDerivado">
        </div>
        
        <div class="text-center">
            <button  id="BTN_sConsultarConvenio" name="ConsultarConvenio" class="btn btn-primary mx-auto">Consultar</button>
        </div>
    </form>
    <br>
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Institucion</th>
            <th>N° Convenio Marco</th>
            <th>N° Convenio Derivado</th>
            <th>Estado</th>
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
                <center><h4 class="modal-title" id="myModalLabel">Editar Convenio</h4></center>
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
                <center><h4 class="modal-title" id="myModalLabel">Borrar Convenio</h4></center>
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
                url : '../modal/ModificarConvenio.php', //Here you will fetch records
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
                url : '../modal/EliminarConvenio.php', //Here you will fetch records
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
            $('#BTN_sConsultarConvenio').submit();
        }
    });
    $(document).on("click","#BTN_sConsultarConvenio",function(event){
        try{
            event.preventDefault();
            var DatosInstitucion =  $("#LBX_sInstitucion").val();
            var DatosConvenioMarco = $("#TXT_sNumeroConvenioMarco").val();
            var DatosConvenioDerivado = $("#TXT_sNumeroConvenioDerivado").val();
            if(DatosInstitucion == null || DatosConvenioDerivado == null || DatosConvenioMarco == null){
                return;
            }
            $('#example').DataTable( {
                "bDeferRender": true,
                "sPaginationType": "full_numbers",
                "destroy": true,
                "ajax": {
                    "url": "../ajax/Eventos.php",
                    "type": "POST",
                    "data": {NombreEvento: 'RevisionConvenio', Datos: {Institucion : DatosInstitucion, NroConvenioMarco : DatosConvenioMarco, NroConvenioDerivado : DatosConvenioDerivado} }
                },
                "columns": [
                    { "data": "institucion" },
                    { "data": "nroconveniomarco" },
                    { "data": "nroconvenioderivado" },
                    { "data": "estado" },
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
