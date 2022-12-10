<?php
    require "../../config/pdoconfig.php";
$name = $_POST['name'];
$url = $_POST['url'];


$query = "select  COUNT(*) from trailer WHERE url = '$url' ";
    $statement = $connection->prepare($query);
    $statement->execute();
    $row_count =$statement->fetchColumn();
if ($row_count > 0) {
  // actors already exits
  echo "exists";
}
else{
    $query = "insert into trailer
    ( name,url,main)
     values
     ('$name','$url','0')";
     $statement = $connection->prepare($query);
     $run = $statement->execute();
     if($run){
      echo "done";

     }
}
?>