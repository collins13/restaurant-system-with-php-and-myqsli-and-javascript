<?php 
include'nav.php';
include'admin.header.php';
include'connect.php';


 ?>

 <body>
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-md-4 col-md-offset-4">
 				 	<?php 
 	   	if (isset($_GET['edit'])) {
 	   		$edit_id = $_GET['edit'];
 	   		$editQuery = $db->query("SELECT * FROM categories WHERE Id = '$edit_id' ");
 	   		$result = mysqli_fetch_assoc($editQuery);

 	   		$tryQuery = $db->query("SELECT * FROM categories");
 	   	}
 	   	
 	   	if (isset($_POST['submit'])) {

 	   		$updateQuery = "UPDATE categories SET name ='$name' WHERE Id = '$edit_id' ";
 	   		$resultUpdate = $db->query($updateQuery);
 	   		header("Location:category.php");
 	   		var_dump($resultUpdate);
 	   	}

 	   	 ?>
 	   <form action="edit_category.php" method="POST">
       	  	<h2 class="form-signin-heading text-center text-info">Edit a category</h2><hr>
	        <label>Edit Category:</label>
	        <input type="text" name="name" value="<?=$result['name'];?>" class="form-control" placeholder="Category"><br>
	      <button class="form control btn btn-sm btn btn-primary" type="submit" name="submit">Update</button>
       </form>
 
 			</div>
 		</div>
 	</div>

 </body>
 </html>