    

     <?php
include ("includes/header.php");

?><h1 class="course-heading">Featured Courses</h1>
<h2 class="course-heading"><?php  echo "Welcome ". $_SESSION["name"] ."<br>";  ?></h2>
<div class="all-courses">
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
 $Query = "SELECT * FROM course";
    $ExecQuery = MySQLi_query($conn, $Query);
   
   if ($ExecQuery->num_rows > 0) 
  {      
    while($row = $ExecQuery->fetch_assoc()) 
    {
        $courseid = $row['id'];
?>
    
        
        <div class="course" onclick='window.location.href="course.php?id=<?php echo $courseid; ?>"'>
            <div class="course-bg">
                <img src="<?php echo $row['image'];?>" alt="course">
            </div>
            <div class="course-details">
   <?php     echo'<i>'.$row["courseName"].'</i>';?>
                <br>
              
            </div>
        </div>
       
  
  <?php        
    }
}
?>  </div>
<?php include ("includes/footer.php"); ?>
