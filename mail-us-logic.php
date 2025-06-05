<?php
    include __DIR__ . "/./database.php";
    
    if (isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name']);
        $userId = $_POST['userId'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = htmlspecialchars($_POST['message']);
        
        if (empty($name) || empty($email) || empty($message)) {
            $_SESSION['mail-error'] = "All fields are required to proceed, please try again later";
        }
        
        else {
            $insert = mysqli_query($connection, "INSERT INTO mail (userId, name, email, subject, message) VALUES ('$userId', '$name', '$email', '$subject', '$message')");
            if ($insert) {
                $_SESSION['mail-success'] = "Congratulations, your mail has been sent successfully. Our team would review this and give you a feedback shortly.";
                header('location: ' . URL . "mail-us.php");
            }
            
            else {
                $_SESSION['mail-error'] = "An error occured, please try again";
            }
        }
        
        if (isset($_SESSION['mail-error'])) {
            $_SESSION['mail-data'] = $_POST;
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    
    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }