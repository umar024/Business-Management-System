  <style>
.caret-up {
    width: 0; 
    height: 0; 
    border-left: 4px solid rgba(0, 0, 0, 0);
    border-right: 4px solid rgba(0, 0, 0, 0);
    border-bottom: 4px solid;
    
    display: inline-block;
    margin-left: 2px;
    vertical-align: middle;
}
</style>
<script>
    $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });
    
</script>

<nav class="NavBar">
<nav class="navbar-inverse">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
</nav>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
		
		 <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
             New<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="Menuclass"><a href="bm_items_add.php"> <span class="glyphicon glyphicon-plus"></span> Items</a></li>
            <li class="Menuclass"><a href="bm_item_cat_add.php"> <span class="glyphicon glyphicon-plus"></span> Item Categary</a></li>
            <li class="Menuclass"><a href="bm_godown_add.php"> <span class="glyphicon glyphicon-plus"></span> Godown</a></li>
							
            </ul>
          </li>
		
		 <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
             View<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="Menuclass"><a href="bm_items_view.php"> <span class="glyphicon glyphicon-eye-open"></span> Items</a></li>
            <li class="Menuclass"><a href="bm_item_cat_view.php"> <span class="glyphicon glyphicon-eye-open"></span> Item Categary</a></li>
            <li class="Menuclass"><a href="bm_godown_view.php"> <span class="glyphicon glyphicon-eye-open"></span> Godown</a></li>
							
            </ul>
          </li>
		
		
		
		<!-- <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
            Report<span class="caret"></span></a>
            <ul class="dropdown-menu">
			 <li class="dropdown-submenu">
            <a class="test" href="index.php?view=iosh">INTERNATIONAL COURSES <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?view=iosh">IOSH</a></li>
              <li><a href="index.php?view=habc">HABC</a></li>
              <li><a href="index.php?view=bsc">BSC</a></li>
              <li><a href="index.php?view=cieh">CIEH</a></li>
              <li><a href="index.php?view=sti">STI</a></li>
            </ul>
          </li>
			
			<li class="Menuclass"><a href="index.php?view=skill-based-safety-courses">SKILL BASED SAFETY COURSES</a></li>
							<li class="Menuclass"><a href="index.php?view=management-programs">MANAGEMENT PROGRAM</a></li>
							<li class="Menuclass"><a href="index.php?view=food-safety-courses">FOOD SAFETY COURSES</a></li>
							
            </ul>
          </li>--->
		 
		  
		
        </ul>
	
    </div><!-- /.navbar-collapse -->

	
</nav>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
