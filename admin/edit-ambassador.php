<?php
    include(__DIR__ . "/../database.php");
    
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $star = $_POST['star'];
        $featured = $_POST['featured'];
        $status = $_POST['status'];
        
        if (empty($firstname) || empty($lastname) || empty($email) || empty($country) || empty($star)) {
            $_SESSION['error'] = "All fields are required to be proceed";
        }
        
        else {
            // fetch the previous post's details
            $fetch = mysqli_query($connection, "SELECT * FROM ambassador WHERE id= '$id'");
            if (mysqli_num_rows($fetch) == 1) {
                $data = mysqli_fetch_assoc($fetch);
                $db_featured = $data['featured'];
                
                // use current featured details
                if ($featured == 1) {
                    // make sure there's no other featured
                    $update = mysqli_query($connection, "UPDATE ambassador SET featured= '0'");
                    if ($update) {
                        // make it featured
                        $query = mysqli_query($connection, "UPDATE ambassador SET firstname= '$firstname', lastname= '$lastname', email= '$email', country= '$country', featured= '1', star= '$star', status= '$status' WHERE id= '$id'");
                        if ($query) {
                            $_SESSION['success'] = "Congrats, ambassador has been successfully updated";
                            header('location: ' . URL . "admin/ambassadors.php");
                        }
                        
                        else {
                            $_SESSION['error'] = "Error during first query, try again";
                        }
                    }
                    
                    else {
                        $_SESSION['error'] = "An error occured during the no-featured update";
                    }
                }
                
                else {
                    // check the previous status
                    if ($db_featured == 0) {
                        // check if the current is-featured
                        // make sure there's no other featured
                        $update = mysqli_query($connection, "UPDATE ambassador SET featured= '0'");
                        if ($update) {
                            // make it featured
                            $query = mysqli_query($connection, "UPDATE ambassador SET firstname= '$firstname', lastname= '$lastname', email= '$email', country= '$country', featured= '1', star= '$star', status= '$status' WHERE id= '$id'");
                            if ($query) {
                                $_SESSION['success'] = "Congrats, ambassador has been successfully updated";
                                header('location: ' . URL . "admin/ambassadors.php");
                            }
                            
                            else {
                                $_SESSION['error'] = "Error during first query, try again";
                            }
                        }
                    }
                    
                    else {
                        $_SESSION['error'] = "You can't un-feature a featured ambasssador, please create or make another ambasssador featured";
                    }
                }
            }
            
            else {
                $_SESSION['error'] = "No ambassador is found";
            }
        }
        
        if (isset($_SESSION['error'])) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    
    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }