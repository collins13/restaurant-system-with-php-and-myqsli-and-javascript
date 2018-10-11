<?php 
include'connect.php';
include'admin.header.php';
 ?>

  <body>

    <div class="container">
      <div class="row">
    	<div class="col-md-4 col-md-offset-4" style="border: solid; margin-top: 100px;padding: 40px; border-radius: 20px;background-color: pink;">
    		<?php 
    		if (isset($_POST['login'])) {
    		header('location: items.php');
    		}

    		 ?>
    	  <form class="form-login" role="form" method="POST">
	        <h2 class="form-signin-heading">Please sign in</h2><hr>
	        <label>Username:</label>
	        <input type="text" class="form-control" placeholder="Username" name="admin">
	        <label>Password:</label>
	        <input type="password" class="form-control" placeholder="Password" name="password" >
	        <div class="checkbox">
	        
	        <button class="btn btn-sm btn-primary " name="login" type="submit">Login</button>

          </form>
          <?php 
          if (isset($_POST['login'])) {
            $pwd = $POST['password'];
            $name = $POST['admin'];
            if ($pwd = "Boniface") {
              echo "you are logged in!";
              header('location: items.php');
            }
            else{
              echo "You entered the wrong password";
              header('admin.login.php');

            }
          }

           ?>
    		
    	</div>
     
      </div>
    		
    </div>

     

    </div> <!-- /container -->
</html>
