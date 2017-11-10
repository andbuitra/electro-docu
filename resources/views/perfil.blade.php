@extends('master.dashboard') @section('title')

<title>Perfil</title>

@endsection @section('content')

<div class="align-profile col-lg-6">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<div class="avatar">
				<img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle">
			</div>
			<div class="align-profile-title title">
				<h1 class="h4">{{ $user->nombres }} {{ $user->apellidos }}</h1>

			</div>
		</div>
		<div class="card-body">
			<table class="table">

				<tbody>
					<tr>
						<td>Cédula</td>
						<td>{{ $user->cedula }}</td>
					</tr>
					<tr>
						<td>Correo</td>
						<td>{{ $user->email }}</td>
					</tr>
					<tr>
						<td>Rol</td>
						<td>{{ $user->rol }}</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection