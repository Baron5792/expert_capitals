<?php
    include __DIR__ . "/../database.php";

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $image = $_FILES['image'];

        if (empty($image['name'])) {
            $_SESSION['error'] = "An image is required to proceed";
        }

        else {
            $time = time();
            $imageName = $time . $image['name'];
            $tmp_name = $image['tmp_name'];
            $avatarSize = $image['size'];
            $destination = "../assets/images/kyc/" . $imageName;

            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $extension = explode('.', $imageName);
            $extension = end($extension);

            if (in_array($extension, $allowedExtensions)) {
                if ($avatarSize < 6000000) {
                    move_uploaded_file($tmp_name, $destination);
                    $insert = mysqli_query($connection, "INSERT INTO kyc (userId, avatar, status) VALUES ('$userId', '$imageName', 'pending')");
                    if ($insert) {
                        // mail code
                        $_SESSION['success'] = [
                            'title' => 'KYC Verification',
                            'html' => 'Congratulations, your KYC awaits approval',
                            'icon' => 'success'
                            ];
                        header('location: ' . $_SERVER['HTTP_REFERER']);
                    }

                    else {
                        $_SESSION['error'] = "Error 404, please try again";
                    }
                }

                else {
                    $_SESSION['error'] = "Image size shouldn't exceed 6MB";
                }

            }

            else {
                $_SESSION['error'] = "An image is required to proceed";
            }
        }

        if (isset($_SESSION['error'])) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }