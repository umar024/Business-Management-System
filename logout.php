<?php 
include 'libraries/bottom_head.php';

session_start();

session_destroy();

echo "You have been logged out. <a href='index.php'>Return</a> to the Login page!";

?>