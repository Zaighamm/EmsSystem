<?php
session_start();

        $dbname = "ems";
        $server = "localhost";
        $user ="root";
        $pass = "";


        // Establishing Connection 
        $connection = mysql_connect($server, $user, $pass);

        // Selecting Database
        $db = mysql_select_db($dbname, $connection);
        if(!$db) {
            return false;
        }
        


$username = stripslashes($_GET["auser"]);
$password = stripslashes($_GET["apass"]);
$username = mysql_real_escape_string($_GET["auser"]);
$password = mysql_real_escape_string($_GET["apass"]);
    
  $_SESSION['start_time'] = strtotime("now");


	$data = mysql_query("select * from login where password=MD5('$password') AND binary username='$username'", $connection);


$rows = mysql_num_rows($data);
if ($rows != 1)
{ echo 'invalid Username or Password';}
else {

$result=mysql_fetch_array($data);
$_SESSION['id'] =$result["emp_id"];
$_SESSION['right'] =$result["flag"];
$_SESSION['userid'] =$result["username"];
echo "True";
     }                                

mysql_close($connection);

?>