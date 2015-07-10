<?php if(isset($_GET['page']))
    $page=$_GET['page'];
else 
{$page="home"; }

if(isset($_SESSION['id']))
$h_id=$_SESSION['id'];

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

if($_SESSION['right']=="E"||$_SESSION['right']=="A") { 
?>
    <li <?php if($page=="myAttendance") { ?> class="active" <?php } ?> > <a href="index.php?page=myAttendance&my_id=<?php echo $h_id; ?>">My Attendance list</a> </li>
  <?php     } 


 if($_SESSION['right']=="A") { ?>
    <li <?php if($page=="employeeslist") { ?> class="active" <?php } ?> > <a href="index.php?page=employeeslist">Employees list</a> </li>
    <li <?php if($page=="attendance") { ?> class="active" <?php } ?> > <a href="index.php?page=attendance">Employees Attendance list</a> </li>
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
<div class="container" style="padding:0px;">