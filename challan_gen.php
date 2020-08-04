<?php
//quey for transaction details using last tid in transaction table
include('connection.php');
$txnid =$_REQUEST["txnid"];
//echo $txnid;
$txn_id='T'.$_REQUEST["txnid"];
echo $query = "SELECT * FROM transaction INNER JOIN `fees_type` ON 
transaction.fees_for=fees_type.fees_type_id
WHERE `tid`=$txnid OR `txn_id`='$txn_id'";
$result = mysqli_query($conn,$query);

 while($row = mysqli_fetch_assoc($result)){
	$txn_id = $row['txn_id'];
	$stuid = $row['sid'];
	$month = $row['month'];
	$year=   $row['year'];
	$type = $row['fees_type'];
	$amount = $row['amount'];
	$date = $row['date'];
//echo $txnid;
}
//quey for student name,adress and course details 
$stuquery="SELECT student.stu_name,student.address,course.course_name FROM `student` INNER JOIN `course` ON student.course_id=course.cid WHERE student.sid=$stuid
";
$data=mysqli_query($conn,$stuquery);

while ($row=mysqli_fetch_array($data)){
$name=$row['stu_name'];
$adress=$row['address'];
$course=$row['course_name'];

}
?>


<?php
//rendering pdf using all above variable
ob_start();
	require('fpdf/fpdf.php');
        	
		   //create a FPDF object
$pdf=new FPDF();

//set document properties
$pdf->SetAuthor('Digi-tech ');
$pdf->SetTitle('Student Fees Deposit');

//set font for the entire document
$pdf->SetFont('Helvetica','B',22);
$pdf->SetTextColor(50,60,100);

//set up a page
$pdf->AddPage('P'); 
$pdf->SetDisplayMode('real','default');
$pdf->SetLeftMargin(15);


//display the title with a border around it
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(180,14,'Digi-tech Computer Education Centre',1,1,'C');
$pdf->SetFont('Helvetica','',16);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(180,10,'Authorised By JYCSM',1,1,'C',1);

//insert logo
$pdf->Image('logo.png',25,23,34);


//Set x and y position for the main text, reduce font size and write content

$pdf->SetFontSize(12);
$pdf->SetTextColor(50,60,100);
$pdf->Cell(180,10,'154-K.C Das Road,Sutragarh,Santipur Nadia mobile-7501629082',1,1,'C');
$pdf->Cell(30,10,'Txn ID:',1,0,'C');
$pdf->Cell(60,10,"$txn_id",1,0,'C');
$pdf->Cell(40,10,'Student ID:',1,0,'C');
$pdf->Cell(50,10,"S{$stuid}",1,1,'C');
$pdf->Cell(30,8,'Name:',1,0,'C');
$pdf->Cell(150,8,"$name",1,1,'C');
$pdf->Cell(30,8,'Adress:',1,0,'C');
$pdf->SetFontSize(12);
$pdf->Cell(150,8,"$adress",1,1,'C');
$pdf->SetFontSize(12);
$pdf->Cell(30,8,'Course:',1,0,'C');
$pdf->Cell(40,8,"$course",1,0,'C');
$pdf->Cell(30,8,' Month Of:',1,0,'C');
$pdf->Cell(40,8,"$month",1,0,'C');
$pdf->Cell(20,8,' Year Of:',1,0,'C');
$pdf->Cell(20,8,"$year",1,1,'C');
$pdf->Cell(30,8,'Fees Type:',1,0,'C');
$pdf->Cell(50,8,"$type",1,0,'C');
$pdf->Cell(40,8,'Deposit Date:',1,0,'C');
$pdf->Cell(60,8,"$date",1,1,'C');
$pdf->Cell(30,10,'Amount:',1,0,'C');
$pdf->Cell(150,10,"Rs {$amount} Only",1,1,'C');
$pdf->Cell(60,20,'Authorised Signatory:',1,0,'C');
$pdf->Cell(120,20,'',1,1,'C');
$pdf->Cell(180,2,'',1,0,'C','1');

//Output the document
$pdf->Output("S{$stuid}_Fees_reciept.pdf",'I'); 
ob_end_flush(); 
?>

