<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link   href="css/style.css" rel="stylesheet">
   <script type="text/javascript" src="js/gs_sortable.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
<!--
var TSort_Data = new Array ('example', 's', 's', 's');
tsRegister();
// -->
</script>

<script type="text/javascript">
	
$('#modal_detail').on('show', function(){
  var id_beli = $(this).attr('id');
  $('#modalContent').html('Loading..')

  $.ajax({
      cache: false,
      type: 'GET',
      url: 'nba/read.php',
      data: 'detail=' + id_beli,
      success: function(data) {
        $('#modalContent').html(data); //this part to pass the var
      }
  });
})
</script>

</head>

<body>
    <div class="container">
    		<div class="row">
    			<h3>NBA Teams</h3>
    		</div>
			<div class="row">




				
				<table id="example" class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Team</th>
		                  <th>Conference</th>
		                  <th> Division</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody> 

		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM teams ORDER BY team ASC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['team'] . '</td>';
							   	echo '<td>'. $row['conference'] . '</td>';
							   	echo '<td>'. $row['division'] . '</td>';
							   	echo '<td width=250>';
							  	echo '<a class="btn" href="read.php?team='.$row['team'].'">Read</a>';
							  //  	echo '<a class="btn" href="#modal_detail">Read</a>';
							   
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="update.php?team='.$row['team'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="delete.php?team='.$row['team'].'">Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   $sql = $pdo->prepare('SELECT * FROM teams');
					   $sql->execute();
					  $count=$sql->rowCount();
					  print("No. of teams $count ")





				

					  // Database::disconnect();
					 
					  ?>
				      </tbody>
				      </table>


<div id="modal_detail" class="modal hide fade">
    <div class="modal-header">
      <button class="close" data-dismiss="modal">&times;</button>
      <h3>Detail Product</h3>
    </div>
    <div class="modal-body">            
        <div id="modalContent" style="display:none;">
        Here i want to display data from query about the detail of a product (name, price etc)      
        </div>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn btn-info" data-dismiss="modal" >Close</a>
    </div>
</div>


<?php
//$mysqli = new mysqli("localhost","root", "system", "nba");
//$query = $mysqli->prepare("SELECT * FROM teams");
//$query->execute();
//$query->store_result();

//$rows = $query->num_rows;



?>


		


	          
	            <p>
					<a href="create.php" class="btn btn-success">Create</a>
				</p>
    	</div>
    </div> <!-- /container -->
  </body>
</html>