
    <?php
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
    
    
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if ($username == "admin" && $password == "admin") {
            header("Location: admin_page.php");
            exit;
        } else {
            // $error = urlencode("Invalid username or password!");
            // header("Location: login.php?error=$error");
            // exit;
            echo "<h1>INVALID USERNAME AND PASSWORD</h1>";

        }
    }
    ?>