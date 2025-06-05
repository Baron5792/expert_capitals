<?php
    include __DIR__ . "/../../database.php";

    if (isset($_POST['submit'])) {
        $regId = $_POST['regId'];
        $userId = $_POST['userId'];
        
        // Generate a random string of 70 characters (numbers, alphabets, and symbols)   // symbols here
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < 70; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        $insert = mysqli_query($connection, "INSERT INTO external_track (userId, uniqId, regId) VALUES ('$userId', '$randomString', '$regId')");
        if ($insert) {
            header('location: ' . URL . "user/transfer/external-transfer.php?uniq=$randomString");
        }   

        else {
            echo "Error: " . mysqli_error($connection);
        }



    }        

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }