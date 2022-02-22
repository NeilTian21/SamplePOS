<?php
		if(isset($_POST['insert'])){
			$Tusername = $_POST['username'];
			$Tpassword = $_POST['password'];
			$Temail = $_POST['email'];

			$InsertAccount = "INSERT INTO  user_login (username, password, email) 
			VALUES ('$Tusername', '$Tpassword', '$Temail')";

			$DuplicateCheck = sqlsrv_query($oConn,"SELECT * FROM user_login WHERE username LIKE '$Tusername' or email LIKE '$Temail'");
			$rows = sqlsrv_fetch_array($DuplicateCheck);
			if ($rows > 0){
				echo "
					<script>
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'Username or Email has already existing',
					})
					</script>";
			}else{

				$command= sqlsrv_query($oConn, $InsertAccount);
				
				if($command){
					echo "
					<script>
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: 'Insert Success',
						timer: 1500
					})
					</script>";
				} else {
					echo "
					<script>
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'Insert failed',
						showConfirmButton: false,
						timer: 1500
					})
					</script>";
				}
			}
		}

	?>