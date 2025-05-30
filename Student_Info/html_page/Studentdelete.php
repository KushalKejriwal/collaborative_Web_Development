<html>
    <body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll = $_POST['roll'];

    $con = mysqli_connect('localhost:3306', 'root', '', 'cse35');

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "DELETE FROM `std` WHERE `roll` = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $roll);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
        
    } else {
        echo "Error deleting record: " . $con->error;
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
