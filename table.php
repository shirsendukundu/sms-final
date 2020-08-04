<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
</head>
<body>
	
<div class= "w3-margin w3-container">
<div  class="w3-margin w3-card w3-responsive">
<fieldset>
<div  class="w3-margin w3-responsive">
<legend>Search</legend>
<label>Transaction ID</label>

<form id="form"action ="" method= "POST" enctype="multipart/form-data">
<input class="w3-input w3-border w3-round w3-light-grey" type ="text" name="txnid" value=""><br/>
<center><button type="submit" id="s" name="search" value="search"  class="w3-button w3-block w3-Teal w3-margin-bottom"></button></center>
<button id='btn'>ok</button>
</fieldset></form></div></div></div>


	

	<div id="t1" class= "w3-container w3-margin w3-responsive"style="display: none">
<center><h3>Transactions Details</h3>
<table  >
<thead >
      <tr class=" w3-table-all w3-card w3-dark-grey ">
  <th>Stu_Id</th>
  <th>Txn_date</th>
  <th>For Month</th>
  <th>For year</th>
  <th>Fees Type</th>
  <th>Amount</th>
  </tr>
 </thead>
	</table ></center>
	</div>	
	<h1>my home page</h1>
	
	<button id='b'>okgh</button>
</body>
</html>




<script>

    $("#btn").on("submit", function(e) {
    e.preventDefault(); // Stop submitting form
    $("#t1").show();
});
</script>
	



