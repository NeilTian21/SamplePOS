<?php
		if(isset($_POST['insert'])){
			$Istock_name = $_POST['stock_name'];
			$Istock_category = $_POST['stock_category'];
			$Istock_count = $_POST['stock_count'];
			$Istock_unit = $_POST['stock_unit'];

			$InsertAccount = "INSERT INTO  TBL_INVENTORY (stock_name, stock_category, stock_unit_count, stock_unit) 
			VALUES ('$Istock_name', '$Istock_category', '$Istock_count', '$Istock_unit')";

			$DuplicateCheck = sqlsrv_query($oConn,"SELECT * FROM TBL_INVENTORY WHERE stock_name LIKE '$Istock_name'");
			$rows = sqlsrv_fetch_array($DuplicateCheck);
			if ($rows > 0){
				echo "
					<script>
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'Stock arleady in database',
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