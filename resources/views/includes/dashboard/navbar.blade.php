<!-- Main Navbar-->
<header class="header">
	<nav class="navbar">
		<!-- Search Box-->
		<div class="search-box">
			<button class="dismiss">
				<i class="icon-close"></i>
			</button>
			<form id="searchForm" action="#" role="search">
				<input type="search" placeholder="What are you looking for..." class="form-control">
			</form>
		</div>
		<div class="container-fluid">
			<div class="navbar-holder d-flex align-items-center justify-content-between">
				<!-- Navbar Header-->
				<div class="navbar-header">
					<!-- Navbar Brand -->
					<a href="/" class="navbar-brand">
						<div class="brand-text brand-big hidden-lg-down">
							<span>Electrocucuta </span>
							<strong>Ltda</strong>
						</div>
						<div class="brand-text brand-small">
							<strong>EC</strong>
						</div>
					</a>
					<!-- Toggle Button-->
					<a id="toggle-btn" href="#" class="menu-btn active">
						<span></span>
						<span></span>
						<span></span>
					</a>
				</div>
				<!-- Navbar Menu -->
				<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
					<!-- Messages                        -->
					<li class="nav-item dropdown">
						<a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
						 class="nav-link">
							<i class="fa fa-envelope-o"></i>
							@if($notifications->isNotEmpty())
							<span class="badge bg-orange">{{$notifications->count()}}</span>
							@else
							@endif
						</a>
						<ul aria-labelledby="notifications" class="dropdown-menu">
						@if($notifications->isNotEmpty())
							@foreach($notifications as $notification)
							<li>
								<a rel="nofollow" href="/detalles/{{$notification->id}}" class="dropdown-item d-flex">
									<div class="msg-profile">
										<img src="{{ asset($notification->usuario->avatar_path) }}" alt="..." class="img-fluid rounded-circle">
									</div>
									<div class="msg-body">
										<h3 class="h5">{{$notification->usuario->nombres.' '.$notification->usuario->apellidos}}</h3>
										<span>Te envío un documento</span>
									</div>
								</a>
							</li>
							@endforeach
							<li>
								<a rel="nofollow" href="/inbox" class="dropdown-item all-notifications text-center">
									<strong>Ver todos los mensajes </strong>
								</a>
							</li>
						@else
							<li>
								<a rel="nofollow" href="/inbox" class="dropdown-item all-notifications text-center">
									<strong>No tienes mensajirijillos </strong>
								</a>
							</li>
						@endif
						</ul>
					</li>
					<!-- Logout    -->
					<li class="nav-item">
						<a href="/logout" class="nav-link logout">Cerrar sesión
							<i class="fa fa-sign-out"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>