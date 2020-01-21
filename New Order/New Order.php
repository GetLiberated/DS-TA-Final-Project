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
        #checkout {
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
            display:none;
        }
        #checkout:hover {
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
        .desc {
            background-color: #04cc0a;
            color: white;
            padding: 14px 25px;
            text-align: center; 
            font-weight: bold;
            font-family: monospace;
            border-radius: 5px;
            font-size: 18px;
        }
        .desc:hover {
            background-color: #009e05;
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
            font-weight: bold;
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

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 400px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            font-family: system-ui;
        }
        #descPopup .modal-content {
            width: 20% !important;
        }
        #checkoutPopup .modal-content {
            height: 20% !important;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .modal-content p {
            margin: 10px;
            font-family: system-ui;
            font-size: 70px;
            display: inline-block;
        }
        #payment {
            display: inline-block;
        }
        .modal-content input {
            font-family: system-ui;
            font-size: 24px;
            margin: 20px;
            padding: 20px;
            width: 40%;
        }
        #checkoutPopup .modal-content button {
            font-family: system-ui;
            font-size: 70px;
            color: red;
            margin: 20px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="back">
        <a href="../index.php"><i class="fa fa-arrow-left"></i></a>    
    </div>
    <p class="title">New Order</p>
    <button id="checkout">Checkout</button>
    <br>
    <table id="order">

    </table>
    <div class="menu">
    
    </div>

    <div id="descPopup" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <textarea id="descTextarea" rows="10" cols="50" placeholder="Enter description..."></textarea>
            <button onclick="submitDesc();">Done</button>
        </div>
    </div>

    <div id="checkoutPopup" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <br>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <p style="font-weight: bold;">Total</p>
                <p id="total" style="float: right;"></p>
                <p style="float: right; padding-right: 5px;">Rp</p>
                <br>
                <select name="paymentID" id="payment"></select>
                <input name="income" type="text" placeholder="How much customer payed">
                <br>
                <input name="customer" type="text" placeholder="Customer name">
                <input name="date" type="text" placeholder="Date">
                <br>
                <input type="submit">
            </form>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // collect value of input field
                    $income = htmlspecialchars($_REQUEST['income']);
                    $date = htmlspecialchars($_REQUEST['date']);
                    $staffID = 1;
                    $customer = htmlspecialchars($_REQUEST['customer']);
                    $paymentID = htmlspecialchars($_REQUEST['paymentID']);

                    $connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
                    $query = "
                            INSERT INTO Transaction (income, date, staffID, customer, paymentID)
                            VALUES ('".$income."','".$date."','".$staffID."','".$customer."','".$paymentID."')
                            ";
                    $result = mysqli_query($connect, $query);
                    mysqli_close($connect);
                }
            ?>
        </div>
    </div>
</body>
</html>

<script>
var rowDesc = '';
// Get the modal
var modal = document.getElementById("checkoutPopup");

// Get the button that opens the modal
var btn = document.getElementById("checkout");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  var table = document.getElementById('order');
  var total = 0;
  for (var i = 1, row; row = table.rows[i]; i++) {
    total += parseInt(row.cells[4].innerText.substring(2));  
  }
  document.getElementById("total").innerHTML = total;
}

// When the user clicks on <span> (x), close the modal
document.getElementsByClassName("close")[0].onclick = function() {
  modal.style.display = "none";
  document.getElementById("descPopup").style.display = "none";
}
document.getElementsByClassName("close")[1].onclick = function() {
  modal.style.display = "none";
  document.getElementById("descPopup").style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal || event.target == document.getElementById("descPopup")) {
    modal.style.display = "none";
    document.getElementById("descPopup").style.display = "none";
  }
}

function submitDesc() {
    rowDesc.innerHTML = document.getElementById("descTextarea").value;
    document.getElementById("descPopup").style.display = "none";
}

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
    load_payment();
	function load_payment(query)
	{
		$.ajax({
			url:"payment.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#payment').html(data);
			}
		});
	}
});
function order(e) {
    var checkout = document.getElementById("checkout");
    checkout.style.display = 'block';

    var tableRef = document.getElementById('order').getElementsByTagName('tbody')[0];
    
    // Insert a row in the table at the last row
    var newRow   = tableRef.insertRow();

    // Insert a cell in the row at index 0
    var newCell  = newRow.insertCell(0);
    // Append nodes to the cell
    var id = e.getElementsByTagName('div')[0].innerHTML;
    var hid  = document.createElement("p");
    hid.className = "id";
    hid.style = "display: none;";
    hid.innerHTML = id;
    newCell.appendChild(hid);
    var del  = document.createElement("button");
    del.innerHTML = "-";
    del.className = "delete";
    del.onclick = function () {
        var row = this.parentNode.parentNode;
        row.parentNode.removeChild(row);
        if (document.getElementById('order').rows.length === 1) {
            document.getElementById("checkout").style.display = 'none';
        }
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
    var descButton  = document.createElement("button");
    descButton.innerHTML = "Add/Edit";
    descButton.className = "desc";
    descButton.onclick = function() {
        document.getElementById("descPopup").style.display = "block";
        rowDesc = this.parentNode.getElementsByTagName("p")[0];
        document.getElementById("descTextarea").value = rowDesc.innerHTML;
    }
    newCell.appendChild(descButton);
    var desc  = document.createElement("p");
    desc.style = "display: none;";
    newCell.appendChild(desc);

    // Insert a cell in the row at index 4
    var newCell  = newRow.insertCell(4);
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
    hp.style = "display: none;";
    hp.innerHTML = price;
    newCell.appendChild(hp);
}
</script>