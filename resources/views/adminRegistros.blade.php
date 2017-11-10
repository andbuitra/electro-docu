@extends('master.dashboard')

@section('title')

<title>Administrar registros</title>

@endsection

@section('content')

<section class="tables">   
            <div class="container-fluid">
              <div class="row">
                
               
                <div class="alignTables col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header ">
                      <h3 >Usuarios por confirmar registro</h3>
                    </div>
                    <div style="overflow-x:auto;" class="card-body">
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acción</th>
							
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>test@gmail.com</td>
                            <td><button type="button" class="btn btn-success">Confirmar</button> <button type="button" class="paddingBotones btn btn-danger">Rechazar</button></td>
							
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>test@gmail.com</td>
                            <td><button type="button" class="btn btn-success">Confirmar</button> <button type="button" class="paddingBotones btn btn-danger">Rechazar</button></td>
							
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </section>

@endsection