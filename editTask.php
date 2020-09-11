<?php
  include('includes/db.php');

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE idTask='$id'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_array($result);
      $name = $row['nameTask'];
      $desc = $row['descTask'];
    }

    if(isset($_POST['update'])){
      $id = $_GET['id'];
      $name = $_POST['task-name'];
      $desc = $_POST['desc-task'];

      $sql = "UPDATE tasks SET nameTask=?, descTask=? WHERE idTask=?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: tasks.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "sss", $name, $desc, $id);
        mysqli_stmt_execute($stmt);
        $_SESSION['message'] = 'Task saved succesfully';
        $_SESSION['message_type'] = 'success';
        header("Location: tasks.php");
        exit();
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
  }

  ?>

<?php include('includes/header.php'); ?>
  <div class="container">
    <div class="row p-4">
      <div class="col-md-4 mx-auto">
        <div class="card card-body">
          <form action="editTask.php?id=<?php echo $_GET['id'] ?>" method="POST" class="mb-0">
            <div class="form-group">
              <input type="text" name="task-name" value="<?php echo $name; ?>" placeholder="Update name" class="form-control">
            </div>
            <div class="from-group">
              <textarea name="desc-task" rows="4" placeholder="Update description" class="form-control"><?php echo $desc ?></textarea>
            </div>
            <div class="form-group mt-3 mb-0">
              <button class="btn btn-primary form-control" name="update">Update</button>  
            </div>           
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include('includes/footer.php'); ?>