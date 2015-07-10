<?php
require_once("includes.php");

function render($file, $data=array()) 
	{
		$path=__DIR__."/views/".$file.".php";
		if(file_exists($path))
           {
			extract($data);
			require($path);	
           }
	}
    function query($sql) {
        
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
        
        
        
        // SQL query 
        $query = mysql_query($sql, $connection);
        
        if(!$query) 
            return false;
       
      

            return $query;
    }

?>