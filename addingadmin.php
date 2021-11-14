     <?php

include ("headernew.php");

      ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.add{background:#663766;border-radius: 50px;

text-align: center;
   /*position:fixed;*/

 font-size: 3rem;
margin: 60px;
		 }
		 body{background-color: #D1CED1;



		 }

input {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

}
input:hover{background-color:#89ba16;}
#hombtn{margin-left: 725px;margin-top: 50px;}
#backbtn{margin-left: 725px;}
	</style>


</head>
<body>
 
<div class="add">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="myDB";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " .$conn->connect_error);
}

if ($_POST['mail']!=null&&$_POST['id']!=null&&$_POST['name']!=null&&$_POST['pass']!=null)
{
 $ml=$_POST["mail"];
 $id=$_POST["id"];
 $nam=$_POST["name"];
 $pss=$_POST["pass"];
 $typ=$_POST["type"];
  $sql="INSERT INTO users (ID, Name, Email, Password, Type)
VALUES ('$id','$nam', '$ml', '$pss','$typ')";
mysqli_query ($conn,$sql);
echo "Successfully Added ";
$conn->close();
}
else{echo "Can't Add The User";}

?>

</div>
<form action="Mainadmin.php">
<input type="submit" value="Back" id="backbtn">
</form>

</body>
</html>
