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
            'razorpay_product_id' => $_SESSION['razorpay_product_id'],
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
  
    $html = "<p>Your payment was successful</p>
             <p>Order ID:{$_SESSION['razorpay_order_id']}</p>
             <p>Merchant ID:{$_SESSION['razorpay_merchant_order_id']}</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
             <p>Product_id {$_SESSION['razorpay_product_id']}</p>";
             try{
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'kushvithchinna900@gmail.com'; // Gmail address which you want to use as SMTP server
                $mail->Password = 'fpieluceaabeqvwb'; // Gmail address Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = '587';
            
                $mail->setFrom('kushvithchinna900@gmail.com'); // Gmail address which you used as SMTP server
                $mail->addAddress('kushvithchinna900@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
            
                $mail->isHTML(true);
                $mail->Subject = 'Message From  Id show(new order placed)';
                $mail->Body = "<h3> New order </h3>
                <br>
                    <h4>Product id: ".$_SESSION['razorpay_product_id']."</h4> <br>
                    <h4>merchant id: ".$_SESSION['razorpay_merchant_order_id']."</h4> <br>
                    <h4>order id: ".$_SESSION['razorpay_order_id']."</h4> <br>
                    <h4>payment id: ".$_POST['razorpay_payment_id']."</h4> <br> 
            
                ";
            
                     $mail->send();
                     $alert =  "success";
                     header('Location:../../');
                   } catch (Exception $e){
                     $alert = '<div class="alert alert-danger">
                                 <span>'.$e->getMessage().'</span>
                                 <span> contact admin</span>
                               </div>';
                               
                   }
            
            echo $alert;
           
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
