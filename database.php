<?php
    session_start();
    define("URL", "http://localhost/expert_capitals/");

    define("DB_host", "localhost");
    define("DB_user", "root");
    define("DB_pass", "");
    define("DB_name", "expert_capitals");

    $connection = mysqli_connect(DB_host, DB_user, DB_pass, DB_name);

    if (!$connection) {
        echo "Error: " . mysqli_connect_error();
    }

    if (isset($_GET['logout'])) {
        $logout = $_GET['logout'];
        if ($logout == 1) {
            session_destroy();
            unset($_SESSION['user']);
            header('location: ' . URL . 'login.php');
        }
    }

