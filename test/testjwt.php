<?php

require __DIR__. '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/firebase/php-jwt/src/JWT.php';
require_once __DIR__ . '/../vendor/firebase/php-jwt/src/Key.php';
require_once __DIR__ . '/../api/JsonWebToken.php';
$part = str_replace("test", "", __DIR__);
$dotenv = Dotenv\Dotenv::createImmutable($part);
$dotenv->load();

$issuedAt = time();
$expirationTime = $issuedAt + 60;

$payload = array(
    'user' => '1',
    'role' => 'user',
    'iat' => $issuedAt,
    'exp' => $expirationTime
);

$key = "2";

$encode = JsonWebToken::encode($payload, $_ENV['JWTKEY']);
$encode2 = "yJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiMSIsInJvbGUiOiJ1c2VyIiwiaWF0IjoxNjc1NTI2NjE2LCJleHAiOjE2NzU1MjY2NzZ9.L62eM0eYuHKDfuj1Iqkpj_KK-snqgUF7eJX4EagiB2E";

$arr = array(
    'key' => $_ENV['JWTKEY'],
    'encode' => JsonWebToken::encode($payload, $_ENV['JWTKEY']),
    'decode' => JsonWebToken::decode($encode2, $_ENV['JWTKEY'])
);

echo "<pre>";
print_r(json_encode($arr));

?>