<?php 
  require('db.php');

  // envio de formulario
  if(isset($_POST['submit-login'])) {
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(empty($username) || empty($password)) {
      header('Location: ../login.php?error=emptyfields');
      exit();
    }
    else {
      $sql = "SELECT * FROM users WHERE username=? OR email=?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../login.php?error=sqlerror");
          exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
          $pwdCheck = password_verify($password, $row['pwdUser']);
          if($pwdCheck == false){
            header("Location: ../login.php?error=wrongpwd");
            exit();
          }
          else if($pwdCheck == true) {
            session_start();
            $_SESSION['idUser'] = $row['idUser'];
            $_SESSION['username'] = $row['username'];
            header("Location: ../tasks.php?login=success");
            exit();
          }
        }
        else {
          header("Location: ../login.php?error=nouser");
          exit();
        }
      }
    }
  }
  else {
    header('Location: ../login.php');
    exit();
  }