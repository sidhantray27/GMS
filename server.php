<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'Sidhu@27', 'mygms');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE name='$username' OR mailid='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (name, mailid, password, contact,type) 
  			  VALUES('$username', '$email', '$password', '$phone','user')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}

// ... 


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE name='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      if (mysqli_fetch_assoc($results)['type'] == 'user' ){
        header('location: user_dashboard.php');
      }
      else{
        header('location: admin_dashboard.php');
      }
      
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

//Complain Register

if (isset($_POST['reg_complain'])) {
  // receive all input values from the form
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $type = mysqli_real_escape_string($db, $_POST['type']);
  $details = mysqli_real_escape_string($db, $_POST['details']);
  $username = $_SESSION['username'];
  //$phone = mysqli_real_escape_string($db, $_POST['phone']);

  if (empty($title)) { array_push($errors, "Complaint Title is required"); }
  if (empty($type)) { array_push($errors, "Complain Type is required"); }
  if (empty($details)) { array_push($errors, "Complain Details is required"); }

  if (count($errors) == 0) {

    $user_check_query = "SELECT * FROM users WHERE name='$username' ";
    $result = mysqli_query($db, $user_check_query);
    $userid = mysqli_fetch_assoc($result)['id'];

    $query = "INSERT INTO complaint (userid, type, details, title, status , position) 
            VALUES('$userid', '$type', '$details', '$title', 'open','admin0')";
    mysqli_query($db, $query);
    //<script language="javascript">
    //alert("Your Complain is lodged successfully") ;
    //</script>
    header('location: user_dashboard.php');
  }
}

if (isset($_POST['save'])) {
  // receive all input values from the form
  $status = mysqli_real_escape_string($db, $_POST['updatestatus']);
  $position = mysqli_real_escape_string($db, $_POST['forward']);
  $remark = mysqli_real_escape_string($db, $_POST['remark']);
  $id = $_SESSION['id'];

  if (!empty($status)) { 
    $complaint_update_query ="UPDATE complaint SET status = '$status' WHERE complaintid = '$id'";
    $result = mysqli_query($db, $complaint_update_query);
  }

  if (!empty($position)) { 
    $complaint_update_query ="UPDATE complaint SET position = '$position' WHERE complaintid = '$id'";
    $result = mysqli_query($db, $complaint_update_query);
  }

  if (!empty($remark)) { 
    $complaint_update_query ="UPDATE complaint SET remarks = '$remark' WHERE complaintid = '$id'";
    $result = mysqli_query($db, $complaint_update_query);
  }

    //<script language="javascript">
    //alert("Your Complain is lodged successfully") ;
    //</script>
}

?>