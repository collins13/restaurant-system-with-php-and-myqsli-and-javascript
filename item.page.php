 <?php 
include"includes/header.php";
include"connect.php";

       if (isset($_GET['category'])) {
       	$id = $_GET['category'];
         $sel_cat = $db->query("SELECT * FROM items WHERE  category='$id'");
       }

 ?>

 <style type="text/css">
   body{
    background-color: #DCDCDC;
   }
 </style>
<h1 class="text-center text-primary" style="margin-top: 50px ;">Welcome to Brit Whit Restaurant!</h1><br>

    <div class="container-fluid theme-showcase" role="main">
      <div class="row col-md-8" ">
           <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
            <!-- Indicators -->

            <!-- Wrapper for slides -->
            <div class="carousel-inner ">
              <div class="item active">
                <img class="img-responsive img-thumbnail" src="images/images-20 - Copy.jpg" alt="..." style="height: 360px;width: 800px;">

                <div class="carousel-caption">
                  ...
                </div>
              </div>

              <div class="item">
                <img class="img-responsive img-thumbnail" src="images/images-15.jpg" alt="..." style="height: 360px;width: 800px;">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img class="img-responsive img-thumbnail" src="images/images.jpg" alt="..." style="height: 360px;width: 800px;">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img class="img-responsive img-thumbnail" src="images/sa-foods.jpg" alt="..." style="height: 360px;width: 800px;">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img class="img-responsive img-thumbnail" src="images/images-18.jpg" alt="..." style="height: 360px;width: 800px;">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img class="img-responsive img-thumbnail" src="images/images-1 - Copy.jpg" alt="..." style="height: 360px;width: 800px;">
                <div class="carousel-caption">
                </div>
              </div>
            </div>
         </div>
        </div>
        <div class="right col col-md-4" style="background-color: red;border-radius: 10px;">
          <form method="POST" action="index.php">
            <label for="subscribe">Subscribe to our news update below:</label>
            <input type="email" name="email" class="form-control" placeholder="yourname@gmail.com"><br>
            <input type="submit" name="subscribe" class="l btn btn-success" value="Subscribe">
            
          </form><br>

          <form action="index.php" method="POST">
            <div id="comment">
            <label for="username">Username :</label>
            <input type="text-primary" name="username" placeholder="username" class="form-control" value="comment">
            <label for="comment">Comment :</label>
            <textarea class="form-control" placeholder="Type your comment here" name="comment"></textarea><br>
            <input type="submit" name="comment" value="Comment" class="btn btn-primary">
           </div>
          </form>



          
        </div>



      <hr>
      <?php 
       if (isset($_GET['category'])) {
        $id = $_GET['category'];
         $sel_cat = $db->query("SELECT * FROM items WHERE category='$id' AND available = 0");
       }

       ?>
      <div class="row col-md-12">

        <div id="food_main" style="margin-top: 20px;">
          <div class="panel panel-body panel-success" style="  background-color: #DCDCDC;">
            
          <?php while($items = mysqli_fetch_assoc($sel_cat)) : ?>
          <div class="col-md-3">
             <div class="panel panel-body panel-success">
              <h3  ><?= $items['Title']; ?></h3><hr>

                <img  src="images/<?= $items['Image']; ?>" class="img-responsive img-thumbnail" al="Responsive image" style="height: 200px;width: 250px; margin-right: auto; margin-left: auto;">
                  <h5>ksh.<?= $items['Price']; ?></h5><hr>
                  
                  <a href="details.php?id=<?=$items['Id']; ?>" class="btn btn-md btn-success pull-right">View details</a>
                 
               </div>
             </div>



      
          <?php endwhile; ?>
        </div>
      </div>

     </div>
    </div>
    
  </div>


    </div> <!-- /container -->
    <?php include"includes/footer.php"; ?>


  </body>

</html>
