<?php
error_reporting(0);
include'connect.php';
include'admin.header.php';
include'nav.php';
 ?>



 <h1 class="text-center text-primary">Manage Items</h1><hr>



	<?php 
  //validation
	$title = ((isset($_POST['title']))?$_POST['title']:'');
	$description = ((isset($_POST['description']))?$_POST['description']:'');
	$price = ((isset($_POST['price']))?$_POST['price']:'');
	$categories = ((isset($_POST['categories']))?$_POST['categories']:'');
	if ($_POST) {

     $error = array();
     
      if(isset($_FILES['image'])){
           $error= array();
           $file_name = $_FILES['image']['name'];
           $file_size =$_FILES['image']['size'];
           $file_tmp =$_FILES['image']['tmp_name'];
           $file_type=$_FILES['image']['type'];
           $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

           $expensions= array("jpeg","jpg","png");

           if(in_array($file_ext,$expensions)=== false){
              $errors[]="extension not allowed, please choose a JPEG or PNG file.";
           }

           if($file_size > 2097152){
              $errors[]='File size must be excately 2 MB';
           }
         }
          if (empty($title)) {
               $error[] = "Title cannot be empty!";
              }
                if (empty($categories)) {
                     $error[] = "categories cannot be empty!";
                   }
                if (empty($price)) {
                      $error[] = "price cannot be empty!";
                  }
                   if (empty($description)) {
                      $error[] = "description cannot be empty!";
                  }
          if(empty($error)){
           move_uploaded_file($file_tmp,"../images/".$file_name);
          $insertSql = $db->query("INSERT INTO items(Title, Image, Description, Price, category)
                              VALUES('$title', '$file_name', '$description', '$price', '$categories')");
          header("Location:items.php");
             
           }else{
                $error_message = '<span class ="error">';
               foreach ($error as $key => $value) {
               $error_message .="$value";
              }
             $error_message .='</span><br><br>';    
           }
	}





	 ?>
	<div class="data_post">
		
		<?php
            $query = $db->query("SELECT * FROM categories");
            if (isset($_GET['add'])) {
              
            
            	?>
            
		<form class="form"  action="items.php" method="POST" enctype="multipart/form-data">
			<?php echo @$error_message; ?>
			<div class="form-group col-md-6">
			<label><?php echo ((isset($_GET['edit']))?'Edit':''); ?>Title </label>
			<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title" class="form-control">
			</div>
			<div class="form-group col-md-6">
			<label>Category: </label>
            <select name="categories" class="form-control col-md-6">
            	<option value="<?= (($categories == '')?' selected':'')?>"></option>
                <?php while($Cfood = mysqli_fetch_assoc($query)): ?>
            	<option value="<?=$Cfood['name']?>"<?=(($categories == $Cfood['name'])?' selected':'');?>> <?=$Cfood['name'];?></option>
            <?php endwhile; ?>
            </select>
            </div>
			<div class="form-group col-md-6">
			<label>Image: </label>
			<input type="file" name="image" value="" placeholder="Image" class="form-control">
            </div>
            <div class="form-group col-md-6">
            <label>Price: </label>
			<input type="text" name="price" value="<?php echo $price; ?>" placeholder="Price" class="form-control">
            </div>
                  <div class="form-group col-md-6">
            <label for="description">Description: </label>
      <textarea name="description" class="form-control" cols="8" rows="6"><?=$description;?></textarea>
            </div>




			<button type="submit" class="btn btn-success pull-right col-md-3" style="margin-right: 10px; margin-left: 10px;">Submit</button>

			<a href="items.php" class="btn btn-danger pull-right" style="margin-left : 20px;">Cancel</a>


		</form>
    <?php }

    else{ ?>
      <a href="items.php?add=1" class="btn btn-success " style="float: right; margin-top: 10px; margin-bottom: 10px; margin-right: 20px; " >Add Items</a>
    <?php 
         $tableSql = $db->query("SELECT * FROM items");
         //delete items
         if (isset(($_GET['delete']))) {
          $id = $_GET['delete'];
          $delteQuery = $db->query("DELETE FROM items WHERE Id ='$id'");
          header("Location:items.php");

         if (isset($_GET['edit'])) {
         header('Location:edit.php');
         }
       }
         

         if (isset($_GET['available'])) {
          $id = $_GET['id'];
          $available = $_GET['available'];
          $availableQuery = $db->query("UPDATE items SET available ='$available' WHERE Id ='$id'");
          header("Location:items.php");
         }
         
     ?>
       <?php if ($insertSql) {
        $name = $Cfood['name'];
        echo $name.="Was inserted successifully";
      } ?>
    <table class="table table-striped table-bordered table-responsive table-condensed" style="">
             <tr>
              <th>delete or edit</th><th>Title</th><th>Price</th><th>Category</th><th>Availability</th>


             </tr>
             <?php while($items = mysqli_fetch_assoc($tableSql)): ?>
             <tr>
              <td>
                <a href="items.php?delete=<?=$items['Id'];?>"><span class="btn btn-sm btn-danger">Delete</span>  </a>
                <a href="edit.php?edit=<?=$items['Id'];?>"><span class="btn btn-sm btn-warning">Edit</span></a>
              </td>
              <td><?= $items['Title']; ?></td>
              <td><?= $items['Price']; ?></td>
              <td><?= $items['category']; ?></td>
              <td>
                <a href="items.php?available=<?=(($items['available'] == 0)?'1':'0'); ?>&id=<?=$items['Id']; ?>">
                  <span class=" btn btn-info btn btn-sm glyphicon glyphicon-<?=(($items['available'] == 0)?'minus':'plus'); ?>"></span></a>
                &nbsp<?=(($items['available'] == 1)?'unavailable items':'available item') ?>
              </td>
             </tr>
         <?php endwhile; ?>
        </table>
        <?php 

         ?>
         

<?php }?>
			</div>

</body>
</html>