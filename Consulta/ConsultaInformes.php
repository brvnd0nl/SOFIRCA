<?php
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>
<div class="container contenedor">
    <h2 class="text-center">Consulta Informes de Formacion</h2>
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
            <label for="LBX_sInforme">Informe</label>
            <select class="form-control" id="LBX_sInforme" name="Informe">
                <option value=""></option>
                <?php
                    include_once($UrlBase.'connection.php');
                    $database = new Connection();
                    $db = $database->open();
                    try{
                        $sql = 'SELECT If_Id, If_Nombre FROM informes';
                        foreach ($db->query($sql) as $row) {
                ?>
                            <option value="<?php echo($row['If_Id']); ?>"> <?php echo($row['If_Nombre']); ?></option>
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
            <label for="TXT_sAnio">Año</label>
            <input type="text" class="form-control" id="TXT_sAnio" name="Anio">
        </div>
        <div class="form-group">
            <label for="LBX_sMes">Mes</label>
            <select class="form-control" id="LBX_sMes" name="Mes">
                <option value=""></option>
                <option value="01">ENERO</option>
                <option value="02">FEBRERO</option>
                <option value="03">MARZO</option>
                <option value="04">ABRIL</option>
                <option value="05">MAYO</option>
                <option value="06">JUNIO</option>
                <option value="07">JULIO</option>
                <option value="08">AGOSTO</option>
                <option value="09">SEPTIEMBRE</option>
                <option value="10">OCTUBRE</option>
                <option value="11">NOVIEMBRE</option>
                <option value="12">DICIEMBRE</option>
            </select>
        </div>
        <div class="form-group">
            <label for="TXT_sNombreArchivo">Nombre del Archivo</label>
            <div class="input-group">				
                <input type="text" class="form-control" id="TXT_sBuscarNombreArchivo">
                <span class="input-group-btn">
					<button id="BTN_sBuscarNombreArchivo" class="btn btn-light" type="button">Buscar</button>
				</span>
			</div>
            
            <select class="form-control" id="LBX_sArchivos" name="NombreArchivo" hidden>
                <option value=""></option>
            </select>
        </div>
        
        <div class="text-center">
            <button  id="BTN_sConsultarInformes" name="ConsultarInformes" class="btn btn-primary mx-auto">Consultar</button>
        </div>
    </form>
    <br>
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Institucion</th>
            <th>Informe</th>
            <th>Año</th>
            <th>Mes</th>
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
                <center><h4 class="modal-title" id="myModalLabel">Editar Informe</h4></center>
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
                <center><h4 class="modal-title" id="myModalLabel">Borrar Informe</h4></center>
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
                url : '../modal/ModificarInforme.php', //Here you will fetch records
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
                url : '../modal/EliminarInforme.php', //Here you will fetch records
                data :  'Id='+ rowid, //Pass $id
                success : function(data){
                    $('#eliminar .contenidoModal').html(data);//Show fetched data from database
                }
            });
        });
    });

    function descarga(archivo) {
        document.location = archivo;
    }

    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sConsultarInformes').submit();
        }
    });
    $(document).on("click","#BTN_sConsultarInformes",function(event){
        try{
            event.preventDefault();
            var DatosInstitucion =  $("#LBX_sInstitucion").val();
            var DatosInforme =  $("#LBX_sInforme").val();
            var Año =  $("#TXT_sAnio").val();
            var Mes =  $("#LBX_sMes").val();
            if(DatosInstitucion == null || DatosInforme == null || Año == null || Mes == null ){
                return;
            }
            if (Año != "" && Año.length < 4){
                return;
            }
            $('#example').DataTable( {
                "bDeferRender": true,
                "sPaginationType": "full_numbers",
                "destroy": true,
                "ajax": {
                    "url": "../ajax/Eventos.php",
                    "type": "POST",
                    "data": {NombreEvento: 'RevisionInforme', Datos: {Institucion : DatosInstitucion, Informe : DatosInforme, Año : Año, Mes : Mes} }
                },
                "columns": [
                    { "data": "institucion" },
                    { "data": "informe" },
                    { "data": "año" },
                    { "data": "mes" },
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
