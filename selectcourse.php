

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>

</body>
</html>

<?php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 $output = '';  
 $sql = "SELECT * FROM course ";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                    <th width="10%">Course Image</th>
                     <th width="10%">Course ID</th>  
                     <th width="10%">Course Name</th>  
                     <th width="40%">Description</th>  
                     <th width="40%">Course Hours</th> 
                        <th width="40%">Price</th> 
                     <th width="10%">Delete</th> 
                       <th width="10%">Edit</th> 
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
              <td class="Pic" data-id5="'.$row["courseId"].'" contenteditable> <img src='.$row["image"].' width="60" height="60"> </td>
                     <td>'.$row["courseId"].'</td>  
                     <td class="first_name" data-id1="'.$row["courseId"].'" contenteditable>'.$row["courseName"].'</td>  
                     <td class="last_name" data-id2="'.$row["courseId"].'" contenteditable>'.$row["description"].'</td> 

<td class="last_name" data-id2="'.$row["courseId"].'" contenteditable>'.$row["courseHours"].'</td> 
<td class="last_name" data-id2="'.$row["courseId"].'" contenteditable>'.$row["price"].'</td> 
                     
                      <td><button type="button" name="delete_btn" data-id3="'.$row["courseId"].'" class="btn btn-xs btn-danger btn_delete">Remove</button></td> 


                       <td><button type="button" name="edit_btn" data-id="'.$row["courseId"].'" class="btn btn-xs btn-success btn_edit">Edit</button></td> 







                </tr>  
           ';  
      }  
    //  $output .= '  
     //      <tr>  
      //          <td></td>  
      //          <td id="first_name" contenteditable></td>  
      //          <td id="last_name" contenteditable></td>  
       //         <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
       //    </tr>  
     // ';  
 }  
 else  
 {  
      $output .= '
        <tr>  
          <td></td>  
          <td id="first_name" contenteditable></td>  
          <td id="last_name" contenteditable></td>  
          <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
         </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>