<?php

include 'libraries/config.php';
date_default_timezone_set("Asia/Karachi");

$date = date("d-m-20y");
$time = date("h:i:s A");


$a_username = $_POST['a_username'];
$a_password = $_POST['a_password'];

if ($a_username&&$a_password){
	$querry = mysqli_query($conn_db, "SELECT * FROM bm_admin WHERE a_username='$a_username'");
	
	$numrows = mysqli_num_rows($querry);
	
if ($numrows!=0){
	
if ($row = mysqli_fetch_array($querry)){
	
	$dbusername = $row['a_username'];
	$dbpassword = $row['a_password'];
	

         //check if they match
		 
		 if ($a_username==$dbusername&&$a_password==$dbpassword){
			 
			 header("location:home.php");
			 $_SESSION['a_username']=$a_username;
		 }
		 else {
		 $error = "<div class='Error'><p>incorrect password!</p><div>";
		 }
		 }
}
	else 
		$error = "<div class='Error'><p>That user is doesn't exist!</p><div>";
	
	
}
else 
	$error = "<div class='Error'><p>Please enter username and password</p><div>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="img/top_logo.png" />
  <title>Business Managment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/theme_css.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  
  
</head>
<body>
