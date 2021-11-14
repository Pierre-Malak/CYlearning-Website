<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>HR Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="perfect.css">
<body>
  <header>
    <div class="topleft">
      <a href="home.php"><h1 class="wsname">CY<span class="brain">Learning</span></h1></a>
    </div>
    <div class="topright">
       <a href="home.php"><p class="sign"><img class="icons" src="home.png">&nbsp;&nbsp;Home</p></a>
       <a href="logout.php"><p class="sign"><img class="icons" src="log-in.png">&nbsp;&nbsp;Log out</p></a>
       
        
      </a>
    </div>

    <div class="navitems">
      
      <a href="MainMails.php"><p class="nbitems">Mails&nbsp;&nbsp; <img class="icons" src="mail.png"></p></a>
      <a href="MainPenalty.php"><p class="nbitems">Penalties&nbsp;&nbsp;<img class="icons" src="remove.png"></p></a>
      
      <a href="EditProfile.php"><p class="nbitems">Settings&nbsp;&nbsp;<img class="icons" src="settings.png"></p></a>
            
    </div>
  </header>
  <div class="profdiv">
    <div class="innerdiv">
      <div class="underpic">
      <img class="profimg img-fluid img-thumbnail"  src="<?php echo $_SESSION["picture"] ; ?>"   alt="profile.jpg" style='width:250px; height: 250px;'>
      <div class="nbitems2holder">
    
      </div>
      </div>
      <div class="textdiv">
        <h3 class="profname"><?php echo $_SESSION["name"] ?></h3>
        <p class="profsub">HR</P>
        <br><br>
        <p class="profsub"><img class="icons" src="phone-call.png">&nbsp;&nbsp;<?php echo $_SESSION["phone"]; ?></P>
        <p class="profsub"><img class="icons" src="email.png">&nbsp;&nbsp;<?php echo $_SESSION["email"]; ?></P>
      </div>
    </div>
  </div>
</body>
</html>
