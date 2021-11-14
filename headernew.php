<?php
$server = "localhost";
$username = "root";
$password = "";
$DB = "mydb";
session_start();
$conn = mysqli_connect($server,$username,$password,$DB);

$isLoggedIn = false;
if($_SESSION['id'])
{
    $userid = $_SESSION['id'];


    $userdata = "SELECT * FROM users WHERE id=$userid";
    $ExecQueryyyy = MySQLi_query($conn, $userdata);
    $rowww = $ExecQueryyyy->fetch_assoc();

    $fullname = $rowww['Name'];


    $isLoggedIn = true;
}
else
{
    $fullname = "User";
    $isLoggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Link to the CSS file  -->
    <link rel="stylesheet" href="stylenew.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>

    <div class="header flex">
        <div class="logo fl-1">
            <img src="img/logo.png" alt="">
        </div>
        <div class="menu fl-2 flex">
            <p class="fl-1 header-item"><a href='home.php'>Home</p>
            <p class="fl-1 header-item"><a href='ont.php'>Contact</p>
            <p class="fl-1 header-item"><a href='cart.php'>Cart</p>
            <p class="fl-1 header-item"><a href="search.php"> Search </a></p>
        </div>
        <div class="user-infoo fl-1">

            <div class="flex" style="align-items:center;width: 60%;margin: 0 auto;">

                     <div class="user-img">
                    <img src="<?php echo $_SESSION["picture"] ; ?>" alt="userimg.png">
         </div>
                <div class="user-name">
                    <a href="#" onclick="doClick(); return false;"><p><?php echo $_SESSION['name'] ?></p></a>

<script>
var typ = "<?php echo $_SESSION['type'] ?>";
function doClick() {
if(typ==1)
{window.location.href = "profilestudent.php";}
else if(typ==2)
  {window.location.href = "profileadmin.php"; }
else if(typ==3)
  {window.location.href = "profileauditor.php";}
 else if(typ==4)
{  window.location.href = "profilehr.php";}
 else if(typ==5)
{  window.location.href = "profileinst.php";}

 }

</script>
                </div>
                
            </div>
            
        </div>
    </div>