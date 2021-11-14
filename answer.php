<?php
include ("headernew.php");
 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "mydb";
 

 $Answer = "";
 

 
 try{
 $conn = mysqli_connect($host, $user, $password, $database);
 }catch(Exception $ex){
     print "error";
 }

 
 $c_id = $_GET['c_id']; // get id through query string

$qry = mysqli_query($conn,"select * from ask where c_id='$c_id'"); // select query

$res = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $Answer = $_POST['Answer'];
	
	
    $edit = mysqli_query($conn,"update ask set Answer='$Answer' WHERE c_id='$c_id' ");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:tblask.php"); // redirects to all records page
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
        
        background: url() no-repeat;
        
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
   <label> Answer </label> <br> <input type="text" name="Answer" class = "txtStyle" value="<?php echo $res['Answer'] ?>" placeholder="Enter Answer" Required> <br> <br>

	   <div class = "div2">
  <input type="submit" name="update" value="Answer" class = "btnStyle">
  </div>
     </div>
</form>

</body>
 </html>
 
 
 