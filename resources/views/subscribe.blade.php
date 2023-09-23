<?php
ob_start();
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/plan",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => [
    "name" => "Monthly Retainer",
    "interval" => "monthly",
    "amount" => 4000000
  ],
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_test_9c03c16a8a26ed4a1d881df3a88e3ca88fd690b1",
    "Cache-Control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    // Parse the response JSON to get the plan code
    $planData = json_decode($response, true);
    $planCode = $planData['data']['plan_code'];

    $url = "https://api.paystack.co/transaction/initialize";

    $fields = [
      'email' => "customer@email.com",
      'amount' => "500000",
      'plan' => $planCode // Use the plan code here
    ];

    $fields_string = http_build_query($fields);

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Authorization: Bearer sk_test_9c03c16a8a26ed4a1d881df3a88e3ca88fd690b1",
      "Cache-Control: no-cache",
    ));

    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    //execute post
    $result = curl_exec($ch);
    echo $result;

    // ... Rest of your code to handle the payment
}
?>
