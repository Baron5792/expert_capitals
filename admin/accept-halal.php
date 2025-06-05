<?php
    include __DIR__ . "/../database.php";
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // first minus amount from balance
        $query = mysqli_query($connection, "SELECT * FROM halal WHERE id= '$id'");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            $userId = $data['userId'];
            $amount = $data['amount'];
            
            
        }
        
        $check = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
        if (mysqli_num_rows($check)  == 1) {
            $row = mysqli_fetch_assoc($check);
            $balance = $row['balance'];
            
            if ($amount > $balance) {
                $_SESSION['error'] = "Insufficient funds";
            }
            
            else {
                $subtra = $balance - $amount;
                // update users balance
                $updateAmount = mysqli_query($connection, "UPDATE users SET balance= '$subtra' WHERE id= '$userId'");
            }
                
        }
        
        
        // update acceped in the track
        $update = mysqli_query($connection, "UPDATE halal SET status= 'accepted' WHERE id= '$id'");
        if ($update) {
            // update the date track
            $date = new DateTime();
            $date->modify('+24 hours');
            $format = $date->format('Y-m-d H:i:s');
            $track = mysqli_query($connection, "UPDATE halal SET track= '$format' WHERE id= '$id'");
            if ($track) {
                // write a mail function code
                // fetch halal details then update transactions
                $fetch = mysqli_query($connection, "SELECT * FROM halal WHERE id= '$id'");
                if (mysqli_num_rows($fetch) > 0) {
                    $data = mysqli_fetch_assoc($fetch);
                    $userId = $data['userId'];
                    $uniqId = $data['uniqId'];
                    $amount = $data['amount'];
                    $wallet = $data['walletName'];
                    $plan = $data['plan'];
                    
                    // declare plans
                    if ($plan == 0) {
                        $rate = "0.5";
                        $name = "Titanium Plan";
                    }
                    else if ($plan == 1) {
                        $rate = "0.8";
                        $name = "Silver Plan";
                    } elseif ($plan == 2) {
                        $rate = "1.1";
                        $name = "Gold Plan";
                    } elseif ($plan == 3) {
                        $rate = "1.4";
                        $name = "Diamond Plan";
                    } elseif ($plan == 4) {
                        $rate = "1.7";
                        $name = "Platinum Plan";
                    } else {
                        $rate = "1.9";
                        $name = "Phantom Plan";
                    }
                    
                    // fetch users details
                    $query = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                    if (mysqli_num_rows($query) > 0) {
                        $details = mysqli_fetch_assoc($query);
                        $firstname = $details['firstname'];
                        $email = $details['email'];
                        $username = $details['username'];
                        
                        // email code here
                        $subject = "Halal Investment Accepted";
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
                                            <h2>Halal Investment Accepted</h2>
                                            <p>Dear ' . $username . ',</p>
                                            <p>We are pleased to inform you that your halal investment of $' . $amount . ' in the ' . $name . ' has been accepted.</p>
                                            <p>Investment Details:</p>
                                            <ul>
                                                <li>Investment Amount: $' . $amount . '</li>
                                                <li>Investment Plan: ' . $name . '</li>
                                                <li>Expected Return: ' . $rate . '%</li>
                                                <li>transaction ID: ' . $uniqId . '</li>
                                            </ul>
                                            <p>Your investment is now active and will begin generating returns according to the terms of your investment plan. You can view your investment details and track your returns in your account dashboard.</p>
                                            <p>Thank you for choosing Expert Capitals for your halal investment needs. We are committed to providing you with a secure and transparent investment experience.</p>
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
                        
                        if (mail($email, $subject, $message, $headers)) {
                            $_SESSION['success'] = "Halal has been accepted successfully";
                            header('location: ' . URL . "admin/halal.php");
                        }
                        else {
                            $_SESSION['error'] = "Error during email sending, please try again later";
                        }
                        
                    }
                }
                    
            }
            
            else {
                $_SESSION['error'] = "Error during track update";
            }
        }
        
        else {
            $_SESSION['error'] = "Error during status update";
        }
        
        if (isset($_SESSION['error'])) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    
    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }