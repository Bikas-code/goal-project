<html>
  <head>
      <title>Goal</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
<body> 
    <?php include('include/nav.php')?>
 
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                <form method="post" action="DB/home.php">
                   
                     <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Title</span>
                        <input type="text" name="title" class="form-control"  aria-label="title" aria-describedby="basic-addon1">
                    </div>


<!-- 
                     <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <textarea name = "status" class="form-control" id="status" rows="1"></textarea>
                    </div> -->

                    <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name = "description" class="form-control" id="description" rows="7"></textarea>
                    </div> 
                    <hr/>  
                    See the goal <a href="goal.php">Goal</a><br>
                    <input type="submit" value="save" name="submit" class="btn btn-success">
                 <?php include('include/message.php') ?>
                </form>
                </div>    
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>