<?php
include ("headernew.php");
?>
<?php
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

//  Fullname start 

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

// Fullname end

if(isset($_GET['remove']))
{
    $courseCart = $_GET['remove'];
    $removeCart = "DELETE FROM cart WHERE courseId=$courseCart";
    $ExecQueryyy = MySQLi_query($conn, $removeCart);
}

if( isset($_POST['checkout']) )
{
    $userid = $_SESSION['id'];
    $date = date('Y-m-d H:i:s');
    $course_name = $_POST['coursename'];
    $sql = "INSERT INTO orders (id,course_name,user_id,date)
    VALUES ('','{$course_name}','{$userid}','{$date}')";
    $result = mysqli_query($conn,$sql);

    $removeCart = "DELETE FROM cart WHERE user_id=$userid";
    $ExecQueryyy = MySQLi_query($conn, $removeCart);
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
    <title>CYLearning | Cart</title>
    <style>
</style>
    
</head>
<body>


<div class="container">
    <h1>Welcome To Your Cart</h1>
    <form action="cart.php" method="POST">
    <div class="carttt">
        <div class="total-products fl-1">

                <?php
                $userid = $_SESSION['id'];
        $Query = "SELECT * FROM cart WHERE user_id=$userid";
            $ExecQuery = MySQLi_query($conn, $Query);
        
        if ( $ExecQuery->num_rows > 0) 
        {      
            while($row = $ExecQuery->fetch_assoc()) 
            {
                $courseid = $row['courseId'];
                $courseData = "SELECT * FROM course WHERE id=$courseid";
                $ExecQueryy = MySQLi_query($conn, $courseData);
                $roww = $ExecQueryy->fetch_assoc();
                $totalPrice += $row['price'];
                $tax = $totalPrice * 0.14;
                $totalTax += $tax;
        ?>
            <div class="productt flex">
                <div class="productt-img fl-1">
                    <img src="<?php echo $row['image']; ?>" alt="">
                </div>
                <div class="productt-info fl-1">
                    <h3 id="courseName"><?php echo $roww['courseName']; ?></h3>
                    <input type="hidden" id="coursename" name="coursename" value="<?php echo $roww['courseName']; ?>">
                    <p><?php echo $row['price']; ?> $</p>
                </div>
                <div class="productt-action fl-1">
                  <a href="cart.php?remove=<?php echo $courseid; ?>">  <h1> <i class="fas fa-times"></i> </h1> </a>
                </div>
            </div>
                    <?php        
            }
        }
        ?> 


        </div>
        <div class="cart-total">
            <p>
                <span>Total Price</Span>
                <span><?php echo $totalPrice; ?> $</span>
            </P>
            <p>
                <span>Tax Price</Span>
                <span><?php echo $totalTax; ?> $</span>
            </P>
            <p>
                <span>Sub Total</Span>
                <span><?php echo $totalPrice + $totalTax ?> $</span>
            </P>

            
                
                <script>
                    function fillCourse()
            {
                var courseName = document.getElementById('courseName').innerHTML;
                document.getElementById('coursename').value = courseName;
            }
                    fillCourse();
                </script>
                <a href="#" onclick="checkout()"> <button type="submit" name="checkout"> Checkout </button>  </a>
            </form>
        </div>
        <script>
            function checkout()
            {
                alert("Order Placed");
                window.location = "home.php";

                
            }

            
        </script>
    </div>
</div>


     
    


				







</body>
</html>