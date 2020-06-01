<?php $GLOBALS['page_name'] = 'services'; ?>

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
				<p>Mis lista de servicios</p>
			</div>
			<div class="content">
				<span class="btn">
					<img src="<?= "$assets/img/regex.png" ?>" width="100px">
				</span>
			</div>
		</div>
		<div class ="services-right">
			<div class="cabezal">
				<p>Mis servicios</p>
			</div>
			<div>
				<div class="content">
					<span class="btn">
						<img src="<?= "$assets/img/agregar.png" ?>" width="100px">
					</span>
				</div>
			</div>
		</div>
	</div>
</body>
</html>