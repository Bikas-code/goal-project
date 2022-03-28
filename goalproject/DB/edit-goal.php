<?php
if(!isset($_POST['title'])){
die("cannot edit the record");
}else{
      $c = $_POST['title'];
      $i = $_POST['description'];
      $id = $_POST['id'];
      include('connect.php');
      $query = "UPDATE goal_table SET title = '$c', description ='$i' WHERE id ='$id'";
      if(mysqli_query($conn , $query)){
            header('location:../goal.php?msg=successfully updated');
      }else{
            header('location:../goal.php?msg='.mysqli_error($conn));

      }


      
}
?>