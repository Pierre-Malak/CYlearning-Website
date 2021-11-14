<?php

include ("headernew.php"); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/styles/snippets-2.2.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Document</title>
</head>


<body>

<style>

    .table-wrapper {
        width: 80%;
        margin: 0 auto;
        margin-top: 50px;
        box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.08), 0 2px 4px 0 rgba(0, 0, 0, 0.12);
        padding: 10px;
    }

    .table-wrapper th {
        font-size: 14px;
    }
</style>

<div class="table-responsive">
        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Cutomer's id</th>
                        <th>Customer's name</th>
                        <th title="1)The instructor was well prepared for the class">Question 1</th>
                        <th title="2)The instructor showed an interested in helpinf student learn.">Question 2</th>
                        <th title="3)I received useful feedback on my performance on tests,paper,etc..">Question 3</th>
                        <th title="4)The course was organized in a manner that helped me understand the underlying concept.">Question 4</th>
                        <th title="5)The instructor showed an interested in helpinf student learn.">Question 5</th>
                        <th>Feedback</th>
                      

                    					
                       
                    </tr>
                </thead>
                <tbody>


                <?php
                $server = "localhost";
$username = "root";
$password = "";
$db = "mydb";

                $conn = mysqli_connect($server,$username,$password,$db);
if (!$conn)
{
    die("Connection failed: " . $conn->connect_error);
}
                //$userid = $_SESSION['id'];
       $Query = "SELECT * FROM survay  ";
            $ExecQuery = MySQLi_query($conn, $Query);
        
        if ($ExecQuery->num_rows > 0) 
        {      
            while($row = $ExecQuery->fetch_assoc()) 
            {
              
        ?>
                    <tr>
                    
                        <td><?php echo $row['user_id']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['q1']?></td>
                        <td><?php echo $row['q2']?></td>
                        <td><?php echo $row['q3']?></td>
                        <td><?php echo $row['q4']?></td>
                        <td><?php echo $row['q5']?></td>
                        <td><?php echo $row['feedback']?></td>
                        <?php

                        $userOrder = $row['user_id'];

                        $username = "SELECT * FROM survay WHERE id=$userOrder";
                        $ExecQueryyyyy = MySQLi_query($conn, $username);
                        $rowwww = $ExecQueryyyyy->fetch_assoc();
                    
                       
                        
                        ?>
                        
                       
                       
                    </tr>

                     
                     
                
                    <?php        
            }
        }
        ?> 
            </table>
           
        </div>
    
        <?php include ("footernew.php"); ?>