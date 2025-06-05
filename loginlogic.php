<?php
    include __DIR__ . '/./database.php';

    if(isset($_POST['login'])) {
        $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $errors = [];

        if (empty($username_email)) {
            $errors[] = "Username Or Email is required to proceed, please try again";
        }

        elseif (empty($password)) {
            $errors[] = "Password is required to proceed, please try again";
        }

        else {
            // check if user exist in our database
            $user_fetch_query = "SELECT * FROM users WHERE email = '$username_email' OR username = '$username_email'";
            $user_fetch_result = mysqli_query($connection, $user_fetch_query);

            if (mysqli_num_rows($user_fetch_result) == 1) {
                // fetch that user using fetch assoc method
                $user_record = mysqli_fetch_assoc($user_fetch_result);
                $db_password = $user_record['password'];
                $_SESSION['user'] = $user_record;

                // compare password with db_password
                if (password_verify($password, $db_password)) {
                    header('location: ' . URL . 'user/home.php');
                } else {
                    $errors[] = "Incorrect username, email or password, please try again";
                }
            } else {
                $errors[] = "Incorrect username, email or password, please try again";
            }
        }

        if (!empty($errors)) {
            $_SESSION['login-data'] = $_POST;
            $_SESSION['error'] = [
                'title' => 'An error occured',
                'icon' => 'error',
                'html' => '<p><span>' . implode('<span></span>', $errors) . '</span></p>',
                'confirmButtonColor' => 'red',
            ];
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    else {
        header('location: ' . URL . 'login.php');
    }



