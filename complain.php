<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Complain Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Grievance Register</h2>
  </div>
    
  <form method="post" action="complain.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      
    <div class="input-group">
      <label>Complain type</label>
        <input type="radio" name="type"
        <?php if (isset($type) && $type=="gquery") echo "checked";?>
        value="gquery">General Query
        <input type="radio" name="type"
        <?php if (isset($type) && $type=="complain") echo "checked";?>
        value="complain">Complain
    </div>
    <label>Complaint Title:</label>
      <input type="text" name="title">
    </div>
    <div class="input-group">
      <label>Complaint Details</label>
      <input type="text" name="details">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_complain">SEND</button>
    </div>
  </form>
  <form method="post" action="user_dashboard.php">
    <div class="input-group">
  		<button type="submit" class="btn" name="back">BACK</button>
  	</div>
    </form>
</body>
</html>