<?php
$number = $_POST['number'];
$message = $_POST['message'];


$ch = curl_init();
$parameters = array(
    'apikey' => '5f3203ca03a4fe850fc47253a91eea8f',
    'number' => $number,
    'message' => $message,
    'sendername' => 'SEMAPHORE'
);
curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);

echo $output;
?>
