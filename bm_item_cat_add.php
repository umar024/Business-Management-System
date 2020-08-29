<?php 
 include 'libraries/session.php';
 include 'libraries/bottom_head.php';


       $item_id         = $_POST['item_id'];
       $it_cat_name     = $_POST['it_cat_name'];
       $it_cat_status   = $_POST['it_cat_status'];


	   if($_POST['submit']){
	   
	   $AddItems = mysqli_query($conn_db,"SELECT it_cat_name FROM bm_item_categary WHERE it_cat_name='$it_cat_name'");
	   $CheckItem = mysqli_num_rows($AddItems);
	    if($CheckItem!=0){
			
			echo "<div class='alert alert-danger'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Already Add!</strong> Item Categary is already add.
</div>";
		}
		else {
			
			$InsertItems = mysqli_query($conn_db,"INSERT into bm_item_categary VALUES('','$item_id','$it_cat_name','1')") or die("Error with querry");
			echo "<div class='alert alert-success'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Added!</strong> Item Categary has been added.
</div>";
			
	   }
	   }
	   
?>


<div class="SpacingBox"></div>
<div class="FormHeading">
<div class="container-fluid">
  <div class="row">
   <h1><span class="glyphicon glyphicon-list-alt"></span> Add Item Categary</h1>
  </div>
</div></div>

<div class="SpacingBox"></div>


<div class="container-fluid form">
  <div class="row">
    <div class="col-sm-6">
    <form class="form-horizontal" action="bm_item_cat_add.php" method="post">
	<div class="form-group">
    <label class="control-label col-sm-3" for="item_id">Item Name:</label>
    <div class="col-sm-9"> 
      <select type="text" class="form-control" name="item_id">
	   <option value="0">---Select---</option>
	   <?php 
	 $GETAdmin = mysqli_query($conn_db,"SELECT * FROM bm_items WHERE item_status='1'") or die("Error with querry");
	while ($row = mysqli_fetch_assoc($GETAdmin)){
		$item_id	    = $row['item_id'];
		$item_name	    = $row['item_name'];
		?>
      <option value="<?php echo $item_id; ?>"><?php echo $item_name; ?></option>
<?php } ?></select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="it_cat_name">Categary Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="it_cat_name" placeholder="Categary Name">
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