<?php $GLOBALS['page_name'] = 'contact'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contacto</title>

	<?php require_once 'views/layouts/header.php'; ?>
</head>
<body>
	<?php require_once 'views/layouts/navbar.php'; ?>
	
	<div class="container mt-4">
		<h1 class="text-center mb-4">Contacto</h1>

		<form action="./send-comment" method="POST" class="col-md-5 mx-auto">
			<div class="form-group">
				<label for="email">Dirección de correo</label>
				<input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="ejemplo@dominio.com">
			</div>

			<div class="form-group">
				<label for="comment">Comentario</label>
				<textarea class="form-control" name="comment" rows="5" style="resize: none" placeholder="Tú comentario :)"></textarea>
			</div>
  			
  			<button type="submit" class="btn btn-success">Enviar</button>
		</form>
	</div>
</body>
</html>