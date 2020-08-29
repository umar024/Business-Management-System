<?php 

include 'libraries/config.php';
//error reporting function
error_reporting;

//start session
SESSION_START();

//user checking
$user_check=$_SESSION['a_username'];

$login = mysqli_query($conn_db,"SELECT a_username from bm_admin where a_username='$user_check'");
$row = mysqli_fetch_array($login);

$login_session= $row['a_username'];
if(!isset($login_session)){
	mysqli_close($connect);
	header('Location: index.php'); // Redirecting To Home Page
	
}



?>