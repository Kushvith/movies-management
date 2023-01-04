<?php
    require "../../config/pdoconfig.php";
    $id = $_POST['id'];
    $query = "select  COUNT(*) from trailer WHERE main = 1";
    $statement = $connection->prepare($query);
    $statement->execute();
    $row_count =$statement->rowCount();
if ($row_count > 10) {
  // actors already exits
  echo "exists";
}
else{
  $query2 = "UPDATE trailer SET main = 1 WHERE id = '$id'";   
  $statement2 = $connection->prepare($query2);
  $result2 = $statement2->execute();
  if($result2){
      echo "done";
  } 
}
?>