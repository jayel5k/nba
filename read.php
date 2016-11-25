<?php 
	require 'database.php';
	$id = null;
	if ( !empty($_GET['team'])) {
		$team = $_REQUEST['team'];
	}
	
	if ( null==$team ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM teams where team = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($team));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link   href="css/bootstrap.css" rel="stylesheet">
    <link   href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="modal_detail">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>View Team</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Name</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['team'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Conference</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['conference'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Division</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['division'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <a class="btn" href="index.php">Back</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>