<?php 
session_start();
$_SESSION['Url'] = __FILE__;
include('..\components\header.php');
?>

<div class="container contenedor">
    <h2 class="text-center">Consultar Carga Academica</h2>
    <hr>
    <form>
        <div class="form-group">
            <label for="LBX_sAmbiente">Ambiente</label>
            <select class="form-control" id="LBX_sAmbiente" name="Ambiente" required>
                <option value=""></option>     
            </select>
        </div>
        <div class="form-group">
            <label for="LBX_sInstructor">Instructor</label>
            <select class="form-control" id="LBX_sInstructor" name="Instructor" required>
                <option value=""></option>     
            </select>
        </div>
        <div class="form-group">
            <label for="LBX_sFichaFormacion">Ficha</label>
            <select class="form-control" id="LBX_sFichaFormacion" name="FichaFormacion" required>
                <option value=""></option>     
            </select>
        </div>
        <div class="form-group">
            <label for="LBX_sCompetenciaPrograma">Competencia</label>
            <select class="form-control" id="LBX_sCompetenciaPrograma" name="Competencia" required>
                <option value=""></option>     
            </select>
        </div>        
        <div class="form-group">
            <label for="TXT_DFInicio">Fecha Inicio</label>
            <input type="date" class="form-control" name="FechaInicio" id="TXT_DFInicio" required>
        </div>
        <div class="form-group">
            <label for="TXT_dHoraInicio">Hora Inicio</label>
            <input type="time" max="23:59:00" min="07:00:00" class="form-control" name="HoraInicio" id="TXT_dHoraInicio" required>
        </div>
        <div class="form-group">
            <label for="TXT_DFFin">Fecha Fin</label>
            <input type="date" class="form-control" name="FechaFin" id="TXT_DFFin" required>
        </div>
        <div class="form-group">
            <label for="TXT_dHoraFin">Hora Final</label>
            <input type="time" max="23:59:00" min="07:00:00" class="form-control" name="HoraFin" id="TXT_dHoraFin" required>
        </div>
        <div class="form-group">
            <label for="TXT_DFechaGrado">Dias</label>
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="CHK_Lunes">
                        <label class="form-check-label" for="CHK_Lunes">Lunes</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="CHK_Martes">
                        <label class="form-check-label" for="exampleCheck1">Martes</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="CHK_Miercoles">
                        <label class="form-check-label" for="CHK_Miercoles">Miercoles</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="CHK_Jueves">
                        <label class="form-check-label" for="CHK_Jueves">Jueves</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="CHK_Viernes">
                        <label class="form-check-label" for="CHK_Viernes">Viernes</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="CHK_Sabado">
                        <label class="form-check-label" for="CHK_Sabado">Sábado</label>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="text-center">
            <button type="submit" id="BTN_sConsultarCargaA" name="ConsultarCargaAcademica" class="btn btn-primary mx-auto">Consultar</button>
        </div>        
    </form>
    <hr>
<table class="table table-borderless table-hover" style="text-align: center">
        <thead>
            <tr>
                <th>
                    Ambiente
                </th>
                <th>
                    Instructor
                </th>
                <th>
                    Ficha
                </th>
                <th>
                	Competencia
                </th>
                <th>
                	Fecha inicio
                </th>
                <th>
                	Fecha fin
                </th>
                <th>
                	Hora Final
                </th>
                <th>
                	Dia
                </th>

                <th colspan="2">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                    if ($NivelSeguridad == "1"){
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search"></span></a>
                        <a class="btn btn-light"><span class="icon-bin"></span></a></td>
                <?php
                    }else{
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search" disabled></span></a>
                        <a class="btn btn-light"><span class="icon-bin" disabled></span></a></td>
                <?php
                    }
                ?>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                    if ($NivelSeguridad == "1"){
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search"></span></a>
                        <a class="btn btn-light"><span class="icon-bin"></span></a></td>
                <?php
                    }else{
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search" disabled></span></a>
                        <a class="btn btn-light"><span class="icon-bin" disabled></span></a></td>
                <?php
                    }
                ?>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                    if ($NivelSeguridad == "1"){
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search"></span></a>
                        <a class="btn btn-light"><span class="icon-bin"></span></a></td>
                <?php
                    }else{
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search" disabled></span></a>
                        <a class="btn btn-light"><span class="icon-bin" disabled></span></a></td>
                <?php
                    }
                ?>
            </tr>
            <tr>
              <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                    if ($NivelSeguridad == "1"){
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search"></span></a>
                        <a class="btn btn-light"><span class="icon-bin"></span></a></td>
                <?php
                    }else{
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search" disabled></span></a>
                        <a class="btn btn-light"><span class="icon-bin" disabled></span></a></td>
                <?php
                    }
                ?>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                    if ($NivelSeguridad == "1"){
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search"></span></a>
                        <a class="btn btn-light"><span class="icon-bin"></span></a></td>
                <?php
                    }else{
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search" disabled></span></a>
                        <a class="btn btn-light"><span class="icon-bin" disabled></span></a></td>
                <?php
                    }
                ?>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                    if ($NivelSeguridad == "1"){
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search"></span></a>
                        <a class="btn btn-light"><span class="icon-bin"></span></a></td>
                <?php
                    }else{
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search" disabled></span></a>
                        <a class="btn btn-light"><span class="icon-bin" disabled></span></a></td>
                <?php
                    }
                ?>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                    if ($NivelSeguridad == "1"){
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search"></span></a>
                        <a class="btn btn-light"><span class="icon-bin"></span></a></td>
                <?php
                    }else{
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search" disabled></span></a>
                        <a class="btn btn-light"><span class="icon-bin" disabled></span></a></td>
                <?php
                    }
                ?>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                    if ($NivelSeguridad == "1"){
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search"></span></a>
                        <a class="btn btn-light"><span class="icon-bin"></span></a></td>
                <?php
                    }else{
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search" disabled></span></a>
                        <a class="btn btn-light"><span class="icon-bin" disabled></span></a></td>
                <?php
                    }
                ?>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                    if ($NivelSeguridad == "1"){
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search"></span></a>
                        <a class="btn btn-light"><span class="icon-bin"></span></a></td>
                <?php
                    }else{
                ?>
                        <td><a class="btn btn-light" href="#addnew" data-toggle="modal"><span class="icon-search" disabled></span></a>
                        <a class="btn btn-light"><span class="icon-bin" disabled></span></a></td>
                <?php
                    }
                ?>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>

<?php include($UrlBase.'modal\ModificarCargaAcademica.php'); ?>

<?php include('..\components\footer.php'); ?>
