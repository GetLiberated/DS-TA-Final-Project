<?php
$connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM TransactionDetail
	WHERE itemID LIKE '%".$search."%'
	OR transactionID LIKE '%".$search."%' 
	OR quantity LIKE '%".$search."%' 
	OR description LIKE '%".$search."%' 
	OR transactionDetailID LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM TransactionDetail ORDER BY transactionDetailID";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="database">
					<tr>
						<th width="8%"></th>
						<th width="17%">Transaction ID</th>
						<th width="17%">Item ID</th>
						<th width="17%">Transaction ID</th>
						<th width="17%">Quantity</th>
						<th width="24%">Item Description</th>
					</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td><form action="" method="GET"><input type="hidden" total="transactionDetailID" value="' . $row["transactionDetailID"] . '"><input class="delete" type="submit" value="-"></form></td>
				<td>'.$row["transactionDetailID"].'</td>
				<td>'.$row["itemID"].'</td>
				<td>'.$row["transactionID"].'</td>
				<td>'.$row["quantity"].'</td>
				<td>'.$row["description"].'</td>
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