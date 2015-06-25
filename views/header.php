<?php if(isset($_GET['page']))
    $page=$_GET['page'];
else 
{$page="home"; }

?>

	<body>
    
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a class="nav navbar-brand" href="#">Office Employee Management System</a>
    </div>
              
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
      <ul class="nav navbar-nav">

     <li  <?php if($page=="home"||$page=="Signup") { ?>   class="active"  ><a href="index.php?page=home">Home</a></li> <?php } ?>
                          
<?php if(isset($_SESSION['right'])&&$page!="home") { 
?><li <?php if($page=="cpanel") { ?> class="active" <?php } ?> > <a href="index.php?page=cpanel">My Profile</a> </li> <?php

 if($_SESSION['right']=="A") { ?>
    <li <?php if($page=="employeeslist") { ?> class="active" <?php } ?> > <a href="index.php?page=employeeslist">Employees list</a> </li>
  
    <?php    } ?>
   
</ul>


    <ul class="nav navbar-nav navbar-right">
<?php if($_SESSION['right']=="A") { ?>
    <li <?php if($page=="newemployee") { ?> class="active" <?php } ?> > <a href="index.php?page=newemployee">Add new Employee</a> </li> 
    <?php    } ?>


			 <li <?php if($page=="logout") { ?> class="active" <?php }?> ><a href="index.php?page=logout" style="align:right">Logout<span style="margin-left:5px" class="glyphicon glyphicon-log-out"></span></a>
			 </li>
				</ul>
   <?php } ?>
    </div>
            		
    </div>
</nav>
<div class="container">