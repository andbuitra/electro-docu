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
									<th></th>
								</tr>
							</thead>
							<tbody>
                @foreach ($msgs as $msg)
								<tr class="visible">
									<td class="titulo">
										<a href="{{URL::to('/')}}/detalles/{{$msg->id}}">{{$msg->titulo}}</a>
									</td>
									
									<td class="remitente">{{ $msg->remitente }}</td>
									<td class="fecha">{{ $msg->created_at }}</td>
									<td>
										<input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
										<label for="styled-checkbox-1"></label>
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
@endsection