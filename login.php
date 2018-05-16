<?php

		require "init.php";
		if(isset($_POST['Pemail']))
		{
			$semail = $_POST['Pemail'];
			$pass = $_POST['PPass'];
			
		if ($con) {
		
			$sql_u = "SELECT id FROM person WHERE email='$semail' AND password='$pass'";
			
			$checkEmailAlreadyExist = mysqli_query($con, $sql_u);
			if (mysqli_num_rows($checkEmailAlreadyExist) > 0) {

				while($row = mysqli_fetch_assoc($checkEmailAlreadyExist)) {
					
        			echo json_encode(array('response' => "success",'userid'=>"".$row["id"]));
    			}
  	  		
				
  	  	}else{
  	  		echo json_encode(array('response' => "fail"));
  	  	}
		}
		}
		else{
			echo "not posted";
		}

		mysqli_close($con);
?>