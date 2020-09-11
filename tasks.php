<?php
  include('includes/db.php');
  include('includes/header.php');

  if(isset($_SESSION['idUser'])){
    $id = $_SESSION['idUser'];
?>

<div class="container">
  <div class="row text-center">
    <div class="col-lg-4 col-md-5">
      <h2 class="my-3">Add a new task</h2>

      <?php if(isset($_SESSION['message'])){ ?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php unset($_SESSION['message']);
            unset($_SESSION['message_type']);  }?>

      <form action="includes/tasks.inc.php" method="POST" id="form-task">
        <div class="form-group">
          <input type="text" placeholder="Enter task" name="task-name" class="form-control" id="task-name">
        </div>
        <div class="form-group">
          <textarea type="text" id="desc-task" placeholder="Task description" name="desc-task" class="form-control" rows="5" style="resize: none;"></textarea>
        </div>
        <input type="submit" name="submit-task" class="btn btn-primary btn-block" value="Add task">
      </form>
    </div>
    <div class="col-lg-8 col-md-7">
      <h2 class="my-3">List tasks</h2>
      <table class="table">
        <thead class="">
          <tr>
            <th scope="col">Task</th>
            <th scope="col">Description</th>
            <th scope="col">Created at</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $query = "SELECT * FROM tasks WHERE fk_userId='$id';";
          $result_task = mysqli_query($conn, $query);
          while($row = mysqli_fetch_array($result_task)){ ?>
            <tr>
              <td><?php echo $row['nameTask'] ?></td>
              <td><?php echo $row['descTask'] ?></td>
              <td><?php echo $row['created_at'] ?></td>
              <td class="d-flex flex-row">
                <a href="editTask.php?id=<?php echo $row['idTask']; ?>" class="btn btn-info mr-2">
                  <i class="far fa-edit"></i>
                </a>
                <a href="deleteTask.php?id=<?php echo $row['idTask']; ?>" class="btn btn-danger">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
    
<?php
  }
  require('includes/footer.php');
?>