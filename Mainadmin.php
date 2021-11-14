      <?php

include ("headernew.php");

      ?>
<html>  
    <head>  
        <title>Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</title>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script>

$(document).ready(function(){
        $("#addmin").hide();

     


  $("#adding").click(function(){
    $("#addmin").fadeToggle("slow");})


  

});


</script>


<style type="text/css">
    
#adding{margin-left: 700px;}

#addmin{margin-left: 650px;}

</style>






    </head>  







    <body>  

        <div class="container">  
            <br />  
            <br />
			<br />
			<div class="table-responsive">  
				<h3 align="center" style="color: blue;">Live Table Add / Delete</h3><br />
				<span id="result"></span>
				<div id="live_data"></div>                 
			</div>  
		</div>









<br><br>
<button id="adding" style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  ">ADD</button>
<div id="addmin">
<br> <br>
<form method="post" action="addingadmin.php" >
<label>Mail</label>
<input type="email" placeholder="admin@miuegypt.du.eg" class="mail" name="mail"><br><br>
<label>ID</label>
  <input type="number" class="id" name="id" min="0" max="100000"><br><br>
<label>Name</label>
<input type="text" placeholder="Ahmed Nail" class="name" name="name"><br><br>
<label>Password</label>
<input type="password" placeholder="ahmed181716" class="password" name="pass"><br><br>
<label for="types">User Type:</label>

<select name="type" id="types">
  
  <option value="2">Admin</option>
</select>
<br><br>
<input type="submit" style="background-color: blue; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
" id="submit">

</form>
</div>
<p>

    <?php

include ("footernew.php");

      ?>
    </p>
    </body>  
</html>  

<div class="modal" id="detailModal">
    <div class="modal-dialog">
      <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">User Details</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body" id="user_details">
            
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>



<script>  





$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    }  
    fetch_data();  
   
    
	function edit_data(id, text, column_name)  
    {  
        $.ajax({  
            url:"edit.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  
    $(document).on('blur', '.first_name', function(){  
        var id = $(this).data("id1");  
        var first_name = $(this).text();  
        edit_data(id, first_name, "first_name");  
    });  
    $(document).on('blur', '.last_name', function(){  
        var id = $(this).data("id2");  
        var last_name = $(this).text();  
        edit_data(id,last_name, "last_name");  
    });  
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id3");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"deleteadmin.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  

$(document).on('click', '.details', function(){
    var user_id = $(this).attr('id');
    $.ajax({
          url:"profiledetail.php",
          method:"POST",
          data:{action:'fetch_data', user_id:user_id, page:'user'},
          success:function(data)
          {
            $('#user_details').html(data);
            $('#detailModal').modal('show');
          }
      });
  });



});  
</script>
  