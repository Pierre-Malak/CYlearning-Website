
<?php 
   
include ("headernew.php");

?>
<?php

//connect database
$server = "localhost";
 $username = "root";
$password = "";
$DB = "mydb";

$conn = mysqli_connect($server,$username,$password,$DB);
if (isset($_POST['submit'])) 
{

    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $feedback=$_POST['feedback'];
    $name=$_SESSION["name"];
    $sql = "INSERT INTO survay (q1,q2,q3,q4,q5,user_id,feedback,name) VALUES ('{$_POST['q1']}','{$_POST['q2']}','{$_POST['q3']}' ,'{$_POST['q4']}','{$_POST['q5']}','{$_SESSION['id']}','{$_POST['feedback']}' , '{$name}')";
    $result = mysqli_query($conn,$sql);
    if($result){
    print '<script>alert("submit successfuly!");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
       
    
    background-image: url('https://blog.goreact.com/wp-content/uploads/sites/2/2017/02/feedback-online.jpg');
    </style>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title> survay</title>
    
    
</head>
<body>
<div class="container">
    <hearder class="header">
        <h1 id="title">
          
        </h1>
        <h3>Thank you for taking the time to help us improve our website.</h3>
        
</header>
<div class="formm">
<form method="POST">
    <div class="survay-group">
       <b> <p id="user">1)The instructor was well prepared for the class.</p></b>
        <label for="">
            <input type="radio"
            name="q1"
            value="Almost always"
            class="input radio"
            checked>Almost always
</label><br>
<label for="">
            <input type="radio"
            name="q1"
            value="Frequently"
            class="input radio"
            checked>Frequently
</label><br>
<label for="">
            <input type="radio"
            name="q1"
            value="sometimes"
            class="input radio"
            checked>sometimes
</label><br>
<label for="">
            <input type="radio"
            name="q1"
            value="rarely"
            class="input radio"
            checked>rarely
</label><br>
<label for="">
            <input type="radio"
            name="q1"
            value="almost never"
            class="input radio"
            checked>almost never
</label><br>
<div class="survay-group">
      <b>  <p id="user">2)The instructor showed an interested in helpinf student learn.</p></b>
        <label for="">
            <input type="radio"
            name="q2"
            value="Almost always"
            class="input radio"
            checked>Almost always
</label><br>
<label for="">
            <input type="radio"
            name="q2"
            value="Frequently"
            class="input radio"
            checked>Frequently
</label><br>
<label for="">
            <input type="radio"
            name="q2"
            value="sometimes"
            class="input radio"
            checked>sometimes
</label><br>
<label for="">
            <input type="radio"
            name="q2"
            value="Rarely"
            class="input radio"
            checked>Rarely
</label><br>
<label for="">
            <input type="radio"
            name="q2"
            value="almost never"
            class="input radio"
            checked>almost never
</label><br>
<div class="survay-group">
        <b><p id="user">3)I received useful feedback on my performance on tests,paper,etc..</p></b>
        <label for="">
            <input type="radio"
            name="q3"
            value="Almost always"
            class="input radio"
            checked>Almost always
</label><br>
<label for="">
            <input type="radio"
            name="q3"
            value="Frequently"
            class="input radio"
            checked>Frequently
</label><br>
<label for="">
            <input type="radio"
            name="q3"
            value="sometimes"
            class="input radio"
            checked>sometimes
</label><br>
<label for="">
            <input type="radio"
            name="q3"
            value="Rarely"
            class="input radio"
            checked>Rarely
</label><br>
<label for="">
            <input type="radio"
            name="q3"
            value="Almost never"
            class="input radio"
            checked>Almost never
</label><br>
<div class="survay-group">
       <b> <p id="user">4)The course was organized in a manner that helped me understand the underlying concept.</p></b>
        <label for="">
            <input type="radio"
            name="q4"
            value="Strongly agree"
            class="input radio"
            checked>Strongly agree
</label><br>
<label for="">
            <input type="radio"
            name="q4"
            value="Agree"
            class="input radio"
            checked>Agree
</label><br>
<label for="">
            <input type="radio"
            name="q4"
            value="neutral"
            class="input radio"
            checked>neutral
</label><br>
<label for="">
            <input type="radio"
            name="q4"
            value="Disagree"
            class="input radio"
            checked>Disagree
</label><br>
<label for="">
            <input type="radio"
            name="q4"
            value="Strongly disagree"
            class="input radio"
            checked>Strongly disagree
</label><br>
<div class="survay-group">
        <b><p id="user">5)The instructor showed an interested in helpinf student learn.</p></b>
        <label for="">
            <input type="radio"
            name="q5"
            value="Almost always"
            class="input radio"
            checked>Almost always
</label><br>
<label for="">
            <input type="radio"
            name="q5"
            value="Frequently"
            class="input radio"
            checked>Frequently
</label><br>
<label for="">
            <input type="radio"
            name="q5"
            value="sometimes"
            class="input radio"
            checked>sometimes
</label><br>
<label for="">
            <input type="radio"
            name="q5"
            value="Rarely"
            class="input radio"
            checked>Rarely
</label><br>
<label for="">
            <input type="radio"
            name="q5"
            value="almost never"
            class="input radio"
            checked>almost never
</label><br>
<div class="survay-group">
        <b><p id="user">Give us your feedback</p></b>
        <textarea name="feedback"
        id="feedback"cols="60"
        rows="10"class="textarea"
        placeholder="Eenter your feedback here"></textarea>
</div>
        <button type="submit" name="submit" class="submit-btn" >submit</button>
   

</div>
</div>
</form>

</body>
</html>