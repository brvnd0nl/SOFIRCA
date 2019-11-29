<?php 
session_start();
$_SESSION['Url'] = __FILE__;
$Institucion = $_SESSION['CodigoInstitucion'];
include('..\components\header.php');
?>
<div class="container contenedor">
<?php 
            
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
    <h2 class="text-center">Registrar Carga Academica</h2>
    <hr>
    <form action="..\RegistroBD\GuardarCargaAcademica.php" method ="POST">
        <div id="PasoN1">
            <div class="form-group">
                <label for="LBX_sAmbiente">Periodo Academico</label>
                <select class="form-control" id="LBX_sPeriodoAcademico" name="PeriodoAcademico" required>
                    <option value=""></option>
                    <?php
                    $database = new Connection();
                    $db = $database->open();
                    try {
                        $sql = "SELECT * FROM periodoacademico WHERE Pa_Estado  = '1'";
                        foreach ($db->query($sql) as $rowCBX) {
                                ?>
                                <option value="<?php echo($rowCBX['Pa_Id']); ?>"> <?php echo($rowCBX['Pa_Anio']." - ".$rowCBX['Pa_Nombre']); ?></option>
                                <?php
                        }
                    } catch (PDOException $e) {
                        $_SESSION['message'] = $e->getMessage();
                        echo($e->getMessage());
                        header('location: index.php');
                    }

                    $database->close();
                    ?>
                </select>
                <input type="hidden" id="HDN_sFechaDesdePeriodo" name="FechaDesdePeriodo">
                <input type="hidden" id="HDN_sFechaHastaPeriodo" name="FechaHastaPeriodo">
            </div>
            <div class="form-group">
                <label for="TXT_DFInicio">Fecha Inicio</label>
                <input type="date" class="form-control" name="FechaInicio" id="TXT_DFInicio" required>
            </div>
            <div class="form-group">
                <label for="LBX_dHHoraInicio">Hora Inicio</label>
<!--                <input type="time" max="23:59:00" min="07:00:00" class="form-control" name="HoraInicio" id="TXT_dHoraInicio" required>-->
                <div class="row">
                    <div class="col-1">
                        <select class="form-control" id="LBX_dHHoraInicio" name="HHInicio" required>
                            <option value=""></option>
                            <?php
                            $Hora = 0;
                            while ($Hora <= 23){
                                ?>
                                <option value="<?php echo sprintf("%02d",$Hora);?>"><?php echo sprintf("%02d",$Hora);?></option>
                                <?php
                                $Hora+=  1;
                            }
                            ?>
                        </select>
                    </div>
                    <h4>:</h4>
                    <div class="col-1">
                        <select class="form-control" id="LBX_dMMHoraInicio" name="MMInicio" required>
                            <?php
                            $Minutos = 0;
                            while ($Minutos <= 59){
                                ?>
                                <option value="<?php echo sprintf("%02d",$Minutos);?>"><?php echo sprintf("%02d",$Minutos);?></option>
                                <?php
                                $Minutos+=  1;
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="TXT_DFFin">Fecha Fin</label>
                <input type="date" class="form-control" name="FechaFin" id="TXT_DFFin" required>
            </div>
            <div class="form-group">
                <label for="LBX_dHHoraFin">Hora Final</label>
<!--                <input type="time" max="23:59:00" min="07:00:00" class="form-control" name="HoraFin" id="TXT_dHoraFin" required>-->
                <div class="row">
                    <div class="col-1">
                        <select class="form-control" id="LBX_dHHoraFin" name="HHFin" required>
                            <option value=""></option>
                            <?php
                            $Hora = 0;
                            while ($Hora <= 23){
                                ?>
                                <option value="<?php echo sprintf("%02d",$Hora);?>"><?php echo sprintf("%02d",$Hora);?></option>
                                <?php
                                $Hora+=  1;
                            }
                            ?>
                        </select>
                    </div>
                    <h4>:</h4>
                    <div class="col-1">
                        <select class="form-control" id="LBX_dMMHoraFin" name="MMFin" required>
                            <?php
                            $Minutos = 0;
                            while ($Minutos <= 59){
                                ?>
                                <option value="<?php echo sprintf("%02d",$Minutos);?>"><?php echo sprintf("%02d",$Minutos);?></option>
                                <?php
                                $Minutos+=  1;
                            }
                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="TXT_DFechaGrado">Dias</label>
                <div class="row" id="abc">
                    <div class="col">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="CHK_Lunes" name ="SemanaLunes" >
                            <label class="form-check-label" for="CHK_Lunes">Lunes</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="CHK_Martes" name ="SemanaMartes">
                            <label class="form-check-label" for="exampleCheck1">Martes</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="CHK_Miercoles" name ="SemanaMiercoles">
                            <label class="form-check-label" for="CHK_Miercoles">Miercoles</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="CHK_Jueves" name ="SemanaJueves">
                            <label class="form-check-label" for="CHK_Jueves">Jueves</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="CHK_Viernes" name ="SemanaViernes">
                            <label class="form-check-label" for="CHK_Viernes">Viernes</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="CHK_Sabado" name ="SemanaSabado">
                            <label class="form-check-label" for="CHK_Sabado">Sábado</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="LBX_sAmbiente">Ambiente</label>
                <select class="form-control" id="LBX_sAmbiente" name="Ambiente" required>
                    <option value=""></option>
                    <?php
                    $database = new Connection();
                    $db = $database->open();
                    try {
                        $sql = "SELECT * FROM ambientes WHERE Ab_SsCodConvenio  = '$Institucion'";
                        foreach ($db->query($sql) as $rowCBX) {
                            ?>
                            <option value="<?php echo($rowCBX['Ab_Id']); ?>"> <?php echo($rowCBX['Ab_Nombre']); ?></option>
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
                <label for="LBX_sInstructor">Instructor</label>
                <select class="form-control" id="LBX_sInstructor" name="Instructor" required>
                    <option value=""></option>
                    <?php
                    $database = new Connection();
                    $db = $database->open();
                    try {
                        $sql = "SELECT instructor.*, CONCAT(instructor.In_Apellidos, ' ', instructor.In_Nombres) as 'NombreCompleto' FROM instructor INNER JOIN contrato_instructor ON instructor.In_Id = contrato_instructor.Cn_CodInstructor WHERE In_SsCodConvenio  = '$Institucion' AND Cn_EstadoContrato = '1'";
                        foreach ($db->query($sql) as $rowCBX) {
                            ?>
                            <option value="<?php echo($rowCBX['In_Id']); ?>"> <?php echo($rowCBX['NombreCompleto']); ?></option>
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
            
            <input type="button" id="BTN_sValidarPasoN1" value="Continuar" class="btn btn-primary mx-auto text-center" onclick="validarPaso1()">
        </div>

        <div id="PasoN2" style="display: none">
            <div class="form-group">
                <label for="LBX_sFichaFormacion">Ficha</label>
                <select class="form-control" id="LBX_sFichaFormacion" name="FichaFormacion" required>
                    <option value=""></option>
                <?php
                    $database = new Connection();
                    $db = $database->open();
                    try {
                        $sql = "SELECT programas.Pg_Nombre, fichas.F_Id FROM fichas, programas WHERE	programas.Pg_Id=fichas.F_PgId";
                        foreach ($db->query($sql) as $rowCBX) {
                                ?>
                                <option value="<?php echo($rowCBX['F_Id']); ?>"> <?php echo($rowCBX['Pg_Nombre']."-".$rowCBX['F_Id']); ?></option>
                                <?php
                        }
                    } catch (PDOException $e) {
                        $_SESSION['message'] = $e->getMessage();
                        echo($e->getMessage());
                        header('location: index.php');
                    }

                    $database->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="LBX_sCompetenciaPrograma">Competencia</label>
                <select class="form-control" id="LBX_sCompetenciaPrograma" name="Competencia" required>
                    <option value=""></option>
                <?php
                    $database = new Connection();
                    $db = $database->open();
                    try {
                        $sql = "SELECT * FROM competencia_programa";
                        foreach ($db->query($sql) as $rowCBX) {
                                ?>
                                <option value="<?php echo($rowCBX['Cp_Id']); ?>"> <?php echo($rowCBX['Cp_NombreC']); ?></option>
                                <?php
                        }
                    } catch (PDOException $e) {
                        $_SESSION['message'] = $e->getMessage();
                        echo($e->getMessage());
                        header('location: index.php');
                    }

                    $database->close();
                    ?>
                </select>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="LBX_sDiaSemana">Dias de Semana</label>
                    <select multiple class="form-control" id="LBX_sDiaSemana">
                        <option value="L">LUNES</option>
                        <option value="M">MARTES</option>
                        <option value="W">MIERCOLES</option>
                        <option value="J">JUEVES</option>
                        <option value="V">VIERNES</option>
                        <option value="S">SABADO</option>
                    <option value="1">LUNES</option>
                        <option value="2">MARTES</option>
                        <option value="3">MIERCOLES</option>
                        <option value="4">JUEVES/option>
                        <option value="5">VIERNES</option>
                        <option value="6">SABADO</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="text-center">
                    <br>
                    <br>
                    <input type="button" class="btn btn-light" id="BTN_sIncluirDia" name="IncluirDia" value="Incluir">
                    <input type="button" class="btn btn-light" id="BTN_sExcluirDia" name="ExcluirDia" value="Excluir">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="LBX_sDiaSemanaAsignada">Dias Asignados</label>
                    <select multiple class="form-control" id="LBX_sDiaSemanaAsignada" name="DiasSemana">

                    </select>
                </div>
            </div>
        </div> -->
        <br>
        <div id="PasoN4" style="display: none" class="text-center">
            <button type="submit" id="BTN_sIngresarCargaA" name="IngresarCargaAcademica" class="btn btn-primary mx-auto" >Ingresar</button>
        </div>
    </form>
</div>
<?php include('..\components\footer.php'); ?>
<script>
    $( document ).ready(function() {
        $( "#MNU_RegistrarCargaAcademica" ).last().addClass( "Menuactive" );
    });
    $('body').keypress(function(e){
        if (e.keyCode == 13)
        {
            $('#BTN_sIngresarCargaA').submit();
        }
    });

    $(document).on("change","#LBX_sPeriodoAcademico",function(event){
        event.preventDefault();
        var Datos =  $(this).val();
        if(Datos === "" || Datos == null){
            return;
        }
        var jqxhr = $.post("../ajax/Eventos.php",{NombreEvento: 'ObtenerFechasPeriodo', Datos: Datos }, function(data){
            data.replace("\n","").replace("\r","");
            var Fechas =  data.replace("\r\n","").replace("\r","").replace("\n","").split('æ');
            var FechaIHTML = $("#HDN_sFechaDesdePeriodo");
            var FechaFHTML = $("#HDN_sFechaHastaPeriodo");
            //cmb.html(data);
            FechaIHTML.html(Fechas[0]);
            FechaIHTML.change();
            $("#HDN_sFechaDesdePeriodo").val(Fechas[0]);
            FechaFHTML.html(Fechas[1]);
            FechaFHTML.change();
            $("#HDN_sFechaHastaPeriodo").val(Fechas[1]);
            //cmb.change();
        })
            .fail(function (jqXHR1, textStatus, errorThrown) {
                console.error("The following error occurred: "+ textStatus + ' : ' +  jqXHR1.responseText + ' : ' + errorThrown );
                return;
            });
    });
    
    function validarPaso1() {
        var PeriodoAcademico = $("#LBX_sPeriodoAcademico").val();
        var FechaInicio = $("#TXT_DFInicio").val();
        var FechaFin = $("#TXT_DFFin").val();
        var HoraInicioHH = $("#LBX_dHHoraInicio").val();
        var HoraInicioMM = $("#LBX_dMMHoraInicio").val();
        var HoraFinHH = $("#LBX_dHHoraFin").val();
        var HoraFinMM = $("#LBX_dMMHoraFin").val();
        var Ambiente = $("#LBX_sAmbiente").val();
        var Instructor = $("#LBX_sInstructor").val();

        var SemanaLunes = $("#CHK_Lunes").prop('checked');
        var SemanaMartes = $("#CHK_Martes").prop('checked');
        var SemanaMiercoles = $("#CHK_Miercoles").prop('checked');
        var SemanaJueves = $("#CHK_Jueves").prop('checked');
        var SemanaViernes = $("#CHK_Viernes").prop('checked');
        var SemanaSabado = $("#CHK_Sabado").prop('checked');

        var FechaInicioPeriodo = $("#HDN_sFechaDesdePeriodo").val();
        var FechaFinalPeriodo = $("#HDN_sFechaHastaPeriodo").val();

        if (PeriodoAcademico == '' || FechaInicio == '' || FechaFin == ''
            || Ambiente == '' || Instructor ==''){
            alert('Debe llenar el formulario para continuar');
            return;
        }

        if(HoraInicioHH == '' || HoraInicioMM == '' ||
            HoraFinHH == '' || HoraFinMM == ''){
            alert('Debe ingresar una Hora Inicio y una Hora Fin');
            return;
        }

        if(HoraInicioHH > HoraFinHH ){
            alert('Las horas están mal diligenciadas');
            return;
        }

        if(FechaInicioPeriodo > FechaFinalPeriodo ){
            alert('Las fechas están mal diligenciadas');
            return;
        }


        if(SemanaLunes == false && SemanaMartes == false && SemanaMiercoles == false
            && SemanaJueves == false && SemanaViernes == false && SemanaSabado == false){
            alert('Debe seleccionar un dia de semana');
            return;
        }

        if(FechaInicioPeriodo > FechaInicio || FechaFinalPeriodo < FechaFin){
            alert('Las fechas no se encuentran en el rango del Periodo seleccionaro. \nFecha Inicio: ' + FechaInicioPeriodo + '\nFecha Fin: ' + FechaFinalPeriodo);
            return;
        }

        var HoraInicio = HoraInicioHH.concat(HoraInicioMM);
        var HoraFin = HoraFinHH.concat(HoraFinMM);

        $.ajax({
            type:'POST',
            url: '<?php echo $UrlBase ?>ValidacionHorarios.php',//aqui va tu direccion donde esta tu funcion php
            data: {Datos: {PeriodoAcademico : PeriodoAcademico, FechaInicio : FechaInicio, FechaFin : FechaFin, HoraInicio : HoraInicio, HoraFin : HoraFin,
                    Ambiente : Ambiente, Instructor : Instructor, SemanaLunes : SemanaLunes, SemanaMartes : SemanaMartes, SemanaMiercoles : SemanaMiercoles,
                    SemanaJueves : SemanaJueves, SemanaViernes : SemanaViernes, SemanaSabado : SemanaSabado}},//aqui tus datos
            success:function(data){
                //Obtengo la respuesta del PHP
                
				// alert(data);
				if(data != null && data != ""){
				    if(data == 0){
				        //Muestro  los campos faltantes
                        $('#PasoN2').removeAttr('style');
                        $('#PasoN4').removeAttr('style');
                        $('#BTN_sValidarPasoN1').css("display","none");
                        ocultarFormularioPrincipal();


                    }else if(data >= 1){
                        alert("El instructor cuenta con un horario que cruza con el horario que intenta ingresar\nPorfavor verifique nuevamente.")
                    }
                }
            },
            error:function(data){
                //En caso de Error, Entra Aqui
                alert("Se nos ha presento un problema tecnico, por favor contacte con el Administrador\n Error: " + data);
            }
        });
    }

    function ocultarFormularioPrincipal() {
        $('#LBX_sPeriodoAcademico').attr("disabled","");
        $('#TXT_DFInicio').attr("disabled","");
        $('#LBX_dHHoraInicio').attr("disabled","");
        $('#LBX_dMMHoraInicio').attr("disabled","");
        $('#TXT_DFFin').attr("disabled","");
        $('#LBX_dHHoraFin').attr("disabled","");
        $('#LBX_dMMHoraFin').attr("disabled","");
        $('#LBX_sInstructor').attr("disabled","");
        $('#LBX_sAmbiente').attr("disabled","");
        $('#CHK_Lunes').attr("disabled","");
        $('#CHK_Martes').attr("disabled","");
        $('#CHK_Miercoles').attr("disabled","");
        $('#CHK_Jueves').attr("disabled","");
        $('#CHK_Viernes').attr("disabled","");
        $('#CHK_Sabado').attr("disabled","");
    }
</script>
