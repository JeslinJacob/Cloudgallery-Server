<?php

  require "init.php";
$userid = $_POST['uid'];
  $query = "select * from imagetable ;";
  $result = mysqli_query($con,$query);

  $arr=array();
    $inc = 0;
  while($r = mysqli_fetch_array($result)) {

     $jsonArrayObject  = (array('imgid' => $r["imgid"], 'userid' => $r["userid"], ' imgURI' => $r["imgURI"],'title' => $r["title"]));
      $arr[$inc] = $jsonArrayObject;
      $inc++; 
   
  }
  echo json_encode($arr);

    mysqli_close($con);
?>
