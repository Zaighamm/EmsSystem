<?php if(isset($_SESSION['right']))
{
header("location: index.php?page=cpanel ");
}


?>

<!DOCTYPE html>
<html lang="en">
<head >
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

<title>Office Employee Management System</title>
</head>


        <form   action="" onsubmit="tryLogin(); return false;"> 
        
        	
		
			<div class="row">
			<div class="col-md-6 col-md-offset-3">
        	<div class="row body_top">
            	<div class = "col-sm-12 col-sm-offset-2">
                    	<h3>Please Sign in</h3>
                </div>
            </div>
        	<div class="row" style="margin-top:10px";>
            	<div class = "col-sm-8 col-sm-offset-2">
                	<div class="input-group">
                    	<span class="input-group-addon">
                        	<span class="glyphicon glyphicon-user"></span>
                        </span>
                        <input type="text" class="form-control" id="auser" name ="auser"  placeholder="Username"  required/>
  
                  </div>
                </div>
            </div>
            <div class="row">
            	<div class = "col-sm-8 col-sm-offset-2" style="margin-top:10px;">
                	<div class="input-group">
                    	<span class="input-group-addon">
                        	<span class="glyphicon glyphicon-lock"></span>
                        </span>
                        <input type="password" class="form-control" id="apass" name = "apass"   placeholder="Password" required/>
                    </div>
                </div>
            </div>
            
          <div class="row">
                <div id="flag" class = "col-sm-8 col-sm-offset-2" style="margin-top:5px; color: red;">
                    
                        

                </div>
            </div>
            <div class="row">
            	<div class = "col-sm-8 col-sm-offset-2" style="margin-top:10px;">
                    <button type="submit" class="btn btn-primary btn-block btn-lg btn-custom" name="adminlogin" id="adminlogin"  >Login</button>
                </div>
            </div>
			</div>
		</div>