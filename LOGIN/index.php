<?php
include('connection.php');

	if(isset($_POST['login']))
	 {
	  $uname=mysqli_real_escape_string($conn,$_POST['uname']);
	  $passwd=mysqli_real_escape_string($conn,$_POST['passwd']);
    $sql="SELECT * from admin where uname='$uname' and passwd='$passwd'";
		$result=mysqli_query($conn,$sql);
	  $row=mysqli_num_rows($result);
    while($phno=mysqli_fetch_assoc($result)){
    $pno= $phno['mobile'];
    }
      if($row==1)
  	   {  session_start();
  	      $otp = rand(10000,99999);
  	      $_SESSION["user"]=$uname;
  		    $_SESSION["otprand"]=$otp;
          
//for sending otp on mobile

     $field = array(
    "sender_id" => "FSTSMS",
    "message" => "1910",
    "language" => "english",
    "route" => "qt",
    "numbers" => "$pno",
    "flash" => "0",
    "variables" => "{#AA#}",
    "variables_values" => "$otp"
);

//$curl = curl_init();

  /*curl_setopt_array($curl, array(
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
    "accept: *///*",
   /* "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}*/

	  	header('Location:/sms/LOGIN/otp_form.html');  

        }
		   else {
				$loginmsg="input details incorret";
				}
	} 
   
//for otp verificaton
   
if(isset($_POST['verify']))
  {
  	 echo $_SESSION["otprand"];
	   $otpinput=$_POST['otp'];
	if($_SESSION["otprand"]==$otpinput)
	{
	header('Location:/sms/all_student_details.php');
    }
    else {
	     echo "please Enter Correct otp";
	     }

   }
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admin Login Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  
<div class="container">
  <div class="info">
    <h1>Admin Login Form</h1><span>Made with <i class="fa fa-heart"></i> by <a href="http://andytran.me">urtechquery</a></span>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
  <form class="register-form">
    <input type="text" placeholder="name"/>
    <input type="password" placeholder="password"/>
    <input type="text" placeholder="email address"/>
    <button>create</button>
    <p class="message">Already registered? <a href="#">Sign In</a></p>
  </form>
  <form class="login-form" action="" method ="POST">
    <input type="text" placeholder="username" name="uname"/>
    <input type="password" placeholder="password" name="passwd"/>
    <p class="message"><?php if(!empty($loginmsg)){echo $loginmsg;}?></p>
    <button name="login">login</button>
    <p class="message">Not registered? <a href="#">Create an account</a></p>
  </form>
</div>
<video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
  <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4"/>
</video>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
