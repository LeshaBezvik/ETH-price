<?php
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
$parameters = [
  'symbol' => 'ETH'
];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: 9ec2db0f-900a-403a-aac0-03a92efcb1df'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,            // set the request URL
  CURLOPT_HTTPHEADER => $headers,     // set the headers 
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response

$data = json_decode($response, true);

$ethereumPrice = $data['data']['ETH']['quote']['USD']['price'];

curl_close($curl); // Close request
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="main">
    <p>Ethereum price: <?php echo $ethereumPrice;  ?></p>
  </div>
</body>
</html>