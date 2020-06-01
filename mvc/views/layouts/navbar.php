<?php
	function active($reference) {
		if( $reference == $GLOBALS['page_name'] )
			return 'active';
	}

	@session_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="<?= $GLOBALS["path"] ?>">
		<img src="<?= "$GLOBALS[assets]/img/brand-logo-head.png" ?>" alt="brand-logo" height="40px">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<?php if(isset($_SESSION['user_email'])) { ?>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?= active('home'); ?>">
					<a class="nav-link" href="<?= "$GLOBALS[path]/user/home" ?>">Home</a>
				</li>
				<li class="nav-item <?= active('contact'); ?>">
					<a class="nav-link" href="<?= "$GLOBALS[path]/contact"; ?>">Support</a>
				</li>

				<li class="nav-item dropdown <?= active('service'); ?>">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Services
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Your services</a>
						<a class="dropdown-item" href="<?= "$GLOBALS[path]/user/services/create"; ?>">Create new service</a>
						<a class="dropdown-item" href="#">Test a service</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">My Account</a>
					</div>
				</li>
			</ul>
			<form action="<?= "$GLOBALS[path]/logout" ?>" method="POST">
				<label class="text-light" for="logout" style="padding-right: 1em;">
					<?= $_SESSION['user_email']; ?>
				</label>
				<input name="logout" class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Cerrar Sesión">
			</form>

		<?php } else { ?>
			<ul class="navbar-nav">
				<li class="nav-item <?= active('login'); ?>">
					<a class="nav-link"  href="<?= "$GLOBALS[path]/login";?>">Login</a>
				</li>
				<li class="nav-item <?= active('register'); ?>">
					<a class="nav-link"  href="<?= "$GLOBALS[path]/create-account";?>">Register</a>
				</li>
				<li class="nav-item <?= active('contact'); ?>">
					<a class="nav-link" href="<?= "$GLOBALS[path]/contact"; ?>">Contact</a>
				</li>
			<ul>
		<?php } ?>
	</div>
</nav>