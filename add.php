<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$team1Error = null;
		$score1Error = null;
		$team2Error = null;
		$score2Error = null;
		
		// keep track post values
		$team1 = $_POST['team1'];
		$score1 = $_POST['score1'];
		$team2 = $_POST['team2'];
		$score2 = $_POST['score2'];
		
		
		// validate input
		$valid = true;
		if (empty($team1)) {
			$team1Error = 'Please enter game';
			$valid = false;
		}
		
		if (empty($score1)) {
			$score1Error = 'Please enter score';
			$valid = false;
		} 
		if (empty($team2)) {
			$team2Error = 'Please enter game';
			$valid = false;
		}
		
		if (empty($score2)) {
			$score2Error = 'Please enter score';
			$valid = false;
		} 
		
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO games (gameid,team1,score1,team2,score2) values(null,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($team1,$score1,$team2,$score2));
			Database::disconnect();
			header("Location: add.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link   href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
 //<![CDATA[ 
 // array of possible countries in the same order as they appear in the country selection list 
 var Divisions = new Array(2) 
 Divisions["empty"] = ["Select Division"]; 
 Divisions["Eastern Conference"] = ["Atlantic Division", "Central Division", "Southeast Division"]; 
 Divisions["Western Conference"] = ["Southwest Division", "Northwest Division", "Pacific Division"]; 
 /* CountryChange() is called from the onchange event of a select element. 
 * param selectObj - the select object which fired the on change event. 
 */ 
 function ChangeDivisions(selectObj) { 
 // get the index of the selected option 
 var idx = selectObj.selectedIndex; 
 // get the value of the selected option 
 var which = selectObj.options[idx].value; 
 // use the selected option value to retrieve the list of items from the countryLists array 
 cList = Divisions[which]; 
 // get the country select element via its known id 
 var cSelect = document.getElementById("division"); 
 // remove the current options from the country select 
 var len=cSelect.options.length; 
 while (cSelect.options.length > 0) { 
 cSelect.remove(0); 
 } 
 var newOption; 
 // create new options 
 for (var i=0; i<cList.length; i++) { 
 newOption = document.createElement("option"); 
 newOption.value = cList[i];  // assumes option string and value are the same 
 newOption.text=cList[i]; 
 // add the new option 
 try { 
 cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
 } 
 catch (e) { 
 cSelect.appendChild(newOption); 
 } 
 } 
 } 
//]]>
</script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Add game results</h3>
		    		</div>
    		
	    			<form class="form-horizontal1" action="add.php" method="post">
					  
					  <div class="control-group <?php echo !empty($teamError)?'error':'';?>">
					    <label class="control-label">Team</label>
					    <div class="controls">
					      	  <select name="team1" id="team1" onchange="ChangeDivisions(this);">
					      	  <option value="empty">Select a Team</option>
  								<option value="Cleveland Cavaliers">Cleveland Cavaliers</option>
  								<option value="Golden State Warriors">Golden State Warriors</option>
								</select>
					      	 <value="<?php echo !empty($conference)?$conference:'';?>">
					      	<?php if (!empty($conferenceError)): ?>
					      		<span class="help-inline"><?php echo $conferenceError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($teamError)?'error':'';?>">
					    <label class="control-label">Score</label>
					    <div class="controls">
					      	<input name="score1" type="text"  placeholder="Score" value="<?php echo !empty($team)?$team:'';?>">
					      	<?php if (!empty($teamError)): ?>
					      		<span class="help-inline"><?php echo $teamError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					 <!-- <div class="form-actions">
						  <button type="submit" class="btn btn-success">Save</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
					<form class="form-horizontal2" action="add.php" method="post">-->
					 
					  <div class="control-group <?php echo !empty($teamError)?'error':'';?>">
					    <label class="control-label">Team</label>
					    <div class="controls">
					      	  <select name="team2" id="game2" onchange="ChangeDivisions(this);">
					      	  <option value="empty">Select a Team</option>
  								<option value="Oklahoma City Thunder">Oklahoma City Thunder</option>
								</select>
					      	 <value="<?php echo !empty($conference)?$conference:'';?>">
					      	<?php if (!empty($conferenceError)): ?>
					      		<span class="help-inline"><?php echo $conferenceError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($teamError)?'error':'';?>">
					    <label class="control-label">Score</label>
					    <div class="controls">
					      	<input name="score2" type="text"  placeholder="Name" value="<?php echo !empty($team)?$team:'';?>">
					      	<?php if (!empty($teamError)): ?>
					      		<span class="help-inline"><?php echo $teamError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Save</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> 
<!-- /container -->

<table id="example" class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                	<th>Game</th>
		                  <th>Team 1</th>
		                  <th>Score</th>
		                  <th> Team 2</th>
		                  <th>Score</th>
		                </tr>
		              </thead>
		              <tbody> 

		              <?php 
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM games ORDER BY gameid DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
						   		echo '<td>'. $row['gameid'] . '</td>';
							   	echo '<td>'. $row['team1'] . '</td>';
							   	echo '<td>'. $row['score1'] . '</td>';
							   	echo '<td>'. $row['team2'] . '</td>';
							   	echo '<td>'. $row['score2'] . '</td>';
							   //	echo '<td width=250>';
							   	//echo '<a class="btn" href="read.php?team='.$row['team'].'">Read</a>';
							   	//echo '&nbsp;';
							   	//echo '<a class="btn btn-success" href="update.php?team='.$row['team'].'">Update</a>';
							   	//echo '&nbsp;';
							   	///echo '<a class="btn btn-danger" href="delete.php?team='.$row['team'].'">Delete</a>';
							   	//echo '</td>';
							   	//echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
					<?php

						$order = 'team';

						$orderBy = array('team', 'conference', 'division');

						
						if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
						    $order = $_GET['orderBy'];
						}

						$query = 'SELECT * FROM teams ORDER BY $order DESC';




// retrieve and show the data :)
?>
  </body>
</html>