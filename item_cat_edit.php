<?php 
 include 'libraries/session.php';
 include 'libraries/bottom_head.php';

   
   $CatID = $_GET['CatID'];


       $it_cat_id       = $_POST['it_cat_id'];
       $item_id         = $_POST['item_id'];
       $it_cat_name     = $_POST['it_cat_name'];


	   if($_POST['update']){
	   
	   $AddItems = mysqli_query($conn_db,"SELECT it_cat_name FROM bm_item_categary WHERE it_cat_name='$it_cat_name'");
	   $CheckItem = mysqli_num_rows($AddItems);
	    if($CheckItem!=0){
			
			echo "<div class='alert alert-danger'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Already Add!</strong> Item Categary is already add.
</div>";
		}
		else {
			
			$InsertItems = mysqli_query($conn_db,"UPDATE bm_item_categary SET item_id='$item_id',it_cat_name='$it_cat_name' WHERE it_cat_id='$it_cat_id'") or die("Error with querry");
			echo "<div class='alert alert-success'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Added!</strong> Item Categary has been Updated.
</div>";
			
	   }
	   }
	   
	   
	   ///----------------------Fetching Querry////////////
	   
	   
	   $GetItems = mysqli_query($conn_db,"SELECT * FROM bm_item_categary where it_cat_id=$CatID") or die("Error with querry");
	if ($row = mysqli_fetch_array($GetItems)){
		
       $it_cat_id       = $row['it_cat_id'];
       $item_id         = $row['item_id'];
       $it_cat_name     = $row['it_cat_name'];
	   
	   
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
    <form class="form-horizontal" action="item_cat_edit.php?CatID=<?php echo $it_cat_id; ?>" method="post">
	<div class="form-group">
	<input type="hidden" class="form-control" name="it_cat_id" value="<?php echo $it_cat_id; ?>">
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
      <input type="text" class="form-control" name="it_cat_name" placeholder="Categary Name" value="<?php echo $it_cat_name; ?>">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="update" value="Update" id="btn" style="float: right;">
    </div>
  </div>
</form>
    </div>
    <div class="col-sm-6"></div>
  </div>
</div>

<div class="SpacingBox"></div>






<?php
	}
 include 'libraries/footer.php';
?>