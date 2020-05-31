<?php $GLOBALS['page_name'] = 'create-service'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
	
		<title>
			CREATE SERVICE
		</title>
	
		<?php require_once("views/layouts/header.php"); ?>
	</head>
	
	<body>
		<?php require_once("views/layouts/navbar.php"); ?>
	<br><br>
		<div class="container">
			<form action="./create/register" method="POST">
				<div class="form-row">
					<div class="col-md-6">
						<label class="badge badge-pill badge-dark paragraph">Code</label>
						<textarea rows="20" class="form-control" name="code"></textarea>
					</div>
					<div class="col-md-6">
						<div class="form-row">
							<div class="col-sm-7">
								<label class="badge badge-pill badge-dark paragraph">
									Type
								</label>
								<select class="form-control" name="type">
									<option value="none">--Select an option--</option>
									<option value="regex">REGEX</option>
								</select>
								<br>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-4">
								<label class="badge badge-pill badge-dark paragraph">
									Service Privacy
								</label>
								<select class="form-control" name="privacy">
									<option value="private">Private</option>
									<option value="public">Public</option>
									<option value="shared">Shared</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="col-md-12">
								<label class="badge badge-pill badge-dark paragraph">
									Service Name
								</label>
								<input type="text" name="name" class="form-control">
							</div>	
							<div class="col-sm-1"></div>
							
						</div>
						<hr>
						<div class="form-row">
							<div class="col-sm-12">
								<label class="badge badge-pill badge-dark paragraph">
									Description
								</label>
							</div>
							<div class="col-sm-12">
								<textarea class="form-control" rows="6" name="description"></textarea>
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="col-sm-1">
								<input type="submit" class="btn btn-success btn-sm" value="Create">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>