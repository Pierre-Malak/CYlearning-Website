<?php

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
  $id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from course where id = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:table.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
 
?>

