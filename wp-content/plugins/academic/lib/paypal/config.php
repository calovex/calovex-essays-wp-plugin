<?php
require '../../../../../wp-load.php';

//start session in all pages
if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
//if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

$PayPalMode 			= 'sandbox'; // sandbox or live
$PayPalApiUsername 		= 'sb-qzn8t1249987_api1.business.example.com'; //PayPal API Username
$PayPalApiPassword 		= 'QFTK9PCA6JWE3CDF'; //Paypal API password
$PayPalApiSignature 	= 'AfA7wdqOZgQRz0JzdZCnSs8OycRjAc6uOt4GrYHb2mtJyy.oXrMaLE2f'; //Paypal API Signature
$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= plugin_dir_url(__FILE__).'/process.php'; //Point to process.php page
$PayPalCancelURL 		= 'cancelled.php'; //Cancel URL if user clicks cancel
$paymentType = 'Auth'; // Payment type


?>