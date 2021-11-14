	<?php include "headernew.php"; ?>
<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  span{
	  color:#000000;
	  font-weight:bold;
  }
  .container {
    margin-top: 0px;
    width: 60%;

    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #673AB7;
	}
	.display-chat{
		height:300px;
		background-color:black;
		margin-bottom:4%;
		overflow:auto;
		padding:15px;
	}
	.message{
		background-color: white;
		color: white;
		border-radius: 5px;
		padding: 5px;
		margin-bottom: 3%;
	}
  </style>
<?php 
	
 

	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_GET['id'])){
	
// escape sql chars
$id = mysqli_real_escape_string($conn, $_GET['id']);

	$sql="SELECT * FROM `chat` where sender='$_SESSION[name]'	 
	and reciver='$id' or sender='$id' and reciver='$_SESSION[name]'";

	$query = mysqli_query($conn,$sql);
}
?>
  <div class="display-chat" style="width:50%;margin:0 0 0 300px;">
<?php
	if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
		{
?>


		<div class="message"><form style="height:auto;"method="POST" action="report.php?id=<?php echo $row["id"];  ?>">
			<p style="color:black;">
			<button  href="missbehavior.php"style="margin-left:750px;color:white;background-color:black;">Report</button><br>
				<span><?php echo $row['sender']; ?> : <?php echo $row['message']; ?><br><?php echo $row['senderemail']; ?></span>
				
			</p></form>
		</div>

<?php
		}
	}
	else
	{
?>
<div class="message">
			<p style="color:black;">
				No previous chat available.
			</p>
</div>
<?php
	} 
?>

  </div>
  <form class="form-horizontal" method="POST">
    <div class="form-group">
      <div class="col-sm-10">          
        <textarea name="msg" class="form-control" style="margin:0px 0px 0px 350px;width:30%;height:100px;" placeholder="Type your message here..."></textarea>
             	 </div>
	         <button type="submit"style="width:200px;height:50px;background-color:black;color:white;position:relative;left:350px;"name ="submit">Send</button>
			     </div>
  </form>
</div>
<br><br><br><br><br><br><br><br>
</body>
</html><?php include'footernew.php';?>
<?php 

if(isset($_POST['submit']))
{
  $sql2="SELECT * From users where Name='$id'";
  $query=mysqli_query($conn,$sql2);
  $row= mysqli_fetch_array($query); 
$sql="INSERT INTO `chat`(`sender`, `reciver`,message,senderemail,reciveremail) VALUES ('$_SESSION[name]', '$id','$_POST[msg]','$_SESSION[email]','$row[Email]')";

$query = mysqli_query($conn,$sql);


	
	}

	if(isset($_GET['id'])){
	
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		
			$sql="SELECT FROM chat WHERE id='$id'";

			$query = mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($query);
			$sql="INSERT into report (sender,reciver,message) values('$row[sender]',$row[reciver]',$row[message]')";
			$query = mysqli_query($conn,$sql);
		
		}
		?>
	}
?>