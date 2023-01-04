<?php  
session_start();
include('../../config/pdoconfig.php');
$email = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM user_login where email = '$email' and password = '$password' and verified = 1";
$statement = $connection->prepare($query);
$statement->execute();
$user = $statement->fetchAll();
if ($user) {
    foreach($user as $row){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION["email"] = $email;
    }
    
    echo 'done';
}
else{
    echo 'exists';
}
?>