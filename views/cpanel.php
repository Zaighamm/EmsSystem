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
$error=" ";

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
                                $img=$row["image"];
                                $status=$row["status"];
                                if($row["image"]==null)
                                {
                                    $img="views\img.jpg";
                                }
                               if($row["project"]==null)
                               {
                                $project=" N/A ";
                                $client=" N/A ";
                                $clientc=" N/A ";
                               }
                            else {
                                $project=$row["project"];
                                $client=$row["client"];
                                $clientc=$row["clientc"];
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
 
                        }

}


?>

<?php
if(isset($_POST["uploadimg"]))
{
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts))  
{
if ($_FILES["file"]["error"] > 0) 
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
} 
else 
{
if (file_exists("Profileimages/" . $_FILES["file"]["name"])) 
{
echo $_FILES["file"]["name"] . " already exists. ";
} 
else 
{

$imagepath = "Profileimages/" . $_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"], $imagepath);
$result=query("Update employees set image='$imagepath' where id=$userid");
if (!$result) 
{
echo "Error";
}
$error="file Uploaded";
$color="green";

}
}
} 
else    
{
$error="Invalid file";
$color="red";
}

}

?>



<div class="container">
    <hr>
    <div class = "row">
        <div class = "col-sm-3 dashboardLeftPanel well" style="background-color: rgba(100,200,200,0.8); min-height: 500px;">
      
            <legend>Notifications Panel</legend>
  <?php      $query="select * from notes";
$result=query($query);
while($row=mysql_fetch_assoc($result))
{
  $no=$row['no'];
  $note=$row['note'];
 
if($row['flag']=='N'){$flag="warning";}
else  {$flag="info";}
                 
echo '<div class="alert alert-'.$flag.'"">
     <strong>'.$no.": ".'</strong>'.$note.'</div>';
}

?>
    
        </div>
     <div class = " col-sm-9  rightPanel well" style="background-color: rgba(100,200,200,0.8); min-height: 500px;">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-12" style="min-height: 200px; min-width:200px; margin-top:15px; ">
                    <img class="img-responsive" width="500" height="650" src="<?php echo $img; ?> ">
                     <form action="" method="POST" enctype="multipart/form-data" >
                     <label>Upload image: </label><input type="file" name="file" id="file" /><br>
                     <label style="color:<?php echo $color; ?>"> <?php if($error) echo $error; ?></label>
                     <button name="uploadimg" id="uploadimg" type="submit" style="margin-top:10px; float:right;"  class="btn-primary">Upload</button>
                      </form>
                    </div>
                           <form class="well"  name="" action="" onsubmit="" method="post">
                     <fieldset>
                         <legend> Hi <?php echo $name; ?><p>
                            <b>Status: </b><label style="color: <?php echo $color; ?> "><?php echo $label; ?></label></p> </legend>          
                            <legend style="color:green"> Welcome to Office Employee Management System.</legend> 
                                                          
                     <div class="form-group col-md-12">
                                      <div class="col-md-6">
                                        <label style="">Job Type:</label>
                       <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $job;?></p></label>
                                           </div>
                                        
                                    <div class="col-md-6">
                                        <label style="">Email:</label>
                       <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $email;?></p></label>
                                           </div>
                        </div>

                        <div class="form-group col-md-12">
                                      <div class="col-md-6">
                                             <label style="">Phone:</label>
                       <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $phone;?></p></label>
                                </div>
                                        
                                    <div class="col-md-6">
                                         <label style="">Address:</label>
                       <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $address;?></p></label>
                                </div>
                        </div>
                               <div class="form-group col-md-12">
                                      <div class="col-md-6">
                                             <label style="">Project:</label>
                       <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $project;?></p></label>
                                </div>
                                        
                                    <div class="col-md-6">
                                         <label style="">Client:</label>
                       <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $client;?></p></label>
                                </div>
                        </div>
                               <div class="form-group col-md-12">
                                      <div class="col-md-6">
                                             <label style="">Client Company:</label>
                       <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $clientc;?></p></label>
                                </div>
                        </div>

                   <a type="button" class="btn-lg btn-warning" href="index.php?page=updatep" style="float:right"> Update Password</a> 
                               </fieldset>
                    </form>
             </div>
                </div>
                
        </div>
    </div>
   
