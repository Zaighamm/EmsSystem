<?php

$del_id=$_POST["del_id"];


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
        
   
        $sql="delete from employees where id='$del_id'";
        // SQL query 
        $query = mysql_query($sql, $connection);
         if(mysql_affected_rows() > 0){
                   echo "true";
                    }
                    else{ echo "false";}













?>