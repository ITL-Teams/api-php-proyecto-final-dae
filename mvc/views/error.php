<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NetWs Error</title>

	<?php require_once 'layouts/header.php'; ?>
</head>
<body>
	<?php require_once 'layouts/navbar.php'; ?>
	<div class="content">
        <div class="title1 m-b-md">
            <?= "$code $message" ?>
        </div>
        <h3><?= $description; ?></h3>
    </div>
</body>
</html>