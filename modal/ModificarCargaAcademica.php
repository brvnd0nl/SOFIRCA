<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Modificar Carga Academica</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
                
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Ambiente:</label>
					</div>
					<div class="col-sm-10">
                        <select class="form-control" id="LBX_sAmbiente" name="Ambiente">
                            <option value=""></option>
                        </select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Instructor:</label>
					</div>
					<div class="col-sm-10">
						<select class="form-control" id="LBX_sAmbiente" name="Ambiente">
                            <option value=""></option>
                        </select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Ficha:</label>
					</div>
					<div class="col-sm-10">
						<select class="form-control" id="LBX_sFicha" name="Ficha">
                            <option value=""></option>
                        </select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:static; top:7px;">Competencia:</label>
					</div>
					<div class="col-sm-10">
						<select class="form-control" id="LBX_sCompetencia" name="Competencia">
                            <option value=""></option>
                        </select>					
                    </div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Fecha Inicio:</label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="FechaInicio">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Hora Inicio:</label>
					</div>
					<div class="col-sm-10">
						<input type="time" class="form-control" name="Hora Inicio">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Fecha Fin:</label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="FechaFin">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Hora Final:</label>
					</div>
					<div class="col-sm-10">
						<input type="time" class="form-control" name="HoraFin">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <button type="submit" name="MoficarIES" class="btn btn-primary"><span class="fa fa-save"></span> Actualizar</a>
			</form>
            </div>

        </div>
    </div>
</div>