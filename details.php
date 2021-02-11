<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Complaint History</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Complaint Details</h2>
  </div>

  <?php
    if(isset($_GET["cid"])){
        $id = $_GET["cid"];
    }
    $query = "SELECT * FROM complaint WHERE complaintid='$id'";
    $result = mysqli_query($db, $query);
    $_SESSION['id']= $id;
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
    <form method="post" action="details.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
      <label for="updatestatus">Update Status:</label>
        <select name="updatestatus" id="updatestatus">
        <option value="open">Open</option>
        <option value="in process">In Process</option>
        <option value="solved">solved</option>
        </select>
  	</div>
    <div class="input-group">
      <label for="forward">Forward To:</label>
        <select name="forward" id="forward">
        <option value="admin0">admin0</option>
        <option value="admin1">admin1</option>
        <option value="admin2">admin2</option>
        </select>
  	</div>
    <div class="input-group">
      <label>Remarks/Solutions :</label>
  		<input type="text"  name="remark">
  	</div>
    <div class="input-group">
  		<button type="submit" class="btn" name="save">SAVE</button>
  	</div>
  </form>
    <form method="post" action="admin_dashboard.php">
    <div class="input-group">
  		<button type="submit" class="btn" name="back">BACK</button>
  	</div>
    </form>
</body>
</html>