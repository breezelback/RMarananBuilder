<?php
require_once "vendor/autoload.php";

use Omnipay\Omnipay;

define('CLIENT_ID', 'AY7NtHN02IHqv6ySpquTl-7HpKW6y6ya5Wt8sBai6YiM56OEe3-XUAtqTg3T3y9GeymQ989mD29uCM6_');

define('PAYPAL_RETURN_URL', 'http://localhost/R%20Maranan%20Builders/paypal/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/R%20Maranan%20Builders/paypal/cancel.php');
define('PAYPAL_CURRENCY', 'PHP'); // set your currency here

// Connect with the database
$db = new mysqli('localhost', 'root', '', 'db_maranan'); 

if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}

$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId('AY7NtHN02IHqv6ySpquTl-7HpKW6y6ya5Wt8sBai6YiM56OEe3-XUAtqTg3T3y9GeymQ989mD29uCM6_');
$gateway->setSecret('EDi8dRC6tLo0M8vjEQzBe7TiOR7sLkrSvbtDMpDFuDL9s5WMqIeEHZyHmXyFMNZU3zrHvhpUmJh-aXUo');
$gateway->setTestMode(true); //set it to 'false' when go live