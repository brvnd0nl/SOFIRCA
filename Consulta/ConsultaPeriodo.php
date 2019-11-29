<?php
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>
<div class="container contenedor">
    <h2 class="text-center">Consulta Periodo Academico</h2>
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
            <label for="LBX_sInstitucion">Año Academico</label>
            <div class="input-group" id="BuscarInstitucion">				
                <input type="text" class="form-control col-2" placeholder="Año" id="TXT_sBuscarInstitucion">
                <span class="input-group-btn">
                    </span>
                    
                        <button  id="BTN_sConsultarIES" name="ConsultarIES" class="btn btn-primary mx-3 ">Consultar</button>
                    
			</div>
            



        </div>
        
    </form>
    <br>

    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Trimestre</th>
            <th>Fecha de inicio</th>
            <th>Fecha Fin</th>
            <th>Año Academico</th>
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
                <center><h4 class="modal-title" id="myModalLabel">Editar Periodo</h4></center>
              
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
                <center><h4 class="modal-title" id="myModalLabel">Borrar Periodo</h4></center>
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
                url : '../modal/ModificarPeriodo.php', //Here you will fetch records
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
                url : '../modal/EliminarPeriodo.php', //Here you will fetch records
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
            var Datos =  $("#TXT_sBuscarInstitucion").val();
            if(Datos == "" || Datos == null){
                Datos="";
            }
            
            

            $('#example').DataTable( {
                "bDeferRender": true,
                "sPaginationType": "full_numbers",
                "destroy": true,
                "ajax": {
                    "url": "../ajax/Eventos.php",
                    "type": "POST",
                    "data": {NombreEvento: 'RevisionPeriodo', Datos: Datos }
                },
                "columns": [
                    { "data": "trimestre" },
                    { "data": "fechainicio" },
                    { "data": "fechafinal" },
                    { "data": "anio" },
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
