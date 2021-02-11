<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?>
  </div>
  <form method="post" action="complain.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<button type="submit" class="btn" name="lodgecomplain">Lodge Complain</button>
  	</div>
  </form>
  <form method="post" action="complainhistory.php">
      <div class="input-group">
  		<button type="submit" class="btn" name="complainhistory">complain History</button>
  	</div>
  </form>
  <form method="post" action="login.php">
    <div class="input-group">
  		<button type="submit" class="btn" name="logout">LOG OUT</button>
  	</div>
  </form>
</body>
</html>