<?php
include ("includes/header.php");
?>


<?php

$servername = "localhost";
$username = "root";
$password = "";

$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn)
{
  die("Connection failed: " . $conn->connect_error);
}
  		$image = $_POST['image'];
  	// Get text
  	

  	// image file directory
  //	$target = basename($image);

  $fullname= $_POST['name'];
  $email= $_POST['email'];
  $phone= $_POST['phoneum'];
  $password= $_POST['password'];
  $address=$_POST['country'];
  $id=$_SESSION['id'];
if(isset($_POST["submit"]))
{
$sql="UPDATE users SET Name='{$fullname}' , Email='{$email}' , Address='{$address}' , Password='{$password}' , Phone_Number='{$phone}', Picture='{$image}' WHERE
 ID= '{$id}' ";
$result = mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);
$id=$row["ID"];
$Email=$row["Email"];
$Picture=$row["Picture"];
   $Name=$row["Name"];
 $Phone_Number=$row["Phone_Number"];
$Address=$row["Address"];
$Type=$row["Type"];
$Pass=$row["Password"];
  
    $_SESSION["id"]=$id;
    $_SESSION["email"]=$Email;
    $_SESSION["picture"]=$Picture;
    $_SESSION["name"]=$Name;
      $_SESSION["phone"]=$Phone_Number;
      $_SESSION["address"]=$Address;
       $_SESSION["type"]=$Type;
        $_SESSION["password"]=$Pass;
   // echo " Logged in successfully";
    header("Location:home.php");



}
?>