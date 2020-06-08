<?php $GLOBALS['page_name'] = 'service'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
	
		<title>
			EDIT SERVICE
		</title>
	
		<?php require_once("views/layouts/header.php"); ?>
	</head>
	
	<body>
		<?php require_once("views/layouts/navbar.php"); ?>
	<br><br>
		<div class="container">
			<form action="<?= "$GLOBALS[path]/user/services/edit/register" ?>" method="POST" class="form-row">
			<div class="col-md-6">
					<label class="badge badge-pill badge-dark paragraph">Code</label>
					<textarea rows="20" class="form-control" name="code" required><?= $service->getCode(); ?></textarea>
				</div>
				<div class="col-md-6">
					<div class="form-row">
						<div class="col-sm-7">
							<label class="badge badge-pill badge-dark paragraph">
								Type
							</label>
							<select class="form-control" name="type">
								<option value="none">--Select an option--</option>
								<option value="regex" 
										<?= $service->getType() == "regex" ? "selected" : "" ?>>
									Regex
								</option>
							</select>
							<br>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-4">
							<label class="badge badge-pill badge-dark paragraph">
								Service Privacy
							</label>
							<select class="form-control" name="privacy">
								<option value="private" <?= $service->getPrivacy() == "private" ? "selected" : "" ?>>
										Private
								</option>
								<option value="public" <?= $service->getPrivacy() == "public" ? "selected" : "" ?>>
										Public
								</option>
								<option value="shared" <?= $service->getPrivacy() == "shared" ? "selected" : "" ?>>
										Shared
								</option>
							</select>
							<a href="">who can access my service?</a>
						</div>
					</div>
					<hr>
					<div class="form-row">
						<div class="col-md-12">
							<label class="badge badge-pill badge-dark paragraph">
								Service Name
							</label>
							<input type="text" name="name" class="form-control"
								required pattern="[A-Za-z]+[A-Za-z0-9]*"
								value="<?= $service->getServiceName() ?>">
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
							<textarea class="form-control" rows="6" name="description"><?= $service->getDescription() ?></textarea>
						</div>
					</div>
					<hr>
					<div class="form-row">
						<div class="col-sm-1">
							<input type="hidden" name="id" value="<?= $service->getId() ?>">
							<input type="submit" class="btn btn-info btn-sm" value="Update">
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>