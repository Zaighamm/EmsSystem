<?php
$name=$_POST['Name'];
$email=$_POST['Email'];
$pass=$_POST['pass'];
$date=$_POST['Date'];
$gender=$_POST['Gender'];
$jtype=$_POST['jtype'];
$address=$_POST['Address'];
$phone=$_POST['Phone'];


$addedby=$_SESSION['id'];
        

        $sql = "INSERT INTO employees (`id`, `name`, `phone`, `email`, `jobtype`, `gender`, `address`,`added_by`)  VALUES (NULL, '$name', '$phone', '$email', '$jtype','$gender','$address','$addedby')";
        // SQL query 
        $query = query($sql);
        if(!$query)
           echo "error";
      
 $query = query("select max(id) from employees");
 if(!$query)
           echo "error";
       while($max=mysql_fetch_assoc($query))
       $employee_id=$max["max(id)"];
       
$sql="INSERT INTO login (`id`, `username`, `password`, `flag`, `emp_id`) VALUES (NULL,'$name',MD5('$pass'), 'E','$employee_id')";      
$query= query($sql);
       

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
