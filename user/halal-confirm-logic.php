<?php
    include __DIR__ . "/../database.php";


    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $uniqId = uniqid();
        $amount = $_POST['amount'];
        $walletName = $_POST['walletName'];
        $walletId = $_POST['walletId'];
        $plan = $_POST['plan'];
        $hash = htmlspecialchars($_POST['hash']);

        if (empty($hash)) {
            $_SESSION['confirm-error'] = "A transaction hash is required to proceed";
        }

        else {
            $insert = mysqli_query($connection, "INSERT INTO halal (userId, uniqId, amount, walletName, walletId, plan, hash, status) VALUES ('$userId', '$uniqId', '$amount', '$walletName', '$walletId', '$plan', '$hash', 'pending')");
            if ($insert) {
                $_SESSION['confirm-success'] = "Thank you for completing the transaction. We'll review and confirm your investment shortly";
                header('location: ' . URL . "user/halal-history.php");
            }

            else {
                $_SESSION['confirm-error'] = "Error 404, please try again";
            }
        }

        if (isset($_SESSION['confirm-error'])) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }