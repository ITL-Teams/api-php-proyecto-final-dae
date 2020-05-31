<?php $GLOBALS['page_name'] = 'shared-service'; ?>

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
			<form action="" method="POST" class="form-row">
				<div class="col-md-1">
					<label class="badge badge-pill badge-dark paragraph">
						E-mail
					</label>
				</div>
				<div class="col-md-4">
					<input type="email" class="form-control form-control-sm" name="email">
				</div>
				<div class="col-md-4">
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
							<tr>
								<td></td>
								<td></td>
								<td>
									<input type="submit" class="btn btn-danger btn-sm" 
										value="Stop sharing">	
								</td>
							</tr>
						</tbody>
					</table>
				</dform>
			</div>
		</div>
	</body>
</html>