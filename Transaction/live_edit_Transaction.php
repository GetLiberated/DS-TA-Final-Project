<?php
$conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB") or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['income'])) {
		$update_field.= "income='".$input['income']."'";
	} else if(isset($input['date'])) {
		$update_field.= "date='".$input['date']."'";
	} else if(isset($input['staffID'])) {
		$update_field.= "staffID='".$input['staffID']."'";
	} else if(isset($input['customer'])) {
		$update_field.= "customer='".$input['customer']."'";
	} else if(isset($input['paymentID'])) {
		$update_field.= "paymentID='".$input['paymentID']."'";
	} 	
	if($update_field && $input['transactionID']) {
		$sql_query = "UPDATE Transaction SET $update_field WHERE transactionID='" . $input['transactionID'] . "'";	
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}
}


