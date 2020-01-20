<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Receipt/Invoice</title>
</head>
<style>
    @font-face {
        font-family: ourFond;
        src: url(LobsterTwo-Regular.ttf);
        font-weight: bold;
    }
    @font-face {
        font-family: receipt;
        src: url('merchant_copy/Merchant Copy.ttf');
    }
    a {
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
    a:hover, a:active {
        background-color: #3456eb;
    }
    .back{
            border-radius : 10px;
            display: inline-block;
    }
    .title {
            font-weight: bold;
            font-family: ourFond;
            font-size: 40px;
            display: inline-block;
            position: relative;
            left: 45%;
            /* transform: translateX(-50%); */
    }
    #invoice {
        /* width: 400px; */
        padding: 5% 0 0 0;
        margin: 0 auto;
    }
    p {
        font-family: receipt;
        /* font-size: 30px; */
        font-size: 80px;
    }
</style>
<body>
    <div class = "back">
        <a href="../index.php"><i class="fa fa-arrow-left"></i></a>    
    </div>
    <p class="title">Invoice</p>
    <div id="invoice">
        <p style="text-align: center">Work in progress<br>try again later.</p>
        <!-- <p style="text-align: left">Staff</p> -->
    </div>
</body>
</html> 