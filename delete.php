<?php 
	require 'database.php';
	$team = 0;
	
	if ( !empty($_GET['team'])) {
		$team = $_REQUEST['team'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$team = $_POST['team'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM teams  WHERE team = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($team));
		Database::disconnect();
		header("Location: index.php");
		
	} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Delete a Team</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="team" value="<?php echo $team;?>"/>
					  <p class="alert alert-error">Are you sure to delete  <?php echo $team;?> ?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Yes</button>
						  <a class="btn" href="index.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>