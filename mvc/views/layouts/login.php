<?php $GLOBALS['page_name'] = 'login'; ?>

   <head>
<style>
	.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
}
	.button4 {background-color: #e7e7e7; color: black;}



* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width:50%;
  padding: 15px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }
}


* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}


article {
  float: right;
  padding: 5px;
  width: 700px;
  background-color: white;
  height: 500px; /* only for demonstration, should be removed */
  top: 10px;
}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}



</style>
    <title>PHP 7 Login</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php require_once 'views/layouts/header.php'; ?>

 
  </head>
	
  <body style="background-color:white">
 <?php require_once 'views/layouts/navbar.php'; ?> 

<div class="row">
  <div class="column">
  
    <img src="<?= "$GLOBALS[assets]/img/team-logo.png" ?>" class="img-responsive" alt="PHP MySQL logos">
  </div>
  
  <div class="column">
  
   
		<div class="row">
			<div class="col-lg-6">		
			<h2>Log in</h2>
			<div class="card" style="text-align: left;">
					<div class="loginBox">

						<form action="./login/authenticate" method="post">                           	
							<div class="form-group">									
							<input type="email" class="form-control input-lg" name="email" placeholder=" example@mail.com" required>        
							</div>							
							<div class="form-group">        
							<input type="password" class="form-control input-lg" name="password" placeholder="Password" required>       
							</div>								

							<a href="">
								I Forgot my password
							</a>
								<br>
							<input type="submit" class="btn btn-success btn-block" value="Log-in">
						</form>
						<form action="register.php">
							or
							<p>Sing in <a href="<?= "$GLOBALS[path]/create-account";?>">click here</a>
							





							<br>
						</form>						
						
					</div><!-- /.loginBox -->	
				</div><!-- /.card -->
			</div><!-- /.col -->
		</div><!--/.row-->
	</div><!-- /.container -->
  </div>
  
 
</div>

	

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
	</body>
