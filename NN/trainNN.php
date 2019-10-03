<div class="card bluecard">
								<div class="card-header">
									<h4>Neural Network</h4>
								</div>
								<div class="card-body">
									<p class="card-text">This is a web interface for Neural Networks</p>
								</div>
</div>
				
							<div class="card">
								<div class="card-header">
									<h4 style="float:left">Insert training data</h4>
									<span style="float:right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataModal">?</button></span>
								</div>
									<div class="card-body">
										<div class="form-group" style="color: green;">
											<label for="inputTrain1" style="color: green;">Label</label>
											<input class="form-control input-sm" id="inputTrain1" type="text" style="color: green;">
										</div>
										
										<div class="custom-file input-group-sm">
											<input type="file" class="custom-file-input" accept=".jpg" id="trainSet1" multiple>
											<label class="custom-file-label ellipsis" for="customFile">Choose training set 1</label>
										</div>
										
										<div class="form-group">
											<label for="inputTrain2" style="color: green;">Label</label>
											<input class="form-control input-sm" id="inputTrain2" type="text" style="color: green;">
										</div>

										<div class="custom-file input-group-sm">
											<input type="file" class="custom-file-input" accept=".jpg" id="trainSet2" multiple>
											<label class="custom-file-label ellipsis" for="customFile">Choose training set 2</label>
										</div>




										
										<button id="trainNN" type="button" class="btn btn-raised" style="color: white; background-color: #0f5257;"> Generate .data file </button>
										<input type="file" id="dataNN" style="display:none;" />
										<button id="train2" type="button" class="btn btn-raised" style="color: white; background-color: #0f5257;"> Train NN</button>
										<input type="file" id="testFileNN" style="display:none;" />
										<button id="testNN" type="button" class="btn btn-raised" style="color: white; background-color: #0f5257;"> test NN </button>
										<button id="cytoscapeNN" type="button" class="btn btn-raised" style="color: white; background-color: #0f5257;"> Generate Neural Network </button>
									</div>						
							</div>