<?php 


 include('phpqrcode/qrlib.php'); 
 $text="abc";
 $folder="student_img/";
 $file_name="qr.png";
 $file_name=$folder.$file_name;
 QRcode::png($text,$file_name);
 echo"<img src='student_img/qr.png'>";
?>