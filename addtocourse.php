<?php 

$msg = ""; 
$errmsg = "";
   $db = mysqli_connect("localhost", "root", "", "mydb"); 
// If upload button is clicked ... 
if (isset($_POST['insert'])) { $courseId = $_POST['courseID'];
  $db = mysqli_connect("localhost", "root", "", "mydb"); 
//Photo Upload START
if(!empty($_FILES["img"]["name"])){
  $target_dir = "uploads/";
  $file_name = mktime().'-'.basename($_FILES["img"]["name"]);
  $target_file = $target_dir . $file_name;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["img"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $errmsg .= "Failed to upload image: File is not an image.<br>";
    $uploadOk = 0;
  }
  // Check if file already exists
  if (file_exists($target_file)) {
    $errmsg .= "Failed to upload image: File already exists.<br>";
    $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["img"]["size"] > 300000) {
    $errmsg .= "Failed to upload image: File is too large (max: 250KB) <br>";
    $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $errmsg .= "Failed to upload image: Allowed formats are \"PNG, JPG, JPEG\" <br>";
    $uploadOk = 0;
  }
  if($uploadOk == 1) {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
      $sql = "INSERT INTO course (image) VALUES ('{$target_file}') ";
      mysqli_query($db, $sql); 
        
    
  } else {
      $errmsg .=  "Sorry, there was an error uploading your file.<br>";
    }
  }
}

//Photo Upload END
 
  
   

 // insert
 
   $courseId = $_POST['courseID'];
        $courseName = $_POST['courseName'];
         $courseHours = $_POST['courseHours'];
         $instructorName = $_POST['instructorName'];
      $price = $_POST['price'];
      $courseDescription = $_POST['courseDescription'];
   
     $sql = " INSERT INTO course ( courseName , description , courseInstructor , price , courseHours , courseId ) VALUES ( '{$courseName}' , 
     '{$courseDescription}', '{$instructorName}', '{$price}', '{$courseHours}','{$courseId}')";
     

      $result =$db->query($sql);
       if(mysqli_affected_rows($db) > 0){
             print "data inserted";
            header("Location:home.php");
         }else{
             echo "data not inserted";
         }

 }
   
 
?>