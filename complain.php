<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Complain Registration</title>
    <?php include('partials.php') ?>

  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <div class="form-container">
      <div class="text-center mb-3">
        <h2>Grievance Register</h2>
      </div>
      <form method="post" action="complain.php">
        <?php include('errors.php'); ?>
        <div class="form-group mb-3">
          <label class="form-label">Title</label>
          <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
        <fieldset class="mb-3">
          <legend>Category</legend>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="generalquery"
            <?php if (isset($type) && $type=="gquery") echo "checked";?> value="gquery">
            <label class="form-check-label" for="generalquery">
              General Query
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="complain"
            <?php if (isset($type) && $type=="complain") echo "checked";?> value="complain">
            <label class="form-check-label" for="complain">
              Complain
            </label>
          </div>
        </fieldset>
        <div class="form-group mb-3">
          <label class="form-label">Complaint Details</label>
          <textarea class="form-control" name="details" id="details" cols="30" rows="5" placeholder="Description"></textarea>
        </div>
        <div class="my-3">
          <button type="submit" class="btn btn-primary" name="reg_complain">SEND</button>
        </div>
      </form>
      <a href="user_dashboard.php">Back</a>
    </div>
  </div>

    
</body>
</html>