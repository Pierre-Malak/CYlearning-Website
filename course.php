<?php
include ("headernew.php");


$server = "localhost";
$username = "root";
$password = "";
$db = "mydb";

$conn = mysqli_connect($server,$username,$password,$db);
if (!$conn)
{
    die("Connection failed: " . $conn->connect_error);
}

if( !isset($_GET['id']))
{
    die("Not FOUND");
}
if($_SESSION['id'])
{
    $userid = $_SESSION['id'];


    $userdata = "SELECT * FROM register WHERE id=$userid";
    $ExecQueryyyy = MySQLi_query($conn, $userdata);
    $rowww = $ExecQueryyyy->fetch_assoc();

    $fullname = $rowww['fullname'];
}
else
{
    $fullname = "User";
}





if($_SESSION['id'])
{
    $userid = $_SESSION['id'];


    $userdata = "SELECT * FROM users WHERE id=$userid";
    $ExecQueryyyy = MySQLi_query($conn, $userdata);
    $row = $ExecQueryyyy->fetch_assoc();

    $fullname = $rowww['fullname'];
}
else
{
    $fullname = "User";
}


$courseid = $_GET['id'];

$courseData = "SELECT * FROM course WHERE id=$courseid";
$ExecQuery = MySQLi_query($conn, $courseData);
$row = $ExecQuery->fetch_assoc();

if( isset($_POST['add']) )
{
    $courseName = $row['courseName'];
    $courseImage = $row['image'];
    $coursePrice = $row['price'];
    $userid = $_SESSION['id'];

    $sql = "INSERT INTO cart (id,cname,image,price,courseId,user_id)
    VALUES ('','{$courseName}','{$courseImage}','{$coursePrice}' , '{$courseid}' ,'{$userid}')";
    $result = mysqli_query($conn,$sql);
    header("Location:cart.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>CYLearning | Course</title>
</head>
<body>
    <div class="container">
        <div class="course-info flex">
            <div class="course-info-1 fl-2">
                <p>Design > Web Design > CSS</p>
                <h1><?php echo $row['courseName']; ?></h1>
                <p><?php echo $row['tinydesc']; ?></p>
                <div class="flex al-c">
                    <b>Best Seller</b>
                    &nbsp; &nbsp;
                    <div class="stars flex">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    &nbsp;
                    <p>(14993 Rating)</p>
                </div>
            </div>
            <div class="course-info-img fl-1">
                <div class="course-img-cont">
                    <img src="<?php echo $row['image']; ?>" alt="">
                </div>
            </div>
        </div>

        <div class="course-details flex">
            <div class="course-detail-1 fl-2">
<!-- haktab henaaaaaaaaaa 2al ba2yyyyyy -->
<h1>Requirements</h1>
<ul>
<?php
 $Queryy = "SELECT * FROM course_requirements";
    $ExecQueryy = MySQLi_query($conn, $Queryy);
   
   if ($ExecQueryy->num_rows > 0) 
    {      
    while($roww = $ExecQueryy->fetch_assoc()) 
    {
        
?>
    <li><?php echo $roww['requirement']; ?></li>
<?php        
    }
}
?>
</ul>

<h1>Description</h1>
<p><?php echo $row['description']; ?></p>
<div>








    
</div>
            </div>
            <div class="course-btns fl-1">
                <div class="course-btns-cont">
                    <h1 class="ta-c"><?php echo $row['price']; ?> $</h1>
                    <form action="course.php?id=<?php echo $courseid; ?>" method="POST">
                        <button class="cartt" type="submit" name="add">Add To Cart</button>
                    </form>
                    
                    <!-- <button class="buy" type="button">Buy Now</button> -->
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>