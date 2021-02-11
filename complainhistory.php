<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Complaint History</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Complaint History</h2>
  </div>

  <?php
    $username = mysqli_real_escape_string($db, $_SESSION['username']);
    $query1 = "SELECT * FROM users WHERE name= '$username'";
    $results1 = mysqli_query($db, $query1);
    $id=mysqli_fetch_assoc( $results1 )['id'];
    $query = "SELECT * FROM complaint WHERE userid='$id'";
    $result = mysqli_query($db, $query);
  ?>
    <table border="2">
    <thead>
        <tr>
        <th>Complaint Id</th>
        <th>Complaint Title</th>
        <th>Complaint Type</th>
        <th>Complaint Details</th>
        <th>Registration Date</th>
        <th>status</th>
        <th>position</th>
        <th>Last Updation Date</th>
        <th>Remarks/Solution</th>

        </tr>
    </thead>
    <tbody>
        <?php
        if( mysqli_num_rows( $result )==0 ){
            echo '<tr><td colspan="4">No complaints Found</td></tr>';
        }else{
            while( $row = mysqli_fetch_assoc( $result ) ){
            echo "<tr><td>{$row['complaintid']}</td><td>{$row['title']}</td><td>{$row['type']}</td><td>{$row['details']}</td><td>{$row['regdate']}</td><td>{$row['status']}</td><td>{$row['position']}</td><td>{$row['updationdate']}</td><td>{$row['remarks']}</td></tr>\n";
            }
        }
        ?>
    </tbody>
    </table>
    <form method="post" action="user_dashboard.php">
    <div class="input-group">
  		<button type="submit" class="btn" name="back">BACK</button>
  	</div>
    </form>
</body>
</html>