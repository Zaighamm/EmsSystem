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
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Joining Date</th>
                                            <th>Leaving Date</th>
                                            <th>Status</th>
                                            <?php  if($_SESSION['right']=="A"){ ?>    <th>#</th> 
                                            <th>#</th> <?php } ?>
                                        </tr>
                                    </thead>
                              
                                    <tbody><div id="data">
                                            <?php
                                    $result=query("select * from employees"); 
                   
                                            while($row=mysql_fetch_array($result))
                                            {
                                                $check=$row['Lev_Date'];
                                                $status=$row['status'];
                                                
                                                if($check==null)
                                               { $check="  N/A  ";
                                               }
                                                
                                               
                                                  $label="Active";
                                                  $color="green";
                                               
                                               if($status=="B")
                                               {
                                                  $label="Blocked";
                                                  $color="red";
                                               }
                                              else if($status=="R")
                                              {   $label="Retired";
                                                  $color="blue";
                                              }
                                               
     
                                              
echo "<tr><td>".$row['id']."</td><td id='na'>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['jobtype']."</td>
<td>".$row['gender']."</td><td>".$row['address']."</td>
<td>".$row['Join_Date']."</td><td>".$check."</td>
 <td> <label  style='color:".$color."'>".$label."</label> </td>";
                                                if($_SESSION['right']=="A"){
  echo "<td><a type='button'  class='btn-sm btn-info' href='index.php?page=UpdateEmployee&empdata=".$row['id']."'>
     Update</a> </td>";
     echo "<td><button type='button' class='btn-sm btn-danger' onclick='delete_emp(".$row['id'].");'>
     Delete</button>
  </td>"; } echo" </tr>";
                                            
                                                
                                               
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
                                        data:{del_id: $id },
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

  <script src="js/bootstrap.js"></script>