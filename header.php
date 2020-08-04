<?php

if(empty($_SESSION)) // if the session not yet started 
   session_start();

if(!isset($_SESSION['user'])) { //if not yet logged in
   header("Location: LOGIN/index.html");// return to the login page
   exit;
} 

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="headercss.css">
<link href="https://fonts.googleapis.com/css?family=Marck+Script|Neuton|Yrsa" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


</head>
<body>
<div class="w3-sidebar w3-bar-item w3-bar-block  W3-dark-grey w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-hover-white w3-large"
  onclick="w3_close()">Close &times;</button>
  <button class="w3-bar-item w3-button  W3-RED w3-hover-white w3-left-align w3-padding-24 w3-border-bottom" id="btn"><i class="glyphicon glyphicon-off w3-large"> <a  href="LOGIN/logout.php">LOGOUT
  </a></i></button>
  
  <button  class="w3-button w3-block W3-RED w3-hover-white w3-left-align w3-padding-24 w3-border-bottom"id="btn"><i class="glyphicon glyphicon-home w3-large"> <a  href="dashboard.php">DASHBOARD</a></i>
</button>
  
  <button onclick="myFunction('Demo1')" class="w3-button w3-block W3-RED w3-hover-white w3-left-align w3-padding-24 w3-border-bottom"><i class="glyphicon glyphicon-user w3-large"> STUDENT MANAGEMENT</i>
</button>
  
  <div id="Demo1" class="w3-hide ">
  <a style="text-decoration: none;" class=" w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="stu_admission.php"> STUDENT ADMISSION</a>
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="all_student_details.php">ALL STUDENTS</a>
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="stu_update.php">UPDATE PROFILE</a>
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="icard_issue.php">ISSUE ICARD</a></div>
  
  <button onclick="myFunction('Demo2')" class="w3-button w3-block W3-RED w3-left-align   w3-padding-24 w3-border-bottom w3-hover-white"><i class="glyphicon glyphicon-book w3-large"> COURSE MANAGEMENT</i></button>

  <div id="Demo2" class="w3-hide">
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="Course_mng.php">ADD NEW COURES</a>
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="course_details.php">AVAILABLE COURSES</a></div>
  
  <button onclick="myFunction('Demo3')" class="w3-button w3-block W3-RED w3-left-align     w3-padding-24 w3-border-bottom w3-hover-white"><i class="glyphicon glyphicon-th-list w3-large"> BATCH MANAGEMENT</i></button>

  <div id="Demo3" class="w3-hide">
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="batch_mng.php">ADD NEW BATCH</a>
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="Batch_details.php">AVAILABLE BATCHES</a>
</div>

<button onclick="myFunction('Demo4')" class="w3-button w3-block W3-RED w3-left-align   w3-padding-24 w3-border-bottom w3-hover-white"><i class="glyphicon glyphicon-credit-card w3-large"> FEES MANAGEMENT</i></button>

  <div id="Demo4" class="w3-hide">
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="fees_deposit_form.php">DEPOSIT FEES</a>
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="search_transaction.php">SEARCH TRANSACTION</a>
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="student_transaction.php">STUDENT TRANSACTION DETAILS</a>
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="fees_deu.php">OUTSTANDING FEES</a>
</div>
<button onclick="myFunction('Demo5')" class="w3-button w3-block W3-RED w3-left-align   w3-padding-24 w3-border-bottom w3-hover-white"><i class="glyphicon glyphicon-credit-card w3-large"> ISSUE CERTIFICATE </i></button>
<div id="Demo5" class="w3-hide">
  <a style="text-decoration: none;" class="w3-button w3-block w3-left-align W3-white w3-border-bottom w3-hover-yellow" href="certificate_issue.php">ISSUE</a>

</div></div>

<div class="W3-RED w3-row">

  <div class="w3-container w3-col md2 l1">
  <button id="openNav" class="w3-button w3-xlarge w3-hover-white" onclick="w3_open()">&#9776;</button>
  </div>
  <div class="w3-left-align institute w3-col md5 l9 ">
     <p class="w3-xlarge w3-margin-top 8px">Digitech Computer Centre</p>
  </div>
  <div class='admin w3-container w3-col md5 l2 w3-text-white '>
    
      <p class="w3-right-align w3-margin-top 8px w3-large"><?php echo "Hello ".$_SESSION["user"]." !";?></p>
    
  </div>
  
</div>
  
</div>
<div id="main">
 
 <script>
  function w3_open() {
        document.getElementById("main").style.marginLeft = "25%";
        document.getElementById("mySidebar").style.width = "25%";
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("openNav").style.display = 'block';

 }
  function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("openNav").style.display = "block";
 }
</script>
<script>
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show","");
    }
}
</script>
</body>
</html>