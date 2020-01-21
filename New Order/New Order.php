<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>New Order</title>
    <style>
        body {  
            background: linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.8)), url("logo1.jpg");
            background-repeat: no-repeat;
            background-size: auto;
            background-position:top left;
            padding: 0px 30px;         
        }   
        @font-face {
            font-family: ourFond;
            src: url(LobsterTwo-Regular.ttf);
            font-weight: bold;
        }
        .title {
            font-weight: bold;
            font-family: ourFond;
            font-size: 40px;
            display: inline-block;
            position: relative;
            left: 45%;
            transform: translateX(-50%);
        }
        button {
            background-color: Transparent;
            background-repeat: no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;
            outline:none;
        }
        .back {
            border-radius : 10px;
            display: inline-block;
        }
        .back a {
            background-color: #3471eb;
            color: white;
            padding: 14px 25px;
            text-align: center; 
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            font-family: monospace;
            border-radius: 5px;
            font-size: 20px;
        }
        .back a:hover, a:active {
            background-color: #3456eb;
        }
        .checkout {
            background-color: #04cc0a;
            color: white;
            padding: 14px 25px;
            text-align: center; 
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            font-family: monospace;
            border-radius: 5px;
            font-size: 20px;
            margin: 35px 5px;
            float: right;
        }
        .checkout:hover {
            background-color: #009e05;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            color: #588c7e;
            font-family: monospace;
            font-size: 22px;
            text-align: left;
            border-radius: 5px;
            table-layout: fixed;
            display: inline-block;
        }
        th {
            background-color: #588c7e;
            color: white;
            padding: 15px;
        }
        td { 
            padding: 15px 
        }
        tr:nth-child(even) { 
            background-color: #f2f2f2 
        }
        .delete {
            cursor: pointer;
            color: #ff4040;
            font-size: 35px;
            background-color: Transparent;
            background-repeat: no-repeat;
            border: none;
            overflow: hidden;
            outline:none;
        }
        .menu {
            display: inline-block;
            float: right;
            overflow: scroll;
            height: 800px;
            width: 38%;
        }
        .category {
            margin: 10 0px;
            font-family: system-ui;
            font-size: 50px;
        }
        .item {
            padding: 20px;
            margin: 0 10px;
            cursor: pointer;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border-radius: 10px;
            font-family: system-ui;
        }
        .item:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .menu::-webkit-scrollbar {
            width: 0px;
            background: transparent; /* make scrollbar transparent */
        }
        span { cursor:pointer; }
		.minus, .plus{
			width:20px;
			height:20px;
			background:#f2f2f2;
			padding:8px 5px 8px 5px;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
        }
        input {
            height:34px;
            width: 50px;
            text-align: center;
            font-size: 26px;
            border:1px solid #ddd;
            border-radius:4px;
            display: inline-block;
            vertical-align: middle;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="back">
        <a href="../index.php"><i class="fa fa-arrow-left"></i></a>    
    </div>
    <p class="title">New Order</p>
    <button onclick="checkout()" class="checkout">Checkout</button>
    <br>
    <table id="order">
        <tr>
            <th width="4%"></th>
            <th width="30%">Name</th>
            <th width="10%">Quantity</th>
            <th width="16%">Price</th>
        </tr>
    </table>
    <div class="menu">
    
    </div>
</body>
</html>

<script>
$(document).ready(function(){
	new_order();
	function new_order(query)
	{
		$.ajax({
			url:"order.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#order').html(data);
			}
		});
	}
    load_menu();
	function load_menu(query)
	{
		$.ajax({
			url:"menu.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('.menu').html(data);
			}
		});
	}
});
function order(e) {
    var tableRef = document.getElementById('order').getElementsByTagName('tbody')[0];

    // Insert a row in the table at the last row
    var newRow   = tableRef.insertRow();

    // Insert a cell in the row at index 0
    var newCell  = newRow.insertCell(0);
    // Append nodes to the cell
    var del  = document.createElement("button");
    del.innerHTML = "-";
    del.className = "delete";
    del.onclick = function () {
        var row = this.parentNode.parentNode;
        row.parentNode.removeChild(row);
    };
    newCell.appendChild(del);

    // Insert a cell in the row at index 1
    var newCell  = newRow.insertCell(1);
    // Append nodes to the cell
    var food = e.getElementsByTagName('b')[0].innerHTML;
    newCell.appendChild(document.createTextNode(food));

    // Insert a cell in the row at index 2
    var newCell  = newRow.insertCell(2);
    // Append nodes to the cell
    var div = document.createElement("div");
    var min = document.createElement("span");
    min.innerHTML = "-";
    min.className = "minus";
    min.onclick = function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        var $rp = $(this).closest('tr').children('td').children('p.ogprice').text();
        var $newrp = $rp * $(this).parent().find('input').val();
        $(this).closest('tr').children('td').children('p.price').text($newrp);
        return false;
    };
    div.appendChild(min);
    var text = document.createElement("input");
    text.value = "1";
    text.type = "number";
    text.addEventListener("keyup", function(event) {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        var $rp = $(this).closest('tr').children('td').children('p.ogprice').text();
        var $newrp = $rp * $(this).parent().find('input').val();
        $(this).closest('tr').children('td').children('p.price').text($newrp);
    });
    div.appendChild(text);
    var plus = document.createElement("span");
    plus.innerHTML = "+";
    plus.className = "plus";
    plus.onclick = function () {
        var $input = $(this).parent().find('input');
        var $rp = $(this).closest('tr').children('td').children('p.ogprice').text();
        var $newrp = $rp * (parseInt($input.val()) + 1);
        $(this).closest('tr').children('td').children('p.price').text($newrp);
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    };
    div.appendChild(plus);
    newCell.appendChild(div);

    // Insert a cell in the row at index 3
    var newCell  = newRow.insertCell(3);
    // Append nodes to the cell
    var rp  = document.createElement("p");
    rp.style = "display: inline-block; padding-right: 5px;";
    rp.innerHTML = "Rp";
    newCell.appendChild(rp);
    var price = e.getElementsByTagName('div')[1].innerHTML;
    var p  = document.createElement("p");
    p.style = "display: inline-block;";
    p.className = "price";
    p.innerHTML = price;
    newCell.appendChild(p);
    var hp  = document.createElement("p");
    hp.className = "ogprice";
    hp.style = "display: none;"
    hp.innerHTML = price;
    newCell.appendChild(hp);
}
</script>