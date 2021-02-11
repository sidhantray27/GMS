<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
  <?php include('partials.php') ?>

  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <div class="user-container">
      <div class="mb-3">

        <?php  if (isset($_SESSION['username'])) : ?>
              <h2>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h2>
          <?php endif ?>
      </div>
        <div class="my-3">

          <a href="complain.php" class="btn btn-primary btn-lg">Lodge Complain</a>
        </div>
        <div class="my-3">

          <a href="complainhistory.php" class="btn btn-primary btn-lg">Complain History</a>
        </div>

        <a href="login.php">Logout</a>
      </div>
    </div>
</body>
</html>