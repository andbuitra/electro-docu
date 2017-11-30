@extends('master.dashboard') @section('title')

<title>Administrar permisos</title>

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
							    <tr>

							      <td>brenda</td>
							      <td>1093780786</td>
							      <td >
                              		<input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
    								<label for="styled-checkbox-1"></label>
                              	  </td>
							      <td><input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value2">
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
							      <td><input class="styled-checkbox" id="styled-checkbox-6" type="checkbox" value="value6">
    								<label for="styled-checkbox-6"></label></td>
							      <td><input class="styled-checkbox" id="styled-checkbox-7" type="checkbox" value="value7">
    								<label for="styled-checkbox-7"></label></td>
							      <td><input class="styled-checkbox" id="styled-checkbox-8" type="checkbox" value="value8">
    								<label for="styled-checkbox-8"></label></td>
							      
							    </tr>
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