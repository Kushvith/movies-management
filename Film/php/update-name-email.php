<?php
session_start();
include('../../config/pdoconfig.php');
$email = $_POST['email'];
$name = $_POST['name'];

    $query = "UPDATE user_login SET name = '$name' where id = ".$_SESSION['id']." ";
    $statement = $connection->prepare($query);
    $result = $statement->execute();
    if($result)
    {
    echo 1;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
    }

?>