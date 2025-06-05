<?php
    include __DIR__ . "/../database.php";
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = mysqli_query($connection, "SELECT * FROM deposit WHERE id= '$id'");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            $userId = $data['userId'];
            $amount = $data['amount'];
            $walletName = $data['walletName'];
            $uniqId = $data['uniqId'];
            
            // fetch users $data
            $fetch = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
            if (mysqli_num_rows($fetch) > 0) {
                $row = mysqli_fetch_assoc($fetch);
                $balance = $row['balance'];
                $incr = $balance + $amount;
                $sponsor = $row['sponsor_id'];
                $email = $row['email'];
                $firstname = $row['firstname'];
                
                // update accept
                $update = mysqli_query($connection, "UPDATE deposit SET status= 'accepted' WHERE id= '$id'");
                if ($update) {
                    // increment users balance
                    $increment = mysqli_query($connection, "UPDATE users SET balance= '$incr' WHERE id= '$userId'");
                    
                    // referrers bonus
                    if ($increment) {
                        // fetch sponsors BALANCE and increment
                        $check = mysqli_query($connection, "SELECT * FROM users WHERE ref_id= '$sponsor'");
                        if (mysqli_num_rows($check) > 0) {
                            $details = mysqli_fetch_assoc($check);
                            $sponsorsBalance = $details['balance'];
                            $percent = $amount * 0.001;
                            $sponsorsId = $details['id'];
                            
                            $sponsIncr = $sponsorsBalance + $percent;
                            
                            // update sponsors balance
                            $updateSponsor = mysqli_query($connection, "UPDATE users SET balance= '$sponsIncr' WHERE ref_id= '$sponsor'");
                            if ($updateSponsor) {
                                // INSERT INTO REFERRERS table
                                $insertSponsor = mysqli_query($connection, "INSERT INTO earning (userId, title, amount) VALUES ('$sponsorsId', 'Referral', '$percent')");
                                if ($insertSponsor) {
                                    // send mail
                                    $subject = "Approved Deposit";
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
                                                        <h2>Deposit Received - Awaiting Approval</h2>
                                                        <p>Dear ' . $firstname . ',</p>
                                                        <p>We are pleased to inform that your deposit has been successfully accepted and credited to your account. The details of your deposit are as follows:</p>
                                                        <ul>
                                                            <li>Deposit Amount: $' . $amount . '</li>
                                                            <li>Deposit Method: ' . $walletName . '</li>
                                                            <li>Transaction ID: ' . $uniqId . '</li>
                                                        </ul>
                                                        <p>Thank you for choosing our platform. If you have any questions or concerns, please do not hesitate to contact us. </p>
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
                                        // update transactions table
                                        $updateTransactions = mysqli_query($connection, "UPDATE transactions SET status= 'accepted' WHERE uniqId= '$uniqId' AND userId= '$userId'");
                                        if ($updateTransactions) {
                                            $_SESSION['success'] = "Deposit has been accepted successfully";
                                            header('location: ' . URL . "admin/deposit.php");
                                        }
                                        else {
                                            $_SESSION['error'] = "No transaction history found";
                                        }
                                    }
                                }
                                else {
                                    $_SESSION['error'] = "Error 1";
                                }
                                
                            }
                            
                            else {
                                $_SESSION['error'] = "Error 2";
                            }
                        }
                        
                        else {
                            $_SESSION['error'] = "Error 3";
                        }
                    }
                    
                    else {
                        $_SESSION['error'] = "Error 4";
                    }
                }
                
                else {
                    $_SESSION['error'] = "Error 5";
                }
            }
            
            else {
                $_SESSION['error'] = "Error 6";
            }
            
            
        }
        
        else {
            $_SESSION['error'] = "Error 7";
        }
        
        if (isset($_SESSION['error'])) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    
    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }