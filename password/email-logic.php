<?php 
    include __DIR__ . '/../database.php';
    
    if (isset($_POST['email'])) {
        $id = $_POST['id'];
        $value = $_POST['value'];
    
        $query = mysqli_query($connection, "SELECT * FROM reset WHERE user_id= '$id' ORDER BY date DESC LIMIT 1");
        
        if (mysqli_num_rows($query) == 1) {
            $details = mysqli_fetch_assoc($query);
            $verification_code = $details['code'];
            $uniqId = $details['uniqId'];
            
            if ($verification_code !== $value) {
                $_SESSION['email'] = "Incorrect verification code, please try again!!";
                header('location: ' . URL . 'password/email.php');
            }
            
            else {
                $_SESSION['success'] = "Congratulations, you can now create a new password!!";
                header("location: " . URL . "password/verify.php?reset=$uniqId");
            }
        }
        
        else {
            $_SESSION['email'] = "No user record found";
            header('location: ' . URL . 'password/reset.php');
        }

    }
    
    else {
        header('location: ' . URL . 'password/reset.php');
    }
    


