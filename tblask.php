<?php
include ("headernew.php");
 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "mydb";
 

 $Name = "";
 $Email = "";
 $Subject = "";
 $Message="";
 $Country="";
 $Answer="";

 
 try{
 $conn = mysqli_connect($host, $user, $password, $database);
 }catch(Exception $ex){
     print "error";
 }

 function getPosts(){
     $posts = array();
     
     $posts[0] = $_POST['Name'];
     $posts[1] = $_POST['Email'];
     $posts[2] = $_POST['Subject'];
	 $posts[3] = $_POST['Message'];
	 $posts[4] = $_POST['Country'];
	 $posts[5] = $_POST['Answer'];
     return $posts;
 }
 
?>


<html>
 <head> 
  <title> Answer Questions </title>
    <style>
        body{
     
      
        }
		
        
        .div3{
          height:200px;
          margin-top:200px;
          margin-left:50px;
          padding-left:100px;
        }
         td{

 
  border-bottom: 1px solid #ddd;
}

       
    </style>
  </head>
  <body>  
    <div class = "div3">
    <h2> Data </h2>
    <table>
      <tr> 
	   
	      <td> Name </td>
          <td> Email </td>
          <td> Subject </td>
          <td> Question </td>
          <td> Country </td>
		  <td>Answer</td>
		  <td>AN</td>
      </tr>
    <?php
      $result = mysqli_query($conn, "SELECT * FROM ask ");
      while($res = mysqli_fetch_array($result))
      {
	  ?>
         <tr>
		 
    <td><?php echo $res['Name']; ?></td>
    <td><?php echo $res['Email']; ?></td>
    <td><?php echo $res['Subject']; ?></td>
    <td><?php echo $res['Message']; ?></td>
    <td><?php echo $res['Country']; ?></td> 
	<td><?php echo $res['Answer']; ?></td> 
   <td><a href="answer.php?c_id=<?php echo $res['c_id']; ?>" style="color: red;">AN</a></td>	
   
  </tr>	
	<?php	  
      }
    ?>

    </table>
    </div>      
 
  </body>
</html>