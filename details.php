<?php 
include"includes/header.php";
include"connect.php";
 ?>
 <?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'];

}
  $sql = $db->query("SELECT * FROM items WHERE Id ='$id'");
  $result = mysqli_fetch_assoc($sql);
  ?>
<br><br><br>
  <!DOCTYPE html>
  
    <title>details</title>

  <body style="background-image: url(images/food_picture_03_hd_pictures_167556.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1" style="border: solid;border-radius: 20px;background-color: white">
          <div class="title col-md-12 solid" style="background-color: #F0E68C;border-radius: 10px;border:solid; margin-top: 5px;border-color: #F0E68C">
            <h1 class="text-center text-primary">Title: <?= $result['Title']; ?></h1>
          </div>
          <div class="col-md-6">
            <img  src="images/<?= $result['Image'];?>" style="height: 370px; width: 440px;margin-top: 4px;margin-bottom: 4px;" class="img-responsive img-thumbnail" >
          </div>
          <div class="col-md-6">
            <hr>
            <p><b>Description:</b> <?= $result['Description']; ?></p><hr>
            <h3 class="text-primary">Price:Ksh.<?= $result['Price']; ?></h3>
            <?php 


             ?>


            <?php 
             $sql = $db->query("SELECT * FROM items WHERE Id ='$id'");
             $count = mysqli_fetch_assoc($sql);
              $title = ((isset($_POST['title']))?$_POST['title']:$result['Title']);
              $description = ((isset($_POST['description']))?$_POST['description']:$result['Description']);
              $price = ((isset($_POST['Price']))?$_POST['Price']:$result['Price']);
              $name = ((isset($_POST['name']))?$_POST['name']:'');
              $table = ((isset($_POST['table']))?$_POST['table']:'');
            if ($_POST) {
             $insertsql = $db->query("INSERT INTO orders(name, title, table1, description, price) VALUES('$name', '$title', '$table', '$description', '$price')");
            
            ?>
            <script type="text/javascript">
              alert("Your Order has been received please give us 2 minutes to deliver your order! thank you");
              window.location='index.php';
            </script>
            <?php
}
             ?>
          <form  action="details.php?id=<?=$result['Id']?>" method="POST">
           
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?=$name;?>" required Autofocus>
            <label for="table">Table:</label>
            <?php $tabs = $db->query("SELECT * FROM tabs"); ?>
            <select class="form-control" name="table">
              <option value="<?=(($table == '')?' selected':'')?>" class="form-control"></option>
              <?php   while ($sql_results = mysqli_fetch_assoc($tabs)) :  ?>
              <option class="form-control"><?=$sql_results['tab_name'] ?></option>
               <?php  endwhile; ?>
            </select><br>
            <input type="hidden" name="title" value="<?=$title?>">
            <input type="hidden" name="description" value="<?=$description?>">
            <input type="hidden" name="price" value="<?=$price?>">
              <input  class="btn btn-md btn-success pull-right" type="submit" value="Order" style="margin-right: 10px;margin-bottom: 10px;">
          
          </form>
          
        </div>
      </div>
    </div>
  
  </body>
  </html>
