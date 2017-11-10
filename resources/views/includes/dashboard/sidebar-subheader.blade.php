<nav class="side-navbar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar">
            <img id="myImg" src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle">
          </div>
          <div class="title">
            <h1 class="h4"> {{Auth::user()->nombres}} </h1>
            <a class="styleProfile" href="perfil.html">Mostrar perfil</a>
			<!-- The Modal -->
				<div id="myModal" class="modal">
				  <span class="close">×</span>
				  <img class="modal-content" id="img01">
				  <div id="caption"></div>
				</div>
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <span class="heading">Main</span>
        <ul class="list-unstyled">
          <li class="active">
            <a href="./">
              <i class="icon-home"></i>Inicio</a>
          </li>          
        </ul>
        @if(Auth::user()->rol == "admin")
          <span class="heading">Administrador</span>
          <ul class="list-unstyled">
            <li>
              <a href="/admin/usuarios">
                <i class="fa fa-check-square-o"></i>Gestión de usuarios </a>
            </li>            
          </ul>
        @endif
      </nav>
      <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
          <div class="container-fluid">
            <h2 class="no-margin-bottom">Dashboard</h2>
          </div>
        </header>