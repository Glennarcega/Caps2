<?php
$number = $_POST['number'];
$message = $_POST['message'];


$ch = curl_init();
$parameters = array(
    'apikey' => $api_key,
    'number' => $number,
    'message' => "SEMAPHORE",
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
