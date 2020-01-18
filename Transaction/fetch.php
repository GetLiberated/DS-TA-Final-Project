<?php
$connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM Transaction 
	WHERE total LIKE '%".$search."%'
	OR restaurantID LIKE '%".$search."%' 
	OR staffID LIKE '%".$search."%' 
	OR transactionID LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM Transaction ORDER BY transactionID";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="database">
					<tr>
						<th width="8%"></th>
						<th width="27%">Transaction ID</th>
						<th width="30%">Total</th>
						<th width="17%">Restaurant ID</th>
						<th width="18%">Staff ID</th>
					</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td><form action="" method="GET"><input type="hidden" total="transactionID" value="' . $row["transactionID"] . '"><input class="delete" type="submit" value="-"></form></td>
				<td>'.$row["transactionID"].'</td>
				<td>'.$row["total"].'</td>
				<td>'.$row["restaurantID"].'</td>
				<td>'.$row["staffID"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>