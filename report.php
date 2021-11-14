
<?php 
	
	include "includes/header.php"; 

	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_GET['id'])){
	
// escape sql chars
$id = mysqli_real_escape_string($conn, $_GET['id']);

	$sql="SELECT * FROM `chat` where id='$id'";
	$query = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);

    
    $sql2="INSERT INTO report (Sender,Reciver,Message,SenderMail,ReciverMail)VALUES(  '$row[sender]','$row[reciver]','$row[message]','$row[senderemail]','$row[reciveremail]')";
    $query = mysqli_query($conn,$sql2);
}
?><?php 
include'includes/footer.php';
?>