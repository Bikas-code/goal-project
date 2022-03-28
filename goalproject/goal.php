<?php
session_start();
 if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
   header('Location:login.php');
 }
 $id = $_SESSION['users_id']; 
 include('db/connect.php');
 $query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);
$goaltableQuery = "SELECT * FROM goal_table";
$goaltableResult = mysqli_query($conn, $goaltableQuery);


?>

<html>
  <head>
      <title>Goal table</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
<body>
<?php include('include/nav.php');?>    
 
<div class="container">
   <div class="row">
   
     <div class= "col-8">
     
    

      <div class="row justify-content-md-center">
      <?php
      if(mysqli_num_rows($goaltableResult)==0){  
        echo "<h3>No Category found</h3>";
      }else{ ?>
      <table class = "table">
        <thead>
          <th>Title</th>
          <th>Accomplish date</th>
          <th>Action</th>
         
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_assoc($goaltableResult)){?>
          <tr>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['date'];?></td>

            <td><a href='#' onclick = "deleteConfirmation(<?php echo $row['id'];?>);"><i class = "fas fa-trash" style=color:red></i></a>|<a href="edit-goal.php?id=<?php echo $row['id'];?>"><i class = "fas fa-edit"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php } ?>
      </div>
     </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/f946cb11bd.js" crossorigin="anonymous"></script>
<script src ="js/bootbox.min.js"></script>
<script>
function deleteConfirmation(id){
  bootbox.confirm({
    message: "Are you sure want to delet?",
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        if(result){
          window.location = 'DB/delet-goal.php?id='+id;
        }
    }
});
}
</script>
</body>
</html>