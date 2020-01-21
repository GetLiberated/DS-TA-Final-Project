<?php
$connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
$output = '';
$query = "
		SELECT * FROM Item
		";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<tr>
					<th width="4%"></th>
					<th width="30%">Name</th>
					<th width="10%">Quantity</th>
					<th width="16%">Price</th>
				</tr>';
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>