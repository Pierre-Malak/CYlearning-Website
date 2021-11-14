
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<form method="POST" action="audit.php">
	<label>Sender</label>
	<input type="text" name="from">


<label>reciver</label>
	<input type="text" name="to"><br>
	<input type="submit" name="submit">


</form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="mydb";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
echo $conn->error;
;
if(isset($_POST['submit'])){
$sql="SELECT * FROM chat WHERE sender={$_POST['from']} AND reciver= {$_POST['to']} ";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{
echo $row['sender']   ; echo $row['message'];



echo $row['reciver'] ;echo $row['message'] ;

}}

  ?>