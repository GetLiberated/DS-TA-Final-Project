<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta phone="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="dist/jquery.tabledit.js"></script>
    <title>Restaurant Database</title>
    <style>
        body {  
            background: linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.8)), url("logo1.jpg");
            background-repeat: no-repeat;
            background-size: auto;
            background-position:top left;        
        }
    @font-face {
            font-family: ourFond;
            src: url(LobsterTwo-Regular.ttf);
            font-weight: bold;
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
            margin: 45px 5px;
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
            table-layout: fixed;
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
        .title {
            font-weight: bold;
            font-family: ourFond;
            font-size: 40px;
            display: inline-block;
            position: relative;
            left: 45%;
            transform: translateX(-50%);
        }
        input {
            width: 100%;
            height: 50px;
            font-size: 25px;
        }
        .back{
            display: inline-block;
        }
        #search_button{
            background-color: #b8b8b8;
            color: white;
            padding: 13px 25px;
            text-align: center; 
            text-decoration: none;
            display: inline-block;
            /* font-weight: bold; */
            /* font-family: monospace; */
            border-radius: 5px;
            font-size: 24.8px;
            margin: 45px 5px;
            float: right;
            
        }
        #search_button:hover{
            background-color: #8a8a8a;
        }

        #search_icon{
            float: right;
            display: inline-block;
            width: 100%; 
            margin-bottom: 10px; 
            

        }
        .form-control {
            font-size:14px;
        }
        .input-group{
            display :none;
            /* visibility: hidden;   */
        }

    </style>
</head>
<body>
    <p id="debug"></p>
    <div class = "back">
        <a href="../index.php"><i class="fa fa-arrow-left"></i></a>
    </div>
    <p class="title">Restaurant Database</p>
    <button onclick="Search()" class="fa fa-search" id="search_button"  ></button>
    <button onclick="editDatabase()" class="edit">Edit</button>

    <div class= "input-group" id = "inputGroup">
        <!-- <i class="fa fa-search" id = "search_icon"></i> -->
        <input class="form-control" id="search" type="search_text" placeholder="Search for Keywords..">      
    </div>
    
    <br><br>
    <table id ="database"> 
        <tr>
            <th width="8%"></th>
            <th width="10%">Restaurant ID</th>
            <th width="24%">Phone Number</th>
            <th width="10%">Address ID</th>
            <th width="18%">Open Hours</th>
            <th width="15%">Genre</th>
            <th width="15%">Tax</th>
        </tr>
        <?php
            $id = $_GET["id"];

            $conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            $sql = "DELETE FROM Restaurant WHERE id=" . $id;

            if ($id != "") $conn->query($sql);

            $conn->close();
        ?>
        <?php
                $phone = $_GET["phone"];
                $addressID = $_GET["addressID"];
                $openHours = $_GET["openHours"];
                $genre = $_GET["genre"];
                $tax = $_GET["tax"];
   

                $conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                $sql = "INSERT INTO Restaurant (phone, addressID, openHours, genre, tax)
                VALUES (\"" . $phone . "\",\"" . $addressID . "\",\"" . $openHours . "\",\"" . $genre . "\",\"". $tax . "\")";

                if ($phone != "") $conn->query($sql);

                $conn->close();
            ?>
        <?php
            $conn = mysqli_connect("dbta.1ez.xyz", "LIV6384", "dfjjssgm", "8_groupDB");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM Restaurant";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td><form action=\"\" method=\"GET\"><input type=\"hidden\" phone=\"id\" value=\"" . $row["id"] . "\"><input class=\"delete\" type=\"submit\" value=\"-\"></form></td><td>" . $row["restaurantID"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["addressID"]. "</td><td>" . $row["openHours"]. "</td><td>" . $row["genre"]."</td><td>" .$row["tax"]. "</td></tr>";
                }
                // echo "</table>";
            } else { echo '<script type="text/javascript"> editDatabase(); </script>'; }
            $conn->close();
        ?>
    </table>
    <form action="" method="GET" id="insertForm" style="visibility: hidden;">
        <table id="inserTable">
            <tr>
                <th width="8%"></th>
                <th width="10%"></th>
                <th width="24%"><input type="text" name="phone" required></th>
                <th width="10%"><input type="number" name="addressID" required></th>
                <th width="18%"><input type="text" name="openHours" required></th>
                <th width="15%"><input type="text" name="genre" required></th>
                <th width="15%"><input type="number" name="tax" required></th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
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
            
            var searchInput = document.getElementById("inputGroup");
            searchInput.style.display= 'none';    
            var searchButton = document.getElementById("search_button");
            searchButton.style.visibility = 'hidden';
               
            if (table.rows.length != 1) {
                var visible = false;
                var x = document.getElementsByClassphone('delete');
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
                else { 
                    document.getElementById("insertForm").style.visibility = 'visible'; 
                    $(document).ready(function(){
                        $('#database').Tabledit({
                            deleteButton: false,
                            editButton: false,   		
                            columns: {
                                identifier: [1, 'restaurantID'],                    
                                editable: [[2, 'phone'], [3, 'addressID'], [4, 'openHours'], [5, 'genre'], [6, 'tax']]
                            },
                            hideIdentifier: false,
                            url: 'live_edit.php'		
                        });
                    });
                }
            }
        }
        function Search() {
            var searchInput = document.getElementById("inputGroup");
            searchInput.style.display= 'unset';        
        }
    </script>
</body>
</html>

<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#database').html(data);
			}
		});
	}
	
	$('#search').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>