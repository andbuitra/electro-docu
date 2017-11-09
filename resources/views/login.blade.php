@extends('master.reg') 

@section('title')
<title>Inicio de sesión</title>
@endsection 

@section('content')
<div class="page login-page">
	<div class="container d-flex align-items-center">
		<div class="form-holder has-shadow">
			<div class="row">
				<!-- Logo & Information Panel-->
				<div class="col-lg-6">
					<div class="info d-flex align-items-center">
						<div class="content">
							<div class="logo">
								<h1>Bienvenido</h1>
							</div>
							<p>Electro Cúcuta Ltda, Materiales Electricos</p>
						</div>
					</div>
				</div>
				<!-- Form Panel    -->
				<div class="col-lg-6 bg-white">
					<div class="form d-flex align-items-center">
						<div class="content">
							<form id="login-form" method="post" action="/login">
                {{ csrf_field() }}
								<div class="form-group">
									<input id="login-email" type="email" name="loginEmail" required="" class="input-material" value="{{old('loginEmail')}}">
									<label for="login-email" class="label-material">Correo electrónico</label>
								</div>
								<div class="form-group">
									<input id="login-password" type="password" name="loginPassword" required="" class="input-material">
									<label for="login-password" class="label-material">Contraseña</label>
								</div>
                <!-- TODO: Agregar mensaje de error que devuelve la aplicación -->
                @if ($errors->has('credentials'))
                <a class="forgot-pass"> {{ $errors->first('credentials')}}</a> 
                <br>
                <br>
                @endif
				@if ($errors->has('verification'))
                <a class="forgot-pass"> {{ $errors->first('verification')}}</a> 
                <br>
                <br>
                @endif
								<input type="submit" class="btn btn-primary" value="Iniciar sesión" />
                
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection('content')