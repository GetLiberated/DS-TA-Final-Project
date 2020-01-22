<?php
$connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM Item
	WHERE foodName LIKE '%".$search."%'
	OR category LIKE '%".$search."%' 
	OR price LIKE '%".$search."%' 
	OR id LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM Item ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<table id="database">
					<tr>
						<th width="8%"></th>
						<th width="17%">Item ID</th>
						<th width="27%">Food Name</th>
						<th width="28%">Food Category</th>
						<th width="20%">Price</th>
					</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>
					<form action="" method="GET">
						<input type="hidden" name="id" value="' . $row["id"] . '">
						<input class="delete" type="submit" value="-">
					</form>
				</td>
				<td>'.$row["id"].'</td>
				<td>'.$row["foodName"].'</td>
				<td>'.$row["category"].'</td>
				<td>'.$row["price"].'</td>
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