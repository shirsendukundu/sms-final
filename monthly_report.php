<?php
include('header.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title> generate monthy report</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<center><h3>Generate Report</h3></center>
<div class=" w3-display-container w3-margin w3-card  w3-responsive">
<div class= "w3-margin w3-container  ">
<form action ="" method="POST" enctype="multipart/form-data">
<!--<div class="w3-card w3-margin w3-border w3-border-blue  ">-->
<div class="w3-row-padding w3-margin  ">
<div class="w3-third w3-display-left w3-margin-left">
             <label>Year of:</label>
            <select  class="w3-select w3-border w3-light-grey" name="year">
						<option value="" selected>Choose Year..</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2015">2021</option>
						<option value="2015">2022</option>
            </select>
</div>
<div class="w3-third w3-display-right w3-margin-right">
           <label>Month of:</label>
			<select class="w3-select w3-border w3-light-grey" name="month">
						<option value="" selected>Choose Month..</option>
						<option value="January">January</option>
						<option value="February">February</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="September">September</option>
						<option value="October">October</option>
						<option value="November">November</option>
						<option value="December">December</option>
			</select>
    
     

 </div><br><br><br>
    
     </div></div>
     <center><input type='submit'  name='submit' value='submit' class='w3-btn w3-blue'></center><br>
     </form>
</div><br>

	<center><h3> Monthly Summary</h3></center>
<center><div>
	<table class="w3-table-all w3-hoverable w3-responsive w3-centered w3-large">
	<thead>
		<tr class="w3-dark-grey">

		<th>Fees type</th>
		<th>Amount received</th>
		</tr>
</thead>

<?php 
include('connection.php');
if (isset($_POST['submit'])){
$month=$_POST['month'];
$year=$_POST['year'];
$query="SELECT sum(amount) as total,fees_type
FROM transaction
inner join fees_type on transaction.fees_for=fees_type.fees_type_id
WHERE transaction.month='$month' AND transaction.year='$year'
GROUP BY fees_type";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
	echo"<tbody>
	<td>".$row['fees_type']."</td>
	<td>".$row['total']."</td>" ;}
	}
	?>
<tr class="w3-dark-grey">
	<th>Subtotal:</th>
    <th></th>
</tr>
</tbody>
</table>
</div></center>
</div>






 