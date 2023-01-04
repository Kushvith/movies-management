<?php
include('../../config/pdoconfig.php');
$email = $_POST['email'];
$otp = $_POST['otp'];
$query = "SELECT * FROM user_login WHERE email = '$email' and otp = '$otp'";
$statement = $connection->prepare($query);
$statement->execute();
$result12 = $statement->fetchAll();
if($result12){
    $query = "UPDATE user_login SET verified = 1 WHERE email = '$email'";
    $statement = $connection->prepare($query);
    $statement->execute();
    echo "done";
}
else{
    echo "wrong";
}
?>