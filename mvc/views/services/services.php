<?php $GLOBALS['page_name'] = 'service'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Servicios</title>

	<?php require_once 'views/layouts/header.php'; ?>
	<style type="text/css">
		.services-left{
			float: left;
			background: #eeeeee;
			width: 59%;
			height: 500px;
		}
		.services-right{
			height: 500px;
			background: #eeeeee;
			float: right;
			width: 39%;
		}
		.cabezal{
			float:top;
			height:25px;
			background-color: #025B2E;
			color: white;
			padding-left: 10px;
		}
		.content{
			margin-left: 10px; 
			float:left;
			top: 40%;
		}
	</style>
</head>
<body>
	<?php require_once 'views/layouts/navbar.php'; ?>
	
	<div class="container mt-4">
		<div class="services-left">
			<div class="cabezal">
				<p>Available services</p>
			</div>
			<div class="content">
				<a href="<?= "$GLOBALS[path]/documentation/regex" ?>">
					<span class="btn">
						<img src="<?= "$GLOBALS[assets]/img/regex.png" ?>" style="border-radius: 15px" width="100px">
					</span>
				</a>
			</div>
		</div>
		<div class ="services-right">
			<div class="cabezal">
				<p>My Services</p>
			</div>
			<div>
				<div class="content">
					<?php foreach ($services as $service): ?>
						<a href="<?= "$GLOBALS[path]/user/services?service=".$service->getServiceName() ?>">
							<span class="btn">
								<p class="mb-0"><?= $service->getDescription() ?></p>
								<img src="<?= "$GLOBALS[assets]/img/regex.png" ?>" style="border-radius: 15px" width="80px">
							</span>
						</a>
					<?php endforeach ?>

					<a href="<?= "$GLOBALS[path]/user/services/create" ?>">
						<span class="btn">
							<img src="<?= "$GLOBALS[assets]/img/agregar.png" ?>" width="100px">
						</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>