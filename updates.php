<?php 
$msg = ""; 
$errmsg = "";
session_start();
$id=$_SESSION['id'];
// If upload button is clicked ... 
if (isset($_POST['submit'])) { 
	$db = mysqli_connect("localhost", "root", "", "mydb"); 
//Photo Upload START
if(!empty($_FILES["img"]["name"])){
  $target_dir = "uploads/";
  $file_name = mktime().'-'.basename($_FILES["img"]["name"]);
  $target_file = $target_dir . $file_name;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["img"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $errmsg .= "Failed to upload image: File is not an image.<br>";
    $uploadOk = 0;
  }
  // Check if file already exists
  if (file_exists($target_file)) {
    $errmsg .= "Failed to upload image: File already exists.<br>";
    $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["img"]["size"] > 300000) {
    $errmsg .= "Failed to upload image: File is too large (max: 250KB) <br>";
    $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $errmsg .= "Failed to upload image: Allowed formats are \"PNG, JPG, JPEG\" <br>";
    $uploadOk = 0;
  }
  if($uploadOk == 1) {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
      $sql = "UPDATE users SET Picture= '{$target_file}' WHERE ID= '{$id}'";
	  	mysqli_query($db, $sql); 
      $_SESSION['picture'] = $target_file;
  } else {
      $errmsg .=  "Sorry, there was an error uploading your file.<br>";
    }
  }
}
//Photo Upload END
		  $fullname= $_POST['name'];
  $email= $_POST['email'];
  $phone= $_POST['phoneum'];
  $password= $_POST['password'];
  $address=$_POST['country'];
  $id=$_SESSION['id'];



if (!empty($fullname)&& preg_match('/[a-zA-Z_]+/', $fullname))

  {
    if(!empty($email)&& preg_match('/[a-zA-Z0-9_]+/', $email))
    {
      if(!empty($password)&& preg_match('/[a-zA-Z0-9_]+/', $password))
      {
        if(!empty($phone)&& preg_match('/[0-9_]+/', $phone))
        {
         
              if(filter_var($email,FILTER_VALIDATE_EMAIL) ==TRUE)
              {









$sql="UPDATE users SET Name='{$fullname}' , Email='{$email}' , Address='{$address}' , Password='{$password}' , Phone_Number='{$phone}' WHERE
 ID= '{$id}' ";



		// Execute query 
		mysqli_query($db, $sql); 
   // $_SESSION["id"]=$id;
    $_SESSION["email"]=$email;
   // $_SESSION["picture"]=$Picture;
    $_SESSION["name"]=$fullname;
      $_SESSION["phone"]=$phone;
      $_SESSION["address"]=$address;
      
        $_SESSION["password"]=$password;
   // echo " Logged in successfully";
    header("Location:home.php");



        
        }

        else   {
          echo "<script>alert('Error in mail'); window.location.href = 'EditProfile.php';</script>";  
        }
      }
        else
        {
          echo "<script>alert('Error in phone'); window.location.href = 'EditProfile.php';</script>";
        }


      }
      else
      {
        echo "<script>alert('Error in password'); window.location.href = 'EditProfile.php';</script>";  
      }
    }
    else
    {
      echo "<script>alert('Error in email'); window.location.href = 'EditProfile.php';</script>";
    }
  }

  else
  {
    echo"<script>alert('Error in fullname'); window.location.href = 'EditProfile.php'; </script>";
  }




} 
 
?>