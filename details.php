<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Complaint History</title>
    <?php include('partials.php') ?>

  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">

    <div class="text-center my-3">
      <h1>Complaint Details</h1>
    </div>
  
    <?php
      if(isset($_GET["cid"])){
          $id = $_GET["cid"];
      }
      $query = "SELECT * FROM complaint WHERE complaintid='$id'";
      $result = mysqli_query($db, $query);
      $_SESSION['id']= $id;
      $row = mysqli_fetch_assoc( $result ) 
              //echo "<tr><td>{$row['complaintid']}</td><td>{$row['title']}</td><td>{$row['type']}</td><td>{$row['details']}</td><td>{$row['regdate']}</td><td>{$row['status']}</td><td>{$row['position']}</td><td>{$row['updationdate']}</td><td>{$row['remarks']}</td></tr>\n";
      ?>
      <div class="form-container">

        <form method="post" action="details.php">
          <?php include('errors.php'); ?>
          <div class="form-group mb-3">
              <?php
                echo "<h2>{$row['title']}</h3>";
                echo "<p>{$row['details']}</p>";
                // echo "<p>Remarks/Solution : {$row['remarks']}</p>";
              ?>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="updatestatus">Update Status:</label>
              <select class="form-control" name="updatestatus" id="updatestatus">
              <option value="open" <?php if ($row['status'] == 'open')
                echo "selected"
              ?> >Open</option>
              <option value="in process"<?php if ($row['status'] == 'in process')
                echo "selected" ?> >In Process</option>
              <option value="solved" <?php if ($row['status'] == 'solved')
                echo "selected" ?> >solved</option>
              </select>
          </div>
          <div class="form-group mb-3">
            <label class="form-label" for="forward">Forward To:</label>
              <select class="form-control" name="forward" id="forward">
              <option value="admin0">admin0</option>
              <option value="admin1">admin1</option>
              <option value="admin2">admin2</option>
              </select>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Remarks/Solutions :</label>
            <input class="form-control" type="text"  name="remark" placeholder="Remark" value="<?php echo $row['remarks'] ?>">
          </div>
          <div class="my-3">
            <button type="submit" class="btn btn-primary" name="save">SAVE</button>
          </div>
        </form>
        <a href="admin_dashboard.php">Back</a>
    </div>
  </div>
</body>
</html>