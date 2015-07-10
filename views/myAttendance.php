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
     ?>

<script>
setTimeout("location.href = 'index.php?page=logout';",4000);
 </script>

<?php
    
}
}
if(isset($_GET["my_id"]))
$my_id=$_GET["my_id"];

?>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                            <div class="panel-heading">
                                 Attendance List
                            </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Attendance Date</th>
                                            <th>Attendance Status</th>
                                        </tr>
                                    </thead>
                              
                                    <tbody><div id="data">
                                        <?php
                      $result=query("select * from emp_attendance where empid=$my_id"); 
                   
                                            while($row=mysql_fetch_array($result)){
                                            
                                                $output="<tr><td id='na'>".$row['Date']."</td><td>".$row['AttendanceStatus']."</td></tr>";
                                            echo $output;
                                                
                                               
                                            }
?>
                                         </div>
                                    </tbody>
                              
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                 </div> 
                         <script src="assets/js/dataTables/jquery.dataTables.js"></script>
                         <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
</div>
   <script>

            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
</script>