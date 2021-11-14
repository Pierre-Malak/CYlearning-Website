<?php
include ("headernew.php");
 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "mydb";
 

 $courseName = "";
 $courseDescription = "";
 $instructorName = "";
 $reviews="";
 $price="";

 
 try{
 $conn = mysqli_connect($host, $user, $password, $database);
 }catch(Exception $ex){
     print "error";
 }

 function getPosts(){
     $posts = array();
     
     $posts[0] = $_POST['courseName'];
     $posts[1] = $_POST['courseDescription'];
     $posts[2] = $_POST['instructorName'];
	 $posts[3] = $_POST['reviews'];
	 $posts[4] = $_POST['price'];
     return $posts;
 }
  // delete
 if(isset($_POST['delete']))
 {
     $data = getPosts();
     $deleteQuery = "DELETE FROM `adc` WHERE c_id =2";
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
  <title> MYSQL Entry </title>

    <style>
        body{
     color: black;
       
      
        }
		
        
        .div3{
          height:200px;
          margin-top:200px;
          margin-left:80px;
          padding-left:100px;
        }
         td{

  color: black;
  border-bottom: 1px solid #ddd;
}

       
    </style>
  </head>
  <body>  
    <div class = "div3">
    <h2> Courses Data </h2>
    <table>
      <tr> 
	      <td> ID </td>
          <td> Course Name </td>
          <td> Course Description </td>
          <td> Instructor Name </td>
          <td> Reviews/5 </td>
		  <td> Price </td>
		  <td>Edit</td>
		  <td>Delete</td>
      </tr>
    <?php
      $result = mysqli_query($conn, "SELECT * FROM adc");
      while($res = mysqli_fetch_array($result))
      {
	  ?>
         <tr>
    <td><?php echo $res['c_id']; ?></td>
    <td><?php echo $res['courseName']; ?></td>
    <td><?php echo $res['courseDescription']; ?></td>
    <td><?php echo $res['instructorName']; ?></td>
    <td><?php echo $res['reviews']; ?></td> 
    <td><?php echo $res['price']; ?></td>   
    <td ><a href="edit.php?c_id=<?php echo $res['c_id']; ?>"style="color: green;">Edit</a></td>	
    <td ><a href="delete.php?c_id=<?php echo $res['c_id']; ?>" style="color: red;">Delete</a></td>
  </tr>	
	<?php	  
      }
    ?>

    </table>
    </div>      
 
  </body>
</html>