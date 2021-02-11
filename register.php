<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>
    <?php include('partials.php') ?>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <div class="form-container">

      <header class="text-center">
        <h1>Register</h1>
      </header>
        
      <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        <div class="form-group mb-3">
          <label class="form-label">Username</label>
          <input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="form-label">Email</label>
          <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group mb-3">
          <label class="form-label">Password</label>
          <input class="form-control" type="password" name="password_1" placeholder="Password">
        </div>
        <div class="form-group mb-3">
          <label class="form-label">Confirm password</label>
          <input class="form-control" type="password" name="password_2"placeholder="Confirm Password">
        </div>
        <div class="form-group mb-3">
          <label class="form-label">Phone Number</label>
          <input class="form-control" type="tel" name="phone" placeholder="Phone Number">
        </div>
        <div>
          <button class="btn btn-primary" type="submit" name="reg_user">Register</button>
        </div>
        <p class="my-3">
          Already a member? <a href="login.php">Sign in</a>
        </p>
      </form>
    </div>
  </div>
</body>
</html>