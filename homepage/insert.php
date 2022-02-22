<?php
		if(isset($_POST['insert'])){
			$prodname = $_POST['prodname'];
			$category = $_POST['category'];

			$InsertAccount = "INSERT INTO  products(prodname, category) VALUES ('$prodname', '$category');";

			$command= sqlsrv_query($oConn, $InsertAccount);

			if($command){
                echo("<script></script>");
			}

		}
