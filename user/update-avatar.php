<?php
    include __DIR__ . "/../database.php";

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $avatar = $_FILES['profileImage'];
        $avatarTmpName = $avatar['tmp_name'];
        $avatarSize = $avatar['size'];
        $avatarError = $avatar['error'];
        $errors = [];

        if (empty($avatar['name'])) {
            $errors[] = "An avatar is required to proceed";
        }

        else {
            $time = time();
            $avatarName = $time . $avatar['name'];
            $destination = __DIR__ . "/../assets/images/avatar/" . $avatarName;

            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $extension = explode('.', $avatarName);
            $extension = end($extension);

            if (in_array($extension, $allowedExtensions)) {
                if ($avatarSize < 6000000) {
                    move_uploaded_file($avatarTmpName, $destination);
                    $update = mysqli_query($connection, "UPDATE users SET avatar= '$avatarName' WHERE id= '$userId'");
                    if ($update) {
                        $_SESSION['success'] = [
                            'title' => 'Avatar upload',
                            'html' => 'Your avatar has been successfully updated',
                            'icon' => 'success',
                            'confirmButtonColor' => 'green',
                        ];
                        header('location: ' . $_SERVER['HTTP_REFERER']);
                    }

                    else {
                        $errors[] = "Error 404, please try again";
                    }
                }

                else {
                    $errors[] = "Image size shouldn't exceed 6MB";
                }
            }

            else {
                $errors[] = "File should have a JPG, JPEG or PNG extension";
            }

        }

        if (!empty($errors)) {
            $_SESSION['error'] = [
                'title' => 'An error occured',
                'html' => '<p><span>' . implode('<span></span>', $errors) . '</span></p>',
                'icon' => 'error',
                'confirmButtonColor' => 'red',
            ];
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }