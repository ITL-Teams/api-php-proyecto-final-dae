<?php $GLOBALS['page_name'] = 'home'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
		<title>
			HOME
		</title>
	
		<?php require_once 'views/layouts/header.php'; ?>
	</head>
	
	<body>
		<?php require_once 'views/layouts/navbar.php'; ?>
	<br><br>
	<div class="container">
		<div class="form-row">
			<div class="col-md-8">
				<div class="form-row bordered">
				<div class="form-row margin">
					<div class="col-md-3">
						<p class="title">REGEX</p>
						<p align="center">
							<img src="<?= "$assets/img/regex.png" ?>" width="100px">
						</p>
					</div>
					<div class="col-md-9">
						<div class="form-row">
							<p class="paragraph">
								Regex (Expresión Regular) es una secuencia de caracteres que conforma un patrón 
								de búsqueda. Se utilizan principalmente para la búsqueda de patrones de cadenas 
								de caracteres u operaciones de sustituciones.
							</p>
						</div>
						<div class="form-row">
							<span class="btn btn-success btn-sm">Try Out</span>
							&nbsp;
							<span class="btn btn-secondary btn-sm">Info</span>
						</div>
					</div>
				</div>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<div class="form-row bordered">
					<div class="form-row margin2">
						<div class="col-md-12">
							<p align="center">
								<img src="<?= "$assets/img/brand-logo.png" ?>" width="200px">
							</p>
							<p class="title">
								PREMIUM
							</p>
						</div>
						<div class="col-md-12">
							<p class="paragraph">
								<br><br>
								Hazte premium y obten acceso a todos nuestros servicios.<br>
								Crea, modifica y comparte tus servicios.
							</p>
						</div>
						<div class="col-md-12">
							<p align="center">
								<br><br>
								<span class="btn btn-success btn-sm title">Try Now!!!</span>
							</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	</body>
	
</html>