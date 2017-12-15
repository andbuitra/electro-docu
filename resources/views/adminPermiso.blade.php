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
									<th rowspan="1" colspan="1" >Departamento</th>
									<th colspan="6">Enviar y editar</th>
								</tr>
								
								<tr>
									<th>Nombre</th>									
									<th>Externo</th>
									<th>General</th>
									<th>Ventas</th>
									<th>Contabilidad</th>
									<th>Sistemas</th>
									<th>Sub-gerencia</th>
								</tr>


							</thead>
							<tbody>
								@foreach ($usuarios as $usuario)
								<tr class="article-loop">

									<td>{{ $usuario->nombres }}</td>
									
									<td>
										<input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
										<label for="styled-checkbox-1"></label>
									</td>
									<td>
										<input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value2">
										<label for="styled-checkbox-2"></label>
										
									</td>
									<td>
										<input class="styled-checkbox" id="styled-checkbox-3" type="checkbox" value="value3">
										<label for="styled-checkbox-3"></label>
									</td>
									<td>
										<input class="styled-checkbox" id="styled-checkbox-4" type="checkbox" value="value4">
										<label for="styled-checkbox-4"></label>
									</td>
									<td>
										<input class="styled-checkbox" id="styled-checkbox-5" type="checkbox" value="value5">
										<label for="styled-checkbox-5"></label>
									</td>
									<td>
										<input class="styled-checkbox" id="styled-checkbox-6" type="checkbox" value="value6">
										<label for="styled-checkbox-6"></label>
									</td>

								</tr>
								@endforeach
							</tbody>							
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
    });
  }

</script>
@endsection