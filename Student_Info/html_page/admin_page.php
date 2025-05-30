<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #28468c;
            margin-bottom: 20px;
        }

        .box {
            padding: 20px;
            border: 2px solid #28468c;
            height: 90vh;
            width: 90vw;
            max-width: 1200px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0px 3px 9px rgba(40, 70, 140, 0.5);
            background-color: #fff;
        }

        .box1 {
            width: 60%;
        }

        .box2 {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            width: 30%;
        }

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

        button {
            height: 6vh;
            width: 100%;
            max-width: 200px;
            border-radius: 2vw;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: large;
            font-weight: 700;
            margin: 10px 0;
            background-color: #28468c;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Admin Page!</h1>
    <div class="box">
        <div class="box1">
            <?php
            $con = mysqli_connect('localhost:3306', 'root', '', 'cse35');

            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            $sql = "SELECT * FROM `std`;";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>Roll No</th><th>Name</th><th>Age</th><th>Section</th><th>Class</th><th>CGPA</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["roll"] . "</td><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["section"] . "</td><td>" . $row["class"] . "</td><td>" . $row["cgpa"] . "</td></tr>";
                }   
                echo "</table>";
            } else {
                echo "0 results";
            }

            $con->close();
            ?>
        </div>
        <div class="box2">
            <button onclick="window.location.href='AddStudent.html';">Add Details</button>
            <button onclick="window.location.href='update_student.html';">Update Details</button>
            <button onclick="window.location.href='student_delete.html';">Delete Details</button>
        </div>
    </div>
</body>
</html>