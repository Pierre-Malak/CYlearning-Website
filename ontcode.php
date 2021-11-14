<?php
if(!empty($_POST["send"])) {
	$name = $_POST["Fullname"];
	$email = $_POST["email"];
	$content = $_POST["message"];

	$conn = mysqli_connect("localhost", "root", "", "mydb") or die("Connection Error: " . mysqli_error($conn));
	mysqli_query($conn, "INSERT INTO tblcontact (user_name, user_email,content) VALUES ('" . $name. "', '" . $email. "','" . $content. "')");
	$insert_id = mysqli_insert_id($conn);
	//if(!empty($insert_id)) {
	   $message = "Your contact information is saved successfully.";
	   $type = ' <script>alert("Your contact information is saved successfully.");</script>';
echo $type;
	//}
}
require_once "ontlogin.php";
?>