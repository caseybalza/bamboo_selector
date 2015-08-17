
				<?php include 'view/header.php'; ?>

				<!-- Display errors from form entry if any -->
				<?php 
					if (isset($error_message)) { 
							echo '<p class="error">' . $error_message . '</p>';
					}
				?>

				<form action="display_selection.php" method="post">

					<table>
						<tr>
							<th>
								<label for="minheight">Minimum Height In Feet</label>
							</th>
							<td>
								<input type="text" name="minheight" value="<?php if (isset($minheight)) { echo htmlspecialchars($minheight); } ?>" >
							</td>
						</tr>
						<tr>
							<th>
								<label for="maxheight">Maximum Height In Feet</label>
							</th>
							<td>
								<input type="text" name="maxheight" value="<?php if (isset($maxheight)) { echo htmlspecialchars($maxheight); } ?>" >
							</td>
						</tr>
						<tr>
							<th>
								<label for="light"><span class="trigger" data-tooltip="#tip1">Light Level</span></label>
							</th>
							<td>
								<select name="light">
								<?php for ($v = 1; $v <= 5; $v +=1) : ?>
									<option value="<?php echo $v; ?>" >
										<?php echo $v; ?>
									</option>
								<?php endfor; ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>
								<label for="usdazone"><a href="http://planthardiness.ars.usda.gov/PHZMWeb/Default.aspx" class="iframe" title="USDA Agricultural Research Service">USDA Zone</a></label>
							</th>
							<td>
								<select name="usdazone">
									<?php for ($v = 5; $v <= 10; $v +=1) : ?>
									<option value="<?php echo $v; ?>" >
										<?php echo $v; ?>
									</option>
									<?php endfor; ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>
								<label for="bambootype">Bamboo Type</label>
							</th>
							<td>
								<select name="bambootype">
									<option value="Running">Running</option>
									<option value="Clumping">Clumping</option>
								</select>
							</td>
						</tr>
					</table>
					<input type="submit" value="Process">

				</form>

				<div class="tooltip" id="tip1">
				  <h2>Light Level</h2>
				  <p>1 = Full Shade</p>
				  <p>5 = Full Sun</p>
				</div>
				
				<?php include 'view/footer.php'; ?>
		