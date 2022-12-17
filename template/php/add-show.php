<?php
    require "../../config/pdoconfig.php";
$movie = $_POST['movie'];
$theatre = $_POST['theatre'];
$date = $_POST['date'];
$morn = $_POST['morn'];
$aft = $_POST['aft'];
$nig = $_POST['nig'];

$valid = 1;
if($morn == 1){
    $query = "select  COUNT(*) from shows WHERE movie_id = '$movie' and theatre_id = '$theatre' and show_date = '$date'
            and morning = '$morn'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $row_count =$statement->fetchColumn();
if ($row_count > 0) {
    $valid = 0;
  echo "exists";
  
}
}
if($aft == 1){
    $query = "select  COUNT(*) from shows WHERE movie_id = '$movie' and theatre_id = '$theatre' and show_date = '$date'
            and afternoon = '$aft'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $row_count =$statement->fetchColumn();
if ($row_count > 0) {
    $valid = 0;
  echo "exists";
  
}
}
if($nig == 1){
    $query = "select  COUNT(*) from shows WHERE movie_id = '$movie' and theatre_id = '$theatre' and show_date = '$date'
    and evening = '$nig'";
$statement = $connection->prepare($query);
$statement->execute();
$row_count =$statement->fetchColumn();
    if ($row_count > 0) {
        $valid = 0;
    echo "exists";
   
        }
}

if($valid == 1){
    $query = "insert into shows
    (movie_id, theatre_id, show_date,morning, afternoon,evening)
     values
     ('$movie','$theatre','$date','$morn','$aft','$nig')";
     $statement = $connection->prepare($query);
     $run = $statement->execute();
     if($run){
      echo "done";

     }
    }
?>