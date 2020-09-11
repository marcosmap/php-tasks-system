<?php include('includes/header.php'); ?>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6">
        <h3 class="my-4 text-center">Create your account</h3>
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
              else if($_GET['error'] == 'invalidmailuid') {
                echo '
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Invalid user and email
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ';
              }
              else if($_GET['error'] == 'invalidmail') {
                echo '
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Invalid mail
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ';
              }
              else if($_GET['error'] == 'invaliduid') {
                echo '
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Invalid user
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ';
              }
              else if($_GET['error'] == 'passwordcheck') {
                echo '
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Invalid password
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ';
              }
              else if($_GET['error'] == 'usertaken') {
                echo '
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    User is already taken!  
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ';
              }
            }
            else if(isset($_GET['signup']) == 'success') {
              echo '
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Signup successfull!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ';
            }
          ?>

          <form action="includes/signup.inc.php" method="POST">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" autofocus>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
              <label>Repeat password</label>
              <input type="password" name="passwordRepeat" class="form-control">
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">
          </form>
        </div>
      </div>
    </div>
  </div>
  
<?php include('includes/footer.php'); ?>