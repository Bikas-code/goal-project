<?php
if(isset($_GET['id'])){
      $id=$_GET['id'];
      $query = "DELETE FROM  goal_table WHERE id = '$id'";
      include('connect.php');
      if(mysqli_query($conn, $query)){
            header("Location:../goal.php?msg=successfull delete");
      }else{
            header("Location:../goal.php?msg=".mysqli_error($conn));
      }
}