<?php 

	
   $conn_db = mysqli_connect("host","user","","db");
   
   
   // Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   
  error_reporting(0);
session_start();//strat session_cache_expire
	
?>