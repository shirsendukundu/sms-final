<?php
$month=$_POST['month'];
$mobile= $_POST['mob'];
$fees= $_POST['fees'];
echo $month.$fees.$mobile;
$field = array(
    "sender_id" => "FSTSMS",
    "message" => "1933",
    "language" => "english",
    "route" => "qt",
    "numbers" => "$mobile",
    "flash" => "0",
    "variables" => "{#CC#}|{#BB#}",
    "variables_values" => "$month|$fees"
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($field),
  CURLOPT_HTTPHEADER => array(
    "authorization: yXSgHidtAnGFYj8VReErLaKfqIcZODkQ3plMuN09xPvJsbC1h46adoO4YhzV3fsGwEkSMipR70I2Xuv1",
    "cache-control: no-cache",
    "accept: */*",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
