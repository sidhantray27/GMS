<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>GMS | Login</title>
    <?php 
		include('partials.php') ;
		if (isset($_GET['logout'])) {
			session_destroy();
			unset($_SESSION['username']);
			header("location: login.php");
	  }
	?>

  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	  <h1> WELCOME TO GREIVANCE MANAGEMENT SYSTEM</h1>
	<div class="container">
		<div class="form-container">
			<div class="text-center">
				<h1>Login</h1>
			</div>
			<form method="post" action="login.php">
				<?php include('errors.php'); ?>
				<div class="form-group mb-3">
					<label class="form-label">Username</label>
					<input class="form-control" type="text" name="username" placeholder="Username">
				</div>
				<div class="form-group mb-3">
					<label class="form-label">Password</label>
					<input class="form-control" type="password" name="password" placeholder="Password">
				</div>
				<div>
					<button type="submit" class="btn btn-primary" name="login_user">Login</button>
				</div>
				<p class="my-3">
					Not yet a member? <a href="register.php">Sign up</a>
				</p>
			</form>
		</div>
	</div>

	 
</body>
</html>