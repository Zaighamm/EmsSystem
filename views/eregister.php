<?php
$name=$_POST['Name'];
$email=$_POST['Email'];
$pass=$_POST['pass'];
$date=$_POST['Date'];
$gender=$_POST['Gender'];
$jtype=$_POST['jtype'];
$address=$_POST['Address'];
$phone=$_POST['Phone'];


      $dbname = "basep_16359700_ems";

        
        $server = "sql310.base.pk";
        $user ="basep_16359700";
        $pass = "11105090";

        // Establishing Connection 
        $connection = mysql_connect($server, $user, $pass);

        // Selecting Database
        $db = mysql_select_db($dbname, $connection);
        if(!$db) {
            return false;
        }
        

        $sql = "INSERT INTO `basep_16359700_ems`.`employees` (`id`, `name`, `phone`, `email`, `jobtype`, `gender`, `address`,`aid`)  VALUES (NULL, '$name', '$phone', '$email', '$jtype','$gender','$address','1')";
        // SQL query 
        $query = mysql_query($sql, $connection);
        $r="INSERT INTO login (`id`, `username`, `password`, `flag`) VALUES (NULL, '$name', MD5('$pass'), 'E')";
 $query = mysql_query($r, $connection);


if($query){
echo '<div class = "row">
        <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
            <div class="well align-center">
Employee Added Successfully. <br>Your User Name:'.$name.'<br>Password:'.$pass.'</div>
        </div>
    </div>';
?>
 <script>
setTimeout("location.href = 'index.php?page=cpanel';",5000);
</script>
<?php


}
else
{

echo '<div class = "row">
        <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
            <div class="well align-center">
Employee Not Added Employee please enter a new username.      
            </div>
        </div>
    </div>';
    ?>
 <script>
setTimeout("location.href = 'index.php?page=newemployee';",5000);
</script>
<?php

}

?>
