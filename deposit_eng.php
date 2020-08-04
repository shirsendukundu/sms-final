<?php
      include('header.php');
      include('connection.php');
	  
	        $name=$_POST["name"];
			$amount=$_POST["amount"];
			$month=$_POST["month"];
			$year=$_POST["year"];
			$type=$_POST["type"];
			$sid=$_POST['sid'];
			$query="INSERT INTO `transaction`(`amount`, `month`,`year`,`fees_for`, `sid`) VALUES ('$amount','$month','$year','$type','$sid')";
		
			if(mysqli_query($conn,$query))
			{
				$txnid=mysqli_insert_id($conn);
				
				$result="Student S$sid Fees Deposited Successfully completed with TXN_ID: T$txnid";
	}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
//query for txn  data table
     $txnquery="SELECT `stu_id`,`txn_id`,`date`,`amount`,`month`,`year`,`fees_type` from transaction left join student on transaction.sid=student.sid LEFT join fees_type on transaction.fees_for=fees_type.fees_type_id where transaction.sid='$sid' ORDER BY tid DESC LIMIT 10";
     $data=mysqli_query($conn,$txnquery);
?>	
		<DOCTYPE!HTML>
<html><head>
<title>fee deposit success</title>
</head>
<body>
<div class=" w3-display-container w3-margin   w3-responsive">
<div class="w3-margin w3-responsive">
<!-- success msg-->
<div class="w3-panel  w3-green w3-round w3-display-container w3-margin">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-green w3-midium w3-display-topright">&times;</span><br/>
	<?php echo "<center><p class='w3-large'>$result</p></center>";?>
	</div>
    <div class=" w3-display-container w3-card w3-margin w3-responsive">
  <!-- last 10  transaction Summary  --> 
      <h3><center>Last 10 Transaction Summary</center></h3><br/>
       
	           <table class="w3-table-all w3-hoverable w3-centered " >
			   <tr class="w3-dark-grey">
			   <th>Txn ID</th>
	           <th>Student Id</th>
			   <th>Date & Time </th>
			   <th>Month Of</th>
			   <th>Year Of</th>
			   <th>Fees_Type</th>
			   <th>Amount</th>
			   </tr>
<?php			   
			   while($row = mysqli_fetch_assoc($data)){
			echo"	   
			   <tr>
			   <td>".$row['txn_id']." </td>
			   <td>".$row['stu_id']." </td>
			   <td>".$row['date']." </td>
			   <td>".$row['month']." </td>
			   <td>".$row['year']." </td>
			   <td>".$row['fees_type']."</td>
			   <td>".$row['amount']." </td>
			   
			   </tr>";
			   
				
				}
	?>			
			   </table></center><br></br>
			   <form action="challan_gen.php" method="post" target="_blank">
			   <input type="hidden" name="txnid"value="<?php echo "$txnid";?>">
			   <center><input class="w3-button w3-btn w3-teal w3-hover-red w3-margin-bottom"  type="submit" name="submit" value="Print Recipet">
			   </form><br/>
<?php
//for getting student mobile no that using in sending msg
$mobquery="select mobile from student where sid='$sid'";
$res=mysqli_query($conn,$mobquery);
while($row=mysqli_fetch_array($res)){
	$mobno= $row['mobile'];
	
	}
//fast2sms sms api code
$field = array(
    "sender_id" => "FSTSMS",
    "message" => "1914",
    "language" => "english",
    "route" => "qt",
    "numbers" => "$mobno",
    "flash" => "0",
    "variables" => "{#CC#}|{#BB#}",
    "variables_values" => "$month|T$txnid"
);

//$curl = curl_init();

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
?>
</div>
</body></html>
			  