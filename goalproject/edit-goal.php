<?php
    if(!isset($_GET['id'])){
        die("You can not edit");
    }
    $cid = $_GET['id'];
    session_start();
    if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
         header('Location:login.php');
    }
    $id = $_SESSION['users_id']; 
    include('db/connect.php');
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $goaltableQuery = "SELECT * FROM goal_table WHERE id = '$cid'";
    $goaltableResult = mysqli_query($conn, $goaltableQuery);
    if(mysqli_num_rows($goaltableResult)==0){
        die("No record found with this id");
    }
    else{
        $row = mysqli_fetch_assoc($goaltableResult);
    }

?>

<html>
  <head>
      <title>goal</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <?php include('include/nav.php');?>    
 
    <div class="container">
      <div class="row">
        <div class="col-8">
          <form method="POST" action="DB/edit-goal.php">
            <input type="hidden" name = "id" value ="<?php echo $cid;?>">
              <label>Goal title</label>
              <div class="input-group">
                <input type="text" value = "<?php echo $row['title']; ?>" class="form-control" name="title">
              </div>
              <br>
              <div class="input-group">
                <input type="text" value= "<?php echo $row['description']; ?>" placeholder="fa icon class" class="form-control" name="description">
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Save</button>
          </form>
          <?php include('include/message.php');?>
          
        </div>
      </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/833795b4ff.js" crossorigin="anonymous"></script>
  <script src="js/bootbox.min.js"></script>
  <script>
    function deleteConfirmation(id){
      bootbox.confirm({
      message: "Are you sure ?",
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
          window.location = 'DB/delete-goal.php?id='+id;
        }
    }
});
    }
  </script>
  </body>
</html>