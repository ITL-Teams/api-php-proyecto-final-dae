<?php $GLOBALS['page_name'] = 'account'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NetWS Account</title>

	<?php require_once 'views/layouts/header.php'; ?>
</head>
<body>
	<?php require_once 'views/layouts/navbar.php'; ?>
	
	<div class="container mt-4">
		<div class="row">
		<div class="col-md-9">
			<h1 class="text-center mb-4">My Account</h1>
		<div class="col-md-9 mx-auto">
			<p class="h5"><strong>Name:</strong></p>
			<p><?= $user_info->getName() ?></p>

			<p class="h5"><strong>Email:</strong></p>
			<p><?= $user_info->getEmail() ?></p>

			<p class="h5"><strong>Status:</strong></p>
			<?php if($user_info->getUserType() == 'not-premium'): ?>
				<p class="h5"><span class="badge badge-pill badge-dark">Not Premium</span></p>
			<?php else: ?>
				<p class="h5"><span class="badge badge-pill badge-warning">Premium</span></p>
			<?php endif ?>

			<div class="form-group mt-4">
				<label class="h5 strong" for="token">My Token</label>
				<input id="token" type="password" name="token" class="form-control"
				value="<?= $user_info->getToken() ?>">
			</div>  			
  			<button id="show_btn" class="btn btn-warning">show</button>
  			<button id="copy_btn" class="btn btn-dark">copy</button>

  			<div id="copy_alert" class="d-none mt-2 alert alert-info alert-dismissible fade show" role="alert">
  				The <strong>Token</strong> was copied to clipboard
			</div>
		</div>
		</div>

		<?php if($user_info->getUserType() == 'not-premium'): ?>
		<div class="col-md-3 mt-2">
				<div class="form-row bordered">
					<div class="form-row margin2">
						<div class="col-md-12">
							<p align="center">
								<img src="<?= "$GLOBALS[assets]/img/brand-logo.png" ?>" width="200px">
							</p>
							<p class="title">
								PREMIUM
							</p>
						</div>
						<div class="col-md-12">
							<p class="paragraph">
								<br><br>
								Become Premium today and get access to all our services!<br><br>
								Create, modify and share your services.
							</p>
						</div>
						<div class="col-md-12">
							<p align="center">
								<br><br>
								<span class="btn btn-success btn-sm title">Try Now!!!</span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php else: ?>
			<div class="col-md-3 mt-2">
				<div class="form-row bordered">
					<div class="form-row margin2">
						<div class="col-md-12">
							<p align="center">
								<img src="<?= "$GLOBALS[assets]/img/brand-logo.png" ?>" width="200px">
							</p>
							<p class="title">
								YOU'RE PREMIUM!
							</p>
						</div>
						<div class="col-md-12">
							<p class="paragraph text-center">
								<br><br>
								Thank's for the support
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php endif ?>
		</div>
	</div>

	<script>
		window.onload = function()
		{
			$('#show_btn').click(toggleShow)
			$('#copy_btn').click(copyToken)
		}

		function toggleShow()
		{
			var btn_text = $('#show_btn').text();
			if(btn_text === 'show')
			{
				$('#show_btn').text('hidde');
				$('#show_btn').removeClass('btn-warning');
				$('#show_btn').addClass('btn-info');
				$('#token').attr('type', 'text');
			}
			else
			{
				$('#show_btn').text('show');
				$('#show_btn').removeClass('btn-info');
				$('#show_btn').addClass('btn-warning');
				$('#token').attr('type', 'password');
			}
		}

		function copyToken()
		{
			copyToClipboard()
			$('#copy_alert').removeClass('d-none')
			setTimeout(function()
			{
				$('#copy_alert').addClass('d-none')
			}, 1200)
		}

		function copyToClipboard()
		{
			/* Get the text field */
			$('#token').attr('type', 'text');
			var copyText = document.getElementById("token");

			/* Select the text field */
			copyText.select();
			copyText.setSelectionRange(0, 99999); /*For mobile devices*/

			/* Copy the text inside the text field */
			document.execCommand("copy");
			$('#token').attr('type', 'password');
		}

	</script>
</body>
</html>