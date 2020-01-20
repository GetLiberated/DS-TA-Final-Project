<?php
$connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM Address 
	WHERE streetName LIKE '%".$search."%'
	OR zipCode LIKE '%".$search."%' 
	OR province LIKE '%".$search."%' 
	OR city LIKE '%".$search."%' 
	OR country LIKE '%".$search."%'
	OR location LIKE '%".$search."%'
	OR addressID LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM Address ORDER BY addressID";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="database">
					<tr>
						<th width="8%"></th>
						<th width="10%">Address ID</th>
						<th width="15%">Location</th>
						<th width="24%">Street Name</th>
						<th width="7%">Zip Code</th>
						<th width="13%">Province</th>
						<th width="13%">City</th>
						<th width="11%">Country</th>
					</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td><form action="" method="GET"><input type="hidden" name="addressID" value="' . $row["addressID"] . '"><input class="delete" type="submit" value="-"></form></td>
				<td>'.$row["addressID"].'</td>
				<td>'.$row["location"].'</td>
				<td>'.$row["streetName"].'</td>
				<td>'.$row["zipCode"].'</td>
				<td>'.$row["province"].'</td>
				<td>'.$row["city"].'</td>
				<td>'.$row["country"].'</td>
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