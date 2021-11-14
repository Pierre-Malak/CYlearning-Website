<?php  
        include ("includes/header.php");
       
        ?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 40%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>


</head>
<body>

        <div style="width:100em;margin:55px 0 0 10px ;">

        <?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$msg = '';

$conn = new mysqli($servername, $username, $password, $dbname);
$o=1;
$result = mysqli_query($conn,"SELECT  *FROM users where ID = '1' ");


?>


  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" style="width:50em" >

 
<table  id="myTable">
  <tr class="header">
      <th style="width:10%;">Admins</th>
      <th style="width:10%;">View chatroom</th>

   
    
  </tr>
	<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
  
?><form method="POST" action="chatpageadmin.php"><!--<?php //echo $row["Name"];  ?>-->
<tr>

<td><?php echo $row["Name"]; ?></td>
<td><button>Chat</button></td>
    
    

</tr>
</form>
<?php
$i++;
}
?>
</table>




<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
<?php 
include ("includes/footer.php");
?>