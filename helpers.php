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
        
        
        
        // SQL query 
        $query = mysql_query($sql, $connection);
        
        if(!$query) 
            return false;
       
      

            return $query;
    }
    function loaddata()
    {

                                            $result=query("select * from employees"); 

                                            while($row=mysql_fetch_array($result)){
                                                $output="<tr class><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['jobtype']."</td><td>
     <button type='button' class='btn-sm btn-info' onclick='update(".$row['id'].");'>
     Update</button>
  </div></td><td>
     <button type='button' class='btn-sm btn-danger' onclick='delete_emp(".$row['id'].");'>
     Delete</button>
  </div></td></tr>";
                                            echo $output;
                                            }

    }


?>