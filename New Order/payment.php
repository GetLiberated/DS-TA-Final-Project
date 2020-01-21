<?php
$connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
$output = '';
$query = "
		SELECT * FROM Payment
		";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_array($result))
	{
		$output .= '<option value="'.$row["paymentID"].'">'.$row["name"].'</option>';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>