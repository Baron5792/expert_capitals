<?php
    include __DIR__ . '/./database.php';

    if (isset($_POST['register'])) {
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $city = filter_var($_POST['city'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $zipcode = filter_var($_POST['zipcode'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $country = filter_var($_POST['country'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $country_code = htmlspecialchars($_POST['mobile_code']);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passwordconfirmation = filter_var($_POST['passwordconfirmation'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $regNo = filter_var($_POST['acc_num'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); //current users code
        $refCode = $_POST['refCode'];  // code of the superior
        $number = $country_code . $phone; // concatenate the phone 
        $errors = [];

        // fetch users refId
        function generateRandomAlphanumeric($length) {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }
        
        $randomAlphanumeric = generateRandomAlphanumeric(40);
        

    
        if (empty($firstname)  || empty($lastname) || empty($country) || empty($address) || empty($phone) || empty($username) || empty($email) || empty($refCode)) {
            $errors[] = "One or more input fields are empty. Please review the form and ensure that all required fields are completed before submitting";
        }

        elseif (strlen($password) < 6) {
            $errors[] = "Password should be 6 characters or more, please try again";
        }

        elseif($password !== $passwordconfirmation) {
            $errors[] = "Passwords do not match, please try again";
        }
    
        else {
            // check if referral code is valid
            $checkRef = mysqli_query($connection, "SELECT * FROM users WHERE ref_id= '$refCode'");
            if (mysqli_num_rows($checkRef) > 0) {
                // check for username and email
                $checkUser = mysqli_query($connection, "SELECT * FROM users WHERE username= '$username'");
                if (mysqli_num_rows($checkUser) > 0) {
                    $errors[] = "Username already exists, please try again";
                }

                else {
                    // check for email
                    $checkEmail = mysqli_query($connection, "SELECT * FROM users WHERE email= '$email'"); 
                    if (mysqli_num_rows($checkEmail) > 0) {
                        $errors[] = "Email already exist, please try again";
                    }

                    else {
                        // rest of codes here
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $insert = mysqli_query($connection, "INSERT INTO users (firstname, lastname, username, email, balance, reg_no, ref_id, sponsor_id, address, country, phone, password) VALUES ('$firstname', '$lastname', '$username', '$email', '25', '$regNo', '$randomAlphanumeric', '$refCode', '$address', '$country', '$number', '$hashed_password')");

                        if ($insert) {
                            // send mail code
                            $subject = "Welcome to Expert Capitals";
                            $link = "https://zinofix.org/user/verify.php?email=" . $email;
                            $support = "mailto:support@zinofix.org";
                            
                            
                            
                            $message = '
                                <html>
                                    <head>
                                        <style>
                                            body {
                                                font-family: Arial, sans-serif;
                                                background-color: #f4f4f9;
                                                margin: 0;
                                                padding: 0;
                                            }
                                            .email-container {
                                                max-width: 600px;
                                                margin: 20px auto;
                                                background-color: #ffffff;
                                                border-radius: 8px;
                                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                                overflow: hidden;
                                            }
                                            .email-header {
                                                background-color: #b95441;
                                                padding: 20px;
                                                text-align: center;
                                            }
                                            .email-header img {
                                                max-width: 150px;
                                            }
                                            .email-body {
                                                padding: 20px;
                                                color: #333333;
                                            }
                                            .email-body h1 {
                                                color: #b95441;
                                            }
                                            .email-footer {
                                                text-align: center;
                                                padding: 10px;
                                                background-color: #f4f4f9;
                                                font-size: 12px;
                                                color: #888888;
                                            }
                                            .verify-button {
                                                display: inline-block;
                                                padding: 10px 20px;
                                                background-color: #b95441;
                                                color: #ffffff;
                                                text-decoration: none;
                                                border-radius: 5px;
                                                margin-top: 20px;
                                            }
                                            .verify-button:hover {
                                                background-color: #a04438;
                                            }
                                        </style>
                                    </head>
                                    <body>
                                        <div class="email-container">
                                            <div class="email-header">
                                                <img src="https://zinofix.org/assets/images/logoIcon/logo.png" alt="Expert Capitals Logo">
                                            </div>
                                            <div class="email-body">
                                                <h2>Welcome to Expert Capital</h2>
                                                <p>Dear ' . $username . ',</p>
                                                <p>We are thrilled to have you on board! Your registration is now complete, and you are ready to start exploring the world of investing with Expert Capitals.</p>
                                                <p>To get started, simply click the link below to verify your email address:</p>
                                                <p><a href=' . $link . '>Verify Email</a></p>
                                                <p>If you have any questions or need assistance, our support team is here to help. Simply reply to this email or contact us at <a href=' . $support .'>' . $support . '</a>.</p>
                                                <p>Thank you for choosing Expert Capitals. We are excited to help you achieve your financial goals!</p>

                                                <p>Best regards,</p>
                                                <p>Expert Capitals</p>
                                            </div>
                                            <div class="email-footer">
                                                &copy; 2023 Expert Capitals. All rights reserved.
                                            </div>
                                        </div>
                                    </body>
                                </html>';
                                
                                $headers = "From: info@zinofix.org" . "\r\n" .
                                "CC: [Optional CC Email]" . "\r\n" .
                                "MIME-Version: 1.0" . "\r\n" .
                                "Content-Type: text/html; charset=UTF-8" . "\r\n";
                                
                                if (mail($email, $subject, $message, $headers)) {
                                    $_SESSION['success'] = [
                                        'title' => 'Congratulations',
                                        'icon' => 'success',
                                        'html' => 'Registration successful! Please login to access your account',
                                        'confirmButtonColor' => 'green',
                                    ];
                                    header('location: ' . URL . "login.php");
                                }
                                
                                else {
                                    $errors[] = "An error occured, please try again later";
                                }
                        }

                        else {
                            $errors[] = "Error 404, please try again";
                        }
                    }
                }
            }

            else {
                $errors[] = "Invlid referral code, please try again";
            }
            

        }

        if (!empty($errors)) {
            $_SESSION['register-data'] = $_POST;
            $_SESSION['error'] = [
                'title' => 'Error',
                'icon' => 'error',
                'html' => '<p><span>' . implode('<span></span>', $errors) . '</span></p>',
                'confirmButtonColor' => 'red',
            ];
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
        
    }


    else {
        header('location: ' . URL . 'login.php');
        die();
    }