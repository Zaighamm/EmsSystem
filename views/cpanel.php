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




if(isset($_GET['name']))
{
$_SESSION['name']=$_GET['name'];

}
$name=$_SESSION['name'];

if(isset($_POST['upass']))
{ 

if($_POST['cnewpass']!=$_POST['newpass'])
{
$passwordChangeMessage = "Password NOT Changed."; $color = "red";
}
else{

$np=$_POST['newpass'];
$op=$_POST['oldpass'];
$result=query("update login set password=MD5('$np') where password=MD5('$op') and username='$name'");
    if($result){
    $passwordChangeMessage = "Password Changed.";
        $color ="green";
}
else{ $passwordChangeMessage = "Password NOT Changed."; $color = "red";}


}
}




?>
<div class="container">
    <hr>
    <br/>
    <br/>
    <div class = "row">
        <div class = "col-sm-3 dashboardLeftPanel well" style="background-color: rgba(100,200,200,0.8); min-height: 300px;">
            <h4>Change Password</h4>
            
            <form method = "post" action="" onsubmit="">
                <input type="password" class="form-control " id="oldpass" name="oldpass" placeholder="Old password" required>
                <br/>
                <input type="password" class="form-control " id="newpass" name="newpass" placeholder="New Password" required>
                <br />
                <input type="password" class="form-control " id="cnewpass" name="cnewpass" placeholder="Retype New Password" required>
                 <div style="margin-top:5px; color: <?php echo $color?>;">
                    <?php if(isset($passwordChangeMessage)) {
                            echo $passwordChangeMessage;
                        }
                            else
                                echo" ";
                    ?> 
                </div>
                <br />
                <div class="text-center">
                    <button type="submit" class='btn btn-primary btn-sm' id="upass" name="upass">Update Password</button>
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
                    </div>
                </div>
                
        </div>
    </div>
    </div>