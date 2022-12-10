<?php
    require "../../config/pdoconfig.php";
    $id = $_POST['id'];

  $query2 = "UPDATE trailer SET main = 0 WHERE id = '$id'";   
  $statement2 = $connection->prepare($query2);
  $result2 = $statement2->execute();
  if($result2){
      echo "done";
  } 

?>