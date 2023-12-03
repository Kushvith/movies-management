<style>

@import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body,
html {
	height: 100vh;
	display: grid;
	font-family: "Staatliches", cursive;
	background: #d83565;
	color: black;
	font-size: 14px;
	letter-spacing: 0.1em;
}

.ticket {
	margin: auto;
	display: flex;
	background: white;
	box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}

.left {
	display: flex;
}

.image {
	height: 250px;
	width: 250px;
	background-image: url("https://media.pitchfork.com/photos/60db53e71dfc7ddc9f5086f9/1:1/w_1656,h_1656,c_limit/Olivia-Rodrigo-Sour-Prom.jpg");
	background-size: contain;
	opacity: 0.85;
}

.admit-one {
	position: absolute;
	color: darkgray;
	height: 250px;
	padding: 0 10px;
	letter-spacing: 0.15em;
	display: flex;
	text-align: center;
	justify-content: space-around;
	writing-mode: vertical-rl;
	transform: rotate(-180deg);
}

.admit-one span:nth-child(2) {
	color: white;
	font-weight: 700;
}

.left .ticket-number {
	height: 250px;
	width: 250px;
	display: flex;
	justify-content: flex-end;
	align-items: flex-end;
	padding: 5px;
}

.ticket-info {
	padding: 10px 30px;
	display: flex;
	flex-direction: column;
	text-align: center;
	justify-content: space-between;
	align-items: center;
}

.date {
	border-top: 1px solid gray;
	border-bottom: 1px solid gray;
	padding: 5px 0;
	font-weight: 700;
	display: flex;
	align-items: center;
	justify-content: space-around;
}

.date span {
	width: 100px;
}

.date span:first-child {
	text-align: left;
}

.date span:last-child {
	text-align: right;
}

.date .june-29 {
	color: #d83565;
	font-size: 20px;
}

.show-name {
	font-size: 32px;
	font-family: "Nanum Pen Script", cursive;
	color: #d83565;
}

.show-name h1 {
	font-size: 48px;
	font-weight: 700;
	letter-spacing: 0.1em;
	color: #4a437e;
}

.time {
	padding: 10px 0;
	color: #4a437e;
	text-align: center;
	display: flex;
	flex-direction: column;
	gap: 10px;
	font-weight: 700;
}

.time span {
	font-weight: 400;
	color: gray;
}

.left .time {
	font-size: 16px;
}


.location {
	display: flex;
	justify-content: space-around;
	align-items: center;
	width: 100%;
	padding-top: 8px;
	border-top: 1px solid gray;
}

.location .separator {
	font-size: 20px;
}

.right {
	width: 180px;
	border-left: 1px dashed #404040;
}

.right .admit-one {
	color: darkgray;
}

.right .admit-one span:nth-child(2) {
	color: gray;
}

.right .right-info-container {
	height: 250px;
	padding: 10px 10px 10px 35px;
	display: flex;
	flex-direction: column;
	justify-content: space-around;
	align-items: center;
}

.right .show-name h1 {
	font-size: 18px;
}

.barcode {
	height: 100px;
}

.barcode img {
	height: 100%;
}

.right .ticket-number {
	color: gray;
}

</style>
<?php
  include('../../../config/pdoconfig.php');
  $alert = "";
  
  use \PHPMailer\PHPMailer\PHPMailer;
  require_once '../phpmailer/Exception.php';
  require_once '../phpmailer/PHPMailer.php';
  require_once '../phpmailer/SMTP.php';
require('config.php');
$mail = new PHPMailer(true);
session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_merchant_order_id' => $_SESSION['razorpay_merchant_order_id'],
            'razorpay_seat_textarea' => $_SESSION['seat_textarea'],
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $order_id = $_SESSION['razorpay_order_id'];
    $payment_id =  $_SESSION['razorpay_merchant_order_id'];
    $seats =  $_SESSION['seat_textarea'];
    $s_id = $_SESSION['show_date'];
    $time = $_SESSION['show_time'];
    $email = $_SESSION['email'];
    $m_id = $_SESSION['m_id'];
    $t_id = $_SESSION['t_name'];
    $no_seats = $_SESSION['tickets'];
    $tickets = $_SESSION['tickets'];
    $amt = $_SESSION['amt'];
    $query = "select * from shows where movie_id = '$m_id' and theatre_id = '$t_id' and id = '$s_id'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    if ($result) {
        foreach ($result as $row) {
            $date = $row['show_date'];
        }
    }
    $query = "select * from movie where id='$m_id'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    if ($result) {
        foreach ($result as $row) {
            $movie_name = $row['name'];
        }
    }
    $query = "select * from theatre where id='$t_id'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    if ($result) {
        foreach ($result as $row) {
            $theatre_name = $row['name'];
        }
    }
    $query = "INSERT INTO `tickets` ( `email`, `seats`, `date`, `shows`, `tickets`, `orderid`, `paymentid`, `no_seat`, `m_id`, `t_id`, `s_id`, `amt`)
     VALUES ( '$email', '$seats', '$date', '$time', '$tickets', '$order_id', '$payment_id', '$no_seats', '$m_id', '$t_id', '$s_id', '$amt');
    ";
    $statement = $connection->prepare($query);
   $run =  $statement->execute();
   if($run){
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
        $mail->Subject = 'Message From  Id show(Ticket Booked)';
        $mail->Body = "<h3> Ticket Details </h3>
        <br>
            <h4>movie_name: ".$movie_name."</h4> <br>
            <h4>teatre_name: ".$theatre_name."</h4> <br>
            <h4>order id: ".$_SESSION['razorpay_order_id']."</h4> <br>
            <h4>payment id: ".$_POST['razorpay_payment_id']."</h4> <br>
            <p>show_date and time:".$date." and ".$time."</p> <br>
            <p>seats:".$seats."</p>
    
        ";
    
             $mail->send();
             $alert =  "success";
            
           } catch (Exception $e){
             $alert = '<div class="alert alert-danger">
                         <span>'.$e->getMessage().'</span>
                         <span> contact admin</span>
                       </div>';
                       
           }
    
    echo $alert;
    $html = '
    
    <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<div class="ticket">
	<div class="left">
		<div class="image">
			<p class="admit-one">
				<span>ID Show</span>
				<span>ID Show</span>
				<span>ID Show</span>
			</p>
			<div class="ticket-number">
				<p>
					'.$_SESSION['razorpay_order_id'].'
				</p>
			</div>
		</div>
		<div class="ticket-info">
			<p class="date">
				<span>Date</span>
				<span class="june-29">
                   
                '.$date.'
                      
                </span>
				<span></span>
			</p>
			<div class="show-name">
				<h1>'.$theatre_name.'</h1>
				<h2>'.$movie_name.'</h2>
			</div>
			<div class="time">
			<p>'.$seats.'</p>
				<p>DOORS <span>@</span> '.$time.'</p>
			</div>
			<p class="location"><span>ID Show</span>
				<span class="separator"><i class="far fa-smile"></i></span><span>Banglore</span>
			</p>
		</div>
	</div>
	<div class="right">
		<p class="admit-one">
			<span>ID Show</span>
			<span>ID Show</span>
			<span>ID Show</span>
		</p>
		<div class="right-info-container">
			<div class="show-name">
				<h1>'.$theatre_name.'</h1>
			</div>
			<div class="time">
				
				<p>DOORS <span>@</span> '.$time.'</p>
			</div>
			
			<p class="ticket-number">
				'.$_SESSION['razorpay_order_id'].'
			</p>
		</div>
	</div>
</div>
        <div style="display:flex;justify-content:center;align-items:center;">
    <button style="background:green;padding:10px;border-radius:20px;width:150px;height:50px;"><a href="../../" style="text-decoration:none;color:white;">Back to dashboard</a></button>
    </div>';
    
   }
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}
echo $html;

