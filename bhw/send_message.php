<?php
$api_key = $_POST['api_key'];
$number = $_POST['number'];
$message = $_POST['message'];
$sendername = $_POST['sendername'];

$ch = curl_init();
$parameters = array(
    'apikey' => $api_key,
    'number' => $number,
    'message' => $message,
    'sendername' => $sendername
);
curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);

echo $output;
?>
