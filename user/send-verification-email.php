<?php
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $email = $data['email'] ?? null;

        if ($email) {
            $subject = "Email Verification";
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
                            <h1>Email Verification</h1>
                            <p>Thank you for signing up with Expert Capitals! Please click the button below to verify your email address and activate your account.</p>
                            <a href="https://zinofix.org/user/verify.php?email=' . urlencode($email) . '" class="verify-button">Verify Email</a>
                            <p>If you did not sign up for an account, please ignore this email.</p>
                        </div>
                        <div class="email-footer">
                            &copy; 2023 Expert Capitals. All rights reserved.
                        </div>
                    </div>
                </body>
            </html>';

            $headers = "From: no-reply@zinofix.org\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            if (mail($email, $subject, $message, $headers)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Invalid email address']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    }
