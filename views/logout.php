

<div class = "row">
        <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
            <div class="well align-center">
You are Successfully logged out.      
            </div>
        </div>
    </div>
     <?php
               unset($_SESSION['username']);
              // Delete all session variables
               session_destroy();
			
              // header("location: index.php?page=home"); //redirecting to home page
?><script>
setTimeout("location.href = 'index.php?page=home';",2000);
 </script>