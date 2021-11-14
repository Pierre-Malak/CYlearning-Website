<?php
include ("headernew.php");
 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "mydb";
 

$courseId ="";
 $courseName = "";
 $courseHours ="";
 $description = "";
 $courseInstructor = "";
 $tinydesc ="";
 $price="";

 
 try{
 $conn = mysqli_connect($host, $user, $password, $database);
 }catch(Exception $ex){
     print "error";
 }

 
 $id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from course where id='$id'"); // select query

$res = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
 $courseId = $_POST['courseId'];
 $courseName =  $_POST['courseName'];
 $courseHours = $_POST['courseHours'];
 $description = $_POST['description'];
 $courseInstructor = $_POST['courseInstructor'];
 $tinydesc = $_POST['tinydesc'];
 $price= $_POST['price'];
 
    
$edit = mysqli_query($conn,"update course set courseId='$courseId', courseName='$courseName' , courseHours='$courseHours' , description='$description' , courseInstructor='$courseInstructor' , tinydesc='$tinydesc' , price='$price' where id='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:table.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
<html>
<style>
 body{
       
        }
        
        .div1{
         margin-top:100px;
         margin-left: 150px;		 
         height:100px;
        }
        
        label{
         padding-left:350px;
         font-size: 20px;
        }
        
        .txtStyle{
         text-align:left;
         margin-left:350px;
         width: 40%;
         height: 40px;
        }
        
        .div2{
            margin-left: 550px;
        }
        
        
        .btnStyle{
          background:#00a2ed;
          width:100px;
          height:25px;
          border-radius: 15px 15px;
        }
        
        .btnStyle:hover{
          cursor: pointer;
          background-color:#63bbf2;
        }
        
        

</style>

<body>

<form method="POST">
  <div class = "div1">
  <label> Course ID </label> <br> <input type="text" name="courseId" class = "txtStyle" value="<?php echo $res['courseId'] ?>" placeholder="Enter courseID" Required> <br> <br>
   <label> Course Name </label> <br> <input type="text" name="courseName" class = "txtStyle" value="<?php echo $res['courseName'] ?>" placeholder="Enter courseName" Required> <br> <br>
   <label> Course Hours </label> <br> <input type="text" name="courseHours" class = "txtStyle" value="<?php echo $res['courseHours'] ?>" placeholder="Enter courseHours" Required> <br> <br>
  <label> Description </label> <br> <input type="text" name="description" class = "txtStyle" value="<?php echo $res['description'] ?>" placeholder="Enter courseDescription" Required> <br> <br>
   <label> course Instructor </label> <br> <input type="text" name="courseInstructor" class = "txtStyle" value="<?php echo $res['courseInstructor'] ?>" placeholder="Enter instructorName" Required> <br> <br>
    <label> tinydesc </label> <br>  <input type="text" name="tinydesc"  class = "txtStyle" value="<?php echo $res['tinydesc'] ?>" placeholder="Enter tinydesc" Required> <br> <br>
	 <label> Price </label> <br> <input type="text" name="price" class = "txtStyle" value="<?php echo $res['price'] ?>" placeholder="Enter price" Required> <br> <br>
	   <div class = "div2">
  <input type="submit" name="update" value="Update" class = "btnStyle">
  </div>
     </div>
</form>

</body>
 </html>
 
 
 