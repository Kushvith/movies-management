<?php
session_start();
include('../../config/pdoconfig.php');
$old_pass = $_POST['address'];
$new_pass = $_POST['zip'];

    $query = "UPDATE user_login SET address= '$old_pass',zip ='$new_pass' where id = ".$_SESSION['id']." ";
    $statement = $connection->prepare($query);
    $result = $statement->execute();
    if ($result) {
        echo "done";
    header("Location:../userprofile.php");
    }
    


?>