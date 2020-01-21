<?php
$connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
$output = '';
$query = "
		SELECT * FROM Item
		";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '
			<p class="category"><b>Food</b></p>
			';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<div class="item" onclick="order(this)">
				<div hidden>'.$row["id"].'</div>
				<p style="display: inline-block;"><b>'.$row["foodName"].'</b></p>
				<p style="float: right; display: inline-block;">'.number_format($row["price"]).'</p>
				<p style="float: right; display: inline-block; padding-right: 5px;">Rp</p>
				<div hidden>'.$row["price"].'</div>
			</div>
			<br>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
$output = '';
$query = "
		SELECT * FROM Item
		";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '
			<p class="category"><b>Beverage</b></p>
			';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<div class="item" onclick="order(this)">
				<div hidden>'.$row["id"].'</div>
				<p style="display: inline-block;"><b>'.$row["foodName"].'</b></p>
				<p style="float: right; display: inline-block;">'.number_format($row["price"]).'</p>
				<p style="float: right; display: inline-block; padding-right: 5px;">Rp</p>
				<div hidden>'.$row["price"].'</div>
			</div>
			<br>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>