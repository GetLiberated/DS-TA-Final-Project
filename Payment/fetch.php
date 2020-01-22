<?php
$connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM Payment
	WHERE name LIKE '%".$search."%'
	OR paymentID LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM Payment ORDER BY paymentID";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="database">
					<tr>
						<th width="8%"></th>
						<th width="46%">Payment ID</th>
						<th width="46%">Name</th>
		
					</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>
					<form action="" method="GET">
						<input type="hidden" name="paymentID" value="' . $row["paymentID"] . '">
						<input class="delete" type="submit" value="-">
					</form>
				</td>
				<td>'.$row["paymentID"].'</td>
				<td>'.$row["name"].'</td>
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