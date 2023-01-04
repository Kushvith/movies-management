<?php
include('../../config/pdoconfig.php');
$alert = "";

use \PHPMailer\PHPMailer\PHPMailer;
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
$mail = new PHPMailer(true);


$username = $_POST['username1'];
$email = $_POST['email1'];
$password = $_POST['password1'];
$query = "SELECT * FROM user_login WHERE email = '$email' and verified = 0";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
if($result){
    foreach($result as $row){
        $query = "DELETE FROM user_login where id = " . $row['id'] . "";
        $statement = $connection->prepare($query);
        $statement->execute();
    }
    
}
$query = "SELECT * FROM user_login WHERE email = '$email' and verified = 1";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->rowCount();
if ($result > 0) {
    echo "exists";
}
else{
    $otp = rand('111111', '999999');
    $query = "INSERT INTO `user_login` ( `name`, `email`, `password`, `otp`, `verified`) VALUES
     ( '$username', '$email', '$password', '$otp', '0')";
    $statement = $connection->prepare($query);
    $statement->execute();
    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kushvithchinna900@gmail.com'; // Gmail address which you want to use as SMTP server
        $mail->Password = 'fpieluceaabeqvwb'; // Gmail address Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';
    
        $mail->setFrom($email); // Gmail address which you used as SMTP server
        $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
    
        $mail->isHTML(true);
        $mail->Subject = 'Message From  Id show(New account request)';
        $mail->Body = "<h3>The is to verify you <b> $username of $email  <b> From Id show
            <br> Your  Otp<br>
             : $otp
             <br> if not your account just ignore it. or contact id show.</h3>";

             $mail->send();
             $alert =  "success";
           } catch (Exception $e){
             $alert = '<div class="alert alert-danger">
                         <span>'.$e->getMessage().'</span>
                       </div>';
                       
           }
}
echo $alert;
?>