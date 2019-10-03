<main role="main" class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4 collapse MIL">
				<form id="form" action="index.php" method="post">
					<div id="alert">
					</div>
					<div class="row">
						<div class="col-sm-6">
							<?php include("title.php") ?>
							<!-- Predicates to use in background knowledge -->
							<?php include("predicate.php") ?>
							<!-- Metarules to use -->
							<?php include("metarules.php") ?>
							<!-- Arguments to use in background knowledge -->
							<?php include("arguments.php") ?>
							<!-- Full background knowledge to use-->
							<?php include("backgroundKnowledge.php") ?>
						</div>

						<div class="col-sm-6">
							<!-- Upload a Metagol file  -->
							<?php include("uploadFile.php") ?>
							<?php include("Tables.php") ?>

						</div>
					<hr/>
					</div>		
                 
      
	  			<!-- Predicates to Learn -->
     		 	<?php include("pred2learn.php") ?>
      
					<div class="row"> <!-- Metagol Code row -->	
						<div class="col-sm-6">	<!-- Code to Execute column -->			
							<?php include("executeCode.php") ?>
						</div> 

						<div class="col-sm-6"> <!-- Execute column -->
							<?php include("output.php") ?>
						</div> <!-- end of Execute column -->
					</div>

					<!-- Cytoscape diagram -->
					<div class="row">
						<div class="col-sm-3">
							<?php include("cytoscape2.php") ?>
						</div>
					</div> <!-- end of Cytoscape row -->
			
				</form>
      </main>