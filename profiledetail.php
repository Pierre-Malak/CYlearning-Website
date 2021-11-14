
<?php
 $connect = mysqli_connect("localhost", "root", "", "mydb"); 
		if($_POST['action'] == 'fetch_data')
		{
			$sql = "
			SELECT * FROM users 
			WHERE ID = '".$_POST["user_id"]."'
			";

			$result = mysqli_query($connect, $sql);  

			$output = '
			<div class="card">
				<div class="card-header"></div>
				<div class="card-body">
					<div class="row">
			';

			foreach($result as $row)
			{
				$output .= '
				<div class="row">
				<div class="col-md-12">
				<div align="center">
					<img src="'.$row["Picture"].'" class="img-thumbnail" 
					width="200" />
				</div>
				<br />
				<table class="table table-bordered">
<tr>
<th>Name</th>
<td>'.$row["Name"].'</td>
</tr>
<tr>
<th>Email</th>
<td>'.$row["Email"].'</td>
</tr>
<tr>
<th>ID</th>
<td>'.$row["ID"].'</td>
</tr>
<tr>
<th>Address</th>
<td>'.$row["Address"].'</td>
</tr>
<tr>
<th>Phone Number</th>
<td>'.$row["Phone_Number"].'</td>
</tr>





</table>
</div>
</div>
';

			}
			
			echo $output;
		}
		?>