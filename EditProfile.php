<?php
include ("headernew.php");
?>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>

<style>
input[type=text], select, textarea {
  width: 20%; /* Full width */
position:relative; left:780px;
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=file] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}input[type=file]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {

  background-color: #f2f2f2;
 
}
label{
  position:relative; left:290px;

color:black;
}
</style>
</head>
<body>

<div class="container">


<h1 class="course-heading">Edit Profile</h1>

  <img id="previewImg" src="<?php echo $_SESSION['picture']; ?>" alt="Placeholder"style="position:relative; left:480px;"><br>
   <p>     <form method="POST" action="updates.php" enctype="multipart/form-data">   
   
   
<!-- <input type="file" name="img" style="position:relative; left:300px;background-color: #45a049;" onchange="previewFile(this);"> -->
<label for="img">Select Profile photo:</label><br>
    <input type="file" id="img" style="position:relative; left:300px;background-color: #45a049;" onchange="previewFile(this);" name="img" accept="image/*">

        </p>
      
      



 <label for="name">Username</label>
  <input type="text" id="fname" name="name" value="<?php echo $_SESSION['name']; ?> "placeholder="Your Name.."style="position:relative; left:365px;">
  <br>

  <label for="lname">Email</label>
  <input type="email" id="lname" name="email"value="<?php echo $_SESSION['email']; ?> " placeholder="Your Email.."style="position:relative; left:400px;">
  <br>

  <label for="Message">Password</label>

  <input type="text" id="lname" name="password" placeholder="Your password.." value="<?php echo $_SESSION['password']; ?>"style="position:relative; left:370px;"><br>

  <label for="country">Address</label>
 <input type="text" id="lname" name="country" placeholder="Your Address.."value="<?php echo $_SESSION['address']; ?> "style="position:relative; left:385px;"><br>

  <label for="Message">Phone-Number</label>

  <input type="text" id="lname" name="phoneum"value="<?php echo $_SESSION['phone']; ?> " placeholder="Your PhoneNumber.."style="position:relative; left:330px;">
  <br>
  <br>
  <input  name="submit"type="submit" value="Update"style="position:relative; left:500px;"> 

</form>
</div>


</body>