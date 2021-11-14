<?php
include ("headernew.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>SEARCH</title>
	 <link rel="stylesheet" type="text/css" href="SearchStyle.css"> 
   <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
<style>
  form button {
    border: none;
  }
</style>

<form method="post" action="">
  <div class="Search-Box">
  <input type="text" name="search" placeholder="Search" class="Search-Text">
  <a  href="#"></a>
  <button type="submit" class="Search-Btn" name="submit"><i class="fas fa-search"></i></button>
</div>
</form>

<div class="phpcode" style="margin-bottom: 500px;">
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

if (isset($_POST['search']))
{
 $str=$_POST["search"];
   $sql = "SELECT * FROM course WHERE courseName LIKE '%".$str."%'";
  
  $result = $conn->query($sql);
  //echo $result;

   if ($result->num_rows > 0) 
  {
        while($row=$result->fetch_assoc())
        {
            header("location: course.php?id=".$row['id']);
            }
        }
        else{echo "0 Results";}

}

$conn->close();

?>
</div>


<?php include ("footernew.php"); ?>