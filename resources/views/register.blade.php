@extends('master.reg')

@section('title')
    <title>Registro de usuarios</title>
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
                    <h1>Registrate</h1>
                  </div>
                  <p>Electro Cúcuta Ltda, Materiales Electricos.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="register-form" method="POST" action="/registro">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input id="register-firstname" type="text" name="regNombres" required class="input-material">
                      <label for="register-firstname" class="label-material">Nombres</label>
                    </div>
                    <div class="form-group">
                      <input id="register-lastname" type="text" name="regApellidos" required class="input-material">
                      <label for="register-lastname" class="label-material">Apellidos</label>
                    </div>
                    <div class="form-group">
                      <input id="register-id" type="text" name="regCedula" required class="input-material">
                      <label for="register-id" class="label-material">Cedula</label>
                    </div>
                    <div class="form-group">
                      <input id="register-email" type="email" name="regCorreo" required class="input-material">
                      <label for="register-email" class="label-material">Dirección de correo</label>
                    </div>
                    <div class="form-group">
                      <input id="register-passowrd" type="password" name="regPassword" required class="input-material">
                      <label for="register-passowrd" class="label-material">Contraseña</label>
                    </div>
                    <div class="form-group terms-conditions">
                      <input id="license" type="checkbox" class="checkbox-template" required="required">
                      <label for="license">Estoy de acuerdo con los terminos y condiciones</label>
                    </div>
                    <input id="register" type="submit" value="Registrar" class="btn btn-primary">
                  </form><small>¿Ya tienes una cuenta? </small><a href="/login" class="signup">Inicia Sesión</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection