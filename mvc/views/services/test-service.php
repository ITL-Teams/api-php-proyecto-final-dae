<?php $GLOBALS['page_name'] = 'service'; ?>

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
			<div class="container mb-2">
				<h2 class="h3">
					<a href="<?= "$GLOBALS[path]/user/services/edit?service=$service_name" ?>"><span class="badge badge-info">Edit</span></a>
				</h2>
			</div>
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
							<textarea id="output" class="form-control" rows="8" name="output" readonly="true"></textarea>
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
							<textarea id="input" class="form-control" rows="3" name="input"></textarea>
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
							<img src="<?= "$GLOBALS[assets]/img/regex.png" ?>" width="100px">
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
						<input type="button" class="btn btn-success btn-sm title col-md-6" id="test" 
							value="Test">
						<div class="col-md-3"></div>
					</div>
				</div>
			</form>
		</div>

		<script>
			window.onload = function()
			{
 				$('#test').click(test)
			}

			function test()
			{
				$.ajax({
					type: 'post',
					//url:  '<?= "$GLOBALS[path]/user/services/test/execute?service=".$service->getServiceName() ?>',
					url:  '<?= "$GLOBALS[path]/user/services/test/execute" ?>',

					data: { 
						service: "<?= $service->getServiceName() ?>",
						input:   $('#input').val()
					},

					dataType: 'json',

					success: function(response) {
						response = JSON.stringify(response)
						validResponse(response)
					},

					error: function(response)
					{
						error(response)
					}
				})
			}

			function error(response)
			{
				var message;
				message  = 'HTTP ' + response.status + '-' + response.statusText +'\n';
				message += 'Response: ' + response.responseText;
				$('#output').text(message)
			}

			function validResponse(response)
			{
				var message;
				message  = 'HTTP 200 - OK\n'
				message += 'Reponse: ' + response
				$('#output').text(message)
			}
		</script>
	</body>
</html>