<?php $GLOBALS['page_name'] = 'service'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
	
		<title>
			SHARED SERVICE
		</title>
	
		<?php require_once("views/layouts/header.php"); ?>
	</head>
	
	<body>
		<?php require_once("views/layouts/navbar.php"); ?>
		<br><br>
		<div class="container">
			<form action="<?= "$GLOBALS[path]/user/services/create/shared/create" ?>" method="POST" class="form-row">
				<div class="col-md-1">
					<label class="badge badge-pill badge-dark paragraph">
						E-mail
					</label>
				</div>
				<div class="col-md-4">
					<input type="email" class="form-control form-control-sm" name="email">
				</div>
				<div class="col-md-4">
					<input type="hidden" name="service" value="<?= $service_name ?>">
					<input type="submit" class="btn btn-primary btn-sm" value="Share">			
				</div>
			</form>
			<hr>
			<div class="table-responsive scrollbar">
				<form action="" method="POST" class="scroll">
					<table class="table table-dark table-bordered table-sm">
						<thead>
							<tr>
								<th>Name</th>
								<th>E-mail</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($shared_profiles as $profile): ?>
							<tr>
								<td><?= $profile->getName() ?></td>
								<td><?= $profile->getEmail() ?></td>
								<td>
									<a href="<?= "$GLOBALS[path]/user/services/create/shared/delete?service=$service_name&email=".$profile->getEmail() ?>" 
									class="btn btn-danger btn-sm">Stop sharing</a>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</dform>
			</div>
		</div>
	</body>
</html>