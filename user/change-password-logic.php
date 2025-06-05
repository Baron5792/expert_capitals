<?php
    include __DIR__ . "/../database.php";

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $current = htmlspecialchars($_POST['current']);
        $new = htmlspecialchars($_POST['new']);
        $confirm = htmlspecialchars($_POST['confirm']);
        $errors = [];

        if (empty($current) || empty($new) || empty($confirm)) {
            $errors[] = "Please fill every required field to proceed";
        }

        elseif ($new !== $confirm) {
            $errors[] = "Passwords have to match to proceed";
        }

        else {
            if (strlen($new) < 6) {
                $errors[] = "Password's length must exceed six characters";
            }

            else {
                $query = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                if ($query) {
                    $data = mysqli_fetch_assoc($query);
                    $db_password = $data['password'];

                    if (password_verify($db_password, $new)) {
                        $hashed = password_hash($new, PASSWORD_DEFAULT);
                        $update = mysqli_query($connection, "UPDATE password SET password= '$hashed' WHERE id= '$suerId'");
                        if ($update) {
                            // insert into password track table
                            $insert = mysqli_query($connection, "INSERT INTO password (userId) VALUE ('$userId')");
                            if ($insert) {
                                $_SESSION['success'] = [
                                    'title' => 'Success',
                                    'icon' => 'success',
                                    'html' => 'Congratulations, your password has been changed successfully',
                                    'confirmButtonColor' => 'green',
                                ];                                
                                header('location: ' . $_SERVER['HTTP_REFERER']);
                            }

                            else {
                                $errors[] = "Error during insertion, please try again";
                            }
                        }

                        else {
                            $errors[] = "Error 404 occured during update, please try again";
                        }
                    }

                    else {
                        $errors[] = "Current password doesnt match, please try again";
                    }
                }

                else {
                    $errors[] = "Error 404, please try again";
                }
            }
        }

        if (!empty($errors)) {
            $_SESSION['error'] = [
                'title' => 'An error occured',
                'icon' => 'error',
                'html' => '<p><span>' . implode('<span></span', $errors) . '</span></p>',
                'confirmButtonColor' => 'red',
            ];
        }
    }

    header('location: ' . $_SERVER['HTTP_REFERER']);