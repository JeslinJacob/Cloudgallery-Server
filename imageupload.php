<?php
	require "init.php";
	if(isset($_POST['uid']))
		{
			$userid = $_POST['uid'];
			$URI = $_POST['imgURI'];
			$Stitle= $_POST['title'];
			if ($con) {
		
			$sql_u = "SELECT * FROM imagetable WHERE imgURI='$URI'";
			$checkEmailAlreadyExist = mysqli_query($con, $sql_u);
			if (mysqli_num_rows($checkEmailAlreadyExist) > 0) {
						echo json_encode(array('response' => "image already uploaded"));
  	  		}else{
  	  				$sql = "insert into imagetable(userid,imgURI,title) values('$userid','$URI','$Stitle');";
  	  				if (mysqli_query($con,$sql)) {
						
						echo json_encode(array('response' => "upload compleated"));
					}
					else{
						echo json_encode(array('response' => "Unknown error occured"));
					}
  	  	}
  	  }
  	}
  	mysqli_close($con);
?>