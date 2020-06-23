<?php
$code = $_GET['code'];
if (empty($code)) {
  header("Location: /sign-in/");
  exit();
}

$url = 'https://discord.com/api/v6/oauth2/token';
$data = array(
  'client_id' => '724678546059952228',
  'client_secret' => 'kY3MKSViEQNte0mpDEQRF3AopKCkMQgG',
  'grant_type' => 'authorization_code',
  'code' => $code,
  'redirect_uri' => 'https://savi.ogxn.xyz/account/sign-in/complete/',
  'scope' => 'identify'
);
$data = http_build_query($data);

$context_options = array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-type: application/x-www-form-urlencoded\r\n"
      . "Content-Length: " . strlen($data) . "\r\n",
    'content' => $data
  )
);

$context = stream_context_create($context_options);
$result = file_get_contents($url, false, $context);

$response = json_decode($result, true);
$cookieName = "access_token";
$accessToken = $response["access_token"];

setcookie($cookieName, $accessToken, time()+(604800/1000), '/', 'savi.ogxn.xyz');
#SET DOMAIN!!!

header("Location: /account/");
exit();
?>