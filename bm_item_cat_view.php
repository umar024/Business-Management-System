<?php 
 include 'libraries/session.php';
 include 'libraries/bottom_head.php';


?>

<div class="SpacingBox"></div>


 <style type="text/css">
	

.results tr[visible='false'],
.no-result{
  display:none;
}

.results tr[visible='true']{
  display:table-row;
}

.counter{
  padding:8px; 
  color:#ccc;
}
	</style>
   <script language="javascript">
	$(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  });
});
	</script>


        
<div class="SpacingBox"></div>
<div class="FormHeading">
<div class="container-fluid">
  <div class="row">
   <h1> <span class="glyphicon glyphicon-eye-open"></span> View Items categary</h1>
  </div>
</div></div>



<div class="container">


  <div class="row">
      <div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
</div><span class="counter pull-right"></span>
    <div class="col-md-12">
<div class="table-responsive" id="divToPrint">
      <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover table-bordered results">
        <thead>
          <tr>
		  <th>#</th>
        <th>Item Name</th>
        <th>Item Categary</th>
        <th>Activate / Deactivate</th>
		  <th>Delete</th>
		  <th>Enable</th>
          </tr>
        </thead>
 
 <?php

 
   $it_cat_id = $_POST['it_cat_id'];
   
   if($_POST['Delete']){
   
   
   
   
   $Upadte = mysqli_query($conn_db,"DELETE FROM bm_item_categary WHERE it_cat_id='$it_cat_id'")or die("Error with querry");
   
     echo"<div class='alert alert-success alert-dismissable'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success!</strong> Your data has be Deleted.
</div>";
   }
 
   $it_cat_id = $_POST['it_cat_id'];
   
   if($_POST['Disable']){
   
   $Upadte = mysqli_query($conn_db,"UPDATE bm_item_categary SET it_cat_status=0 WHERE it_cat_id='$it_cat_id'")or die("Error with querry");
   
     echo"<div class='alert alert-success alert-dismissable'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Enabled!</strong> Status has be enabled.
</div>";
   }
 
   
   if($_POST['Enable']){
   
   $Upadte = mysqli_query($conn_db,"UPDATE bm_item_categary SET it_cat_status=1 WHERE it_cat_id='$it_cat_id'")or die("Error with querry");
   
    echo"<div class='alert alert-danger alert-dismissable'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Disabled!</strong> Status has be disabled.
</div>";
   }
 
 
	$GetItems = mysqli_query($conn_db,"SELECT * FROM bm_item_categary") or die("Error with querry");
	while ($row = mysqli_fetch_array($GetItems)){
		
       $it_cat_id       = $row['it_cat_id'];
       $item_id         = $row['item_id'];
       $it_cat_name     = $row['it_cat_name'];
       $it_cat_status   = $row['it_cat_status'];
	
?>
	
 

     <tbody>
		
    		 <tr>
    <td><?php echo $it_cat_id; ?></td>
    <td>
	<?php 
	$GetItemsName = mysqli_query($conn_db,"SELECT * FROM bm_items where item_id='$item_id'");
	if($row = mysqli_fetch_array($GetItemsName)){
		
		$item_id     = $row['item_id'];
       $item_name    = $row['item_name'];
		
		echo $item_name; ?><?php }?></td>
		
    <td><?php echo $it_cat_name; ?></td> 
	
	 <form id='form1' name='form1' method='post'>
	  <td>
	  <?php
			if ($it_cat_status==1){ ?>
				<input type="hidden" name="it_cat_id" id="it_cat_id" value="<?php echo $it_cat_id; ?>"> 
				<input type="submit" name="Disable" value="Disable" id="btn"> 
			<?php }elseif($it_cat_status==0){ ?>
				 <input type="hidden" name="it_cat_id" id="it_cat_id" value="<?php echo $it_cat_id; ?>">
				 <input type="submit" name="Enable" value="Enable" id="btn">
			<?php } ?>
		</td>
		<td><input type="hidden" name="it_cat_id" value="<?php echo $it_cat_id; ?>">
		<input type="submit" name="Delete" onclick="deleteme()" value="Delete" id="btn"></td>
		<td><br><a href="item_cat_edit.php?CatID=<?php echo $it_cat_id; ?>" id="btn">Edit</a></td>
		</form>
	<?php } ?>
	
	
        
		</tr>
		</tbody>
      </table>

<script>

function deleteme(delid)
{
	if (confirm("Selected row will be deleted!")){
		window.location.href='bm_item_cat_view.php?Delete='+delid+'';
			return true;
	}
	
}
</script>
	  
    </div>
    
  </div>
</div></div>

<div class="SpacingBox"></div>











<?php

 include 'libraries/footer.php';
?>