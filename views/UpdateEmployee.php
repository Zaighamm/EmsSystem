<?php
if(isset($_GET["empdata"]))
   {

       $test_id=$_GET["empdata"];
      $result=query("select * from employees where id=$test_id"); 
        if(!$result)
        {echo "error";
        }
    
    while($row=mysql_fetch_array($result)){

                                $name=$row["name"];
                                $email=$row["email"];
                                $jobtype=$row["jobtype"];
                                $address=$row["address"];
                                $gender=$row["gender"];
                                $phone=$row["phone"];
                                $jdate=$row["Join_Date"];
                                $ldate=$row["Lev_Date"];


                                           }

   }

if(isset($_POST['setdata']))
{
      $test_id=$_GET["empdata"];

                                $name=$_POST["name"];
                                $email=$_POST["email"];
                                $jobtype=$_POST["jtype"];
                                $address=$_POST["address"];
                                $gender=$_POST["gender"];
                                $phone=$_POST["phone"];
                                $jdate=$_POST["jdate"];
                                $ldate=$_POST["ldate"];


      $result=query("UPDATE employees SET `name` = '$name', `phone` = '$phone',`email` = '$email', `jobtype` = '$jobtype', `address`= '$address', `Join_Date` = '$jdate', `Lev_Date` = '$ldate',`gender`='$gender'  WHERE `id`=$test_id");

 if(!$result)
        {echo "error";
        }
else
{
echo '<div class = "row">
        <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
            <div class="well align-center">
Data Updated  Successfully.      
            </div>
        </div>
    </div>';
?>

<script>
setTimeout("location.href = 'index.php?page=employeeslist';",2000);
 </script>

<?php
}


}







?>
<div class="container">
<div class="row" >
<div class = "col-sm-8 col-sm-offset-2" style="margin-top:10px;" >
<form class="well"  name="" action="" onsubmit="" method="post">
  <fieldset>
    <legend>Update Employee Data</legend>
 <div class="form-group col-md-12">
<div class="col-md-6">
       <label style="">Employee ID</label>
            <div class=>
                <label id="my_label" style="min-width: 40% "><p style="margin:10px; margin-top:5px;"><?php echo $test_id; ?></p></label>
        </div>
 </div>
      </div>
<div class="form-group col-md-12">
      <div class="col-md-6">
       <label style="">Name</label>
             <div class=>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
             </div>
        </div>
    <div class="col-md-6">
       <label style="">Email</label>
            <div class=>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
            </div>
    </div>
</div>

<div class="form-group col-md-12">
<div class="col-md-6">
       <label style="">Phone</label>
            <div class=>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone; ?>">
        </div>
 </div>
<div class="col-md-6">
       <label style="">JobType</label>
            <div class=>
                <input type="text" class="form-control" name="jtype" id="jtype" value="<?php echo $jobtype; ?>">
        </div>
 </div>
</div>

<div class="form-group col-md-12">
<div class="col-md-6">
       <label style="">Gender</label>
            <div class=>
                <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $gender; ?>">
        </div>
 </div>
<div class="col-md-6">
       <label style="">Address</label>
            <div class=>
                <input type="text" class="form-control" name="address" id="address" value="<?php echo $address; ?>">
        </div>
 </div>
</div>

 <div class="form-group col-md-12">
<div class="col-md-6">
       <label style="">Joining Date</label>
            <div class=>
                <input type="date" class="form-control" name="jdate" id="jdate" value="<?php echo $jdate; ?>">
        </div>
 </div>
<div class="col-md-6">
       <label style="">Leaving Date</label>
            <div class=>
                <input type="date" class="form-control" name="ldate" id="ldate" value="<?php echo $ldate; ?>">
        </div>
 </div>
</div>

	 

 <div class="row">
            	<div class = "col-sm-3 col-sm-offset-3" style="margin-top:10px;">
                    <button type="reset" class="btn btn-default btn-block btn-lg" onClick="window.location.href='index.php?page=employeeslist'">Cancel</button>
                </div>
                <div class = "col-sm-3" style="margin-top:10px;">
                     <button  type="submit"   id="submit" class="btn btn-primary btn-block btn-lg " id="setdata" name="setdata" >Submit</button>


                </div>
            </div>
  </fieldset>
</form>
</div>
</div>
</div>