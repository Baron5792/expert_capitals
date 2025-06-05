<?php
    include __DIR__ . "/../database.php";
    
    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $balance = $_POST['balance'];
        $balance = $_POST['balance'];
        $interest = $_POST['interest'];
        $admin = $_POST['admin'];
        $phone = $_POST['phone'];
        
        $update = mysqli_query($connection, "UPDATE users SET firstname= '$firstname', lastname= '$lastname', balance= '$balance', interest= '$interest', admin= '$admin', phone= '$phone' WHERE id= '$userId'");
        if ($update) {
            $_SESSION['success'] = "User has been updated successfully";
            header('location: ' . URL . "admin/manage-users.php");
        }
        
        else {
            $_SESSION['error'] = "Error during update please try again later";
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    
    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }