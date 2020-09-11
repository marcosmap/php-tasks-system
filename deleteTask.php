<?php
  include('includes/db.php');
  session_start();

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM tasks WHERE idTask='$id';";
    $result = mysqli_query($conn, $query);
    if(!$result){
      die('Query failed');
    }
    $_SESSION['message'] = 'Task removed successfully';
    $_SESSION['message_type'] = 'danger';
    header('Location: tasks.php');
    exit();
  }