<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Complaint History</title>
    <?php include('partials.php') ?>

  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1> GREIVANCE <br> MANAGEMENT SYSTEM</h1>
  <div class="container" style="border: 1px solid lightgrey; border-radius: 5px;">

    <div class="text-center my-3">
      <h2>Available Complaint</h2>
    </div>
  
    <?php
      $username = mysqli_real_escape_string($db, $_SESSION['username']);
      $query = "SELECT * FROM complaint WHERE position='$username'";
      $result = mysqli_query($db, $query);
    ?>
      <table class="table">
      <thead>
          <tr>
          <th>Complaint Id</th>
          <th>Complaint Title</th>
          <th>Complaint Type</th>
          <th>status</th>
          <th>View Details</th>
          <th>Last Updation Date</th>
  
          </tr>
      </thead>
      <tbody>
          <?php
          if( mysqli_num_rows( $result )==0 ){
              echo '<tr><td colspan="4">No complaints Found</td></tr>';
          }else{
              while( $row = mysqli_fetch_assoc( $result ) ){
                  $id = $row['complaintid'];
              echo "<tr><td>{$row['complaintid']}</td><td>{$row['title']}</td><td>{$row['type']}</td><td>{$row['status']}</td>
              <td><a href='details.php?cid=$id'>View Details</td><td>{$row['updationdate']}</td></tr>\n";
              }
              
          }
          ?>
      </tbody>
      </table>
      <div class="my-3">

        <a href="login.php?logout='1'">logout</a>
      </div>
  </div>
</body>
</html>