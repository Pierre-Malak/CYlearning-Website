<?php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 $idt = '';  
 $sql = "SELECT * FROM course WHERE courseId = '".$_POST["id"]."'";  
 $result = mysqli_query($connect, $sql);

$row= $result->fetch_assoc();
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
</script> </head>
<body>

<h1 class="course-heading">Edit Course</h1>

  <img id="previewImg" src="<?php echo $row['image']; ?>" alt="Placeholder"style="position:relative; left:480px;"><br>
   <p>     <form method="POST" action="updates.php" enctype="multipart/form-data">   
   
   
<!-- <input type="file" name="img" style="position:relative; left:300px;background-color: #45a049;" onchange="previewFile(this);"> -->
<label for="img">Select Course photo:</label><br>
    <input type="file" id="img" style="position:relative; left:300px;background-color: #45a049;" onchange="previewFile(this);" name="img" accept="image/*">

        </p>
      
      



 <label for="name">Course Name</label>
  <input type="text" id="fname" name="coursename" value="<?php echo $row['courseName']; ?> "placeholder="Your name.."style="position:relative; left:365px;">
  <br>

  <label for="lname">Description</label>
  <input type="email" id="lname" name="courseid"value="<?php echo $row['description']; ?> " placeholder="Your Email.."style="position:relative; left:400px;">
  <br>

  <label for="Message">Instructor Name</label>

  <input type="text" id="lname" name="courseInstructor" placeholder="Your password.." value="<?php echo $row['courseInstructor']; ?>"style="position:relative; left:370px;"><br>

  <label for="country">Price </label>
 <input type="text" id="lname" name="country" placeholder="Your password.."value="<?php echo $_SESSION['address']; ?> "style="position:relative; left:385px;"><br>

 
  <br>
  <br>
  <input  name="submit"type="submit" value="Update"style="position:relative; left:500px;"> 

</form>
</body>