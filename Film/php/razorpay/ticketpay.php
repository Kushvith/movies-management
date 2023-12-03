<?php ?>
<title>Id Show</title>
<div class="container">
	<div class="row">
	<h2>Pay  Amount for Your Securely with Razorpay From Id Show</h2>
	<br><br><br>
<?php
require('config.php');
require('razorpay-php/Razorpay.php');
session_start();
use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);
$orderData = [
    'receipt'         => 3456,
    'amount'          => $_POST['amount'] * 100,
    'currency'        => $_POST['currency'],
    'payment_capture' => 1
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$_SESSION['razorpay_merchant_order_id']= $_POST['merchant_id'];
$_SESSION['seat_textarea']= $_POST['seat_textarea'];
$_SESSION['show_date']= $_POST['show_date'];
$_SESSION['show_time']= $_POST['show_time'];
$_SESSION['tickets']= $_POST['tickets'];
$_SESSION['t_name']= $_POST['t_name'];
$_SESSION['m_id']= $_POST['m_id'];
$_SESSION['amt'] = $_POST['amount'];
$displayAmount = $amount = $orderData['amount'];
if ($displayCurrency !== 'INR') {
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}
$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $_POST['item_name'],
    "description"       => $_POST['item_description'],
    "image"             => "",
    "prefill"           => [
    "name"              => $_SESSION['name'],
    "email"             => $_SESSION['email'],
    "contact"           => "12345",
    ],
    "notes"             => [
   
    "merchant_order_id" => $_SESSION['id'],
    "seat_textarea"        =>  $_POST['seat_textarea'],
    "show_date"        =>  $_POST['show_date'],
    "show_time"        =>  $_POST['show_time'],
    "tickets"        =>  $_POST['tickets'],
    "t_name"        =>  $_POST['t_name'],
    "m_id"        =>  $_POST['m_id'],
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);


require("checkout/manual1.php");
?>
</div>
