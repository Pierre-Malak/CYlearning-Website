<?php  
	$connect = mysqli_connect("localhost", "root", "", "mydb");
	$sq = "SELECT * FROM report WHERE ID = '".$_POST["id"]."'";  
	$result=mysqli_query($connect, $sq);
	while($row=$result->fetch_assoc()){
		$sendmail=$row['SenderMail'];
		$recivemail=$row['ReciverMail'];
		$msg=$row['Message'];
		$war=$row['Comment'];

	$sql = "INSERT INTO penalty (SenderMail,ReciverMail,Message,Warrning) VALUES('{$sendmail}','{$recivemail}','{$msg}','{$war}')";  
	
}
if(mysqli_query($connect, $sql))  
	{  
		echo 'Penalty Is Sent';  
	}  
 ?>