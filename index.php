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
				<label>Username:</label>
				<input type="text" name="username" class="form-control" placeholder="Type Username" required><br />
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="text" name="password" class="form-control" placeholder="Type Password" required><br />
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="email" name="email" class="form-control" placeholder="Type Email" required><br />
			</div>
			<div class="form-group">				
				<input type="submit" name="insert" class="btn btn-warning" value="Insert Account" required><br />
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
			<td>User_ID</td>
			<td>Username</td>
			<td>Password</td>
			<td>Email</td>
			<td>Action</td>
			<td>Action</td>
		</tr>

		<?php
			$consulta = "SELECT * FROM user_login";

			$ejecutar = sqlsrv_query($oConn, $consulta);

			$i = 0;

			while($fila = sqlsrv_fetch_array($ejecutar)){
				$id = $fila['id'];
				$username = $fila['username'];
				$email = $fila['email'];
				$password = $fila['password'];
				$i++;
			
			
		?>

		<tr align="center">
			<td><?php echo $id; ?></td>
			<td><?php echo $username; ?></td>
			<td><?php echo $password; ?></td>
			<td><?php echo $email; ?></td>
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



