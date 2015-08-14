<?php
$apiKey     = 'f23a7350e699792634ace077a79c6821628387e2bc95da5307192f277edc3c07';
//$apiHost    = 'https://api-staging.vietnamworks.com';
$apiHost    = 'https://api.vietnamworks.com';
$apiPath    = '/users/register';
$jsonString = json_encode(array(
    'email' => 'chithongn@hotmail.com',
    'password' => 'testpass',
    'firstname' => 'Test',
    'lastname' => 'User',
    'birthday' => '1984-10-01',
    'genderid' => 1, // Male
    'nationality' => 1, // Vietnam
    'residence' => 29, // Ho Chi Minh
    'home_phone' => '0839258456',
    'cell_phone' => '0986373718',
    'lang' => 1 // Vietnamese
));
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL             => $apiHost.$apiPath,
    CURLOPT_RETURNTRANSFER  => true,
    CURLOPT_SSL_VERIFYPEER  => false, // ignore SSL verification
    CURLOPT_POST            => true,  // http request method is POST
    CURLOPT_HTTPHEADER      => array(
        "CONTENT-MD5: $apiKey",
        'Content-Type: application/json',
        'Content-Length: '.strlen($jsonString)
    ),
    CURLOPT_POSTFIELDS      => $jsonString
));
$response = curl_exec($ch);
$responseArray = (array)json_decode($response, true);;
if ($responseArray['meta']['code'] == 400) { // error happened
    echo 'Server returned an error with message: '.$responseArray['meta']['message'];
} elseif ($responseArray['meta']['code'] == 200)  {
    echo "Response status: ".$responseArray['meta']['message']."\nNew userID: ".$responseArray['data']['userID'];
} else {
    //unknown error
    $info = curl_getinfo($ch);
    echo "An error happened: \n".curl_error($ch)."\nInformation: ".print_r($info, true)."\nResponse: $response";
}
curl_close($ch);
