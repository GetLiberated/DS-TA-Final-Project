<?php
$connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM Transaction 
	WHERE income LIKE '%".$search."%'
	OR date LIKE '%".$search."%' 
	OR staffID LIKE '%".$search."%' 
	OR customer LIKE '%".$search."%' 
	OR paymentID LIKE '%".$search."%' 
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
						<th width="21%">Transaction ID</th>
						<th width="24%">Income</th>
						<th width="13%">Date</th>
						<th width="13%">Staff ID</th>
						<th width="19%">Customer</th>
						<th width="12%">Payment ID</th>
					</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>
					<form action="" method="GET">
						<input type="hidden" name="transactionID" value="' . $row["transactionID"] . '">
						<input class="delete" type="submit" value="-">
					</form>
				</td>
				<td>'.$row["transactionID"].'</td>
				<td>'.$row["income"].'</td>
				<td>'.$row["date"].'</td>
				<td>'.$row["staffID"].'</td>
				<td>'.$row["customer"].'</td>
				<td>'.$row["paymentID"].'</td>
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