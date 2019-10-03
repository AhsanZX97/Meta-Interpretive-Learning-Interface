<main role="main" class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4 collapse NN">
				<form id="formNN" action="index.php" method="post">
      	  			<div id="alert2">
					</div>
					<div class="row">
						<div class="col-sm-6">
							<?php include("NN/trainNN.php") ?>
							<div class="card bluecard">
								<div class = "card-body">
								<p > Status : <span id="result"> </span></p>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card bluecard">

								<div class="card-header">
									<span style="float:right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#settingModal">?</button></span>
								</div>
								<div class="card-body">
									<input type="number" id="num_input" class="form-control" value = 10000>
									<label for="num_input">Number of Input</label>

									<input type="number" id="num_output" class="form-control" value = 1>
									<label for="num_output">Number of Output</label>

									<input type="number" id="num_layers" class="form-control" value = 3>
									<label for="num_layers">Number of Layers</label>
									
									<input type="number" id="num_neurons_hidden" class="form-control" value = 107>
									<label for="num_neurons_hidden">Number of Neurons Hidden</label>
									
									<input type="number" id="desired_error" class="form-control" value = 0.00001>
									<label for="desired_error">Desired Error</label>

									<input type="number" id="max_epochs" class="form-control" value = 10000>
									<label for="max_epochs">Max Epochs</label>

									<input type="number" id="epochs_between_reports" class="form-control" value = 10>
									<label for="epochs_between_reports">Epochs Between Report</label>
								</div>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-12">
						<div class="card yellowcard">
							<div class="card-body">
								<div id="cytoscode"></div>
								<div id="cy2"></div>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
							</div>
						</div>
						</div>
					</div>
				</form>
			</main>
        <!-- Help with upload image Modal -->
        <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="dataModalLabel">INSERT TRAINING DATA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Upload image files that will be used as the NN training dataset. Unlimited number of files can be chosen but large quanitity of files will make the executions time slower.
				<br>Generate .data file : A data file is produced where the images are split into rgb arrays and then a numbered label is given to them on the next line, this will be used to train the NN 
	 			<br>Train NN : A neural network gets trained with a selected .data file that then produced a .net file where the trained neural network configuration lies
			    <br>Test NN : An image file is selected that then goes on to be tested by the neural network thats configured with the .net file.
			  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
<!-- Modal -->
<div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="loadingLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="spinner-border text-success" role="status"></div>
        <div clas="loader-txt">
          <p>Training Data <br><br><small>This may take awhile</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

        <!-- Help with setting Modal -->
        <div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="settingModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="settingModalLabel">NEURAL NETWORK SETTINGS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
								num_input: A number of inputs: the number of inputs needed in order to get one output out. For example, in logic gates, you would need 2 binary inputs in order to get one binary output.
								<br>num_output:	The number of output nodes the neuron will give
								<br>num_layers:	Total number of layers overall in the neural network
								<br>num_neurons_hidden:	Number of neurons that will be hidden
								<br>desired_error:	This is the error margin which if achieved means the neuron network is accurate
								<br>max_epochs:	Epoch is the number of times a training data sets used for training
								<br>epochs_between_reports: The number of epoch called per user function
								<br>fann_set_activation_function_hidden:	Enables all hidden neurons
								<br>fann_set_activation_function_output:	Enables the output layer.
			  			</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>