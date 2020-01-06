<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item Database</title>
    <style>
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
        button {
            background-color: Transparent;
            background-repeat: no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;
            outline:none;
        }
        .edit {
            background-color: #b8b8b8;
            color: white;
            padding: 14px 25px;
            text-align: center; 
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            font-family: monospace;
            border-radius: 5px;
            font-size: 20px;
            float: right;
        }
        .edit:hover {
            background-color: #8a8a8a;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
            border-radius: 5px;
        }
        th {
            background-color: #588c7e;
            color: white;
            padding: 15px;
        }
        td{padding: 15px}
        tr:nth-child(even) {background-color: #f2f2f2}
        .delete {
            cursor: pointer;
            color: #ff4040;
            visibility: hidden;
            font-size: 35px;
            background-color: Transparent;
            background-repeat: no-repeat;
            border: none;
            overflow: hidden;
            outline:none;
        }
        /* .delete:hover {background: #bbb;} */
        .submit {
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
            float: right;
            border: none;
            cursor: pointer;
        }
        .submit:hover {
            background-color: #009e05;
        }
    </style>
</head>
<body>
    <p id="debug"></p>
    <a href="index.php">Back</a>
    <button onclick="editDatabase()" class="edit">Edit</button>
    <br><br>
    <table id ="database"> 
        <tr>
            <th></th>
            <th>Food Name</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
        <?php
            $id = $_GET["id"];

            $conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            $sql = "DELETE FROM Item WHERE id=" . $id;

            if ($id != "") $conn->query($sql);

            $conn->close();
        ?>
        <?php
                $foodName = $_GET["foodName"];
                $price = $_GET["price"];
                $description = $_GET["description"];
                
                

                $conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                $sql = "INSERT INTO Item (foodName, price, description)
                VALUES (\"" . $foodName . "\",\"" . $price . "\",\"" . $description. "\")";

                if ($foodName != "") $conn->query($sql);

                $conn->close();
            ?>
        <?php
            $conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM Item";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td><form action=\"\" method=\"GET\"><input type=\"hidden\" name=\"id\" value=\"" . $row["id"] . "\"><input class=\"delete\" type=\"submit\" value=\"-\"></form></td><td>" . $row["foodName"]. "</td><td>" . $row["price"]. "</td><td>" . $row["description"].  "</td></tr>";
                }
                // echo "</table>";
            } else { echo '<script type="text/javascript"> showAddRow(); </script>'; }
            $conn->close();
        ?>
    </table>
    <form action="" method="GET" id="insertForm" style="visibility: hidden;">
        <table id="inserTable">
            <tr>
                <th></th>
                <th><input type="text" name="foodName" required></th>
                <th><input type="number" name="price" required></th>
                <th><input type="text" name="description" required></th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th><input class="submit" type="submit" value="Submit"></th>
            </tr>
        </table>
    </form>
    <script>
        function editDatabase() {
            // document.getElementById("debug").innerHTML = "it works";
            var table = document.getElementById("database");
            if (table.rows.length != 1) {
                var visible = false;
                var x = document.getElementsByClassName('delete');
                for (var i = 0, length = x.length; i < length; i++) {
                    if (x[i].style.visibility === 'hidden' || x[i].style.visibility === '') {
                        visible = false;
                        x[i].style.visibility = 'visible';
                    } else {
                        visible = true;
                        x[i].style.visibility = 'hidden';
                    }
                }
                if (visible) { document.getElementById("insertForm").style.visibility = 'hidden'; }
                else { document.getElementById("insertForm").style.visibility = 'visible'; }
            }
        }
    </script>
</body>
</html>