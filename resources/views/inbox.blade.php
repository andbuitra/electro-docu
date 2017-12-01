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

					<div style="overflow-x:auto;" class="card-body">

						<table class="table table-striped table-hover">

                        <thead>
                          <tr>
                            <th></th>
                            <th>Titulo</th>
                            <th>Remitente</th>
                            <th>Fecha</th>
                            
							
                          </tr>
                        </thead>
                        <tbody class="tableIndex">
                          
                          <tr>
                            
                            <td><input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
    							           <label for="styled-checkbox-1"></label></td>
                            
                            <td><a href="#">Documento para revisar, contabilidad 2016, urgente</a></td>
              							<td>Lucia- contablidad</td>
              							<td>12/11/2017</td>
                          </tr>
                          <tr>
                            
                            <td><input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value2">
    							           <label for="styled-checkbox-2"></label></td>
                            
                            <td><a href="#">Documento para revisar, ventas 2016, urgente</a></td>
              							<td>Lucia- venta</td>
              							<td>12/11/2017</td>
                          </tr>
                          	

                           
                          
                         
                          
                        </tbody>
                      </table>
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