<?php  
 $connect = mysqli_connect("localhost", "root", "", "mydb");  
 $output = '';  
 $sql = "SELECT * FROM users ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                    <th width="40%">Picture</th>
                     <th width="10%">ID</th>  
                     <th width="40%">Name</th>  
                     <th width="40%">Email</th>  
                     <th width="10%">Delete</th>  
                     <th width="10%">View</th> 
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                <td class="Pic" data-id5="'.$row["ID"].'" contenteditable> <img src='.$row["Picture"].' width="60" height="60"> </td>  
                     <td>'.$row["ID"].'</td>  
                     <td class="first_name" data-id1="'.$row["ID"].'" contenteditable>'.$row["Name"].'</td>  
                     <td class="last_name" data-id2="'.$row["ID"].'" contenteditable>'.$row["Email"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["ID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  


                     
                     <td><button type="button" name="view_detail" class="btn btn-primary btn-sm details" id="'.$row["ID"].'">View Details</button></td>
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