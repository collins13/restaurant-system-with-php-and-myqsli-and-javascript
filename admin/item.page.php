 <?php 
include"includes/header.php";
include"connect.php";

       if (isset($_GET['category'])) {
       	$id = $_GET['category'];
         $sel_cat = $db->query("SELECT * FROM categorie WHERE  Id='$id'");
         $result = mysqli_fetch_assoc($sel_cat);
       }

 ?>

         <marquee style="margin-top: 50px"; bgcolor="greem"><h1 class="text-center text-primary ">Welcome to Five Friends Hotel!</h1></marquee><br>

    <div class="container container-fluid theme-showcase" role="main">
      <div class="row col-md-8" ">
           <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
            <!-- Indicators -->

            <!-- Wrapper for slides -->
            <div class="carousel-inner ">
              <div class="item active">
                <img class="img-responsive img-thumbnail" src="images/download (6).jpg" alt="..." style="height: 180px;width: 200px;">

                <div class="carousel-caption">
                  ...
                </div>
              </div>

              <div class="item">
                <img class="img-responsive img-thumbnail" src="images/download (4).jpg" alt="..." style="height: 180px;width: 200px;">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img class="img-responsive img-thumbnail" src="images/fruits.jpg" alt="..." style="height: 180px;width: 200px;">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img class="img-responsive img-thumbnail" src="images/sa-foods.jpg" alt="..." style="height: 180px;width: 200px;">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img class="img-responsive img-thumbnail" src="images/thinkstock_rf_photo_of_bowl_of_blackberries.jpg" alt="..." style="height: 180px;width: 200px;">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                <img class="img-responsive img-thumbnail" src="images/download (6).jpg" alt="..." style="height: 180px;width: 200px;">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              ...
            </div>

            <div class="row">
              <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
         </div>
        </div>
        <div class="right col col-md-4">
                        <!-- Button trigger modal -->
         Right hand side bar
          
        </div>


      <hr>

      <div class="row col-md-12">
        <div id="food_main">
         
          <div class="col-md-3">
            <h3  style="text-align: center;"><?= $result['Title']; ?></h3>
            <img  src="images/<?= $result['Image']; ?>" class="img-responsive img-thumbnail" al="Responsive image" style="height: 200px;width: 200px;">
               <div class="row">
                <div class="col-md-6">
                  <h5>ksh.<?= $result['Price']; ?>/=</h5>
                  
                </div>
                <div class="col-md-6">
                  <a href="details.php?id=<?=$result['Id']; ?>" class="btn btn-md btn-success">Order</a>
                  
                </div>
                 
               </div>

            
          </div>



        </div>
        
      </div>

      
    </div>
    
  </div>


    </div> <!-- /container -->

  </body>
</html>
