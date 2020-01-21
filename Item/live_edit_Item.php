<?php
$conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB") or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['foodName'])) {
		$update_field.= "foodName='".$input['foodName']."'";
	} else if(isset($input['category'])) {
		$update_field.= "category'".$input['category']."'";
	} else if(isset($input['price'])) {
		$update_field.= "price='".$input['price']."'";
	} else if(isset($input['description'])) {
		$update_field.= "description='".$input['description']."'";
	} 	
	if($update_field && $input['id']) {
		$sql_query = "UPDATE Item SET $update_field WHERE id='" . $input['id'] . "'";	
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}
}


