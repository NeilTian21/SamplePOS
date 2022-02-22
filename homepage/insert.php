<?php
		if(isset($_POST['insert'])){
			$prodname = $_POST['prodname'];
			$category = $_POST['category'];

			$InsertAccount = "INSERT INTO  products(prodname, category) VALUES ('$prodname', '$category');";

			$command= sqlsrv_query($oConn, $InsertAccount);
			if ($rows > 0){
				echo "
					<script>
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'Username has already existing',
					})
					</script>";
			}
			else {
			$command = sqlsrv_query($oConn, $InsertAccount);
			echo "
			<script>
			Swal.fire({
				position: 'center',
				icon: 'success',
				title: 'Input Success!',
			})
			</script>";}
			

		}
