<?php
session_start();
include('../../config/pdoconfig.php');
$old_pass = $_POST['old_pass'];
$new_pass = $_POST['new_pass'];
$query = "SELECT * FROM user_login WHERE id = ".$_SESSION['id']." and password= ".$old_pass."";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
if($result){
    $query = "UPDATE user_login SET password=".$new_pass." where id = ".$_SESSION['id']." ";
    $statement = $connection->prepare($query);
    $result = $statement->execute();
    if ($result) {
        echo "done";
    }
    
}
else{
    echo "wroning";
}
?>