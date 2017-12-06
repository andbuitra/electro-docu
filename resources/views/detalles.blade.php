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
												<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
													<i class="fa fa-ellipsis-v"></i>
												</button>
												<div aria-labelledby="closeCard" class="dropdown-menu has-shadow">
													<a href="#" class="dropdown-item remove">
														<i class="fa fa-times"></i>Close</a>
													<a href="#" class="dropdown-item edit">
														<i class="fa fa-gear"></i>Edit</a>
												</div>
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
														<input type="text" class="form-control" value="{{$doc->titulo}}" readonly="true">
													</div>
												</div>
												<div class="line"></div>
												<!--
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Información</label>
                          <div class="col-sm-9">
                            <input type="section" class="form-control" value="{{$doc->titulo}}" readonly="true">
                          </div>
                        </div>
                        -->
												<div class="line"></div>
												<div class="form-group row">
													<label class="col-sm-3 form-control-label">Notas</label>
													<div class="col-sm-9">
														<input type="section" class="form-control" value="{{$doc->notas}}" readonly="true">
													</div>
												</div>

												<div class="line"></div>
												<div class="form-group row">
													<label class="col-sm-3 form-control-label">Descarga</label>
													<div class="col-sm-9">
														<a href={{ asset('/img/ial3JQdnYI7T4yudfylcaP0xGjByPRLk2ibkrX6c.png')}}>Descarga</a>
													</div>
												</div>

												<div class="line"></div>
												<div class="form-group row">
													<div class="col-sm-4 offset-sm-3">
														<button type="submit" class="btn btn-secondary">Cancel</button>
														<button type="submit" class="btn btn-primary">Save changes</button>
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