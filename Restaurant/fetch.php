<?php
$connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM Restaurant 
	WHERE phone LIKE '%".$search."%'
	OR addressID LIKE '%".$search."%' 
	OR openHours LIKE '%".$search."%' 
	OR genre LIKE '%".$search."%' 
	OR tax LIKE '%".$search."%'
	OR restaurantID LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM Restaurant ORDER BY restaurantID";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="database">
					<tr>
						<th width="8%"></th>
						<th width="10%">Restaurant ID</th>
						<th width="24%">Phone Number</th>
						<th width="10%">Address ID</th>
						<th width="18%">Open Hours</th>
						<th width="15%">Genre</th>
						<th width="15%">Tax</th>
					</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td><
					form action="" method="GET">
						<input type="hidden" name="restaurantID" value="' . $row["restaurantID"] . '">
						<input class="delete" type="submit" value="-">
					</form>
				</td>
				<td>'.$row["restaurantID"].'</td>
				<td>'.$row["phone"].'</td>
				<td>'.$row["addressID"].'</td>
				<td>'.$row["openHours"].'</td>
				<td>'.$row["genre"].'</td>
				<td>'.$row["tax"].'</td>
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