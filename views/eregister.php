<?php
if(isset($_POST["addemp"]))
{
$name=$_POST['Name'];
$email=$_POST['Email'];
$pass=$_POST['pass'];
$date=$_POST['Date'];
$gender=$_POST['Gender'];
$jtype=$_POST['jtype'];
$address=$_POST['Address'];
$phone=$_POST['Phone'];


$addedby=$_SESSION['id'];
        

       
        // SQL query 
        $query=query("INSERT INTO employees (`id`, `name`, `phone`, `email`, `jobtype`, `gender`, `address`,`added_by`,`Join_Date`)  VALUES (NULL, '$name', '$phone', '$email', '$jtype','$gender','$address','$addedby',now())");
        if(!$query)
           echo "error";
      
 $query1=query("select max(id) from employees");
 if(!$query1)
           echo "error";
       while($max=mysql_fetch_assoc($query1))
       $employee_id=$max["max(id)"];
          
$query2= query("INSERT INTO login (`id`, `username`, `password`, `flag`, `emp_id`) VALUES (NULL,'$name',MD5('$pass'), 'E','$employee_id')");
       

if($query2){
echo '<div class = "row">
        <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
            <div class="well align-center">
Employee Added Successfully. <br>Your User Name:'.$name.'<br>Password:'.$pass.'</div>
        </div>
    </div>';
?>
 <script>
setTimeout("location.href = 'index.php?page=cpanel';",100000);
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
setTimeout("location.href = 'index.php?page=newemployee';",100000);
</script>
<?php

}

}

?>
