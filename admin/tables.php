<?php 	
include'connect.php';
include'admin.header.php';
include'nav.php';

 ?>
</head>
<body style="background-image: ">
	<div class="container container-fluid">
		<div class="row">
			<div class="col-md-4">
                 <form class="add_category " action="tables.php" role="form" method="POST">
		    	  	
			        <h2 class="form-signin-heading text-center text-info">Add a Table</h2><hr>
			        
			        <input type="text" name="table" value="" class="form-control" placeholder="table"><br>
			       <input type="submit" name="add_table" class="btn btn-sm btn-primary" value="Add Table">
			       <?=@$error_message; ?>
			       <?php 
			       if (isset($_POST['add_table'])) {
			       	$errors = array();
			       	$table_name = $_POST['table'];
			       	//if it is empty!
			       	//if ($table_name == '') {
			       	//	$errors[] .="Table name cannot be empty!";	
			       	//}
			       	//check if it exists
			        /*$check_sql = $db->query("SELECT FROM tabs WHERE tab_name = '$table_name'");
			       	$check_results = mysqli_num_rows($check_sql);
			       	if ($check_results > 0) {
			       		$errors[] .=" the table already exists!";
			       	}
			       	if (empty($errors)) {*/
			       		$insertsql = $db->query("INSERT INTO tabs(tab_name) VALUES ('$table_name')");
			       	}
			       /*	else{
			       		$error_message = '<span class="error">';
			       		foreach ($errors as $key => $value) {
			       			$error_message .= '$value';
			       		}
			       		$error_message .="<span>";
			       	}

			       		
			       	}*/


			        ?>

		         </form>
			</div><!--add table form-->
				<div class="col-md-8">
				  <h2 class="text-center text-primary">Tables' details Table</h2><hr>
		    		<table class="table table-striped table-bordered tabl-condensed">
		    		<?php
		    			$sql = $db->query("SELECT * FROM tabs");
		    			//delete table
		    			if (isset($_GET['delete'])) {
		    				$del_id = $_GET['delete'];
		    				$del_sql = $db->query("DELETE FROM tabs WHERE id ='$del_id' ");
		    				header('location: tables.php');
		    			}
		    			
		    		 ?>	
		    		 	
		    			<thead>
		    				<th class="">Table name</th><th>Edit|Delete</th>
		    			</thead>
		    			<?php 	while ($sql_results = mysqli_fetch_assoc($sql)):  ?>	
		    			
		    			<tr>
		    				<td>
		    					<?=$sql_results['tab_name']; ?>
		    				</td>
		    				<td>
		    					<a href="edit_category.php?edit=<?=$sql_results['id'];?>" class="btn btn-sm btn-warning" >Edit</a>
		    					<a href="tables.php?delete=<?=$sql_results['id'];?>" class="btn btn-sm btn-danger">Delete</a>
		    				</td>
		    			</tr>
		    		<?php 	endwhile; ?>
		    	
	    		    </table>
				
			</div><!--add table data-->
		</div>
	</div>

</body>
</html>