<?php  
$connect = mysqli_connect("localhost", "root", "", "mydb");
$sql = "INSERT INTO admin(Name, Email) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>