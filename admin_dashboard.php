<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Complaint History</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Available Complaint</h2>
  </div>

  <?php
    $username = mysqli_real_escape_string($db, $_SESSION['username']);
    $query = "SELECT * FROM complaint WHERE position='$username'";
    $result = mysqli_query($db, $query);
  ?>
    <table border="2">
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
    <form method="post" action="login.php">
    <div class="input-group">
  		<button type="submit" class="btn" name="back">LOG OUT</button>
  	</div>
    </form>
</body>
</html>