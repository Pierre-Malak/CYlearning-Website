<?php

include ("includes/header.php");

if($_SESSION['id'])
{
  print '<script>alert("Already Logged In !");</script>';
  header("Location:home.php");
}

if (isset($_POST['create'])) 
{

  
  $fullname= $_POST['Name'];
  $email= $_POST['email'];
  $phone= $_POST['phone'];
  $password= $_POST['password'];
  $repassword= $_POST['repassword'];
  $usertype=1;//student


  if (!empty($fullname))
  {
    if(!empty($email))
    {
      if(!empty($password))
      {
        if(!empty($phone))
        {
          if(!empty($_POST["repassword"]))
          {
            if($password == $repassword)
            {
              
              if(filter_var($email,FILTER_VALIDATE_EMAIL))
              {
	 
              // Check for retyping

              $sql = "INSERT INTO register (id,fullname,email,password,phone,img,usertype)
              VALUES ('','{$fullname}','{$email}','{$password}' , '{$phone}', 'edit.png' ,'{$usertype}')";
              $result = mysqli_query($conn,$sql);
              if($result)
              {
                print '<script>alert("Account Created!");</script>';
                header("Location:home.php");
              }
            }else{
              echo("$email is not a valid email address");

              }
            }
            else
            {
              echo "please check your password";
            }
          }
          else
          {
            echo "password don\'t match";
          }
        }
        else
        {
          echo "Error in phone";
        }
      }
      else
      {
        echo "Error in password";
      }
    }
    else
    {
      echo "Error in email";
    }
  }
  else
  {
    echo"Error in fullname";
  }
 
}

?>
		
			<div class="form">
				<form method="POST" action="registration.php">
					<div class="group-input"> <b> <p>Fullname</p></b>
						<input type="text" name="fullname" placeholder="Enter your name"> </div>
					<div class="group-input"> <b>  <p>E-Mail</p></b>
						<input type="email" name="email" placeholder="Enter your E-Mail"> </div>
					<div class="group-input"> <b> <p>Phone number</p></b>
						<input type="text" name="phone" placeholder="Enter your phone number"> </div>
					<div class="group-input"> <b>  <p>Password</p></b>
						<input type="password" name="password" placeholder="Enter your password"> </div>
					<div class="group-input"> <b>   <p>Confirm Password</p></b>
						<input type="password" name="repassword" placeholder="Confirm your password"> </div>
					<div class="group-btn">
						<input type="submit" class="bButton" name="create" value="Create Account"> </div>
				</form>
			</div>
	</body>

	</html>
  <?php include ("includes/footer.php"); ?>