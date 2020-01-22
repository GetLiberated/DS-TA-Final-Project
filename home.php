<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>MySQL Final Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-image: url("BGImage.jpg");
            padding: 25px;
            background-repeat: no-repeat;
            background-size: auto;
            cursor: url(cursor.png), auto;
            
        }
/* filter: saturate(3); 
filter: grayscale(200%); 
filter: contrast(160%); 
filter: brightness(0.25); 
filter: blur(4px); 
filter: invert(100%); 
filter: sepia(100%); 
filter: hue-rotate(180deg); 
filter: opacity(40%);  */
            /*Filter styles*/

        
        
            
        .Menu {
            /* height: 100%; */
            color: blue;
            text-align: center;
            display: table;
            margin: auto;
            display: table;
            margin: 0 auto;
            vertical-align: middle; 
            position: relative;
            /* left: 1000x; */
            /* /* border: 3px solid #73AD21; */
        }
        a {
            background-color: #008000;
            float:center;
            color: white;
            padding: 14px 25px;
            text-align: center; 
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            font-family: monospace;
            border-radius: 5px;
            font-size: 30px;
            margin-left: 20px;
            margin-top : 20px;
            position:relative;
            border: 1px solid #73AD21;
        }

        a:hover, a:active {
            background-color: #006400;
        }
        
        h1 {
            display:inline-block;
            color : black;
            text-align: left;
            font-weight: bold;
            font-family: ourFond;
            font-size: 80px;
            margin: 7.5px 10px;
        }
        h2{
            float:right;
            display:inline-block;
            font-family : ourFond;
            color : #228B22;
            text-align: center;
            font-weight: bold;
            font-size:50px;
            border-radius: 5px;
            margin: 7.5px 10px;
            

        }
        #icon i{
            color: red;
        }
    </style>
</head>
<body>
    
    <!-- <img src="BGImage.jpg" alt="BackGroundImage" height = "1280" widght = "720"> -->
    


        
  
    <h1>Database TA</h1><h2>WINGSTOP</h2> 
    <div id= "icon" class="w3-padding w3-xlarge w3-teal">
        <i class="fa fa-bars" ></i>
        <i class="fa fa-close"></i>
        <i class="fa fa-arrow-left"></i>
        <i class="fa fa-search"></i>
        <i class="fa fa-refresh"></i>
        <i class="fa fa-arrow-right"></i>


    </div>
    <div class = "Menu"> 
        <br><br><br><br><br><br><br>
        <a href="address/address.php">Address</a>
        <a href="transaction/transaction.php">Transaction</a>
        <a href="restaurant/restaurant.php">Restaurant</a>
        <br>
        <a href="staff/staff.php">Staff</a>
        <a href="Item/item.php">Item</a>
        <a href="transactionDetail/transactionDetail.php">Transaction Detail</a>
        <br>
        <a href="receipt/receipt.php">Receipt</a>
        <a href="new order/new order.php">New Order</a>
        <a href="payment/payment.php">Payment</a>
        <br><br><br>
        <!-- <p><i class="w3-jumbo w3-spin fa fa-home"></i></p> -->
        
    </div>
</body>
</html>