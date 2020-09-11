<?php 
  include('includes/header.php'); 
?>
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6">
        <h3 class="my-4 text-center">Sign in to MT Tasks</h3>
        <div class="card p-4">
          <?php
            if(isset($_GET['error'])) {
              if ($_GET['error'] == 'emptyfields') {
                echo '
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    You must fill in all fields!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ';
              }
              else if($_GET['error'] == 'wrongpwd') {
                echo '
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password invalid, try again...
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ';
              }
              else if($_GET['error'] == 'nouser') {
                echo '
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    User invalid, try again...
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ';
              }
            }
          ?>
          <form id="form" action="includes/login.inc.php" method="POST">
            <div class="form-group">
              <label>Username or email adress</label>
              <input type="text" name="username" class="form-control" autofocus>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" name="submit-login" value="Submit" class="btn btn-primary btn-block">
          </form>
        </div>
        <div class="card mt-3 align-items-center p-3">  
          <p class="mb-0">New to MT Tasks? <a href="signup.php">Create an account</a></p>
        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php'); ?>