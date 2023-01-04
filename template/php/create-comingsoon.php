<?php
    require "../../config/pdoconfig.php";
$movie = $_POST['movie'];
$release = $_POST['release'];


$query = "select  COUNT(*) from comingsoon";
    $statement = $connection->prepare($query);
    $statement->execute();
    $row_count =$statement->fetchColumn();
if ($row_count > 6) {
  // actors already exits
  echo "exceed";
}
else{
    $query = "select  COUNT(*) from comingsoon WHERE movie_id = '$movie'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $row_count =$statement->fetchColumn();
if ($row_count > 0) {
  // actors already exits
  echo "exists";
}
else{
    $query = "insert into comingsoon
    ( movie_id,datetime)
     values
     ('$movie','$release')";
     $statement = $connection->prepare($query);
     $run = $statement->execute();
     if($run){
      echo "done";

     }
}
}
?>