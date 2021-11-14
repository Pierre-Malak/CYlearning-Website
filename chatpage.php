<?php 
	
	include "headernew.php";
	
		$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_GET['id'])){
		
	// escape sql chars
	$id = mysqli_real_escape_string($conn, $_GET['id']);

		$sql="SELECT * FROM `chat` where sender='$_SESSION[name]' and reciver='$id' or sender='$id' and reciver='$_SESSION[name]'";

		$query = mysqli_query($conn,$sql);
}
?>
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

	form {
		width: 500px;
		margin: 0 auto;
		justify-content: center;
	}

	form textarea {
		width: 100%;
		height: 200px;
		border: none;
		padding: 10px;
		outline: none;
		font-size: 16px;
		font-family: 'Montserrat', sans-serif;
	}

	form button {
		width: 100%;
		text-align: center;
		margin: 0 auto;
		outline: none;
		
	}

	.sendBtn {
		text-align: center;
		margin-top: 20px;
	}
  </style>

  <div class="display-chat">
<?php
	if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
		{
?>
		<div class="message">
			<p style="color:black;">
				<span><?php echo $row['sender']; ?> :</span>
				<?php echo $row['message']; ?>
			</p>
		</div>
<?php
		}
	}
	else
	{
?>
<div class="message">
			<p>
				No previous chat available.
			</p>
</div>
<?php
	} 
?>

  </div>
  <form class="form-horizontal" method="POST" action="" >
    <div class="form-group">
      <div class="col-sm-10">          
        <textarea name="msg" class="form-control" placeholder="Type your message here..."></textarea>
              </div>

			  <div class="sendBtn">
			  <button type="submit" class="bButton" name="submit">Send</button>
			  </div>
	         
    </div>
  </form>
</div>
<?php include'footernew.php';?>
</body>
</html>
<?php 

if(isset($_POST['submit']))
{
    
	$sql="INSERT INTO `chat`(`sender`, `reciver`,message) VALUES ('$_SESSION[name]', '$id','$_POST[msg]')";

	$query = mysqli_query($conn,$sql);
	
	
	}
?>