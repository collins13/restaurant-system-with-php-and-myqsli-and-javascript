<?php 
include"includes/header.php";
include"connect.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>snacks</title>
 </head>
 <body style="background-image: url("3.jpg");">
 	      <?php 
       $query = $db->query("SELECT * FROM items WHERE category = 'snacks' AND available = 1");
       ?>
       <br><br>
       <marquee bgcolor="green"><h1 class="text-center text-primary">Welcome to snacks page!</h1></marquee>
      <div class="row">
        <div id="food_main">
          <?php while($items = mysqli_fetch_assoc($query)) : ?>
          <div class="col-md-3">
            <h3  style="text-align: center;"><?= $items['Title']; ?></h3>
            <img  src="images/<?= $items['Image']; ?>" class="img-responsive img-thumbnail" al="Responsive image" style="height: 200px;width: 200px;"> <h3><?= $items['Description']; ?></h3>
               <div class="row">
                <div class="col-md-6">
                  <h5>ksh.<?= $items['Price']; ?>/=</h5>
                  
                </div>
                <div class="col-md-6">
                  <a href="#" class="btn btn-md btn-success">Order</a>
                  
                </div>
                 
               </div>

            
          </div>



      
          <?php endwhile; ?>
        </div>
        
      </div>
 
 </body>
 </html>