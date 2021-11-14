
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script defer src="all.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Link to the CSS file  -->
    <link rel="stylesheet" href="stylenew.css">

    <title></title>
</head>
<body>

    <div class="header flex">
        <div class="logo fl-1">
            <img src="img/logo.png" alt="">
        </div>
        <div class="menu fl-2 flex">
         <a href="home.php"> <p class="fl-1 header-item"> Home </p>
           <a href="ont.php"> <p class="fl-1 header-item">Contact</p></a>
            <p class="fl-1 header-item">About</p>
          <a href="logout.php">  <p class="fl-1 header-item">Logout</p></a>
          <?php include ("Search_bar/SEARCH1111.php");?>
            
      
                 

        </div>

        <div class="user-infoo fl-1">

            <div class="flex" style="align-items:center;width: 60%;margin: 0 auto;">

                <div class="user-img">
                    <img src="<?php echo $_SESSION["picture"] ; ?>" alt="userimg.png">
         </div>
                <div class="user-name">
                    <a href="#" onclick="doClick(); return false;"><p><?php echo $_SESSION['name'] ?></p></a>

<script>
var typ = "<?php echo $_SESSION['type'] ?>";
function doClick() {
if(typ==1)
{window.location.href = "profilestudent.php";}
else if(typ==2)
  {window.location.href = "profileadmin.php"; }
else if(typ==3)
  {window.location.href = "profileauditor.php";}
 else if(typ==4)
{  window.location.href = "profilehr.php";}

 }

</script>
                </div>
                
            </div>
            
        </div>
    </div>
</body>
</html>
