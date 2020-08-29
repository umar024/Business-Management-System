<?php 

include 'libraries/config.php';
include 'libraries/header.php';
?>
	
	<!--end login area -->
	<div class="LoginNew">
	<div class="container">
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4 Login">
<div class="SpacingBox"></div>
	<h1>Business Managment</h1>
	<p>Website Design & Develop By <a href="">BSE 6A Students</a></p>
	<h2><?php echo  $error;?></h2>
	<form id="form1" name="form1" method="post">
	<?php
     

	$GetItems = mysqli_query($conn_db,"SELECT * FROM bm_admin") or die("Error with querry");
	if ($row = mysqli_fetch_array($GetItems)){
		
	   $a_username          = $row['a_username'];
       $a_password          = $row['a_password'];
	
  
	?>
    <div class="form-group">
    <label for="username">Username:</label>
    <input type="username" class="form-control"  name="a_username" id="a_username" placeholder="Enter Username" value="<?php echo $a_username; ?>">
    </div>
    <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="a_password" id="a_password" placeholder="Enter Password" value="<?php echo $a_password; ?>">
    </div>
     <div class="form-group"> 
    <div class=" col-sm-12">
       <input type="submit" class="form-control" name="login" id="btn" value="Login"/>
    </div>
  </div>
	<?php } ?>
    </form>
	<a href=""><p>Forget your Password?</p></a>
	
    <div class="SpacingBox"></div>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	
</div></div>
		