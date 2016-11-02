<?php 
	
	require 'database.php';

	$id = null;
	if ( !empty($_GET['team'])) {
		$team = $_REQUEST['team'];
	}
	
	if ( null==$team ) {
		header("Location: index.php");
	}
	
	if ( !empty($_POST)) {
		// keep track validation errors
		$teamError = null;
		$conferenceError = null;
		$divisionError = null;
		
		// keep track post values
		$team = $_POST['team'];
		$conference = $_POST['conference'];
		$division = $_POST['division'];
		
		// validate input
		$valid = true;
		if (empty($team)) {
			$teamError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($conference)) {
			$conferenceError = 'Please enter conference Address';
			$valid = false;
		} else if ( !filter_var($conference,FILTER_VALIDATE_conference) ) {
			$conferenceError = 'Please enter a valid conference Address';
			$valid = false;
		}
		
		if (empty($division)) {
			$divisionError = 'Please enter division Number';
			$valid = false;
		}
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE teams  set team = ?, conference = ?, division =? WHERE team = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array(team,$conference,$division,$id));
			Database::disconnect();
			header("Location: index.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM teams where team = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($team));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$team = $data['team'];
		$conference = $data['conference'];
		$division = $data['division'];
		Database::disconnect();
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
		    			<h3>Update a Customer</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="update.php?team=<?php echo $team?>" method="post">
					  <div class="control-group <?php echo !empty(teamError)?'error':'';?>">
					    <label class="control-label">Name</label>
					    <div class="controls">
					      	<input name="team" type="text"  placeholder="Name" value="<?php echo !empty($team)?$team:'';?>">
					      	<?php if (!empty($teamError)): ?>
					      		<span class="help-inline"><?php echo teamError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($conferenceError)?'error':'';?>">
					    <label class="control-label">conference Address</label>
					    <div class="controls">
					      	<input name="conference" type="text" placeholder="conference Address" value="<?php echo !empty($conference)?$conference:'';?>">
					      	<?php if (!empty($conferenceError)): ?>
					      		<span class="help-inline"><?php echo $conferenceError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($divisionError)?'error':'';?>">
					    <label class="control-label">division Number</label>
					    <div class="controls">
					      	<input name="division" type="text"  placeholder="division Number" value="<?php echo !empty($division)?$division:'';?>">
					      	<?php if (!empty($divisionError)): ?>
					      		<span class="help-inline"><?php echo $divisionError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Update</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>