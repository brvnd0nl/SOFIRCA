<?php
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>
<div class="container contenedor">
    <h2 class="text-center">Consulta IES</h2>
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
                <input type="text" class="form-control" id="TXT_sBuscarInstitucion" required>
                <select class="form-control" id="LBX_sInstitucion" name="Institucion" hidden>
                </select>
                <span class="input-group-btn">
                    <button id="BTN_sBuscarInstitucion" class="btn btn-light" type="button">Buscar</button>
                    <button id="BTN_sVolverABuscarInstitucion" onclick="regresarBuscarInstitucion();" class="btn btn-light" type="button" hidden>Volver a Buscar</button>
				</span>
			</div>
            
        </div>
        
        <div class="text-center">
            <button  id="BTN_sConsultarIES" name="ConsultarIES" class="btn btn-primary mx-auto">Consultar</button>
        </div>
    </form>
    <br>

    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Direccion</th>
            <th>Nombre Coordinador</th>
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
                <center><h4 class="modal-title" id="myModalLabel">Editar IES</h4></center>
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
                <center><h4 class="modal-title" id="myModalLabel">Borrar IES</h4></center>
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
                url : '../modal/ModificarIES.php', //Here you will fetch records
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
                url : '../modal/EliminarIES.php', //Here you will fetch records
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
            $('#BTN_sConsultarIES').submit();
        }
    });

    $(document).on("click","#BTN_sConsultarIES",function(event){
        try{
            event.preventDefault();
            var Datos =  $("#LBX_sInstitucion").val();
            if(Datos === "" || Datos == null){
                return;
            }
            $('#example').DataTable( {
                "bDeferRender": true,
                "sPaginationType": "full_numbers",
                "destroy": true,
                "ajax": {
                    "url": "../ajax/Eventos.php",
                    "type": "POST",
                    "data": {NombreEvento: 'RevisionIES', Datos: Datos }
                },
                "columns": [
                    { "data": "direccion" },
                    { "data": "nombrecoordinador" },
                    { "data": "telefono" },
                    { "data": "correoelectronico" },
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
                /*,"initComplete": function(settings, json) {
                    $.ajax({
                        type:'POST', //aqui puede ser igual get
                        url: '../ajax/RetornarModal.php',//aqui va tu direccion donde esta tu funcion php
                        data: {NombreEvento: 'RevisionIES', Datos: Datos },//aqui tus datos
                        success:function(data){
                            //lo que devuelve tu archivo mifuncion.php
                            $("#modal").append(data);
                        },
                        error:function(data){
                            //lo que devuelve si falla tu archivo mifuncion.php
                            alert('no lo hizo ' + data);

                        }
                    });
                }*/
            });

        }catch(e){
            console.error('Error: ' + e);
        }
    });
</script>
