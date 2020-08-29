<?php 
 include 'libraries/session.php';
 include 'libraries/bottom_head.php';


       $gd_name        = $_POST['gd_name'];
       $gd_status      = $_POST['gd_status'];


	   if($_POST['submit']){
	   
	   $AddItems = mysqli_query($conn_db,"SELECT gd_name FROM bm_godown WHERE gd_name='$gd_name'");
	   $CheckItem = mysqli_num_rows($AddItems);
	    if($CheckItem!=0){
			
			echo "<div class='alert alert-danger'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Already Add!</strong> Godown is already add.
</div>";
		}
		else {
			
			$InsertItems = mysql_query($conn_db,"INSERT into bm_godown VALUES('','$gd_name','1')") or die("Error with querry");
			echo "<div class='alert alert-success'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Added!</strong> Godown has been added.
</div>";
			
	   }
	   }
	   
?>


<div class="SpacingBox"></div>
<div class="FormHeading">
<div class="container-fluid">
  <div class="row">
   <h1><span class="glyphicon glyphicon-list-alt"></span> Add Godown</h1>
  </div>
</div></div>

<div class="SpacingBox"></div>


<div class="container-fluid form">
  <div class="row">
    <div class="col-sm-6">
    <form class="form-horizontal" action="bm_godown_add.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-3" for="gd_name">Godown Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="gd_name" placeholder="Godown Name">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="submit" value="Save" id="btn" style="float: right;">
    </div>
  </div>
</form>
    </div>
    <div class="col-sm-6"></div>
  </div>
</div>

<div class="SpacingBox"></div>






<?php

 include 'libraries/footer.php';
?>