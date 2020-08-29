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
   <h1> <span class="glyphicon glyphicon-eye-open"></span> View Godowns</h1>
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
        <th>Name</th>
        <th>Status</th>
          </tr>
        </thead>
 
 <?php

 
   $gd_id = $_POST['gd_id'];
   
   if($_POST['Disable']){
   
   $Upadte = mysqli_query($conn_db,"UPDATE bm_godown SET gd_status=0 WHERE gd_id='$gd_id'")or die("Error with querry");
   
     echo"<div class='alert alert-success alert-dismissable'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Enabled!</strong> Status has be enabled.
</div>";
   }
 
   
   if($_POST['Enable']){
   
   $Upadte = mysqli_query($conn_db,"UPDATE bm_godown SET gd_status=1 WHERE gd_id='$gd_id'")or die("Error with querry");
   
    echo"<div class='alert alert-danger alert-dismissable'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Disabled!</strong> Status has be disabled.
</div>";
   }
 
 
	$GetItems = mysqli_query($conn_db,"SELECT * FROM bm_godown") or die("Error with querry");
	while ($row = mysqli_fetch_array($GetItems)){
		
	   $gd_id          = $row['gd_id'];
       $gd_name        = $row['gd_name'];
       $gd_status      = $row['gd_status'];
	
?>
	
 

     <tbody>
		
    		 <tr>
    <td><?php echo $gd_id; ?></td>
    <td><?php echo $gd_name; ?></td> 
	
	 <form id='form1' name='form1' method='post'>
	  <td>
	  <?php
			if ($gd_status==1){ ?>
				<input type="hidden" name="gd_id" id="gd_id" value="<?php echo $gd_id; ?>"> 
				<input type="submit" name="Disable" value="Disable" id="btn"> 
			<?php }elseif($gd_status==0){ ?>
				 <input type="hidden" name="gd_id" id="gd_id" value="<?php echo $gd_id; ?>">
				 <input type="submit" name="Enable" value="Enable" id="btn">
			<?php } ?>
		</td></form>
	<?php } ?>
	
	
        
		</tr>
		</tbody>
      </table>

    </div>
    
  </div>
</div></div>

<div class="SpacingBox"></div>











<?php

 include 'libraries/footer.php';
?>