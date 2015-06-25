<?php
if(!isset($_SESSION["right"]))
{
header("Location: index.php?page=home");
}
if(isset($_SESSION['start_time'])){
if($_SESSION['start_time'] <= strtotime("-10 minutes"))
{
?>
<div class = "row">
        <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
            <div class="well align-center">
Session has Expired please login again.      
            </div>
        </div>
    </div>
     <?php
               unset($_SESSION['username']);
              // Delete all session variables
               session_destroy();
?><script>
setTimeout("location.href = 'index.php?page=logout';",4000);
 </script>

<?php
    
}
}

?>
            <div class="row well">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Employees List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Job Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
	
                                        <?php
	
      $result=query("select * from employees"); 
	 
	   while($row=mysql_fetch_array($result)){
     $output="<tr class><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['jobtype']."</td></tr>";
      echo $output;
	 }

	 ?>
                                         
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>