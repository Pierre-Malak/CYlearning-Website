<?php
include ("headernew.php");
?>
<html>
<head>
<style>
input[type=text], select, textarea {
  width: 50%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 1.5% 4%;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 27%;
  font-size: 20px;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
 
}



</style>
</head>
<body>
<div class="container">
<h1 class="course-heading">Ask a Question</h1>
<form method="post" style="margin-left: 30%;">

  <label for="name">Name</label>

  <input type="text" id="fname" name="firstname" placeholder="Your name.." style="margin-left: 4.3%;" >
<br>
  <label for="lname">Email</label>
  <input type="text" id="lname" name="email" placeholder="Your last name.."style="margin-left: 4.5%;">
<br>
  <label for="country">Country</label>
  <select id="country" name="country" style="margin-left: 3%;">
    <option value="australia">Australia</option>
    <option value="canada">Canada</option>
    <option value="usa">USA</option>
  </select>
  <br>
  <label for="Subject">Subject</label>
  <select id="Subject" name="subject" style="margin-left: 3%;">
  <option value="Others">Others</option>
    <option value="Inquery">Inquery</option>
    <option value="Service">Service</option>
    <option value="Complaints">Complaints</option>
    
  </select>
<br>
 <br>
  <label for="Message">Your Question</label>
  <br>

  <textarea id="Message" name="message" placeholder="Write something.." style="height:200px; margin-left: 9%; padding-left: 5%;" ></textarea>
<br>
  <input type="submit" value="Submit" name="ask">

</form>
</div>
<?php 
$servername = "localhost";
$username = "root";
$password = "";

$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);




if(isset($_POST['ask'])){
$name=$_POST['firstname'];
$email=$_POST['email'];
$cont=$_POST['country'];
$sub=$_POST['subject'];
$msg=$_POST['message'];


$sql="INSERT INTO ask (Name, Email , Country, Subject, Message) VALUES
 ('{$name}','{$email}','{$cont}','{$sub}','{$msg}')";
mysqli_query($conn,$sql);
}
?>
</body>