<?php 
	
	require 'database.php';

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
			$conferenceError = 'Please enter Email Address';
			$valid = false;
		} 
		
		if (empty($division)) {
			$divisionError = 'Please enter Mobile Number';
			$valid = false;
		}
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO teams (team,conference,division) values(?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($team,$conference,$division));
			Database::disconnect();
			header("Location: index.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
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
		    			<h3>Create a Team</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="create.php" method="post">
					  <div class="control-group <?php echo !empty($teamError)?'error':'';?>">
					    <label class="control-label">Team</label>
					    <div class="controls">
					      	<input name="team" type="text"  placeholder="Name" value="<?php echo !empty($team)?$team:'';?>">
					      	<?php if (!empty($teamError)): ?>
					      		<span class="help-inline"><?php echo $teamError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($teamError)?'error':'';?>">
					    <label class="control-label">Conference</label>
					    <div class="controls">
					      	  <select name="conference" id="conference" onchange="ChangeDivisions(this);">
					      	  <option value="empty">Select a Conference</option>
  								<option value="Eastern Conference">Eastern Conference</option>
  								<option value="Western Conference">Western Conference</option>
								</select>
					      	 <value="<?php echo !empty($conference)?$conference:'';?>">
					      	<?php if (!empty($conferenceError)): ?>
					      		<span class="help-inline"><?php echo $conferenceError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($divisionError)?'error':'';?>">
					    <label class="control-label">Division</label>
					    <div class="controls">
					      	<select name="division" id="division">
  							<option value="0">Select a Division</option>
								</select>
							<value="<?php echo !empty($division)?$division:'';?>">
					      	<?php if (!empty($divisionError)): ?>
					      		<span class="help-inline"><?php echo $divisionError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>