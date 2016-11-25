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
		                  <th> </th>
		     
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
							   	echo '<td>
						<button data-toggle="modal" data-target="#view-modal" data-id="<?php echo '.$row['team'].' ;?>" id="geTeam" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
						</td>';
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
	          
	            <p>
					<a href="create.php" class="btn btn-success">Create</a>
				</p>
    	</div>
    </div> <!-- /container -->

    <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 
                  <div class="modal-content"> 
                  
                       <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title">
                            	<i class="glyphicon glyphicon-user"></i> Team
                            </h4> 
                       </div> 
                       <div class="modal-body"> 
                       
                       	   <div id="modal-loader" style="display: none; text-align: center;">
                       	   	<img src="ajax-loader.gif">
                       	   </div>
                            
                           <!-- content will be load here -->                          
                           <div id="dynamic-content"></div>
                             
                        </div> 
                        <div class="modal-footer"> 
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div> 
                        
                 </div> 
              </div>
       </div><!-- /.modal -->  

<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>


       <script>
$(document).ready(function(){
	
	$(document).on('click', '#geTeam', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: 'geTeam.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
		
	});
	
});

</script>  
  </body>
</html>