@extends('master.dashboard') @section('title')

<title>Inicio - Electrocúcuta Ltda</title>

@endsection @section('content')

<section class="dashboard-counts no-padding-bottom">
	<div class="container-fluid">
		<div class="row bg-white has-shadow">
			<!-- Item -->
			<div class="col-xl-3 col-sm-6">
				<div class="item d-flex align-items-center">
					<div class="icon bg-violet">
						<i class="icon-user"></i>
					</div>
					<div class="title">
						<span>Empleados
							<br>Registrados</span>
						<div class="progress">
							<div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
						</div>
					</div>
					<div class="number">
						<strong>25</strong>
					</div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-xl-3 col-sm-6">
				<div class="item d-flex align-items-center">
					<div class="icon bg-red">
						<i class="icon-padnote"></i>
					</div>
					<div class="title">
						<span>Documentos
							<br>por revisar</span>
						<div class="progress">
							<div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
						</div>
					</div>
					<div class="number">
						<strong>70</strong>
					</div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-xl-3 col-sm-6">
				<div class="item d-flex align-items-center">
					<div class="icon bg-green">
						<i class="icon-bill"></i>
					</div>
					<div class="title">
						<span>Nuevos
							<br>Mensajes</span>
						<div class="progress">
							<div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
						</div>
					</div>
					<div class="number">
						<strong>44</strong>
					</div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-xl-3 col-sm-6">
				<div class="item d-flex align-items-center">
					<div class="icon bg-orange">
						<i class="icon-check"></i>
					</div>
					<div class="title">
						<span>Documentos
							<br>por enviar</span>
						<div class="progress">
							<div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
						</div>
					</div>
					<div class="number">
						<strong>35</strong>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Dashboard Header Section    -->
<section class="dashboard-header">
	<div class="container-fluid">
		<div class="row">
			<!-- Statistics -->
			<div class="statistics col-lg-3 col-12">
				<div class="statistic d-flex align-items-center bg-white has-shadow">
					<div class="icon bg-red">
						<i class="fa fa-tasks"></i>
					</div>
					<div class="text">
						<strong>234</strong>
						<br>
						<small>Documentos</small>
					</div>
				</div>
				<div class="statistic d-flex align-items-center bg-white has-shadow">
					<div class="icon bg-green">
						<i class="fa fa-calendar-o"></i>
					</div>
					<div class="text">
						<strong>152</strong>
						<br>
						<small>Avisos</small>
					</div>
				</div>
				<div class="statistic d-flex align-items-center bg-white has-shadow">
					<div class="icon bg-orange">
						<i class="fa fa-paper-plane-o"></i>
					</div>
					<div class="text">
						<strong>147</strong>
						<br>
						<small>Forwards</small>
					</div>
				</div>
			</div>
			<!-- Line Chart            -->
			<div class="chart col-lg-6 col-12">
				<div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
					<canvas id="lineCahrt"></canvas>
				</div>
			</div>
			<div class="chart col-lg-3 col-12">
				<!-- Bar Chart   -->

				<!-- Numbers-->
				<div class="statistic d-flex align-items-center bg-white has-shadow">
					<div class="fancy-btn open modalN icon bg-green">
						<i class=" fa fa-plus"></i>

					</div>



					<div class="text">
						<strong>Redactar</strong>
						<br>
						<small>Crear un nuevo mensaje</small>
					</div>
				</div>


				<div class="bar-chart has-shadow bg-white">
					<div class="title">
						<strong class="text-violet">99.9%</strong>
						<br>
						<small>Success Rate</small>
					</div>
					<canvas id="barChartHome"></canvas>
				</div>
			</div>
			@include('new-message')
			<div class="modal-overlay"></div>
		</div>
	</div>
</section>

<script>
	function getUsersOnDepartment(departamento_id){
		$.ajax({
			type: "POST",
			url: "/ajax-usuarios-receptores",
			data: {
				"_token": "{{csrf_token()}}",
				"departamento_id" : departamento_id
			},
			success : function(data){

				var select = document.getElementById('user-receptor');
				for(index = 0; index<data.lenght; index++){
					var opt = document.createElement('option');
					opt.value=data[index].nombres+' '+data[index].apellidos;
					select.appendChild(opt);
				}
			}
			dataType: JSON
		});
	}
</script>


@endsection