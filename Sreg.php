<?php

require "init.php";
	if ($con) {

			$name = $_POST['name'];
			$semail = $_POST['semail'];
			$pass = $_POST['pass'];

			$sql_u = "SELECT * FROM person WHERE email='$semail'";
			$checkEmailAlreadyExist = mysqli_query($con, $sql_u);
			if (mysqli_num_rows($checkEmailAlreadyExist) > 0) {
  	  		
				echo json_encode(array('response' => "user already exist"));
  	  	}else{
  	  		$sql = "insert into person(name,email,password) values('$name','$semail','$pass');";

  	  		if (mysqli_query($con,$sql)) {
						
						echo json_encode(array('response' => "Registration compleated"));
					}
					else{
						echo json_encode(array('response' => "Unknown error occured"));
					}
  	  	}
			//echo json_encode(array('response' => "Registration compleated"));

	}

	mysqli_close($con);
?>