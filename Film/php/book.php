<?php
include('../../config/pdoconfig.php');
$alert = "";

use \PHPMailer\PHPMailer\PHPMailer;
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
$mail = new PHPMailer(true);
$email = $_POST['email'];
$t_name = $_POST['t_name'];
$showdate = $_POST['showdate'];
$showtime = $_POST['showtime'];
$tickets = $_POST['tickets'];
$amt = $_POST['amt'];
$query = "select * from theatre where id = '$t_name'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
if ($result) {
    foreach ($result as $row) {
        $tname = $row['name'];
    }
    
}
$query = "select * from shows where id = '$showdate'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
if ($result) {
    foreach ($result as $row) {
        $show_date = $row['show_date'];
    }
    
}
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
    $mail->Subject = 'Message From  Id show(Ticket booked)';
    $mail->Body = "<h3> Ticket booked </h3>
    <br>
        <h4>theatre name: ".$tname."</h4> <br>
        <h4>show date: ".$show_date."</h4> <br>
        <h4>show time: ".$showtime."</h4> <br>
        <h4>tickets: ".$tickets."</h4> <br>
        <h4>amount: ".$amt."</h4> <br>

    ";

         $mail->send();
         $alert =  "success";
       } catch (Exception $e){
         $alert = '<div class="alert alert-danger">
                     <span>'.$e->getMessage().'</span>
                   </div>';
                   
       }

echo $alert;
?>