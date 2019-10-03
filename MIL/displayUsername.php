<?php 	
              // If logged in, then display the users name
                if (isset($_SESSION['logged_in'])) {
                    if ($_SESSION['logged_in'] == 1) {?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle inline" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" id="navbarDropdownMenuLink2">Welcome, User</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" id="EULA" name="EULA" data-toggle="modal" data-target="#EULAModal">EULA</a>
                            <a class="dropdown-item" href="#" id="logout" name="logout">Log out</a>
                        </div>
                        </li>
                    <?php } }
                    else { ?>
                    <li class="nav-item dropdown inline">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <form action="index.php" method="post" class="px-4 py-3 form-signin">
                        <div class="form-group">
                          <label for="inputEmail">Email address</label>
                          <input type="email" name="email" class="form-control" id="inputEmail" placeholder="email@example.com">
                        </div>
                        <div class="form-group">
                          <label for="inputPassword">Password</label>
                          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Sign in</button>
                      </form>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#signupModal">New around here? Sign up</a>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#forgotModal">Forgot password?</a>
                    </div>
                  </li>
                    <?php }	?>