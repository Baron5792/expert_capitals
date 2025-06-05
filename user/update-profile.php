<?php
    include __DIR__ . "/../database.php";

    if (isset($_POST['submit'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $userId = $_POST['userId'];

        if (empty($firstname) || empty($lastname)) {
            $_SESSION['profile-error'] = "All fields are required to proceed, please try again";
        }

        else {
            $update = mysqli_query($connection, "UPDATE users SET firstname= '$firstname', lastname= '$lastname', gender= '$gender', address= '$address' WHERE id= '$userId'");
            if ($update) {
                $_SESSION['success'] = [
                    'title' => 'Profile Update',
                    'html' => 'Your profile has been successfully updated',
                    'icon' => 'success'
                    ];
                header('location: ' . $_SERVER['HTTP_REFERER']);
            }

            else {
                $_SESSION['profile-error'] = "Error 404, please try again";
            }
        }

        if (isset($_SESSION['profile-error'])) {
            $_SESSION['profile-data'] = $_POST;
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }