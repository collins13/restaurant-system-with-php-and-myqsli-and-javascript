<?php   
include'connect.php';
 ?>
 <?php 
if (isset($_POST['login'])) {
  $name = $_POST['customer'];
  echo $name;
  header('location:index.php');
}

  ?>
<!DOCTYPE html>
<html>
<head>
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="main.css">

      <script src="jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </head>

  <body style="background-image:url('images/food_picture_03_hd_pictures_167556.jpg'); ">

    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:70px; background-color: white; padding: 40px; border-radius: 20px;">
            <form class="form-signin" method="POST" action="welcome.php" role="form" enctype="multipart/form-data">
            <?php
            $sql = $db->query("SELECT * FROM tabs");
             ?>
            <h2 class="form-signin-heading text-primary text-center" >Fill to continue.</h2>
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="customer">
            <label for="table">Table:</label>
            <select class="form-control">
              <option class="form-control"></option>
              <?php   while ($sql_results = mysqli_fetch_assoc($sql)) :  ?>
              <option class="form-control"><?=$sql_results['tab_name'] ?></option>
               <?php  endwhile; ?>
            </select><br>
            <button class="btn btn-primary btn-md" name="login" >Continue</button>
          </form>
        </div>
      </div>

     

    </div> <!-- /container -->
  </body>
</html>