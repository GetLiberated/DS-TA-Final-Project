<?php
$conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB") or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['itemID'])) {
		$update_field.= "itemID='".$input['itemID']."'";
	} else if(isset($input['transactionID'])) {
		$update_field.= "transactionID='".$input['transactionID']."'";
	} else if(isset($input['quantity'])) {
		$update_field.= "quantity='".$input['quantity']."'";
	} else if(isset($input['description'])) {
		$update_field.= "description='".$input['description']."'";
	} 	
	if($update_field && $input['transactionDetailID']) {
		$sql_query = "UPDATE Address SET $update_field WHERE transactionDetailID='" . $input['transactionDetailID'] . "'";	
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}
}


