<?php 
include'nav.php';
include'admin.header.php';
include'connect.php';

?> 
 
 
      <h1 class="text-center text-primary" style="margin-top: 20px;">Manage Categories</h1><hr>

    <div class="container">
      <div class="row">
    	<div class="col-md-4" style="border: 10px;">


          	<?php 
          	
          
          

			 	//insert category
			 	if (isset($_POST['add'])) {
			 			$errors = array();
			 		$name =$_POST['category'];
			 		//if category is blank
			 		if ($name == '') {
			 			$errors[] ='The category cannot be empty!';
			 		}
			 		//if category exists in database
			 		$sel_query = $db->query("SELECT * FROM categories WHERE name = '$name'");
			 		$check = mysqli_num_rows($sel_query);
			 		if ($check > 0 ) {
			 			$errors[] .='The Category you entered already exists!';

			 		}


			 		
			 		//display errors
			 		if (empty($errors)) {
			 			$sql = $db->query("INSERT INTO categories (name) VALUES ('$name')");
			 			if ($sql) {
			 				echo "You successifully entered a new category";
			 			}

			 		}
          
			 		else{
			 			$error_message ='<span class="error">';
			 			foreach ($errors as $key => $value) {
			 				$error_message .="$value";
			 			}
			 			$error_message .= "<span>";
			 		}
			 		
			
			
		             
 	            }
 	
					 	$sel_sql = "SELECT * FROM categories";
					 	$cresults = $db->query($sel_sql);
					 	
					//Delete category
					if (isset($_GET['delete'])) {
						$id = $_GET['delete'];
						$delsql = "DELETE FROM categories WHERE Id = $id";
					 	$delresults = $db->query($delsql);
					 	header('Location:category.php');


					 	} 

					 ?>
				 <form class="add_category " action="category.php" role="form" method="POST">
		    	  	
			        <h2 class="form-signin-heading text-center text-info">Add a category</h2><hr>
			        <?=@$error_message; ?>
			        
			        <input type="text" name="category" value="" class="form-control" placeholder="Category"><br>
			       <input type="submit" name="add" class="btn btn-sm btn-primary" value="Add">

		          </form>
							    

    		
    	</div>
    	<div class="col-md-8">
    		<h2 class="text-center text-primary">Categories Table</h2><hr>
    		<table class="table table-striped table-bordered tabl-condensed">			
    			<thead>
    				<th class="">Category</th><th>Edit|Delete</th>
    			</thead>
    			<?php while ($categories = mysqli_fetch_assoc($cresults)) : ?>
    			<tr>
    				<td><?=$categories['name'];?></td>
    				<td>
    					<a href="edit_category.php?edit=<?=$categories['Id'];?>" class="btn btn-sm btn-warning" >Edit</a>
    					<a href="category.php?delete=<?=$categories['Id'];?>" class="btn btn-sm btn-danger">Delete</a>
    				</td>
    			</tr>
    		<?php endwhile ?>
    		</table>
    		
    	</div>
     
      </div>
    		
    </div>
 
 </body>
 </html>