<?php 
$msg = ""; 
$errmsg = "";
$vi;
$imgg;
$filee;
session_start();
if($_SESSION['ut'] != "in"){
  header('Location:./');
  exit;
}
$target_dire = "courses/";
// If upload button is clicked ... 
if (isset($_POST['createcourse'])) { 
  echo "x";
	$db = mysqli_connect("localhost", "root", "", "mydb"); 
//Photo Upload START
if(!empty($_FILES["img"]["name"])){
  $target_dir = "courses/";
  $file_name = time().'-'.basename($_FILES["img"]["name"]);
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
      $sql = "UPDATE course SET img= '{$target_file}' WHERE name='{$_POST['name']}'";
	  	mysqli_query($db, $sql); 
      $imgg= $target_file;
  } else {
      $errmsg .=  "Sorry, there was an error uploading your image file.<br>";
    }
  }

  }
  if(!empty($_FILES["video"]["name"])){
    
    $video_name = time().'-'.basename($_FILES["video"]["name"]);
    $target_fileV = $target_dire . $video_name;
    $uploadOk = 1;
    $videoType= strtolower(pathinfo($target_fileV,PATHINFO_EXTENSION));
    if (file_exists($target_fileV)) {
      $errmsg .= "Failed to upload video File already exists.<br>";
      $uploadOk = 0;
    }
    if($videoType != "mp4" && $videoType != "m4v" && $videoType != "wmv"&& $videoType != "webm") {
      $errmsg .= "Failed to upload video: Allowed formats are \"mp4,m4v,wmv,webm\" <br>";
      $uploadOk = 0;
    }
    if($uploadOk == 1) {
      if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_fileV)) {  
        $vi= $target_fileV;
    } 
  }else {
        $errmsg .=  "Sorry, there was an error uploading your video file.<br>";
        echo $errmsg;
      }
  }

  if(!empty($_FILES["pdf"]["name"])){
    
    $pdf_name = time().'-'.basename($_FILES["pdf"]["name"]);
    $target_fileP = $target_dire . $pdf_name;
    $uploadOk = 1;
    $pdfType= strtolower(pathinfo($target_fileP,PATHINFO_EXTENSION));
    if (file_exists($target_fileP)) {
      $errmsg .= "Failed to upload pdf File already exists.<br>";
      $uploadOk = 0;
    }
    if($pdfType != "pdf" && $pdfType != "ppt" && $pdfType != "doc"&& $pdfType != "docx") {
      $errmsg .= "Failed to upload pdf: Allowed formats are \"mp4,m4v,wmv,webm\" <br>";
      $uploadOk = 0;
    }
    if($uploadOk == 1) {
      if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_fileP)) {  
        $filee= $target_fileP;
    } else {
        $errmsg .=  "Sorry, there was an error uploading your pdf file.<br>";
      }
  }
}
    $name= $_POST['name'];
    $price= $_POST['price'];
    $instructor= $_SESSION['name'];
    $description= $_POST['descrption'];
    $img=$imgg;
    $pdf=$filee;
    $video=$vi;
    $db = mysqli_connect('localhost', 'root', '', 'mydb');

  	$query = "INSERT INTO course (name, img,price, instructor,description,pdf,video) 
  			  VALUES('$name', '$img', '$price','$instructor','$description','$pdf','$video')";
  	mysqli_query($db, $query); 
    echo "Success!";
    echo $errmsg;

}
?>
<html>
  <title> Creating course </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" />
<link rel="stylesheet" href="fontawesome/css/all.css">
<?php include('profileheader.php');?>
<style>

body {font-family: Arial, Helvetica, sans-serif;}

* {box-sizing: border-box}
body{
    background-color:white;
}
h1{
  text-align:center;
  padding:30px 0px 0px 0px;
  font:30px Oswald;
  color: teal;
  text-transform:uppercase;

  margin:0px;
}
b{
   
  text-align:center;
}
p,h2{
  font:13px Open Sans;
  color:teal;
  margin-bottom:30px;
  text-align:center;
}


.form{
  width:$full;
}

input[type="text"],input[type="int"],input[type="file"]{
   text-align:center;
  width:50%;
  padding:15px 0px 15px 8px;
  border-radius:5px;
  box-shadow:inset 4px 6px 10px -4px rgba(0,0,0,0.3), 0 1px 1px -1px rgba(255,255,255,0.3);
	background:rgba(0,0,0,0.2);
  @include disable;
  border:1px solid rgba(0,0,0,1);
  margin-bottom:10px;
  color:teal;
 
  font-size: 20px;
  
  text-align:center;
  display: block;
  margin-right: auto;
  margin-left: auto;
}



input[type="submit"]{
  width:50%;
  padding:15px;
  border-radius:5px;
  @include disable;

  background-color:#FF6347;
  font:14px Oswald;
  color:#FFF;
  text-transform:uppercase;
  text-shadow:#000 0px 1px 5px;
  border:1px solid #000;
  opacity:1;
	-webkit-box-shadow: 0 8px 6px -6px rgba(0,0,0,0.7);
  -moz-box-shadow: 0 8px 6px -6px rgba(0,0,0,0.7);
	box-shadow: 0 8px 6px -6px rgba(0,0,0,0.7);
  border-top:1px solid rgba(255,255,255,0.8)!important;
  display: block;
  margin-right: auto;
  margin-left: auto;
  -webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(50%, transparent), to(rgba(255,255,255,0.2)));
}

input:focus{
  box-shadow:inset 4px 6px 10px -4px rgba(0,0,0,0.7), 0 1px 1px -1px rgba(255,255,255,0.3);
  background:rgba(0,0,0,0.3);
  @include easeme;
}

input[type="submit"]:hover{
  opacity:0.7;
  cursor:pointer;
}

.code-help{
  display:none;
  padding:0px;
  margin:0px 0px 15px 0px;
}



</style>





<body>

<h1> Create a Course </h1>
<form action="addcourse.php" method="POST" class= "needs-validation" enctype="multipart/form-data" >

<label for="name"></label>
    <input type="text" placeholder="Course Name" name="name" id='name' required></p>
    <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      
<div>
<h2>Select course picture</h2>
<input type="file" placeholder="Select course picture" id="img" name="img" accept="image/*">
<h2>Select course file</h2>
<input type="file"  id="pdf" name="pdf" accept='.pdf,.doc,.docx,.ppt'>
<h2>Select course pdf</h2>
<input type="file"  id="video" name="video" accept="video/*">

<label for="price"></label>    
    <input type="int" name="price" value="" placeholder="Price" required></p>
    <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>

<label for="descrption"></label>    
    <input type="text" name="descrption" value="" placeholder="Description"required></p>
    <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>



<input type="submit" name="createcourse" value="Create Course">

</div>
</form>
</body>
</html>