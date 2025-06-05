<?php
    include __DIR__ . "/../database.php";
    
    if (isset($_POST['verify'])) {
        $userId = $_POST['userId'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $resetId = $_POST['resetId'];
        
        
        if (strlen($password) < 5) {
            $_SESSION['error'] = 'Password length must be more than 5 characters';
        }
        
        elseif ($password !== $confirm_password) {
            $_SESSION['error'] = "Passwords do not match, please try again";
        }
        
        else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = mysqli_query($connection, "UPDATE users SET password= '$hashed_password' WHERE id= '$userId'");
            
            if ($query) {
                $_SESSION['register-success'] = "Password has been successfully updated you can now log in";
                header('location: ' . URL . 'login.php');
            }
            
            else {
                $_SESSION['error'] = "Password wasn't updated, try again";
                header('location: ' . URL . 'password/verify.php');
            }
        
        }
        
        if (isset($_SESSION['error'])) {
            $_SESSION['error-data'] = $_POST;
            header('location: ' . URL . "password/verify.php?reset=$resetId");
            die();
        }
        
    }
    
    else {
        header('location: ' . URL . 'password/verify.php');
    }