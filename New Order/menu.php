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
				<p style="float: right; display: inline-block;">Rp '.number_format($row["price"]).'</p>
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
				<p style="float: right; display: inline-block;">Rp '.number_format($row["price"]).'</p>
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