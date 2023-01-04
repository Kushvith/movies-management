<?php
session_start();
    include('../../config/pdoconfig.php');
    $id = $_POST['id'];
$title = $_POST['title'];
$details = $_POST['details'];
$user_id = $_SESSION['id'];
$query = "select  COUNT(*) from reviews WHERE user_id = '$user_id' and movie_id = '$id'";
$statement = $connection->prepare($query);
$statement->execute();
$row_count =$statement->fetchColumn();
if ($row_count > 0) {
// actors already exits
echo "wrong";
}
else{
    $name = $_SESSION['name'];
    $date = date("Y-m-d");
    $query = "INSERT INTO `reviews` (`name`, `title`, `description`, `movie_id`, `date`, `user_id`) VALUES
     ( '$name', '$title', '$details', '$id', '$date', '$user_id')";
$statement = $connection->prepare($query);
$statement->execute();
    echo "done";
}

?>