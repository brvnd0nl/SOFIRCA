<?php
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>
<div class="container contenedor">
    <h2 class="text-center">Consulta Programa de Formacion</h2>
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
            <label for="LBX_sNomPrograma">Programa</label>
            <div class="input-group" id="BuscarPrograma">				
                <input type="text" class="form-control" id="TXT_sBuscarPrograma">
                <select class="form-control" id="LBX_sPrograma" name="Programa" hidden>
                    <option value=""></option>         
                </select>
                <span class="input-group-btn">
                    <button id="BTN_sBuscarPrograma" class="btn btn-light" type="button">Buscar</button>
                    <button id="BTN_sVolverABuscarPrograma" onclick="regresarBuscarPrograma();" class="btn btn-light" type="button" hidden>Volver a Buscar</button>
				</span>
			</div>
            
        </div>
        <div class="form-group">
            <label for="LBX_sCentroFormacion">Centro De Formacion</label>
            <select class="form-control" id="LBX_sCentroFormacion" name="CentroFormacion">
                <option value=""></option>
                <?php
                    include_once($UrlBase.'connection.php');
                    $database = new Connection();
                    $db = $database->open();
                    try{
                        $sql = 'SELECT 	Cf_Id, Cf_Nombre FROM centro_formacion';
                        foreach ($db->query($sql) as $row) {
                            ?>
                            <option value="<?php echo($row['Cf_Id']); ?>"> <?php echo($row['Cf_Nombre']); ?></option>
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
        
        <div class="text-center">
            <button  id="BTN_sConsultarPrograma" name="ConsultarPrograma" class="btn btn-primary mx-auto">Consultar</button>
        </div>
    </form>
    <br>
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Nombre del programa</th>
            <th>Centro de formación</th>
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
                <center><h4 class="modal-title" id="myModalLabel">Editar Programa</h4></center>
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
                <center><h4 class="modal-title" id="myModalLabel">Eliminar Programa</h4></center>
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
                url : '../modal/ModificarPrograma.php',
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
                url : '../modal/EliminarPrograma.php', //Here you will fetch records
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
            $('#BTN_sConsultarPrograma').submit();
        }
    });
    $(document).on("click","#BTN_sConsultarPrograma",function(event){
        try{
            event.preventDefault();
            var DatosPrograma =  $("#LBX_sPrograma").val();
            var DatosCCF =  $("#LBX_sCentroFormacion").val();
            if(DatosCCF == null || DatosPrograma == null){
                return;
            }
            $('#example').DataTable( {
                "bDeferRender": true,
                "sPaginationType": "full_numbers",
                "destroy": true,
                "ajax": {
                    "url": "../ajax/Eventos.php",
                    "type": "POST",
                    "data": {NombreEvento: 'RevisionPrograma', Datos: {Programa : DatosPrograma, CentroFormacion : DatosCCF} }
                },
                "columns": [
                    { "data": "programa" },
                    { "data": "centroformacion" },
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
