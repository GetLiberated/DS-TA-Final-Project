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
    </style>
</head>
<body>
    <div class="back">
        <a href="../index.php"><i class="fa fa-arrow-left"></i></a>    
    </div>
    <p class="title">New Order</p>
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
    newCell.appendChild(document.createTextNode('1'));

    // Insert a cell in the row at index 3
    var newCell  = newRow.insertCell(3);
    // Append nodes to the cell
    var price = e.getElementsByTagName('p')[1].innerHTML;
    newCell.appendChild(document.createTextNode(price));
}
</script>