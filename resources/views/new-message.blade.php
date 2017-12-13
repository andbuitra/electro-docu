<div class="modal-frame">
	<div class="modalI">
		<div class="modal-inset">
			<div class="button close">
				<i class="fa fa-close"></i>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" action="/enviar" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Titulo</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="titulo" required>
						</div>
					</div>


					<div class="line"></div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Notas</label>
						<div class="col-sm-9">
							<input type="section" class="form-control" name="notas" required>
						</div>
					</div>
					<div class="line"></div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Departamento Receptor</label>
						<div class="col-sm-9">
							<select name="departamento-receptor" id="depts-select">
								@foreach ($departamentos as $departamento)
								<option onClick"getUsersOnDepartment({{$departamento->id}})">{{ $departamento->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Usuario Receptor</label>
						<div class="col-sm-9">
							<select name="usuario-receptor" id="user-receptor">
								
							</select>
						</div>
					</div>
					<div class="line"></div>
					<div class="form-group row">
						<label class="col-sm-3 form-control-label">Documento</label>
						<div class="col-sm-9">
							<input type="file" class="form-control" name="documento">
						</div>
					</div>


					<div class="line"></div>
					<div class="formPadding form-group row">
						<button type="submit" class="btn btn-primary">Enviar</button>
						<button type="submit" onclick="" class="buttonPadding btn btn-secondary">Cancelar</button>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>