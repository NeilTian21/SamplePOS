<?php	
	if(isset($_GET['Edit'])){
			$Edit_id = $_GET['Edit'];

			$consulta = "SELECT * FROM user_login WHERE id ='$Edit_id'";
			$ejecutar = sqlsrv_query($oConn, $consulta);

			$fila = sqlsrv_fetch_array($ejecutar);

			$username = $fila['username'];
			$password = $fila['password'];
			$email = $fila['email'];
		}

?>

<br />

<div class="col-md-8 col-md-offset-2">
		<form method="POST" action="">
			<div class="form-group">
				<label>Username:</label>
				<input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required><br />
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control" value="<?php echo $password; ?>" required><br />
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required><br />
			</div>
			<div class="form-group">				
				<input type="submit" name="Update" class="btn btn-warning" value="Update"><br />
			</div>
		</form>
</div>

<?php

	if(isset($_POST['Update'])){	
			$UUsername = $_POST['username'];
			$UPassword = $_POST['password'];
			$UEmail = $_POST['email'];

			$DU_UE = sqlsrv_query($oConn,"SELECT * FROM user_login WHERE username = '$UUsername' and email = '$UEmail'");
			$RU_UE = sqlsrv_fetch_array($DU_UE);

			$DU_Username = sqlsrv_query($oConn,"SELECT * FROM user_login WHERE username = '$UUsername'");
			$RU_Username = sqlsrv_fetch_array($DU_Username);

			$DU_Email = sqlsrv_query($oConn,"SELECT * FROM user_login WHERE email = '$UEmail'");
			$RU_Email = sqlsrv_fetch_array($DU_Email);
			
			if($UUsername!=$username && $UEmail!=$email && $RU_UE>0){
				echo "
					<script>
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'Username and email are existing',
						timer: 1500
					})
					</script>";
			}else if ($UUsername!=$username && $RU_Username > 0){
				echo "
					<script>
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'Username existing',
						timer: 1500
					})
					</script>";
			}else if($UEmail!=$email && $RU_Email > 0){
				echo "
					<script>
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'Email existing',
						timer: 1500
					})
					</script>";
			}else{
				$consulta = "UPDATE user_login SET username='$UUsername', password='$UPassword', email='$UEmail' WHERE id='$Edit_id'";
				$ejecutar = sqlsrv_query($oConn, $consulta);
				
				if($ejecutar){
					echo "
					<script>
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: 'Saved',
					}).then(function (){window.location.href = 'index.php'})
					</script>";
				}	
			}
					
		}
?>