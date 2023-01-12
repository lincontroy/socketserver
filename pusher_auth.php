<?php
require __DIR__ . '/vendor/autoload.php';
header('Content-Type: application/json');

$app_id = '1536782';
$app_key = 'e0951f610f43e2b73e0f';
$app_secret = '9de54a5baece57419ec6';
$app_cluster = 'mt1';



$pusher = new Pusher\Pusher($app_key, $app_secret, $app_id);

$auth = $pusher->socket_auth('private-254704800563', '444061.14212354');


$authdata=array('auth'=>"mdkdnv278d425bdf160c739803:58df8b0c36d6982b82c3ecf6b4662e34fe8c25bba48f5369f135bf843651c3a4vfdfdd");

$final=json_encode($authdata);

 echo $final;

// echo $pusher->authorizePresenceChannel($_POST['channel_name'], $_POST['socket_id'], $user['id'], $presence_data);


?>