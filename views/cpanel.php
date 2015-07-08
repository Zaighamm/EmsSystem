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
?><script>
setTimeout("location.href = 'index.php?page=logout';",4000);
 </script>

<?php
    
}
}

if(isset($_SESSION["id"]))
{
        $userid=$_SESSION["id"];

        $result=query("Select * from employees where id='$userid'");

        if(!$result)
        echo "error";

                        while($row=mysql_fetch_array($result))
                        {
                                $name=$row["name"];
                                $job=$row["jobtype"];
                                $email=$row["email"];
                                $phone=$row["phone"];
                                $address=$row["address"];
                        }

}


?>
<script>
jQuery(document).ready(function(){

           jQuery("#update").submit(function(){
                     
                if($("#cnewpass").val()!=$("#newpass").val())
                {
                 $("#msg").html("Password Doesn't Match.");
                 document.getElementById("msg").style.color="red";
                 setTimeout(function(){ $("#msg").html(" "); },2000);
                document.getElementById("update").reset();
                }
                else {
                $.ajax({
                   url: "views/updatePassword.php",
                   type:"post",
                   data: { newp: $("#newpass").val(),oldp: $("#oldpass").val()},
                   success: function(data)
                               {
                                       if(data=="true")
                                       {       
                                                 $("#msg").html("Password  Changed.");
                                                 document.getElementById("msg").style.color="green";
                                                 setTimeout(function(){ $("#msg").html(" "); },2000);
                                                 document.getElementById("update").reset();
                                       }
                                      else
                                        {      $("#msg").html("Incorrect old password.");
                                               document.getElementById("msg").style.color="red";
                                               setTimeout(function(){ $("#msg").html(" "); },2000);  
                                                document.getElementById("update").reset();
                                        }

                               }

                    });

                  }

               return false;
           })(jQuery);
})(jQuery);
</script>
<div class="container">
    <hr>
    <br/>
    <br/>
    <div class = "row">
        <div class = "col-sm-3 dashboardLeftPanel well" style="background-color: rgba(100,200,200,0.8); min-height: 300px;">
            <h4>Change Password</h4>
            
            <form  name="update" id="update" action="" >
                <input type="password" class="form-control " id="oldpass" name="oldpass" placeholder="Old password" required>
                <br/>
                <input type="password" class="form-control" id="newpass" name="newpass" placeholder="New Password" required>
                <br />
                <input type="password" class="form-control " id="cnewpass" name="cnewpass" placeholder="Retype New Password" required>
                 <div id="msg" style="margin-top:5px; ">
                  
                </div>
                <br />
                <div class="text-center">
                    <button type="submit" class='btn btn-primary btn-block btn-lg btn-custom' id="upass" name="upass">Update Password</button>
                </div>
            </form>  
            
        </div>
     <div class = " col-sm-7 col-sm-offset-1 rightPanel well" style="background-color: rgba(100,200,200,0.8); min-height: 300px;">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-12" style="min-height: 200px; min-width:200px;">
                    <img class="img-responsive" src="views\img.jpg">
                    </div>
                             
                            <div class="col-lg-7 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-12">
                                   <div class = "row">
                                    <h2>Hi <?php echo $name; ?></h2>
                                    <p> Welcome to Office Employee Management System.</p>
                                    </div> 
                                 <div class="form-group col-md-8 well"> 
                                    <div class = "row">
                                        <label style="">Job Type:</label>
                       <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $job;?></p></label>
                                           </div>
                                       <div class = "row">
                                        <label style="">Email:</label>
                       <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $email;?></p></label>
                                           </div>
                                       <div class = "row">
                                        <label style="">Phone:</label>
                       <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $phone;?></p></label>
                                </div>
                                <div class = "row">
                                        <label style="">Address:</label>
                       <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $address;?></p></label>
                                </div>
                                </div>  

                            </div>
                </div>
                
        </div>
    </div>
    </div>
