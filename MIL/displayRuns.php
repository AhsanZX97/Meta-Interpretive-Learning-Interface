<?php 
// If the user is logged in, then we show the saved runs
			if (isset($_SESSION['logged_in'])) {
				if ($_SESSION['logged_in'] == 1) {
			?>
				<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
				  <span>Saved runs</span>
				  <a class="d-flex align-items-center text-muted" href="#">
					<span data-feather="save"></span>
				  </a>
				</h6>

				<ul class="nav flex-column mb-2">	
					<div class="row">
						<div class="col-sm-9">
						<?php 
							$savedruns = $mysqli->query("SELECT * FROM runs WHERE user_id='$user_id'");
							while ($row = $savedruns->fetch_assoc()) {
								echo '<li class="nav-item">
									<a class="nav-link run ellipsis" href="#" id="run_'.$row['id'].'" data-run="'.$row['id'].'" >
									  <span data-feather="file-text"></span>'.$row['name'].'</a>
								</li>';
								array_push($runs_array,$row['id']);
							}
						?>
						</div>
						<div class="col-sm-1 px-1">
						<?php 
							$savedruns = $mysqli->query("SELECT * FROM runs WHERE user_id='$user_id'");
							while ($row = $savedruns->fetch_assoc()) {
								echo '<li class="nav-item">
									<a class="nav-link deleterun" href="#" id="delrun_'.$row['id'].'" data-run="'.$row['id'].'" data-toggle="modal" data-target="#deleteRunModal" >
									  <span data-feather="trash-2"></span></a>
									
								</li>';
								array_push($runs_array,$row['id']);
							}
						?>
						</div>
					</div>
				</ul>
				<!-- Closing off the if statement for user logged in -->
			<?php } } ?>