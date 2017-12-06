@extends('master.reg') 

@section('title')
<title>Verificación</title>
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
                    <h1>Gracias por registrarte</h1>
					<p> Tu cuenta esta en proceso de verificación</p>
					
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
				  <h1 class="forgot-pass">Tu solicitud sera verificada por un administrador quien te dara acceso a la plataforma. 
				  Una vez tu cuenta sea aprobada se enviara un link de verificación a tu cuenta para completar el proceso de registro.</h1>
                  <h1 class="forgot-pass"> </h1>

                        <div class="downB formPadding form-group row">
                          <button type="submit" onclick="window.location='/login'; class="btn btn-primary">Volver a inicio</button>
                            
                          
                        </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
 @endsection('content')   