<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        .btn-back {
            background-color: #007BFF;
            color: white;
            padding: 12px 24px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        $con = mysqli_connect('localhost:3306', 'root', '', 'cse35');

        $txtroll = $_POST['rollNo'];
        $txtname = $_POST['name'];
        $age = $_POST['age'];
        $section = $_POST['section'];
        $class = $_POST['class'];
        $cgpa = $_POST['cgpa'];

        $sql = "INSERT INTO `std` (`roll`, `name`, `age`, `section`, `class`, `cgpa`) VALUES ('$txtroll', '$txtname', '$age', '$section', '$class', '$cgpa')";

        $rs = mysqli_query($con, $sql);

        if ($rs) {
            echo "<h2>Student Record Inserted Successfully</h2>";
        } else {
            echo "<h2 style='color:red;'>Error Inserting Record</h2>";
        }
    ?>

    <button class="btn-back" onclick="window.location.href='AddStudent.html';">
        ⬅ Go Back
    </button>
</body>
</html>
