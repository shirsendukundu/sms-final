

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require_once("connection.php");


	$query ="SELECT * FROM batch WHERE cid = '" . $_POST["cid"] . "'";
	$results = mysqli_query($conn,$query);
?>
	<option value="">Select Batch</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["bid"]; ?>"><?php echo $rs["day"] ;?> 

	&nbsp <?php echo $rs["time"]; ?></option>
<?php

}
?>
</body>
</html>