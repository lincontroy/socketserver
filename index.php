<?php

require __DIR__ . '/vendor/autoload.php';
$post = file_get_contents('php://input');

$app_id = '1536782';
$app_key = 'e0951f610f43e2b73e0f';
$app_secret = '9de54a5baece57419ec6';
$app_cluster = 'mt1';

$pusher = new Pusher\Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);

$payments=json_decode($post,true);

$amount=$payments['amount'];
$channel=$payments['phone'];
$event="balance";

//we need to set the mobile number as channel for relaying the information
echo $amount;


$pusher->trigger($channel, $event, $amount);

// print_r($pusher->getChannels());


?>