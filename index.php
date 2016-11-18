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


<?php
//$mysqli = new mysqli("localhost","root", "system", "nba");
//$query = $mysqli->prepare("SELECT * FROM teams");
//$query->execute();
//$query->store_result();

//$rows = $query->num_rows;

//echo  "Teams:".$rows;

?>


		


	          
	            <p>
					<a href="create.php" class="btn btn-success">Create</a>
				</p>
    	</div>
    </div> <!-- /container -->
  </body>
</html>