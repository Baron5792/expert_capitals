<?php
    include(__DIR__ . "/../database.php");

    if (isset($_POST['submit'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $country = $_POST['country'];
        $featured = $_POST['featured'];
        $star = $_POST['star'];
        $avatar = $_FILES['avatar'];
        $occupation = $_POST['occupation'];
        $email = $_POST['email'];
        
        
        if (empty($firstname) || empty($lastname) || empty($country) || empty($avatar['name']) || empty($occupation) || empty($email)) {
            $_SESSION['error'] = "All fields are required to proceed";
        }
        
        else {
            $avatarName = $time . $avatar['name'];
            $tmp_name = $avatar['tmp_name'];
            $destination = __DIR__ . "/../assets/images/sponsors/" . $avatarName;
    
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $extension = explode('.', $avatarName);
            $extension = end($extension);
            
            if (in_array($extension, $allowedExtensions)) {
                if(move_uploaded_file($tmp_name, $destination)) {
                    // check if is featured
                    if ($featured == 1) {
                        // remove every featured post and make featured 
                        // insert into table
                        $update = mysqli_query($connection, "UPDATE ambassador SET featured= '0'");
                        if ($update) {
                            $insert = mysqli_query($connection, "INSERT INTO ambassador (firstname, lastname, occupation, country, star, featured, status, avatar, email) VALUES ('$firstname', '$lastname', '$occupation', '$country', '$star', '$featured', '0', '$avatarName', '$email')");
                            if ($insert) {
                                $_SESSION['success'] = "Congrats, an ambassador has been created and featured successfully";
                                header('location: ' . URL . "admin/ambassadors.php");
                            }
                            
                            else {
                                $_SESSION['error'] = "Error during the insertion of the featured";
                            }
                        }
                        else {
                            $_SESSION['error'] = "Error during the update of featured";
                        }
                    }
                    
                    else {
                        // if not featured
                        $insert = mysqli_query($connection, "INSERT INTO ambassador (firstname, lastname, occupation, country, star, featured, status, avatar, email) VALUES ('$firstname', '$lastname', '$occupation', '$country', '$star', '$featured', '0', '$avatarName', '$email')");
                        if ($insert) {
                            $_SESSION['success'] = "Congrats, an ambassador has been created and is un-feautured successfully";
                            header('location: ' . URL . "admin/ambassadors.php");
                        }
                        else {
                            $_SESSION['error'] = "Error during the insertion of the un-feautured";
                        }
                    }
                }
                
                else {
                    $_SESSION['error'] = "An error occured during the files upload, please try again";
                }
            }
            
            else {
                $_SESSION['error'] = "file isnt a picture";
            }
            
        }
        
        if (isset($_SESSION['error'])) {
            $_SESSION['error-data'] = $_POST;
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
        
    }
    
    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }