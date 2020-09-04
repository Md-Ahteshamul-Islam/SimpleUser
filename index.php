<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "simpleuser";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM tbluser";
    $result = $conn->query($sql);


    ?>
    <h2>Add New People</h2>

        <form action="SaveToDB.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="fname" name="name"><br>
        <label for="age">Age:</label><br>
        <input type="text" id="txtage" name="age"><br><br>
        <input type="submit" value="Submit">
        </form> 
        <hr>
    <center><h1>List of People</h1></center>
    <table id="customers">
        <!-- <tr>
            <th colspan="3">
                <button><a href="form.php">Add New</a></button>
            </th>
        </tr> -->
    <table id="customers">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Action</th>
        </tr>
        <?php
                if ($result->num_rows > 0) {
                    $ID = 0;
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
                        $ID = $row["id"];
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["age"] . "</td>";
                        echo  "<td>";
                        echo  "<form action=\"deleteUser.php\" method=\"POST\">";
                        echo         "<input type=\"hidden\" name='id' value=\"$ID\">";
                        echo         "<input type=\"submit\" value=\"Delete\">";
                        echo  "</form>";
                        echo  "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
        <!-- <tr>
            <td>Alfreds Futterkiste</td>
            <td>Maria Anders</td>
           
        </tr> -->
    </table>

</body>

</html>

<?php
$conn->close();
?>