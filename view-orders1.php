

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/styles/snippets-2.2.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Document</title>
</head>

<?php

include ("headernew.php"); 

$server = "localhost";
$username = "root";
$password = "";
$db = "mydb";

$fullname = "";




$totalPrice = 0;
$totalTax = 0;

$conn = mysqli_connect($server,$username,$password,$db);
if (!$conn)
{
    die("Connection failed: " . $conn->connect_error);
}
if($_SESSION['id'])
{
    $userid = $_SESSION['id'];


    $userdata = "SELECT * FROM users WHERE ID=$userid";
    $ExecQueryyyy = MySQLi_query($conn, $userdata);
    $rowww = $ExecQueryyyy->fetch_assoc();

    $fullname = $rowww['Name'];
}
else
{
    $fullname = "User";
}

?>
<body>

<div class="table-responsive">
        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Course Name</th>	
                    <th>Order Date</th>						
                       
                    </tr>
                </thead>
                <tbody>
                <?php
                $userid = $_SESSION['id'];
       $Query = "SELECT * FROM orders WHERE user_id=$userid";
            $ExecQuery = MySQLi_query($conn, $Query);
        
        if ($ExecQuery->num_rows > 0) 
        {      
            while($row = $ExecQuery->fetch_assoc()) 
            {
              
        ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <?php
                        $userOrder = $row['user_id'];
                        $username = "SELECT * FROM users WHERE id=$userOrder";
                        $ExecQueryyyyy = MySQLi_query($conn, $username);
                        $rowwww = $ExecQueryyyyy->fetch_assoc();
                    
                        $fullName = $rowwww['Name'];
                        
                        ?>


                        <td><?php echo $fullName?></td>
                        <td><?php echo $row['course_name']?></td>
                        <td><?php echo $row['date']?></td>
                       
                    </tr>
                    <?php        
            }
        }
        ?> 
            </table>
           
        </div>
    

</body>
</html>