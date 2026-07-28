<?php

$site = getenv('BD_SITE_URL');
$apiKey = getenv('BD_API_KEY');

$url = $site . '/api/v2/user/search';

$data = [
    "limit" => 1
];

$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "X-Api-Key: $apiKey"
    ],
    CURLOPT_POSTFIELDS => json_encode($data)
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch) . PHP_EOL;
    exit(1);
}

curl_close($ch);

echo $response . PHP_EOL;
