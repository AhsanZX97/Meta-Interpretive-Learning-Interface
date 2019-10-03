<?php 	
						if (isset($_SESSION['logged_in'])) {
							if ($_SESSION['logged_in'] == 1) {
								// Only allow the user to save runs if their account is activated
								if ( !$active ){
							?>
							<p class="card-text">Please activate your account if you wish to save your runs.</p>
							<?php }
							else { ?>
						<div class="input-group input-group-sm mb-3">
						  <input name="runname" type="text" maxlength="50" class="form-control" placeholder="Run name.." aria-label="Run name" aria-describedby="basic-addon2" style="color: white;">
						  <div class="input-group-append">
							<input id="saverun" name="saverun" type="submit" class="btn btn-primary btn-sm" value="Save"/>
						  </div>
						</div>
						<?php } } } ?>