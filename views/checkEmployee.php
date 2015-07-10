<?php
if(!isset($_SESSION["right"]))
{
header("Location: index.php?page=home");
}
if(isset($_SESSION['start_time'])){
if($_SESSION['start_time'] <= strtotime("-20 minutes"))
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

?>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                            <div class="panel-heading">
                                Employee Projects and Client Details
                            </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Name </th>
                                            <th>Project</th>
                                            <th>Client Name</th>
                                            <th>Client Company name</th>
                                        </tr>
                                    </thead>
                              
                                    <tbody><div id="data">
                                        <?php
                      $result=query("select * from employees"); 
                   
                                            while($row=mysql_fetch_array($result)){
                                                $project=$row['project'];
                                                $client=$row['client'];
                                                $clientc=$row['clientc'];
                                                if($project==null)
                                                { $project=" N/A ";
                                                  $client=" N/A ";
                                                  $clientc=" N/A ";
                                                }


                                                $output="<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$project."</td><td>".$client."</td><td>".$clientc."</td></tr>";
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