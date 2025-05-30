<html>
    <body>
        
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $section = $_POST['section'];
    $class = $_POST['class'];
    $cgpa = $_POST['cgpa'];

    $con = mysqli_connect('localhost:3306', 'root', '', 'cse35');

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "UPDATE `std` SET `name`=?, `age`=?, `section`=?, `class`=?, `cgpa`=? WHERE `roll`=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sissds", $name, $age, $section, $class, $cgpa, $roll);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }

    $stmt->close();
    $con->close();
}
?>
<button class="btn-back" onclick="window.location.href='admin_page.php';">
        ⬅ Go Back
    </button>
</body>
</html>