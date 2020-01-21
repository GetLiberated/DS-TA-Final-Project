<?php
$conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB") or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['name'])) {
		$update_field.= "name='".$input['name']."'";
	} else if(isset($input['restaurantID'])) {
		$update_field.= "restaurantID='".$input['restaurantID']."'";
	} 
	if($update_field && $input['staffID']) {
		$sql_query = "UPDATE Staff SET $update_field WHERE staffID='" . $input['staffID'] . "'";	
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}
}


