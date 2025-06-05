<?php
    include __DIR__ . "/../database.php";
    
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        
        // update the verify row in the users
        $update = mysqli_query($connection, "UPDATE users SET email_verify_track= '1' WHERE email= '$email'");
        if ($update) {
            echo "Congratulations, your email address has been successfully verified";
        }
        
        else {
            echo "An error occured, please try again later";
        }
    }