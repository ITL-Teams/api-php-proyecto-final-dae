

<?php $GLOBALS['page_name'] = 'register'; ?>

      <head>
          <?php require_once 'views/layouts/header.php'; ?>
      </head>
       <body style="background-color:white">
 <?php require_once 'views/layouts/navbar.php'; ?> 
    <title>Register</title>
    
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
  
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1>Register</h1>
       
    </div>  
  </div>
  
  <div class="row"> 
    <div class="col-sm-12 col-md-6 col-lg-6">
    
    <h3>Create an account</h3><hr />
    
    <form  action="./create-account/register" method="POST">
      <div class="form-group">        
        <input type="text" class="form-control" name="name" placeholder="Enter your name" required>     
      </div>
      
      <div class="form-group">        
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter your email" required>
      </div>
      
      <div class="form-group">        
        <input type="password" class="form-control" name="password" placeholder="Create Password" required>
      </div>

     
      
      <input type="submit" class="btn btn-success btn-block" value="Create account">

    </form>   
    </div>    
    <div class="col-sm-12 col-md-6 col-lg-6">
        <img src="<?= "$GLOBALS[assets]/img/team-logo.png" ?>" class="img-responsive" alt="PHP MySQL logos">
      <h3>Log in</h3><hr />
      <p>Already have an account? <a href="<?= "$GLOBALS[path]/login";?>">Login Here</a>
    </div>

  </div>

</div>
  
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
	</body>
