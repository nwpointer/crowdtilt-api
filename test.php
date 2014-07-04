<?php 

include 'config.php';
extract($account_details);

$data = [ 'user' => ["email" => "user@example.com"]];
$data_string = json_encode($data);                                                                                   
 
$ch = curl_init('https://api-sandbox.crowdtilt.com/v1/users');
curl_setopt($ch, CURLOPT_USERPWD, "$api_key:$secret");                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
 
$result = curl_exec($ch);

print($result);