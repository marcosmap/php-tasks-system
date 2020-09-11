<?php
  // conectamos con la base de datos
  $conn = mysqli_connect('localhost', 'root', '', 'tasks-system');
  // verificamos que la conexion sea correcta
  if(!$conn) {  
    echo 'ERROR: We can´t connect with database '. mysqli_connect_errno();
  }