<html>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #28468c;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <body>
    <?php

session_start();
    
    if ($_SERVER['REQUEST_METHOD'] =='POST') {

        $roll = $_POST['roll'];
            $con = mysqli_connect('localhost:3306', 'root', '', 'cse35');

            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            $sql = "SELECT * FROM `std` WHERE `roll` = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $roll);
    $stmt->execute();
    $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table><tr><th>Roll No</th><th>Name</th><th>Age</th><th>Section</th><th>Class</th><th>CGPA</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["roll"] . "</td><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["section"] . "</td><td>" . $row["class"] . "</td><td>" . $row["cgpa"] . "</td></tr>";
                }   
                echo "</table>";
                exit;
            } else {
                echo "0 results";
            }

            $con->close();
        }
            ?>
    </body>
</html>