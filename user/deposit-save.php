<?php
    include __DIR__ . "/../database.php";

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $amount = $_POST['amount'];
        $walletName = $_POST['walletName'];
        $uniqId = uniqid();
        
        if ($amount < 500) {
            $_SESSION['error'] = "Amount must be greater than $500";
        }

        else {
            $insert = mysqli_query($connection, "INSERT INTO pre_deposit (userId, walletName, uniqId, amount) VALUES ('$userId', '$walletName', '$uniqId', '$amount')");

            if ($insert) {
                header('location: ' . URL . "user/deposit-confirm.php?uniqid=$uniqId");
            }

            else {
                $_SESSION['error'] = "An error occured, please try again";
            }
        }

        if (isset($_SESSION['error'])) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }