@extends('master.dashboard') @section('title')

<title>Perfil</title>

@endsection @section('content')

<div class="align-profile col-lg-6">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<div class="userImg avatar">
				<img src="{{ asset(Auth::user()->avatar_path) }}" alt="..." class="img-fluid rounded-circle">
			</div>
			<div class="align-profile-title title">
				<h2 class="h2">{{ $user->nombres }} {{ $user->apellidos }}</h2>
				<h5 class="h5">{{App\Departamento::find($user->departamento_id)->name}}</h5>

			</div>
		</div>
		<div class="card-body">
			<table class="forAlign table">

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