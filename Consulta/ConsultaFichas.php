<?php 
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>

<div class="container contenedor">
    <h2 class="text-center">Consultar Fichas de Caracterizacion</h2>
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
            <label for="TXT_sNumFicha">Numero de la Ficha</label>
            <input type="text" class="form-control" name="NumFicha" id="TXT_sNumFicha" required>
        </div>
        <div class="form-group">
            <label for="LBX_sConvenios">Convenio</label>
            <select class="form-control" id="LBX_sConvenios" name="Convenios" required>
                <option value=""></option>
                <?php
                $database = new Connection();
                $db = $database->open();
                try {
                    $sql = "SELECT Cv_Id, CONCAT(Bc_NombreInstitucion, ' MARCO ', Cv_ConvenioMarco, ' DERIVADO ', Cv_ConvenioDerivado) AS Convenio FROM banco_ies INNER JOIN convenios ON banco_ies.Bc_Id = convenios.Cv_IdInstitucion WHERE convenios.Cv_EstadoConvenio = '1'  ";
                    foreach ($db->query($sql) as $rowCBX) {
                        ?>
                        <option value="<?php echo($rowCBX['Cv_Id']); ?>"> <?php echo($rowCBX['Convenio']); ?></option>
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
            <label for="LBX_sProgramaFormacion">Programa de Formación</label>
            <select class="form-control" id="LBX_sProgramaFormacion" name="ProgramaFormacion" required>
                <option value=""></option>
                <?php
                $database = new Connection();
                $db = $database->open();
                try {
                    $sql = "SELECT * FROM programas";
                    foreach ($db->query($sql) as $rowCBX) {
                        ?>
                        <option value="<?php echo($rowCBX['Pg_Id']); ?>"> <?php echo($rowCBX['Pg_Nombre']); ?></option>
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
            <label for="TXT_sFInicio">Fecha Inicio</label>
            <input type="date" class="form-control" name="FechaInicio" id="TXT_sFInicio" required>
        </div>
        <div class="form-group">
            <label for="TXT_sFFin">Fecha Fin</label>
            <input type="date" class="form-control" name="FechaFin" id="TXT_sFFin" required>
        </div>
        <div class="text-center">
            <button type="submit" id="BTN_sConsultarFicha" name="ConsultarFicha" class="btn btn-primary mx-auto">Consultar</button>
        </div>        
    </form>
    <hr>
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Número de Ficha</th>
            <th>Número de Convenio</th>
            <th>Programa de Formación</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
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
                    <center><h4 class="modal-title" id="myModalLabel">Editar Ficha</h4></center>
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
                    <center><h4 class="modal-title" id="myModalLabel">Eliminar Ficha</h4></center>
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
                url : '../modal/ModificarFichas.php',
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
                url : '../modal/EliminarFicha.php', //Here you will fetch records
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
            $('#BTN_sIConsultarFicha').submit();
        }
    });
    $(document).on("click","#BTN_sConsultarFicha",function(event){
        try{
            event.preventDefault();
            var DatosFicha =  $("#TXT_sNumFicha").val();
            var DatosConvenio =  $("#LBX_sConvenios").val();
            var DatosPrograma =  $("#LBX_sProgramaFormacion").val();
            var DatosFechaInicio =  $("#TXT_sFInicio").val();
            var DatosFechaFin =  $("#TXT_sFFin").val();
            if(DatosFicha == null || DatosConvenio == null || DatosPrograma == null || DatosFechaInicio == null || DatosFechaFin == null ){
                return;
            }
            $('#example').DataTable( {
                "bDeferRender": true,
                "sPaginationType": "full_numbers",
                "destroy": true,
                "ajax": {
                    "url": "../ajax/Eventos.php",
                    "type": "POST",
                    "data": {NombreEvento: 'RevisionFicha', Datos: {NroFicha : DatosFicha, Convenio : DatosConvenio, Programa : DatosPrograma, FInicio : DatosFechaInicio, FFin : DatosFechaFin} }
                },
                "columns": [
                    { "data": "numeroficha" },
                    { "data": "convenio" },
                    { "data": "programa" },
                    { "data": "fechainicio" },
                    { "data": "fechafin" },
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
