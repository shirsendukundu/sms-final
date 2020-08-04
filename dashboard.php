<?php 
include('header.php');
include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboad</title>
	
</head>
<body>
	<div class="w3-contanier  w3-responsive">
		<center><h2 class='w3-text-gray'>Dashboard</h2>
			<hr>
		</center>
		<div  class=" w3-row w3-container">
			<div class="w3-col l3 w3-container">
				<div class="w3-panel w3-card-4 w3-blue w3-round-large">
		        <i class="glyphicon glyphicon-user" id="icon"></i>
		        <h3>Students</h3>
		        </div>
    		</div>
    		<div class="w3-col l3 w3-container">
				<div class="w3-panel w3-card-4 w3-deep-orange w3-round-large">
				<i class="glyphicon glyphicon-book" id="icon"></i>
					<h3>Courses</h3>
				</div>
			</div>
		<div class="w3-col l3 w3-container">
			<div class="w3-panel w3-card-4 w3-teal w3-round-large">
				<i class="glyphicon glyphicon-th-list" id="icon"></i>
				<h3>Batches</h3>
			</div>
		</div>
		<div class="w3-col l3 w3-container">
			<div class="w3-panel w3-card-4 w3-green w3-round-large">
				<i class="glyphicon glyphicon-envelope" id="icon"></i>
				<h3>Messages</h3>
			</div>
		</div>

</div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<style>
  #icon{
        position:relative;
        float: right;
        font-size: 80px;
        color:white;
        text-shadow:2px 2px 4px #000000;
        padding:8px;
        opacity:0.5;


    }
</style>
</body>
</html>