<?php
    include "../database.php";
    
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $update = mysqli_query($connection, "UPDATE kyc SET status= 'accepted' WHERE id= '$id'");
        if ($update) {
            // update the KYC track of the users table
            // fetch users id
            $query = mysqli_query($connection, "SELECT * FROM kyc WHERE id= '$id'");
            if (mysqli_num_rows($query) == 1) {
                $data = mysqli_fetch_assoc($query);
                $userId = $data['userId'];
                
                $stmt = mysqli_query($connection, "UPDATE users SET kyc_track= '1' WHERE id= '$userId'");
                if ($stmt) {
                    // send email
                    $_SESSION['success'] = "KYC has been accepted successfully";
                    header('location: ' . URL . "admin/kyc.php");
                }
                else {
                    $_SESSION['error'] = "Error during kyc update";
                }
            }
            
            else {
                $_SESSION['error'] = "Error occured while fetching user, check to confirm if user still exist";
            }
                
        }
        
        else {
            $_SESSION['error'] = "error 404";
        }
    }
    
    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }