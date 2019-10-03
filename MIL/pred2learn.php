<div style="display:none" id="episode_template">
         <div id="episode_id" class="row ep">
            <div class="col-md-12">
				<div class="card powdercard">
					<div class="card-header">
						<h4 style="float:left">Learn a predicate</h4>
						<span style="float:right"><a class='dele btn btn-danger btn-sm' id="episode_del_id" href="#" >Delete</a></span>
						<div style="clear: both;"></div>
					</div>
					<div class="card-body">
						<div class="card bluecard">
							<div class="card-header">
								<h4 style="float:left">Name of predicate to learn</h4>
							</div>
							<div class="card-body">
								<p class="card-text">This is the target predicate you are trying to learn.
								<input id="pred_id" name="predicate_name" type="text" class="form-control form-control-sm" maxlength="50"/>
								</p>
							</div>
						</div>
					
						<!--  Row for positive and negative examples -->
						<div class="row">
							<!-- Positive examples for predicates to learn -->
							<div class="col-sm-6">
							   <div class="card yellowcard">
								  <div class="card-header">
									<h4 style="float:left">Edit positive examples</h4>
									<span style="float:right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#peModal">?</button></span>
								  </div>
									 <table class="table table-striped table-borderless" id="pos_id">
										<thead><tr><th>Predicate</th><th>Argument 1</th><th>Argument 2</th><th><a id="addpos_id" href="#" class="btn btn-primary btn-sm">Add row</a></th></tr></thead>
										<tbody>
										</tbody>
									 </table>
							   </div>
							</div>
							   
							<!-- Negative examples for predicates to learn -->
							<div class="col-sm-6">
							   <div class="card rosecard">
								  <div class="card-header">
									 <h4 style ="float:left">Edit negative examples</h4>
									 <span style="float:right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#neModal">?</button></span>
								  </div>
									
									 <table class="table table-striped table-borderless" id="neg_id">
										<thead><tr><th>Predicate</th><th>Argument 1</th><th>Argument 2</th><th><a id="addneg_id" href="#" class="btn btn-primary btn-sm">Add row</a></th></tr></thead>
										<tbody>
										</tbody>
									 </table>
								</div>
							</div>
						</div> <!-- end of row -->
					</div> <!-- end of card body for predicate -->
				</div>
            </div>
         </div>
      </div> <!-- end of predicates to learn -->
         
         
            <div class="card">
               <div class="card-header">
                  <h4 style="float:left">Predicates to learn</h4>
									<span style="float:right"><button type="button" class="btn btn-primary btn-sm" onclick="togTables('pred2learn')">v</button></span>
									<span style="float:right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pred2LearnModal">?</button></span>
               </div>
               <div class="card-body" id="pred2learn">
                  <table class="table table-striped table-borderless" id="episodes">
                    <thead><tr><th>Predicates</th><th><a id="addepisode" href="#" class="btn btn-primary btn-sm">Add predicate to learn</a></th></tr></thead>
                     <tbody>
                     </tbody>
                  </table>
                  <div id="episode_divs">
                  </div>
                  
               </div>
            </div>