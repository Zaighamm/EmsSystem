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
                                            <th>#</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                              
                                    <tbody><div id="data">
                                            <?php
                                       loaddata();

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

     <!-- DATA TABLE SCRIPTS -->
  
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });

         function delete_emp($id)
            {
                    var r = confirm("Do you Really want to delete?");
                            if (r == true) {


                                 $.ajax({
                                        url: "views/deleteEmployee.php",
                                        data:{emp_id: $id },
                                        type:"post",

                                            success: function(data){ 
                                             $.ajax({
                                            url: "",
                                            context: document.body,
                                            success: function(s,x){
                                            $(this).html(s);
                                            }
                                            });
                                                               }
                                 });

                            }

}
          
       </script>
