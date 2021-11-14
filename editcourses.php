<?php
include ("includes/header.php");

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

 
 $c_id = $_GET['c_id']; // get id through query string

$qry = mysqli_query($conn,"select * from adc where c_id='$c_id'"); // select query

$res = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $courseName = $_POST['courseName'];
	$courseDescription = $_POST['courseDescription'];
	$instructorName = $_POST['instructorName'];
	$reviews = $_POST['reviews'];
    $price = $_POST['price'];
	
    $edit = mysqli_query($conn,"update adc set courseName='$courseName', courseDescription='$courseDescription' , instructorName='$instructorName' , reviews='$reviews' , price='$price'    where c_id='$c_id'");
	
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
        font-family:monospace; 
        background: url() no-repeat;
        color:#0000FF;
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
   <label> Course Name </label> <br> <input type="text" name="courseName" class = "txtStyle" value="<?php echo $res['courseName'] ?>" placeholder="Enter courseName" Required> <br> <br>
  <label> Course Description </label> <br> <input type="text" name="courseDescription" class = "txtStyle" value="<?php echo $res['courseDescription'] ?>" placeholder="Enter courseDescription" Required> <br> <br>
   <label> Instructor Name </label> <br> <input type="text" name="instructorName" class = "txtStyle" value="<?php echo $res['instructorName'] ?>" placeholder="Enter instructorName" Required> <br> <br>
    <label> Reviews </label> <br>  <input type="text" name="reviews"  class = "txtStyle" value="<?php echo $res['reviews'] ?>" placeholder="Enter reviews" Required> <br> <br>
	 <label> Price </label> <br> <input type="text" name="price" class = "txtStyle" value="<?php echo $res['price'] ?>" placeholder="Enter price" Required> <br> <br>
	   <div class = "div2">
  <input type="submit" name="update" value="Update" class = "btnStyle">
  </div>
     </div>
</form>

</body>
 </html>
 
 
 