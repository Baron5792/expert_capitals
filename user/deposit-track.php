<?php
    include __DIR__ . "/../database.php";

    if (isset($_GET['transaction-id']) && isset($_GET['user'])) {
        $transactionId = $_GET['transaction-id'];
        $userId = $_GET['user'];

        $sql = mysqli_query($connection, "INSERT INTO deposit_track (userId, transactionId) VALUES ('$userId', '$transactionId')");
        if ($sql) {
            header('location: ' . URL . "user/deposit.php?transaction=$transactionId");
        }

        else {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }






