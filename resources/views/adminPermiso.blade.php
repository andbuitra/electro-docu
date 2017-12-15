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
									@foreach($departamentos as $departamento)
									<th>{{ $departamento->name }}</th>
									@endforeach									
								</tr>


							</thead>
							<tbody>
							@foreach($departamentos as $departamento)							
								<tr class="article-loop">
									
									<td>{{$departamento->name}}</td>
									
									@foreach($permitidos as $permitido)
									@if($departamento->permitidos()->where('id',$permitido->id)->exists())
									<td>
										<input class="styled-checkbox" id="{{$departamento->id}},{{$permitido->id}}" type="checkbox" value="{{$departamento->id}},{{$permitido->id}}" onClick="changePermission({{$departamento->id}},{{$permitido->id}})" checked>
										<label for="{{$departamento->id}},{{$permitido->id}}"></label>
									</td>
									@else
									<td>
										<input class="styled-checkbox" id="{{$departamento->id}},{{$permitido->id}}" type="checkbox" value="{{$departamento->id}},{{$permitido->id}}" onClick="changePermission({{$departamento->id}},{{$permitido->id}})">
										<label for="{{$departamento->id}},{{$permitido->id}}"></label>				
									</td>
									@endif
									@endforeach
									

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

  function changePermission(departamento_id, permitido_id){
	  $.ajax({
		  type : "POST",
		  url : "/admin/roles/ajax-change-permissions",
		  data : {
			  "_token" : "{{csrf_token()}}",
			  'd_id' : departamento_id,
			  "p_id" : permitido_id
		  },
		  success : function(data){
			  console.log(data);
		  }
	  });
  }

</script>
@endsection