<?php
	require_once('model/database.php');

	// Get data from the form
	$minheight  = $_POST['minheight'];
	$maxheight  = $_POST['maxheight'];
	$light      = $_POST['light'];
	$usdazone   = $_POST['usdazone'];
	$bambootype = $_POST['bambootype'];

	// Validate the form entry for minimum height
	if (empty($minheight)) {
			$error_message = 'A minimum height value is required.'; 
	} else if ( !is_numeric($minheight)) {
			$error_message = 'The minimum height must be a valid number.'; 
	} else if ($minheight <= 0) {
			$error_message = 'The minimum height must be greater than zero.';
	} else if ($minheight > $maxheight) {
			$error_message = 'The minimum height must be smaller than the maximum height.';

	// Validate the form entry for maximum height
	} else if (empty($maxheight)) {
			$error_message = 'A maximum height value is required.'; 
	} else if ( !is_numeric($maxheight)) {
			$error_message = 'The maximum height must be a valid number.'; 
	} else if ($maxheight <= 0) {
			$error_message = 'The maximum height must be greater than zero.';

	// set error message to empty string if no invalid entries.
	} else {
			$error_message = '';
	}
	
	// If error message exists, go to index page
	if ($error_message != '') {
		include('index.php');
		exit();
	}

	// Get the bamboo from database


	$query = "SELECT * FROM bamboo
						WHERE minHeight >= $minheight AND
								  maxHeight <= $maxheight AND
								  minLight <= $light      AND  
								  maxLight >= $light      AND  
								  usdaMin <= $usdazone	  AND
								  usdaMax >= $usdazone		AND
								  rhizomeType = '$bambootype' -- use single quotes because variable holds a string
						ORDER BY scientificName";
	$bamboos = $db->query($query);

?>

<?php include 'view/header.php'; ?>

			<!-- Displays the search criteria from form -->
				<div id="bamboosearch">
					<h2>Bamboo Search Criteria</h2><br/>
				
					<label>Minimum Height:</label>
					<span><?php echo htmlspecialchars($minheight); ?></span><br/>

					<label>Maximum Height:</label>
					<span><?php echo htmlspecialchars($maxheight); ?></span><br/>

					<label>Light Level:</label>
					<span><?php echo $light; ?></span><br/>

					<label>USDA Zone:</label>
					<span><?php echo $usdazone; ?></span><br/>

					<label>Bamboo Type:</label>
					<span><?php echo $bambootype; ?></span><br/>
					
				</div>
				<div id="new_search">
					<h2><a href="index.php">New Search</a></h2>
				</div>
				<div id="results">
					<table>
						<tr>
							<th>Scientific Name</th>
							<th>Min. Height</th>
							<th>Max. Height</th>
							<th>Min. Light</th>
							<th>Max. Light</th>
							<th>Min. USDA Zone</th>
							<th>Max. USDA Zone</th>
							<th>Bamboo Type</th>
						</tr> 
		
						<?php foreach ($bamboos as $bamboo) : ?>
						<tr >
							<td ><?php echo '<a href="' . $bamboo['link'] . '" class="iframe">' . $bamboo['scientificName'] . '</a>'; ?></td>
							<td><?php echo $bamboo['minHeight']; ?></td>
							<td><?php echo $bamboo['maxHeight']; ?></td>
							<td><?php echo $bamboo['minLight']; ?></td>
							<td><?php echo $bamboo['maxLight']; ?></td>
							<td><?php echo $bamboo['usdaMin']; ?></td>
							<td><?php echo $bamboo['usdaMax']; ?></td>
							<td><?php echo $bamboo['rhizomeType']; ?></td>
						</tr>
						<?php endforeach; ?>
					</table>

					<?php
						if (empty($bamboo)) {
								$error_message = "No bamboo were found in your search criteria. Please contact Bamboo Garden at 503-647-2700,
												or email us at bamboo@bamboogarden.com for additional help.";
								echo '<p class="error">' . $error_message . '</p>';
						}
					?>
				</div>


<?php include 'view/footer.php'; ?>















