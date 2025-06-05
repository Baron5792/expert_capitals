<?php
    include __DIR__ . "/../database.php";

    if (isset($_GET['userId']))  {
        $userId = $_GET['userId'];
        $update = mysqli_query($connection, "UPDATE users SET avatar= '' WHERE id= '$userId'");
        if ($update) {
            $_SESSION['success'] = [
                'title' => 'Success',
                'html' => 'Your avatar has been deleted successfully!',
                'icon' => 'success'
            ];
            header('location: ' . URL . "user/profile.php");
        }

        else {
            $_SESSION['profile-error'] = "Error deleting avatar. Please try again later";
        }

        if (isset($_SESSION['profile-error'])) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
