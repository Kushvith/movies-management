<?php
    require "../../config/pdoconfig.php";
$name = $_POST['name'];
$place = $_POST['place'];
$capacity = $_POST['capacity'];


$query = "select  COUNT(*) from theatre WHERE name = '$name' ";
    $statement = $connection->prepare($query);
    $statement->execute();
    $row_count =$statement->fetchColumn();
if ($row_count > 0) {
  echo "exists";
}
else{
    $query = "insert into theatre
    ( name,place,totalcapacity)
     values
     ('$name','$place','$capacity')";
     $statement = $connection->prepare($query);
     $run = $statement->execute();
     if($run){
      echo "done";

     }
}
?>