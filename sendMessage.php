<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
if($_POST)
{
	$name=$_SESSION['name'];
    $msg=$_POST['msg'];
   // $id=$_POST['id'];
	$sql="INSERT INTO `chat`(`sender`, `message`,`reciver`) VALUES ('".$name."', '".$msg."','".$id."')";

	$query = mysqli_query($conn,$sql);
	if($query)
	{
		header('Location: chatpage.php');
	}
	else
	{
		echo "Something went wrong";
	}
	
	}
?>