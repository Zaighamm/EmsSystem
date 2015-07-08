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
                                                $check=$row['Lev_Date'];
                                               if($check==null)
                                               { $check="  N/A  ";
                                               }
                                                $output="<tr><td>".$row['id']."</td><td id='na'>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['jobtype']."</td>
<td>".$row['gender']."</td><td>".$row['address']."</td>
<td>".$row['Join_Date']."</td><td>".$check."</td>
<td>
  <a type='button'  class='btn-sm btn-info' href='index.php?page=UpdateEmployee&empdata=".$row['id']."'>
     Update</a>  </td><td>
     <button type='button' class='btn-sm btn-danger' onclick='delete_emp(".$row['id'].");'>
     Delete</button>
  </td></tr>";
                                            echo $output;
                                                
                                               
                                            }

    }


?>