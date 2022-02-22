<?php	
	if(isset($_GET['Delete'])){

			$Delete_id = $_GET['Delete'];

			$Delete = "DELETE FROM user_login WHERE id='$Delete_id'";
			
			$ejecutar = sqlsrv_query($oConn, $Delete);

			if($ejecutar){
				echo "
				<script>
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: 'Data Deleted',
				  }).then(function (){window.location.href = 'index.php'})
				</script>";
			}	
		}
?>