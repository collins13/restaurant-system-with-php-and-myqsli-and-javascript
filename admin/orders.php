<?php 
include'nav.php';
include'admin.header.php';
include'connect.php';
 ?>
 <?php 
 $sqlquery = $db->query("SELECT * FROM orders");
 if (isset($_GET['archive'])) {
 	$Id = $_GET['archive'];
 	$sqldel = $db->query("DELETE FROM orders WHERE id =  '$Id'");
 	header('location: orders.php');
 }
  ?>

 <head>
 	<title>orders</title>
 </head>
 <body>
 	<div class="container-fluid">
 		<h1 class="text-center">Manage Orders</h1>
 
 			
 				<table class="table table-striped table-bordered ">
 					<tr>
 						<th>Order Id</th><th>Customer Name</th><th>Table</th> <th>Item Ordered</th><th>Price</th><th>Archive</th>
 					</tr>
 					<?php while ($orders = mysqli_fetch_assoc($sqlquery)): ?>
 					<tr>
 						<td>
 							<?=$orders['id'] ;?>
 						</td>
 						<td>
 							<?=$orders['name']; ?>
 						</td>
 						<td>
 							<?=$orders['table1']; ?>
 						</td>
 						<td>
 							<?=$orders['title']; ?>
 						</td>
 						<td>
 							<?= 'ksh '.$orders['price']; ?>
 						</td>
 						<td>
 							<a href="orders.php?delete=<?=$orders['id'];?>" class="btn btn-sm btn-danger">Archive</a>
 							<a href="orders.php?archive=<?=$orders['id'];?>" class="btn btn-sm btn-warning">delete</a>
 						</td>
 					</tr>
 				<?php endwhile; ?>
 					
 				</table>

 			

 	</div>
 
 </body>
 </html>



 
