<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="{{ url('/') }}">
		<img src="views/assets/img/brand-logo-head.png" alt="brand-logo" height="40px">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<?php if(isset($username)) { ?>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Soporte</a>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Servicio
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Configurar un dispositivo</a>
						<a class="dropdown-item" href="#">Panel de dispositivos</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Mi cuenta</a>
					</div>
				</li>
			</ul>
			<form action="" method="POST">
				<label class="text-light" for="logout" style="padding-right: 1em;">
					Usuario
				</label>
				<input name="logout" class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Cerrar Sesión">
			</form>

		<?php } else { ?>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">Iniciar Sesión</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Registrarse</a>
				</li>
			<ul>
		<?php } ?>
	</div>
</nav>