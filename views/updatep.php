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
    <div class = "row">
        <div class = "col-sm-6 col-sm-offset-3 dashboardLeftPanel well" style="background-color: rgba(100,200,200,0.8); min-height: 350px;">

            
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
                    <button type="submit" class='btn btn-primary btn-block btn-md btn-custom' id="upass" name="upass">Update Password</button>
                </div>
            </form>  

            
        </div>
    </div>
</div>








