<?php
require_once('db.php');
$country_result = $conn->query('select * from countries');
?>

<select name="country" id="countries-list">
		<option value="">Select Country</option>
		<?php
		if ($country_result->num_rows > 0) {
    // output data of each row
    while($row = $country_result->fetch_assoc()) {
    	?>
        <option value="<?php echo $row["id"]; ?>"><?php echo $row["country_name"]; ?></option>
        <?php
    }
}
?><html><head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script></head>
		</select>
</br></br></br>
		<select name="state" id="states-list">
			<option value=''>Select State</option>
		</select>

		
		<script>
$('#countries-list').on('change', function(){
    var country_id = this.value;
    $.ajax({
	type: "POST",
	url: "get_states.php",
	data:'country_id='+country_id,
	success: function(result){
		$("#states-list").html(result);
	}
	});
});
</script>