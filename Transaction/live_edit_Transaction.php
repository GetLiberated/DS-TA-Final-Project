<?php
$conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB") or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['total'])) {
		$update_field.= "total='".$input['total']."'";
	} else if(isset($input['restaurantID'])) {
		$update_field.= "restaurantID='".$input['restaurantID']."'";
	} else if(isset($input['staffID'])) {
		$update_field.= "staffID='".$input['staffID']."'";
	} 	
	if($update_field && $input['transactionID']) {
		$sql_query = "UPDATE Address SET $update_field WHERE transactionID='" . $input['transactionID'] . "'";	
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}
}


