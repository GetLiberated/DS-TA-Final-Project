<?php
$conn = mysqli_connect("dbta.1ez.xyz", "MUH7052", "8qlnrwkp", "8_groupDB") or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['streetName'])) {
		$update_field.= "streetName='".$input['streetName']."'";
	} else if(isset($input['zipCode'])) {
		$update_field.= "zipCode='".$input['zipCode']."'";
	} else if(isset($input['province'])) {
		$update_field.= "province='".$input['province']."'";
	} else if(isset($input['city'])) {
		$update_field.= "city='".$input['city']."'";
	} else if(isset($input['country'])) {
		$update_field.= "country='".$input['country']."'";
	}	
	if($update_field && $input['addressID']) {
		$sql_query = "UPDATE Address SET $update_field WHERE addressID='" . $input['addressID'] . "'";	
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}
}


