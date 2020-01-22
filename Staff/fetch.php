<?php
$connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM Staff 
	WHERE name LIKE '%".$search."%'
	OR restaurantID LIKE '%".$search."%' 
	OR staffID LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM Staff ORDER BY staffID";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="database">
					<tr>
						<th width="8%"></th>
						<th width="30%">Staff ID</th>
						<th width="31%">Name</th>
						<th width="31%">Restaurant ID</th>
					</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>
					<form action="" method="GET">
						<input type="hidden" name="staffID" value="' . $row["staffID"] . '">
						<input class="delete" type="submit" value="-">
					</form>
				</td>
				<td>'.$row["staffID"].'</td>
				<td>'.$row["name"].'</td>
				<td>'.$row["restaurantID"].'</td>
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