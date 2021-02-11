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
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <label>Complain type</label>
        <input type="radio" name="type"
        <?php if (isset($type) && $type=="gquery") echo "checked";?>
        value="gquery">General Query
        <input type="radio" name="type"
        <?php if (isset($type) && $type=="complain") echo "checked";?>
        value="complain">Complain
    </div>
    <div class="input-group">
      <label>Complaint Details</label>
      <input type="text" name="details">
    </div>
    <div class="input-group">
      <label>Desired Outcome</label>
      <input type="text" name="outcome">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_complain">SEND</button>
    </div>
  </form>
</body>
</html>