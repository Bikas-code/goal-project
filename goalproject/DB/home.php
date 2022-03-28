<?php
session_start();
$user_id = $_SESSION['users_id'];
include('connect.php');

if(isset($_POST['title'])
&& isset($_POST['description'])){
      $title = $_POST['title'];
      $goaldescription = $_POST['description'];
      // $goalstatus = $_POST['status'];
      $date = date("Y-m-d");
      $query = "INSERT INTO goal_table(title , description , date , user_id) VALUES('$title' , '$goaldescription' , '$date' ,  '$user_id')";

      if(mysqli_query($conn , $query))
      {
            $msg = "Data inserted";
            header('Location:../home.php?msg='.$msg);
      }else{
            $msg = "some error occured : ".mysqli_error($conn);
            header('Location:../home.php?msg='.$msg);

      }

}else
{
      $msg = "all fields are required";
}

?>