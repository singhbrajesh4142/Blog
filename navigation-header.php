<div id="navigation-header">
        <nav class="navbar ">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-bar" aria-expanded="false">
            <!--<span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>-->
            <span class="glyphicon glyphicon-th-large"></span>
          </button>
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" > Home </span></a>
        </div>
        <div class="collapse navbar-collapse" id="navigation-bar">
          <form action="search.php" method="POST" class="navbar-form navbar-left">
              <div class="form-group input-group ">
                <input type="text" name="search-field" class="form-control" placeholder="Search post..." />
                  <span class="input-group-btn">
                    <button type="submit" name="btn-search" class="btn">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </span>
            </div>
          </form>
          
          <ul class="nav navbar-nav navbar-right">

            <?php
              if(isset($_SESSION['u_id'])){
                echo '<li><a href="myaccount.php"><span class="glyphicon glyphicon-user"> MyAccount</span></a></li>
                        <li>
                          <form id="logout-form" action="code/code.logout.php" method="POST">
                            <button type="submit" name="btn-logout" class="btn"><span class="glyphicon glyphicon-log-out"> Logout</span></button>
                          </form>
                        </li>
                      ';
              }else{
                echo '
                  <li class="">
              <a id="loginpopup" href="#"><span class="glyphicon glyphicon-log-in"> Login</span></a>
                  <!--<button id="loginpopup" class="btn" >Login</button>-->
              <div class="modal fade" id="modal1" tabindex="-1">
                <div id="dialog-model" class="modal-dialog">
                  <div class="modal-content" >
                    <div class="modal-header">
                      <button id="btncross" class="close" >&times;</button>
                      <h4 class="modal-title">Login</h4>
                    </div>

                    <div class="modal-body">
                      <form action="code/code.login.php" method="POST">
                        <div class="form-group">
                          <lable for="uname">Username:</lable>
                          <input type="text" class="form-control" name="uname" placeholder="Username / Email" />
                        </div>
                        <div class="form-group">
                          <lable for="password">Password:</lable>
                          <input class="form-control" type="password" name="pwd" AUTOCOMPLETE="off" placeholder="Password" />
                        </div>
                        <button type="submit" name="btn-login" class="btn btn-success form-control">Login</button>
                      </form>
                    </div>

                    <div class="modal-footer">
                    <!--<button id="btnclose" class="btn btn-primary" >Close</button>-->
                    <a href="signup.php"> Create an account </a>
                    </div>
                  </div>
                </div>
              </div>
            </li>

            <li><a href="signup.php"><span class="glyphicon"> Signup</span></a></li>
                ';
              }
            ?>
            
          </ul>
        </div>
      </div>

    </nav>
    </div>

