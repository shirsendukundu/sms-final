<?php
require_once('db.php');
$country_id = mysqli_real_escape_string($_POST['country_id']);
if($country_id!='')
{
	$states_result = $conn->query('select * from states where country_id='.$country_id.'');
	$options = "<option value=''>Select State</option>";
	while($row = $states_result->fetch_assoc()) {
	$options .= "<option value='".$row['id']."'>".$row['state']."</option>";
	}
	echo $options;
}

?>