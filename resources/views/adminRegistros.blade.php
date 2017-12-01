@extends('master.dashboard') @section('title')

<title>Administrar registros</title>

@endsection @section('content')

<section class="tables">
	<div class="container-fluid">
		<div class="row">
			<div class="alignTables col-lg-12">
				<div class="card">
					<div class="card-close">
						<div class="dropdown">
							<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
								<i class="fa fa-ellipsis-v"></i>
							</button>
							<div aria-labelledby="closeCard" class="dropdown-menu has-shadow">
								<a href="#" class="dropdown-item remove">
									<i class="fa fa-times"></i>Close</a>
								<a href="#" class="dropdown-item edit">
									<i class="fa fa-gear"></i>Edit</a>
							</div>
						</div>
					</div>
					<div class="card-header ">
						<h3>Gestionar usuarios</h3>
					</div>
					<div style="overflow-x:auto;" class="card-body">
						<table class="tablaPermisos table table-striped table-hover">
							<thead>
								<tr>
									<th>Id</th>
									<th>Nombre</th>
									<th>Correo</th>
									<th>Departamento</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($usuarios as $usuario)
								<tr>
									<th scope="row">{{ $usuario->id }}</th>
									<td>{{ $usuario->nombres }}</td>
									<td>{{ $usuario->email }}</td>
									<td>
									  <div class="form-group row">
                         
				                          <div class="col-sm-9 select">
				                            <select name="account" class="form-control">
				                              <option>Ventas</option>
				                              <option>Contabilidad</option>
				                              <option>Sistemas</option>
				                              <option>Sub-Gerencia</option>
				                            </select>
				                          </div>
				                      </div>

									</td>
									<td>
										@if($usuario->verified == 1)
										<button type="button" class="btn btn-success disabled">Confirmar</button>
										<button type="button" class="paddingBotones btn btn-danger" onClick="manageUser({{$usuario->id}}, 0)">Rechazar</button>
										@else
										<button type="button" class="btn btn-success" onClick="manageUser({{$usuario->id}}, 1)">Confirmar</button>
										<button type="button" class="paddingBotones btn btn-danger disabled">Rechazar</button>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection @section('js')
<script>
	function manageUser(id, verified) {
		$.ajax({
			type: "POST",
			url: "/admin/usuarios/ajax-manage",
			data: {
				"_token": "{{csrf_token()}}",
				"id": id,
				"verified": verified
			},
			success: function (data) {
				window.location.reload()

			},
			dataType: JSON
		});
	}
</script>
@endsection