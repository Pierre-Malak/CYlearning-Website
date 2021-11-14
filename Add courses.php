<?php
include "headernew.php";
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

 function getPosts(){
     $posts = array();
     
$posts[0] = $_POST['courseId'];
     $posts[1] = $_POST['courseName'];
	 $posts[2] = $_POST['courseHours'];
     $posts[3] = $_POST['description'];
     $posts[4] = $_POST['courseInstructor'];
	 $posts[5] = $_POST['tinydesc'];
	 $posts[6] = $_POST['price'];
     return $posts;
 }
 // insert
 if(isset($_POST['insert']))
 {
     $data = getPosts();



                        



     $insertQuery = "INSERT INTO `course`( `courseId` , `courseName`, `courseHours`, `description`,`courseInstructor` ,`tinydesc` , `price`) VALUES ( '$data[0]' , '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]')";
     try
  {
     $insertResult = mysqli_query($conn, $insertQuery);
     
     if($insertResult)
     {
         if(mysqli_affected_rows($conn) > 0){
            // print "data inserted";
         }else{
             print "data not inserted";
         }
     }
 }catch(Exception $ex){
       print "error insert" .$ex->getMessage();  
     }
 
 
}

  


?>


<html>
 <head> 
  <title>ADD Course</title>
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
  </head>
  <body>  

   <form action = "Add courses.php" method = "post">
     <div class = "div1">
     <label> Course ID </label> <br> <input type = "text" name = "courseId" class = "txtStyle" value = "<?php print $courseId; ?>"> <br> <br>
     <label> Course Name </label> <br> <input type = "text" name = "courseName" class = "txtStyle" value = "<?php print $courseName; ?>"> <br> <br>
     <label> Course Hours </label> <br> <input type = "text" name = "courseHours" class = "txtStyle"  value = "<?php print $courseHours; ?>"> <br> <br>
     <label> Description </label> <br> <input type = "text" name = "description" class = "txtStyle" value = "<?php print $description; ?>"> <br> <br>
     <label> Course Instructor </label> <br> <input type = "text" name = "courseInstructor" class = "txtStyle" value = "<?php print $courseInstructor; ?>"> <br> <br>
     <label> tinydesc </label> <br> <input type = "text" name = "tinydesc" class = "txtStyle" value = "<?php print $tinydesc; ?>"> <br> <br> 
	 <label> Price </label> <br> <input type = "text" name = "price" class = "txtStyle" value = "<?php print $price; ?>"> <br> <br> 
     <div class = "div2">
     <input type = "submit" name = "insert" value = "Add" class = "btnStyle" >

     </div>
     </div>
   </form>   
  </body>

</html>
