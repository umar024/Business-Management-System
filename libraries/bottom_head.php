<?php 

 include 'libraries/session.php';
 include 'libraries/header.php';
?>



 <div class="BottomHead">
  <div class="container-fluid">
  <div class="row">
	 <div class="col-sm-3"><img src="img/logo.png"> </div>
	 <div class="col-sm-9"> </div>
  </div>
</div></div>


<div class="header">
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6"><?php include "libraries/dropdownmenu.php"; ?></div>
    <div class="col-sm-3"></div>
    <div class="col-sm-3"><ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"> Hello <?php echo $user_check=$_SESSION['a_username'];?>!  <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul> </div>
  </div>
</div></div>
	
	
 


<div class="TimeStamp">
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2 Time"><?php echo $today = date("Fj,Y - g:i:s A");?></div>
  </div>
</div></div>