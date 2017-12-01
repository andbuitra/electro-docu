@extends('master.dashboard') @section('title')

<title>Administrar permisos</title>

@endsection @section('content')

      <section class="tables">
      	<div class="container-fluid">
      		<div class="row">
      			<div class="col-lg-12">
      				<div class="card">
                <section class="forms"> 
            <div class="container-fluid">
              <div class="row">
                
               
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Detalles</h3>
                    </div>
                    <div class="card-body">
                      <form class="form-horizontal">
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Titulo</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="Documento para revisar, contabilidad 2016" readonly="true">
                          </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Información</label>
                          <div class="col-sm-9">
                            <input type="section" class="form-control" value="Random words,Random words,Random words,Random words" readonly="true">
                          </div>
                        </div>
                        
                        <div class="line"></div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Notas</label>
                          <div class="col-sm-9">
                            <input type="section" class="form-control" value="Random words,Random words,Random words,Random words" readonly="true">
                          </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Archivo</label>
                          <div class="col-sm-9">
                            <a href="https://www.google.com.co/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwiwmYzRh-nXAhXMQt8KHVIaCJsQFggmMAA&url=http%3A%2F%2Fceder.ulagos.cl%2Flider%2Fimages%2Fnumeros%2F23%2F1.-LIDER%252023_Juarez_pp9_28.pdf&usg=AOvVaw3h3WYpJpmDgMGLQ7yFUyyV">prueba.pdf</a>
                          </div>
                        </div>
                       
                        
                        <div class="line"></div>
                        <div class="form-group row">
                          <div class="col-sm-4 offset-sm-3">
                            
                            <button type="submit" class="btn btn-primary">Descargar</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

      					
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