<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light ">
	<div class="navbar-wrapper  ">
		<div class="navbar-content scroll-div ">

			<div class="">
				<div class="main-menu-header">
					<img class="img-radius" src="/assets/images/user/logo.jpeg" alt="User-Profile-Image">
					<div class="user-details">
						<div id="more-details">Administrador <i class="fa fa-caret-down"></i></div>
					</div>
				</div>
				<div class="collapse" id="nav-user-link">
					<ul class="list-unstyled">
						<li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
						<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
						<li class="list-group-item"><a href="auth-normal-sign-in.html"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
					</ul>
				</div>
			</div>
		
			<ul class="nav pcoded-inner-navbar ">
				<li class="nav-item pcoded-menu-caption">
					<label>Navegação</label>
				</li>
				<li class="{{ request()->is('/') ? 'active' : '' }}">
					<a href="/" class="nav-link "><span class="pcoded-micon"><i class="fas fa-home"></i></span><span class="pcoded-mtext">Home</span></a>
				</li>
				<li class="nav-item pcoded-menu-caption">
					<label>Registros</label>
					
				</li>
				<li class="{{ Request::segment(2) == 'alunos' ? 'class="active"' : '' }}">
					<a href="/alunos" class="nav-link "><span class="pcoded-micon"><i class="fas fa-graduation-cap"></i></span><span class="pcoded-mtext">Alunos</span></a>
				</li>
				<li class="nav-item">
					<a href=#" class="nav-link "><span class="pcoded-micon"><i class="fas fa-user"></i></span><span class="pcoded-mtext">Professores</span></a>
				</li>
				<li class="nav-item">
					    <a href=#" class="nav-link "><span class="pcoded-micon"><i class="fas fa-user-tie"></i></span><span class="pcoded-mtext">Funcionários</span></a>
					</li>
					<li class="nav-item">
					    <a href=#" class="nav-link "><span class="pcoded-micon"><i class="fas fa-users"></i></span><span class="pcoded-mtext">Usuários</span></a>
					</li>
				<li class="nav-item pcoded-menu-caption">
					<label>Fichas</label>
				</li>
				<li class="nav-item">
					<a href="chart-apex.html" class="nav-link "><span class="pcoded-micon"><i class="fas fa-file-contract"></i></span><span class="pcoded-mtext">Matrícula</span></a>
					
				</li>
				<li class="nav-item">
				<a href="chart-apex.html" class="nav-link "><span class="pcoded-micon"><i class="fas fa-book"></i></span><span class="pcoded-mtext">Dever de casa</span></a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- [ navigation menu ] end -->