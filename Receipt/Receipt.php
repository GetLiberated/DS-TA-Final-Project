<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,900,700,600,200">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,900,700,600,200'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css">
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
    @font-face {
        font-family: receipt-wide;
        src: url('merchant_copy/Merchant Copy Wide.ttf');
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
    #select {
            /* background-color: #b8b8b8;
            color: white; */
            display: inline-block;
            font-size: 30px;
            margin: 45px 5px;
            float: right;
    }
    #invoice {
        width: 600px;
        padding: 2.5% 0 0 0;
        margin: 0 auto;
    }
    #normal {
        font-family: receipt;
        font-size: 30px;
        margin: 0
    }
    #wide {
        font-family: receipt-wide;
        font-size: 30px;
        margin: 0
    }
</style>
<body>
    <div class = "back">
        <a href="../home.php"><i class="fa fa-arrow-left"></i></a>    
    </div>
    <p class="title">Invoice</p>
    <div class="wrapper typo">Transaction ID:
        <div class="list">
            <?php
                $id = $_GET["id"];
                if ($id == '') {
                    $id = 1;
                }
                echo '<span class="placeholder">'.$id.'</span>';
            ?>
            <ul class="list__ul">
                <?php
                    $id = $_GET["id"];
                    if ($id == '') {
                        $id = 1;
                    }
                    $connect = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
                    $query = "SELECT transactionID FROM Transaction ORDER BY transactionID";
                    $result = mysqli_query($connect, $query);
                    $output = '';
                    if(mysqli_num_rows($result) != 0)
                    {
                        while($row = mysqli_fetch_array($result)) {
                            $output .= '
                                        <form id="form-'.$row["transactionID"].'" action="" method="GET">
                                            <li>
                                                <a href="#" onclick="document.getElementById(\'form-'.$row["transactionID"].'\').submit();">
                                                    <input type="hidden" name="id" value="'.$row["transactionID"].'">'.$row["transactionID"].'</input>
                                                </a>
                                            </li>
                                        </form>
                                        ';
                        }
                        echo $output;
                    }
                    else
                    {
                        echo 'Data Not Found';
                    }
                ?>
            </ul>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <?php
        $id = $_GET["id"];
        if ($id == '') {
            $id = 1;
        }
        $connect = mysqli_connect("dbta.1ez.xyz", "MUH7052", "8qlnrwkp", "8_groupDB");
        $query = "SELECT *, Payment.name AS pname FROM Transaction
                    INNER JOIN Payment ON Transaction.paymentID = Payment.paymentID
                    INNER JOIN Staff ON Transaction.staffID = Staff.staffID
                    INNER JOIN Restaurant ON Staff.restaurantID = Restaurant.restaurantID
                    INNER JOIN Address ON Restaurant.addressID = Address.addressID
                    WHERE Transaction.transactionID = ".$id."";
        $result = mysqli_query($connect, $query);
        $output = '';
        $date = '';
        $income = 0;
        $paymentName = '';
        $tax = 0;
        if(mysqli_num_rows($result) != 0)
        {
            $row = mysqli_fetch_array($result);
            $date = $row["date"];
            $output .= '
                        <div id="invoice">
                            <p id="normal" style="text-align: center">WINGSTOP '.$row["location"].'</p>
                            <p id="normal" style="text-align: center">FX Lifestyle Center</p>
                            <p id="normal" style="text-align: center">'.$row["streetName"].'</p>
                            <p id="normal" style="text-align: center">Telp '.$row["phone"].'</p>
                            <p id="normal" style="text-align: center">'.$row["city"].'</p>

                            <p id="normal" style="text-align: left">'.$row["staffID"].' '.$row["name"].'</p>
                            <p id="normal" style="text-align: right">WS#:   1001</p>
                            <p id="normal">--------------------------------------------------------</p>
                            <p id="normal" style="display: inline-block;">CHK '.$row["transactionID"].'</p>
                            <p id="normal" style="float: right; display: inline-block;">'.$row["customer"].'</p>
                            <p id="normal" style="text-align: center">'.$date.'</p>
                            <p id="normal">--------------------------------------------------------</p>
                            <p id="wide" style="text-align: center">Dine In</p>
                            <div style="margin-left: 10px;">
                        ';
            echo $output;
            $income = $row["income"];
            $paymentName = $row["pname"];
            $tax = $row["tax"];
        }
        else
        {
            echo 'Data Not Found';
        }
        $query = "SELECT Item.*, COUNT(*) c FROM TransactionDetail
                    INNER JOIN Item ON TransactionDetail.itemID = Item.id
                    WHERE TransactionDetail.transactionID = ".$id."
                    GROUP BY TransactionDetail.itemID";
        $result = mysqli_query($connect, $query);
        $output = '';
        if(mysqli_num_rows($result) != 0)
        {
            $food = 0;
            $beverage = 0;
            $total = 0;
            while($row = mysqli_fetch_array($result)) {
                $output .= '
                                <p id="normal" style="display: inline-block; word-wrap: break-word; width: 300px;">'.$row["c"].' '.$row["foodName"].' '.$row["description"].'</p>
                                <p id="normal" style="float: right; display: inline-block;">'.($row["price"]*$row["c"]).'</p>
                            ';
                $total += ($row["price"]*$row["c"]);
                if ($row["category"] == "food") {
                    $food += ($row["price"]*$row["c"]);
                } else {
                    $beverage += ($row["price"]*$row["c"]);
                }
            }
            $totalTax = ($total*$tax)/100;
            $output .= '
                            <div style="margin-left: 20px;">
                            <p id="normal" style="display: inline-block; word-wrap: break-word; width: 300px;">'.$paymentName.'</p>
                            <p id="normal" style="float: right; display: inline-block;">Rp'.number_format($income).'</p>
                            <p id="normal" style="text-align: left">'.rand(100000,999999).'</p>
                            <br>
                            <p id="normal" style="display: inline-block;">Food</p>
                            <p id="normal" style="float: right; display: inline-block;">Rp'.number_format($food)."<br>".'</p>
                            <br>
                            <p id="normal" style="display: inline-block;">Beverage</p>
                            <p id="normal" style="float: right; display: inline-block;">Rp'.number_format($beverage)."<br>".'</p>
                            <br>
                            <p id="normal" style="display: inline-block;">PB1</p>
                            <p id="normal" style="float: right; display: inline-block;">Rp'.number_format($totalTax)."<br>".'</p>
                            <br>
                            </div>
                            </div>
                            <p id="wide" style="display: inline-block;">Total</p>
                            <p id="wide" style="float: right; display: inline-block;">Rp'.number_format($total+$totalTax)."<br>".'</p>
                            <br>
                            <p id="wide" style="display: inline-block;">Change Due</p>
                            <p id="wide" style="float: right; display: inline-block;">Rp'.number_format($income-$total)."<br>".'</p>
                            <br>
                            <br>
                            <p id="normal">-----------------------Check Closed---------------------</p>
                            <p id="normal" style="text-align: center">'.$date.'</p>
                            <br>
                            <p id="normal" style="text-align: center">Thank You! Tell us how we did today</p>
                            <p id="normal" style="text-align: center">Take our Guest Survey at:</p>
                            <p id="normal" style="text-align: center">www.mywingstopsurveyidn.com</p>
                            <p id="normal" style="text-align: center">within 5 days to receive</p>
                            <p id="normal" style="text-align: center">FREE MUSHROOM FRITTERS on your next</p>
                            <p id="normal" style="text-align: center">combo purchase</p>
                            <p id="normal" style="text-align: center">Write your validation code below:</p>
                            <br>
                            <br>
                            <p id="normal" style="text-align: center">――――――――――――――――</p>
                            <p id="normal" style="text-align: center">*The Free Offers expires 30 days from</p>
                            <p id="normal" style="text-align: center">the date on this receipt</p>
                            <p id="normal" style="text-align: center">Follow us on</p>
                            <p id="normal" style="text-align: center">Instagram, FB, Twitter @WingstopID</p>
                            <p id="normal" style="text-align: center">Delivery Thru GO-FOOD</p>
                        ';
            echo $output;
        }
        else
        {
            echo 'Data Not Found';
        }
        echo '</div>';
        mysqli_close($connect);
    ?>
</body>
</html>