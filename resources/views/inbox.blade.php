@extends('master.dashboard') @section('title')

<title>Administrar permisos</title>

@endsection @section('content')

<section class="tables">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header ">
						<h3>Inbox</h3>
					</div>
					<div class="inboxWrapper">
						<div class="inboxHeader">
							<div class="header-input">
								<input id="filter" type="text" placeholder="Buscar" />
								<select id="show">
									<option value="5">Mostrar 5 entradas</option>
									<option value="10">Mostrar 10 entradas</option>
									<option value="1000">Mostrar todas</option>
								</select>
							</div>
							<div class="header-pag">
								<span></span>
								<button class="prev">&larr;</button>
								<button class="next">&rarr;</button>
							</div>
						</div>
						<table>
							<thead>
								<tr>

									<th class="titulo">Titulo</th>
									<th class="remitente">Remitente(s)</th>
									<th class="fecha">Fecha</th>
									<th>Revisado</th>
								</tr>
							</thead>
							<tbody>
                @foreach ($msgs as $msg)				
								<tr class="visible">
									<td class="titulo">
										<a href="{{URL::to('/')}}/detalles/{{$msg->id}}">{{$msg->titulo}}</a>
									</td>
									
									<td class="remitente">{{ App\Usuario::find($msg->usuario_id)->nombres.' '.App\Usuario::find($msg->usuario_id)->apellidos.' - '.App\Departamento::find(App\Usuario::find($msg->usuario_id)->departamento_id)->name }}</td>
									<td class="fecha">{{ $msg->created_at }}</td>
									<td>
										@if($msg->revisado === 0)
										<input name="revisado" onclick="tickAsChecked({{$msg->id}})" class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="{{$msg->revisado}}">
										<label for="styled-checkbox-1"></label>
										@else
										<input name="revisado" onclick="tickAsChecked({{$msg->id}})" class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="{{$msg->revisado}}" checked>
										<label for="styled-checkbox-1"></label>
										@endif
									</td>
								</tr>
                @endforeach
							</tbody>
						</table>
						<div class="footer">
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

<script>

	function tickAsChecked(id){
		$.ajax({
			type : "POST",
			url : "ajax-check-message",
			data : {
				"_token" : "{{csrf_token()}}",
				"message_id" : id,				
			},
			success : function(data){
				alert('Cambiado');
			}
		});
	}
</script>
@endsection