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
  // delete
 if(isset($_POST['delete']))
 {
     $data = getPosts();
     $deleteQuery = "DELETE FROM `course` WHERE id =2";
     try
  {
     $deleteResult = mysqli_query($conn, $deleteQuery);
     
     if($deleteResult)
     {
         if(mysqli_affected_rows($conn) > 0){
             print "data deleted";
         }else{
             print "data not deleted";
         }
     }
 }catch(Exception $ex){
       print "error delete" .$ex->getMessage();  
     }
 }
 
?>


<html>
 <head> 
  <title> Data Selection </title>
    <style>
        body{
     color: white;
        background: url(300.jpg) no-repeat;
      
        }
		
        
        .div3{
          height:100px;
          margin-top:80px;
          margin-left:20px;
          padding-left:50px;
        }
         td{

  color: white;
  border-bottom: 2px solid #ddd;
}

       
    </style>
  </head>
  <body>  
    <div class = "div3">
    <h2> Courses Data </h2>
    <table>
      <tr> 
	     
		   <td> course ID </td>
          <td> Course Name </td>
          <td> Course Hours </td>
		   <td> course Description </td>
          <td> Instructor Name </td>
          <td> tinydesc </td>
		  <td> Price </td>
		  <td>Edit</td>
		  <td>Delete</td>
      </tr>
    <?php
      $result = mysqli_query($conn, "SELECT * FROM course");
      while($res = mysqli_fetch_array($result))
      {
	  ?>
         <tr>
   
	<td><?php echo $res['courseId']; ?></td>
    <td><?php echo $res['courseName']; ?></td>
	<td><?php echo $res['courseHours']; ?></td>
    <td><?php echo $res['description']; ?></td>
    <td><?php echo $res['courseInstructor']; ?></td>
    <td><?php echo $res['tinydesc']; ?></td> 
    <td><?php echo $res['price']; ?></td>   
    <td><a href="edit.php?id=<?php echo $res['id']; ?>">Edit</a></td>	
    <td><a href="delete.php?id=<?php echo $res['id']; ?>">Delete</a></td>
  </tr>	
	<?php	  
      }
    ?>

    </table>
    </div>      
 
  </body>
</html>