<?php
		 
	require_once 'database.php';
	
	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
		$pdo = Database::connect();
		$query = "SELECT * FROM teams WHERE team=:id";
		$stmt = $pdo->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		//extract($row);
			
		?>
			
		<div class="table-responsive">
		
		<table class="table table-striped table-bordered">

		<tr>
				<th>Last Name</th>
				<td><?php echo $conference; ?></td>
			</tr>

		    <tr>
			    <th>Conference</th>
				<td><?php echo $row['conference']; ?></td>
			</tr>
			<tr>
				<th>Division</th>
				<td><?php echo $row['division']; ?></td>
			</tr>
		</table>
			
		</div>
			
		<?php				
	}