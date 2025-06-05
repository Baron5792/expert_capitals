<?php
    include __DIR__ . '/../database.php';

    if (isset($_POST['reset'])) {
        $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $code = filter_var($_POST['code'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $uniqId = uniqid();
 

        if (empty($username_email)) {
            $_SESSION['reset'] = "An email or username is required";
        }

        else {
           $query = mysqli_query($connection, "SELECT * FROM users WHERE username= '$username_email' OR email= '$username_email' LIMIT 1");
           
           if (mysqli_num_rows($query) == 1) {
               $details = mysqli_fetch_assoc($query);
               $email = $details["email"];
               $user_id = $details["id"];
               $username = $details["username"];
               
                $insert = mysqli_query($connection, "INSERT INTO reset(user_id, username, email, code, uniqId) VALUE ('$user_id', '$username', '$email', '$code', '$uniqId')");
              
                if ($insert) {
                $subject = "Password Recovery Request";
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
                                    <h2>Password Recovery Request</h2>
                                    <p>Dear ' . $username . ',</p>
                                    <p>We received a request to reset your password for your Expert Capitals account.</p>
                                    <p>Your password recovery code is: <strong>' . $code . '</strong></p>
                                    <p>To reset your password, please follow these steps:</p>
                                    <ol>
                                        <li>Go to the Expert Capitals login page</li>
                                        <li>Click on the "Forgot Password" link</li>
                                        <li>Enter your email address and the recovery code above</li>
                                        <li>Follow the prompts to create a new password</li>
                                    </ol>
                                    <p>If you did not request a password reset, please ignore this email and your password will remain unchanged.</p>
                                    <p>Best regards,</p>
                                    <p>The Expert Capitals Team</p>
                                </div>
                                <div class="email-footer">
                                    &copy; 2023 Expert Capitals. All rights reserved.
                                </div>
                            </div>
                        </body>
                    </html>';
                
                $headers = "From: no-reply@zinofix.org\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                // send email
                
                if (mail($email, $subject, $message, $headers)) {
                   header("location: " . URL . "password/email.php?reset=$uniqId");
                }
                
                else {
                    header('location: ' . URL . 'password/reset.php');
                }

              }
               
           }
           
           else {
               $_SESSION["reset"] = "Username or Email not found";
           }
        }

        
        if (isset($_SESSION['reset'])) {
            $_SESSION['reset-data'] = $_POST;
            header('location: ' . URL . 'password/reset.php');
        }

    }

    else {
        header('location: ' . URL . 'password/reset.php');
    }