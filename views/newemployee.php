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


<div class="container">
<div class="row" >
<div class = "col-sm-8 col-sm-offset-2" style="margin-top:10px;" >
<form class="well"   action="index.php?page=eregister" onsubmit="" method="post">
  <fieldset>
    <legend>Employee Registeration Form</legend>
 <div class="form-group col-md-12">
<div class="col-md-6">
      <label for="Name" class="control-label">Name</label>
        <input type="text" class="form-control" name="Name" id="Name" placeholder="Name" required>
 </div>
<div class="col-md-6">
 <label for="inputEmail" class="control-label">Email</label>
        <input type="email" class="form-control" name="Email" id="Email" placeholder="Email" required>
</div>  
      </div> 
 <div class="form-group col-md-12">
<div class="col-md-6">
      <label for="Name" class="control-label">Password</label>
        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
 </div>
<div class="col-md-6">
 <label for="inputEmail" class="control-label">Confirm password</label>
        <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm password" required>
</div>  
      </div> 
	 <div class="form-group">
	 <label class="col-lg-2 control-label">Date of Birth </label>
	 <div class="col-lg-10">
	 <input type="date" name="Date" id="Date" required>
	 </br>
	 </div>
	 </div>
	   <div class="form-group">
      <label class="col-lg-2 control-label">Gender </label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="Gender" id="Gender" value="Male" >
            Male
          </label>
		  <label>
            <input type="radio" name="Gender" id="Gender" value="Female" >
            Female
          </label>
        </div>
      </div>
    </div>
<div class="form-group">
      <label for="Company" class="col-lg-3 control-label">Job type</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="jtype" id="jtype" placeholder="Job type" required>
      </div>
    </div>   	 
	 
    <div class="form-group">
      <label for="textArea" class="col-lg-3 control-label">Address</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" name="Address" id="Address" placeholder="Address" required></textarea>
        <span class="help-block">Complete Permanent Address.</span>
      </div>
    </div>
	<div class="form-group">
      <label for="Phone" class="col-lg-3 control-label">Phone</label>
      <div class="col-lg-10">
        <input type="Phone" class="form-control" name="Phone" id="Phone" placeholder="Phone" required>
      </div>
    </div>
 <div class="row">
            	<div class = "col-sm-3 col-sm-offset-3" style="margin-top:10px;">
                    <button type="reset" class="btn btn-default btn-block btn-lg" onClick="window.location.href='index.php?page=cpanel'">Cancel</button>
                </div>
                <div class = "col-sm-3" style="margin-top:10px;">
                     <button  type="submit"   id="submit" class="btn btn-primary btn-block btn-lg " onclick="" >Submit</button>


                </div>
            </div>
  </fieldset>
</form>
</div>
</div>
</div>
