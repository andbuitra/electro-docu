@extends('master.dashboard') @section('title')

<title>Administrar permisos</title>

@endsection @section('content')

<section class="tables">
	<div class="container-fluid">
		<div class="row">
			<div class="alignTables col-lg-12">
				<div class="card">

					<div class="card-header ">
						<h3 align="center">Gestionar usuarios</h3>
					</div>
					<div style="overflow-x:auto;" class="card-body">
						<table class="tablaPermisos table table-striped table-hover">
							<thead>
								<tr>
									<th rowspan="2" colspan="2" width="400px">Empleado</th>
									<th colspan="5">Permisos</th>
								</tr>
								<tr>
									<th colspan="2">Enviar</th>
									<th colspan="3">Editar</th>

								</tr>
								<tr>
									<th>Nombre</th>
									<th>Cedula</th>
									<th>Externo</th>
									<th>Interno</th>
									<th>Nivel 1</th>
									<th>Nivel 2</th>
									<th>Nivel 3</th>
								</tr>


							</thead>
							<tbody>
								@foreach ($usuarios as $usuario)
								<tr class="article-loop">

									<td>{{ $usuario->nombres }}</td>
									<td>{{ $usuario->cedula }}</td>
									<td>
										<input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
										<label for="styled-checkbox-1"></label>
									</td>
									<td>
										<input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value2">
										<label for="styled-checkbox-2">Ventas</label>
										<br>
										<input class="styled-checkbox" id="styled-checkbox-3" type="checkbox" value="value3">
										<label for="styled-checkbox-3">Contabilidad</label>
										<br>
										<input class="styled-checkbox" id="styled-checkbox-4" type="checkbox" value="value4">
										<label for="styled-checkbox-4">Gerencia</label>
										<br>
										<input class="styled-checkbox" id="styled-checkbox-5" type="checkbox" value="value5">
										<label for="styled-checkbox-5">Sub-Gerencia</label>
									</td>
									<td>
										<input class="styled-checkbox" id="styled-checkbox-6" type="checkbox" value="value6">
										<label for="styled-checkbox-6"></label>
									</td>
									<td>
										<input class="styled-checkbox" id="styled-checkbox-7" type="checkbox" value="value7">
										<label for="styled-checkbox-7"></label>
									</td>
									<td>
										<input class="styled-checkbox" id="styled-checkbox-8" type="checkbox" value="value8">
										<label for="styled-checkbox-8"></label>
									</td>

								</tr>
								@endforeach
							</tbody>
							<<<<<<< HEAD=======>>>>>>> d4e52f9a213cec30cc03152f5153b0441db72be1
						</table>
						<div class="alignButtons">
							<button type="button" class="btn btn-success">Guardar</button>
							<button type="button" class="paddingBotones btn btn-danger">Cancelar</button>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</section>

@endsection @section('js')
<script>
	function manageUser(id, verified){
    $.ajax({
      type: "POST",
      url: "/admin/usuarios/ajax-manage",
      data: {
				"_token": "{{csrf_token()}}",
        "id": id,
        "verified": verified
      },
			success: function(data){
				if(data.success == true){
					window.location.replace('/admin/usuarios');
				}

			},
      dataType: JSON
    });
  }

</script>
@endsection