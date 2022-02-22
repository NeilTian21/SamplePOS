<!DOCTYPE html> 
<?php 
	include("dbconn.php");
?>
<meta charset="UTF-8">
<html> 	
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>CRUD PHP & SQL SERVER</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">   
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 		
	</head>
<body>
	<div class="col-md-8 col-md-offset-2">
		<h1>CRUD PHP & SQL SERVER</h1>

		<form method="POST" action="index.php">
			<div class="form-group">
				<label>Stock Name:</label>
				<input type="text" name="stock_name" class="form-control" placeholder="Type Stock Name" required><br />
			</div>
			<div class="form-group">
				<label>Stock Category:</label>
				<select class="form-control" name="stock_category">
					<option value="FLAVORED POWDER">FLAVORED POWDER</option>
					<option value="FLAVORED LIQUID">FLAVORED LIQUID</option>
					<option value="FLAVORED JAM">FLAVORED JAM</option>
					<option value="SINKERS / ADD-ONS">SINKERS / ADD-ONS</option>
					<option value="OTHERS">OTHERS</option>
					<option value="MATERIALS">MATERIALS</option>
					<option value="EGG DROP">EGG DROP</option>
				</select><br />
			</div>
			<div class="form-group">
				<label>Unit Count:</label>
				<input type="number" name="stock_count" class="form-control" placeholder="Stock Count" required><br />
			</div>
			<div class="form-group">
				<label>Unit:</label>
				<select class="form-control" name="stock_unit">
					<option value="kg">kg</option>
					<option value="g">g</option>
					<option value="pcs">pcs</option>
					<option value="loaf">loaf</option>
				</select><br />
			</div>
			<div class="form-group">				
				<input type="submit" name="insert" class="btn btn-warning" value="Insert Product" required><br />
			</div>
		</form>
	</div>
<br /><br /><br />

	<?php
		if(isset($_POST['insert'])){
			include("insert.php");
		}
		
	?>

	<div class="col-md-8 col-md-offset-2">
	<table class="table table-bordered table-responsive">
		<tr>
			<td>Stock ID</td>
			<td>Stock Name</td>
			<td>Category</td>
			<td>Unit Count</td>
			<td>Unit</td>
			<td>Action</td>
			<td>Action</td>
		</tr>

		<?php
			$consulta = "SELECT * FROM TBL_INVENTORY";

			$ejecutar = sqlsrv_query($oConn, $consulta);

			$i = 0;

			while($fila = sqlsrv_fetch_array($ejecutar)){
				$stock_id = $fila['stock_id'];
				$stock_name = $fila['stock_name'];
				$stock_category = $fila['stock_category'];
				$stock_unit_count = $fila['stock_unit_count'];
				$stock_unit = $fila['stock_unit'];
				$i++;
		?>

		<tr align="center">
			<td><?php echo $stock_id; ?></td>
			<td><?php echo $stock_name; ?></td>
			<td><?php echo $stock_category; ?></td>
			<td><?php echo $stock_unit_count; ?></td>
			<td><?php echo $stock_unit; ?></td>
			<td><a href="index.php?Edit=<?php echo $id; ?>">Edit</a></td>
			<td><a href="index.php?Delete=<?php echo $id; ?>">Delete</a></td>
		</tr>

		<?php } ?>

	</table>
	</div>

	<?php
		if(isset($_GET['Edit'])){
			include("Edit.php");
		}

	?>	
	<?php	
	if(isset($_GET['Delete'])){
		include("Delete.php");
	}
?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>



