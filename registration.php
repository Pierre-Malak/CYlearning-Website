<?php
session_start();


$server = "localhost";
$username = "root";
$password = "";
$db = "mydb";

$conn = mysqli_connect($server,$username,$password,$db);
if (!$conn)
{
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['create'])) 
{

  
  $fullname= $_POST['fullname'];
  $email= $_POST['email'];
  $phone= $_POST['phone'];
  $password= $_POST['password'];
  $repassword= $_POST['repassword'];

  if (!empty($fullname)&& preg_match('/[a-zA-Z_]+/', $fullname))

  {
    if(!empty($email)&& preg_match('/[a-zA-Z0-9_]+/', $email))
    {
      if(!empty($password)&& preg_match('/[a-zA-Z0-9_]+/', $password))
      {
        if(!empty($phone)&& preg_match('/[0-9_]+/', $phone))
        {
          if(!empty($repassword)&&  preg_match('/[a-zA-Z0-9_]+/', $repassword))
          {
            if($password == $repassword)
            {
              
              if(filter_var($email,FILTER_VALIDATE_EMAIL) ==TRUE)
              {
	 
              // Check for retyping

              $sql = "INSERT INTO users (Name,Email,Password,Phone_Number,Type)
              VALUES ('{$fullname}','{$email}','{$password}' , '{$phone}','1')";
              $result = mysqli_query($conn,$sql);	
              if($result)
              {
                print '<script>alert("Account Created!");</script>';




$Address ="0";
$Picture="uploads/profile.jpg";
   
    $_SESSION["email"]=$email;
    $_SESSION["picture"]=$Picture;
    $_SESSION["name"]=$fullname;
      $_SESSION["phone"]=$phone;
      $_SESSION["address"]=$Address;
       $_SESSION["type"]='1';
         $_SESSION["password"]=$password;

 $sql = 'SELECT * FROM users WHERE Email="{$email}"';
              $result = mysqli_query($conn,$sql); 



$row=mysqli_fetch_assoc($result);
$_SESSION['id']=$row['ID'];
               header("Location:home.php");
              }
            }else{
                   echo "<script> alert('Email Isn't Correct '); </script>";

              }
            }
            else
            {
                   echo "<script> alert('Passwords are not matched '); </script>";
            }
          }
          else
          {
            echo "<script>alert('password don\'t match');</script>";
          }
        }
        else
        {
          echo "<script>alert('Error in phone');</script>";
        }
      }
      else
      {
        echo "<script>alert('Error in password');</script>";
      }
    }
    else
    {
      echo "<script>alert('Error in email');</script>";
    }
  }
  else
  {
    echo"<script>alert('Error in fullname');</script>";
  }
 
}
include ("includes/loginheader.php");
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Link to the google font  -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500&display=swap" rel="stylesheet">
		<!-- Link to the CSS file  -->
		<link rel="stylesheet" href="css/style.css">
		<title>Registration</title>
	</head>

	<body>
		
			<div class="form">
				<form method="POST" action="registration.php">
					<div class="group-input"> <b> <p>Fullname</p></b>
						<input type="text" name="fullname" placeholder="Enter your name"> </div>
					<div class="group-input"> <b>  <p>E-Mail</p></b>
						<input type="email" name="email" placeholder="Enter your E-Mail"> </div>
					<div class="group-input"> <b> <p>Phone number</p></b>
						<input type="text" name="phone" placeholder="Enter your phone number"> </div>
					<div class="group-input"> <b>  <p>Password</p></b>
						<input type="password" name="password" placeholder="Enter your password"> </div>
					<div class="group-input"> <b>   <p>Confirm Password</p></b>
						<input type="password" name="repassword" placeholder="Confirm your password"> </div>
					<div class="group-btn">
						<input type="submit" class="bButton" name="create" value="Create Account"> </div>
				</form>
			</div>
	</body>

	</html>
  <?php include ("footernew.php"); ?>