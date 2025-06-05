<?php
    include __DIR__ . "/../database.php";

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $plan = $_POST['plan'];
        $amount = $_POST['amount'];
        $walletId = $_POST['wallet'];
        $uniqId = uniqid();
        
        // check for plan name and interest value
        if ($plan == 0) {
            $rate = 0.5;
            $name = "Titanium Plan";
        }
        elseif ($plan == 1) {
            $rate = 0.8;
            $name = "Silver Plan";
        } elseif ($plan == 2) {
            $rate = 1.1;
            $name = "Gold Plan";
        } elseif ($plan == 3) {
            $rate = 1.4;
            $name = "Diamond Plan";
        } elseif ($plan == 4) {
            $rate = 1.7;
            $name = "Platinum Plan";
        } else {
            $rate = 1.9;
            $name = "Phantom Plan";
        }
        
        
        // query for users balance
        $query = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            $balance = $data['balance'];
            $email = $data['email'];
            $username = $data['username'];
            
            // fetch wallets name from the id
            $sql = mysqli_query($connection, "SELECT * FROM wallet WHERE walletId= '$walletId'");
            if (mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
                $walletName = $row['walletName'];
            }
            
            if (empty($amount)) {
                $_SESSION['halal-error'] = "An amount is required to proceed";
            }
            
            elseif ($amount > $balance) {
                $_SESSION['halal-error'] = "Insufficient funds, please make a deposit and try again";
            }
    
            else {
                $insert = mysqli_query($connection, "INSERT INTO halal (userId, uniqId, amount, walletName, plan, status) VALUES ('$userId', '$uniqId', '$amount', '$walletName', '$plan', 'pending')");
                if ($insert) {
                    $insertTransaction = mysqli_query($connection, "INSERT INTO transactions (userId, title, amount, uniqId, status) VALUES ('$userId', 'Halal Investment', '$amount', '$uniqId', 'pending')");
                    if ($insertTransaction) {
                        // the email code
                        $subject = "Congratulations! Your Halal Investment is Live!";
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
                                        <h2>Congratulations! Your Halal Investment is Live!</h2>
                                        <p>Dear ' . $username . ',</p>
                                        <p>We are thrilled to inform you that your halal investment on Expert Capitals has been successfully activated!</p>
                                        <p>Investment Details:</p>
                                        <ul>
                                            <li>Investment Amount: $' . $amount . '</li>
                                            <li>Investment Plan: ' . $name . '</li>
                                            <li>Wallet: ' . $walletName . '</li>
                                            <li>Expected Daily Interest: ' . $rate . '%</li>
                                        </ul>
                                        <p>As per our halal investment policy, you will receive ' . $rate . '% interest on your investment every 24 hours. This interest will be automatically credited to your account.
                                        </p>
                                        <p>We are committed to providing you with a safe and secure investment experience. If you have any questions or concerns, please do not hesitate to contact us.</p>

                                        <p>Thank you for choosing Expert Capitals for your halal investment needs.</p>
                                        <p>Best regards,</p>
                                        <p>The Expert Capitals Team</p>
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
                            // insert into activity track
                            
                            
                            $_SESSION['confirm-success'] = "Thank you for choosing our halal investment plan! Your application is being reviewed and is currently being processed. We will keep you updated on the status";
                            header('location: ' . URL . "user/halal-history.php");
                            exit();
                            
                        }
                        
                        else {
                            $_SESSION['halal-error'] = "An error occured, please try again later";
                        }
                    }

                    else {
                        $_SESSION['halal-error'] = "An error has occured, please try again later";
                    }
                }
    
                else {
                    $_SESSION['halal-error'] = "Error 404, please try again";
                }
            }
            
        }

        

        if (isset($_SESSION['halal-error'])) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }