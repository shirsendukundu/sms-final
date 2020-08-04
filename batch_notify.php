<?php
include('connection.php');
//session_start();
$bid=$_POST['bid'];
  if(!empty($bid)){
 	$a=array();
 	$sql="SELECT student.mobile FROM student INNER JOIN studentbatches ON student.sid=studentbatches.sid WHERE studentbatches.bid IN ($bid)";
	$row= mysqli_query($conn,$sql);

			while ($mob = mysqli_fetch_assoc($row)) {
					array_push($a,$mob['mobile']);
 					//$mob['mobile']."<br>";

				}
		
       echo   $no= implode(',', $a);
		
		$field = array(
    "sender_id" => "DGTECH",
    "message" => "22209",
    "language" => "english",
    "route" => "qt",
    "numbers" =>"$no",
    "flash" => "0",
    
);
		echo json_encode($field);
	$curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
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
  echo "Message sent successfully";
  //$_SESSION['flash']=$response;
}
}
?>