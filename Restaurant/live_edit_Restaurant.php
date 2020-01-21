<?php
$conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB") or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['phone'])) {
		$update_field.= "phone='".$input['phone']."'";
	} else if(isset($input['addressID'])) {
		$update_field.= "addressID='".$input['addressID']."'";
	} else if(isset($input['openHours'])) {
		$update_field.= "openHours='".$input['openHours']."'";
	} else if(isset($input['genre'])) {
		$update_field.= "genre='".$input['genre']."'";
	} else if(isset($input['tax'])) {
		$update_field.= "tax='".$input['tax']."'";
	} 	
	if($update_field && $input['restaurantID']) {
		$sql_query = "UPDATE Restaurant SET $update_field WHERE restaurantID='" . $input['restaurantID'] . "'";	
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}
}


