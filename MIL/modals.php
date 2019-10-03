<!-- All of the modals -->
        <!-- Sign up Modal -->
        <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="signupModalLabel">Sign up</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="index.php" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputFname">First name</label>
                      <input type="text" name="firstname" class="form-control" id="inputFname" placeholder="First name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputLname">Last name</label>
                      <input type="text" name="lastname" class="form-control" id="inputLname" placeholder="Last name">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail">Email address</label>
                  <input type="email" name="email" class="form-control" id="inputSignupEmail" placeholder="email@example.com">
                </div>
                <div class="form-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" name="password" class="form-control" id="inputSignupPassword" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" name="register">Sign up</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Forgot password Modal -->
        <div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="forgotModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="forgotModalLabel">Forgotten your password?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="forgot.php" method="post">
                        <div class="form-group">
                          <label for="inputEmail">Email address</label>
                          <input type="email" name="email" class="form-control" id="inputForgotEmail" placeholder="email@example.com">
                        </div>
                        <button type="submit" class="btn btn-primary" name="reset">Reset</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Delete run Modal -->
        <div class="modal fade" id="deleteRunModal" tabindex="-1" role="dialog" aria-labelledby="deleteRunModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="deleteModalLabel">Are you sure you want to delete?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger deleterunbut" data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Reset Password Modal -->
        <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="resetModalLabel">Reset your password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="index.php" method="post">
                <div class="form-group">
                  <label for="inputPassword">New Password</label>
                  <input type="password" name="newpassword" class="form-control" id="resetPassword" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="inputPassword">Confirm New Password</label>
                  <input type="password" name="confirmpassword" class="form-control" id="confirmResetPassword" placeholder="Password">
                </div>
                <!-- These input fields are needed in order to get the email address and hash of the user -->
                <input type="hidden" name="email" value="<?= $email ?>">    
                <input type="hidden" name="hash" value="<?= $hash ?>"> 
                <button type="submit" class="btn btn-primary" name="reset">Apply</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Help with upload Modal -->
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="uploadModalLabel">Need help with uploading?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Please make sure that the file you are uploading is in the correct prolog (.pl) format and structure. Your file <b>must</b> include the comments shown in the example below:<br><br>
                <b>%% tell metagol to use the BK</b><br>
                prim(mother/2).<br>
                prim(father/2).<br>
                <br>
                <b>%% background knowledge</b><br>
                mother(ann,amy).<br>
                mother(ann,andy).<br>
                mother(amy,amelia).<br>
                mother(linda,gavin).<br>
                father(steve,amy).<br>
                father(steve,andy).<br>
                father(gavin,amelia).<br>
                father(andy,spongebob).<br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Information for predicate -->
        <div class="modal fade" id="predicateModal" tabindex="-1" role="dialog" aria-labelledby="predicateModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="predicateModalLabel">Predicates to use in background knowledge</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    Define the predicates that you would like to use in your background knowledge. You may define predicates with either one or two arguments.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Information for Predicates to learn -->
            <div class="modal fade" id="pred2LearnModal" tabindex="-1" role="dialog" aria-labelledby="pred2LearnModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="pred2LearnModalLabel">Predicates to learn</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    Define the predicates that you would like to use in your background knowledge. You may define predicates with either one or two arguments.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Information for Arguments -->
            <div class="modal fade" id="argsModal" tabindex="-1" role="dialog" aria-labelledby="argsModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="argsModalLabel">Arguments to use in background knowledge</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    Define the arguments that you would like to use in your background knowledge.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Information for Metarules -->
            <div class="modal fade" id="metarulesModal" tabindex="-1" role="dialog" aria-labelledby="metarulesModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="metarulesModalLabel">Add metarules</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    Select the metarules you would like to use.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Information for Background Knowledge -->
            <div class="modal fade" id="bkModal" tabindex="-1" role="dialog" aria-labelledby="bkModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="bkModalLabel">Edit background knowledge</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    Enter your background knowledge here. Each row consists of a predicate and its one or two arguments selected from those you've defined above.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Information for Cytoscape Background Knowledge -->
        <div class="modal fade" id="cybkModal" tabindex="-1" role="dialog" aria-labelledby="cybkModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="cybkModalLabel">Diagram</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    Once you have filled in your background knowledge and predicate to learn, you can generate an interactive diagram. This will visualise your background knowledge.
              </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Information for Positive Example -->
            <div class="modal fade" id="peModal" tabindex="-1" role="dialog" aria-labelledby="peModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="peModalLabel" style="float:left">Edit positive examples</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    These are positive examples of the target predicate (examples that are true), that will be used to learn the target predicate.		  
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Information for Negative Example -->
            <div class="modal fade" id="neModal" tabindex="-1" role="dialog" aria-labelledby="neModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="neModalLabel">Edit negative examples</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    These are negative examples of the target predicate (examples that are false), that will be used to learn the target predicate.		  
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Information for Visualising Output -->
        <div class="modal fade" id="outputModal" tabindex="-1" role="dialog" aria-labelledby="outputModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="outputModalLabel">Visualise Output</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    Once you have executed the code, for optimal clarity, click the "Generate Diagram" button to visualise how the output will look.		  
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Information for Code Generation -->
            <div class="modal fade" id="codeModal" tabindex="-1" role="dialog" aria-labelledby="codeModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="codeModalLabel">Generate Code</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Once you have filled in your background knowledge and predicate to learn, generate the code that will run metagol by clicking this button. You can copy this code and save it to a .pl file if you want to run metagol locally on your system.		  
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  
          <!-- Information for EULA -->
          <div class="modal fade" id="EULAModal" tabindex="-1" role="dialog" aria-labelledby="EULAModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="EULAModalLabel">EULA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <h2>End-User License Agreement (EULA) of <span class="app_name">Machine Learning App</span></h2>

<p>This End-User License Agreement ("EULA") is a legal agreement between you and <span class="company_name">University Of Surrey</span></p>

<p>This EULA agreement governs your acquisition and use of our <span class="app_name">Machine Learning App</span> software ("Software") directly from <span class="company_name">University Of Surrey</span> or indirectly through a <span class="company_name">University Of Surrey</span> authorized reseller or distributor (a "Reseller").</p>

<p>Please read this EULA agreement carefully before completing the installation process and using the <span class="app_name">Machine Learning App</span> software. It provides a license to use the <span class="app_name">Machine Learning App</span> software and contains warranty information and liability disclaimers.</p>

<p>If you register for a free trial of the <span class="app_name">Machine Learning App</span> software, this EULA agreement will also govern that trial. By clicking "accept" or installing and/or using the <span class="app_name">Machine Learning App</span> software, you are confirming your acceptance of the Software and agreeing to become bound by the terms of this EULA agreement.</p>

<p>If you are entering into this EULA agreement on behalf of a company or other legal entity, you represent that you have the authority to bind such entity and its affiliates to these terms and conditions. If you do not have such authority or if you do not agree with the terms and conditions of this EULA agreement, do not install or use the Software, and you must not accept this EULA agreement.</p>

<p>This EULA agreement shall apply only to the Software supplied by <span class="company_name">University Of Surrey</span> herewith regardless of whether other software is referred to or described herein. The terms also apply to any <span class="company_name">University Of Surrey</span> updates, supplements, Internet-based services, and support services for the Software, unless other terms accompany those items on delivery. If so, those terms apply. This EULA was created by <a href="https://www.eulatemplate.com">EULA Template</a> for <span class="app_name">Machine Learning App</span>.

<h3>License Grant</h3>

<p><span class="company_name">University Of Surrey</span> hereby grants you a personal, non-transferable, non-exclusive licence to use the <span class="app_name">Machine Learning App</span> software on your devices in accordance with the terms of this EULA agreement.</p>

<p>You are permitted to load the <span class="app_name">Machine Learning App</span> software (for example a PC, laptop, mobile or tablet) under your control. You are responsible for ensuring your device meets the minimum requirements of the <span class="app_name">Machine Learning App</span> software.</p>

<p>You are not permitted to:</p>

<ul>
<li>Edit, alter, modify, adapt, translate or otherwise change the whole or any part of the Software nor permit the whole or any part of the Software to be combined with or become incorporated in any other software, nor decompile, disassemble or reverse engineer the Software or attempt to do any such things</li>
<li>Reproduce, copy, distribute, resell or otherwise use the Software for any commercial purpose</li>
<li>Allow any third party to use the Software on behalf of or for the benefit of any third party</li>
<li>Use the Software in any way which breaches any applicable local, national or international law</li>
<li>use the Software for any purpose that <span class="company_name">University Of Surrey</span> considers is a breach of this EULA agreement</li>
</ul>

<h3>Intellectual Property and Ownership</h3>

<p><span class="company_name">University Of Surrey</span> shall at all times retain ownership of the Software as originally downloaded by you and all subsequent downloads of the Software by you. The Software (and the copyright, and other intellectual property rights of whatever nature in the Software, including any modifications made thereto) are and shall remain the property of <span class="company_name">University Of Surrey</span>.</p>

<p><span class="company_name">University Of Surrey</span> reserves the right to grant licences to use the Software to third parties.</p>

<h3>Termination</h3>

<p>This EULA agreement is effective from the date you first use the Software and shall continue until terminated. You may terminate it at any time upon written notice to <span class="company_name">University Of Surrey</span>.</p>

<p>It will also terminate immediately if you fail to comply with any term of this EULA agreement. Upon such termination, the licenses granted by this EULA agreement will immediately terminate and you agree to stop all access and use of the Software. The provisions that by their nature continue and survive will survive any termination of this EULA agreement.</p>

<h3>Governing Law</h3>

<p>This EULA agreement, and any dispute arising out of or in connection with this EULA agreement, shall be governed by and construed in accordance with the laws of <span class="country">gb</span>.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>