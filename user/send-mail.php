<?php
    include __DIR__ . "/../database.php";
    
    if (isset($_POST['submit'])) {
        $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $code = filter_var($_POST['code'], FILTER_SANITIZE_STRING);
        $errors = [];
        
        $subject = "Join me on Expert Capital!";
        
        // customized message
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
                            <h1>Join me on Expert Capital</h1>
                            <p>Dear User</p>
                            <p>I am excited to invite you to join me on Expert Capital! As a valued friend, I think you will love our platform.</p>
                            <p>To get started simply click this link: <a href=' . $link . '>' . $link . '</a></p>
                            <p>And do not forget to enter your unique referral code: <b>' . $code . '</b> </p>
                            <p>When you register using this link and code, you will receive a special bonus, and I will get rewarded too!</p>
                            <p>Looking forward to seeing you on Expert Capital!</p>
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
            $_SESSION['mail'] = [
                'title' => 'Invite Sent Successfully',   
                'html' => 'Your invitation has been delivered. They’ll receive instructions shortly.',
                'icon' => 'success',
                'confirmButtonColor' => 'green',
            ];
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
        
        else {
            $errors = "Error sending email.";
        }

        if (!empty($errors)) {
            $_SESSION['error'] = [
                'title' => 'Error',
                'icon' => 'error',
                'html' => 'An error occured during the referral process, please try again',
                'confirmButtonColor' => 'red',
            ];
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    
    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }