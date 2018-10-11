<?php
error_reporting(0);
include'connect.php';
include'admin.header.php';
 ?>

<body>
			<?php
           		 
           		           //edit items
		          if (isset($_GET['edit'])) {
		          $edit_id = $_GET['edit'];
		          $edit_id = sanitize($edit_id);
		          $edit_query = "SELECT * FROM items WHERE Id = '$edit_id'";
		          $edit_result = $db->query($edit_query);
		          $eItem = mysqli_fetch_assoc($edit_result);
		          $title = ((isset($_POST['title']) && empty($_POST['title']))?$_POST['title']: $eItem['title']);
		          $query = $db->query("SELECT * FROM categories");
		      }


            
            	?>
	<h1 class="text-center">Edit Item</h1>
		<form class="form"  action="edit.php" method="POST" enctype="multipart/form-data"
			<div class="form-group col-md-6">
			<label>Edit Title </label>
			<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title" class="form-control">
			</div>
			<div class="form-group col-md-6">
			<label>Edit Category: </label>
            <select name="categories" class="form-control col-md-6">
            	<option value="<?= (($categories == '')?' selected':'')?>"></option>
                <?php while($Cfood = mysqli_fetch_assoc($query)): ?>
            	<option value="<?=$Cfood['name']?>"<?=(($categories == $Cfood['name'])?' selected':'');?>> <?=$Cfood['name'];?></option>
            <?php endwhile; ?>
            </select>
            </div>
			<div class="form-group col-md-6">
			<label>Edit Image: </label>
			<input type="file" name="image" value="" placeholder="Image" class="form-control">
            </div>
            <div class="form-group col-md-6">
            <label>Edit Description: </label>
			<input type="textarea" name="description" value="<?php echo $description; ?>" placeholder="Description" class="form-control">
            </div>
            <div class="form-group col-md-6">
            <label>Edit Price: </label>
			<input type="text" name="price" value="<?php echo $price; ?>" placeholder="Price" class="form-control">
            </div>




			<button type="submit" class="btn btn-success pull-right col-md-3" style="margin-right: 10px; margin-left: 10px;">Update</button>
			<a href="items.php" class="btn btn-danger pull-right" style="margin-left : 20px;">Cancel</a>


		</form>


		</form>

</body>
</html>