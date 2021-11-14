<?php  
	$connect = mysqli_connect("localhost", "root", "", "mydb");
	$sql = "DELETE FROM course WHERE courseId = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>