<?php
session_start();
// use Stripe\Terminal\Location;
require __DIR__ . "/vendor/autoload.php";
require "./database/connect.php"; 
$total = $_POST["total"];
var_dump($total);
$stripe_key = "sk_test_51Q0gGnP4g9Gu8FG19x6WrDbFwiNNHxcakNI5W72mpAY0zkBCZW5Xck9m55UL18Q9L7N3U4q9CtZgY6YXHgdpx32500hZsVN1dl";
\Stripe\Stripe::setApiKey($stripe_key);
$payment_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/shop/deleteBasket.php",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => bcmul($total, '100'),
                "product_data" => [
                    "name" => "Books"
                ]
            ]       
        ]
    ]
]);

$_SESSION['payment_success'] = true;
http_response_code(303);
header("Location: " . $payment_session -> url);
?>