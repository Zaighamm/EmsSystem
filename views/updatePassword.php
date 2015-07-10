<?php
session_start();
      $dbname = "ems";
        
        $server = "localhost";
        $user ="root";
        $pass ="";

        // Establishing Connection 
        $connection = mysql_connect($server, $user, $pass);

        // Selecting Database
        $db = mysql_select_db($dbname, $connection);
        if(!$db) {
            return false;
        }
        
        $np=$_POST['newp'];
        $op=$_POST['oldp'];
        $userid=$_SESSION['userid'];
        $result=mysql_query("update login set password=MD5('$np') where password=MD5('$op') and username='$userid'");
                   
                    if(mysql_affected_rows() > 0){
                   echo "true";
                    }
                    else{ echo "false";}



?>