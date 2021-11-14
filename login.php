
<?php 
   session_start(); 
?>
<?php


//connect database
$server = "localhost";
$username = "root";
$password = "";
$DB = "mydb";

$conn = mysqli_connect($server,$username,$password,$DB);
if (!$conn)
{
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['login'])) 
{
//check if form was submitted

$email = $_POST['email'];
$password = $_POST['password'];

//Filter Them from html tags and check if mail is valid
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$sql="SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
$result = mysqli_query($conn,$sql);

 $nos = mysqli_num_rows($result);
 if($nos > 0)  
 {  
$row=mysqli_fetch_array($result);
$id=$row["ID"];
$Email=$row["Email"];
$Picture=$row["Picture"];
   $Name=$row["Name"];
 $Phone_Number=$row["Phone_Number"];
$Address=$row["Address"];
$Type=$row["Type"];
$Pass=$row["Password"];

    $_SESSION["id"]=$id;
    $_SESSION["email"]=$Email;
    $_SESSION["picture"]=$Picture;
    $_SESSION["name"]=$Name;
      $_SESSION["phone"]=$Phone_Number;
      $_SESSION["address"]=$Address;
       $_SESSION["type"]=$Type;
       $_SESSION["password"]=$Pass;
   // echo " Logged in successfully";
    header("Location:home.php");



                    $cstrong = True;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

                    $sql_id = "SELECT ID FROM users WHERE email = '{$email}'";
                    $result_id = mysqli_query($conn,$sql_id);
                    if($result_id->num_rows > 0)
                    {
                        while($user_id = $result_id->fetch_assoc())
                        {
                            $userid = $user_id['ID'];
                            $_SESSION['id'] = $userid;
                        }
                    }

                    $sql_tokens = "INSERT INTO tokens (ID,token,userid)
                    VALUES ('','{$token}',$userid)";

                   

                    $sql_tokens_fetch = mysqli_query($conn,$sql_tokens);

                    setcookie("USER", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                    setcookie("USER_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);



    


}
else
{$er='<script>
window.alert("Invalid Username OR Password");
</script>';
    echo $er;
}

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to the google font  -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Link to the CSS file  -->
    <link rel="stylesheet" href="css/style.css">

    <title>login</title>
    
</head>
<body>

<?php
include ("includes/loginheader.php");
?>
    <div class="form">
    <form action="login.php" method="POST">
            <div class="group-input">
                <p>E-Mail</p>
                <input type="email" name="email" placeholder="Enter your E-Mail">
            </div>
            
            <div class="group-input">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter your password">
            </div>
            

            <div class="group-btn">
                <input type="submit" class="bButton" name="login" value="Sign In" style="background-color: #8F3A84;">
            </div>
            
        </form>
    </div>
</body>
</html>
<?php include ("footernew.php"); ?>