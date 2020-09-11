<?php
  require('db.php');
  session_start();

  // verificamos el envio de formulario
  if(isset($_SESSION['idUser']) && isset($_POST['submit-task'])) {
    $idUser = $_SESSION['idUser'];
    $taskName = mysqli_real_escape_string($conn, $_POST['task-name']);
    $descTask = mysqli_real_escape_string($conn, $_POST['desc-task']);

    if(empty($taskName) || empty($descTask)) {
      header('Location: ../tasks.php?error=emptyfields');
      exit();
    }
    else {
      $sql = "INSERT INTO tasks (nameTask, descTask, fk_userId) VALUES (?,?,?);";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../tasks.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "sss", $taskName, $descTask, $idUser);
        mysqli_stmt_execute($stmt);
        $_SESSION['message'] = 'Task saved succesfully';
        $_SESSION['message_type'] = 'success';
        header("Location: ../tasks.php");
        
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }

  }
  else {
    header('Location: ../tasks.php');
    exit();
  }