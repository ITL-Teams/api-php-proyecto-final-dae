<?php $GLOBALS['page_name'] = 'test-service'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
	
		<title>
			TEST SERVICE
		</title>
	
		<?php require_once("views/layouts/header.php"); ?>
	</head>
	
	<body>
		<?php require_once("views/layouts/navbar.php"); ?>
	<br><br>
		<div class="container">
			<form action="" method="POST" class="form-row">
				<div class="col-md-8">
					<div class="form-row">
						<div class="col-md-2">
							<label class="badge badge-dark paragraph">
								Code
							</label>
						</div>
						<div class="col-md-10">
							<textarea class="form-control" rows="5" name="code" readonly="true"><?= $service->getCode() ?>
							</textarea>
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col-md-2">
							<label class="badge badge-dark paragraph">
								Output
							</label>
						</div>
						<div class="col-md-10">
							<textarea class="form-control" rows="8" name="output" readonly="true">
							</textarea>
						</div>
					</div>
					<hr>
					<div class="form-row">
						<div class="col-md-2">
							<label class="badge badge-dark paragraph">
								Input
							</label>
						</div>
						<div class="col-md-10">
							<textarea class="form-control" rows="3" name="input">
							</textarea>
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<div class="form-row">
						<div class="col-md-6">
							<div class="form-row">&nbsp;</div>
							<div class="form-row">
								<div class="col-md-12">
								<p class="title">
									Regex
								</p>
								</div>
							</div>
							<div class="form-row">&nbsp;</div>
						</div>
						<div class="col-md-6">
							<img src="<?= "$assets/img/regex.png" ?>" width="100px">
						</div>
					</div>
					<br><br>
					<div class="form-row">
						<div class="col-md-12 bordered">
							<p class="margin2 paragraph">
								Regex (Expresión Regular) es una secuencia de caracteres que conforma un patrón 
								de búsqueda. Se utilizan principalmente para la búsqueda de patrones de cadenas 
								de caracteres u operaciones de sustituciones.
							</p>
						</div>
					</div>
					<br><br>
					<div class="form-row">
						<div class="col-md-3"></div>
						<input type="submit" class="btn btn-success btn-sm title col-md-6" 
							value="Test">
						<div class="col-md-3"></div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>