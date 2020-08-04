<?php
//all variable those using for generate id card
$stuid=$_POST['stuid'];
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$cname=$_POST['cname'];
$batch=$_POST['batch'];
$photo=$_POST['photo'];
$dob=$_POST['dob'];
$adress=$_POST['adress'];
echo $stuid;
?>
<?php 
// for qr code 

 include('phpqrcode/qrlib.php'); 
 
QRcode::png("http://db56e11f.ngrok.io/sms/Student_qr_verify.php?sid=$stuid","qr.png", "L", 3,3);
 
?>

<?php
//rendering pdf using all above variable
ob_start();
	require('fpdf\fpdf.php');
        	
//create a FPDF object
$pdf=new FPDF();

//set document properties
$pdf->SetAuthor('Digitech ');
$pdf->SetTitle('Student ID card');

//set font for the entire document
$pdf->SetFont('Helvetica','B',24);
$pdf->SetTextColor(50,60,100);

//set up a page
$pdf->AddPage('P'); 
$pdf->SetDisplayMode('real','default');
$pdf->SetLeftMargin(30);
//insert logo
$pdf->Image('Front.jpg',10,10,60);
// id details
$pdf->SetFont('Helvetica','B');
$pdf->SetFontSize(16);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(20,102,"$name",0,0,'C');


// id details
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(8);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(16,132,"$cname",0,0,'C');
$pdf->Cell(-90,152,"$mobile",0,0,'C');
$pdf->Cell(90,133,"$stuid",0,0,'C');
$pdf->Cell(-15,151,"$batch",0,0,'C');

//insert student photo
$pdf->Image("$photo",29,33,22,23);
$pdf->SetFontSize(8);
$pdf->Cell(-20,115,"$dob",0,0,'C');
$pdf->SetFontSize(8);
$pdf->Cell(10);
$pdf->Cell(1,170,"$adress",0,0,'C');
//insert qr code
$pdf->Image("qr.png",33,72,14,14);
//Output the document
$pdf->Output("{$stuid}_id_card.pdf",'I'); 
ob_end_flush(); 
?>