<?php
    include __DIR__ . "/../database.php";

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $amount = $_POST['amount'];
        $walletName = $_POST['walletName'];
        $address = $_POST['address'];
        $uniqId = $_POST['uniqId'];
        $hashed_id = $_POST['hashed_id'];


        // query for email and username
        $query = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            $username = $data['username'];
            $email = $data['email'];
        }
        
        $randomAlphabets = '';
        $alphabets = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        for ($i = 0; $i < 100; $i++) {
            $randomAlphabets .= $alphabets[rand(0, strlen($alphabets) - 1)];
        }

        if (empty($hashed_id)) {
            $_SESSION['deposit-error'] = "Please fill every required field to proceed";
        }

        else {
            $insert = mysqli_query($connection, "INSERT INTO deposit (userId, walletName, uniqId, amount, walletId, transactionHash, status) VALUES ('$userId', '$walletName', '$uniqId', '$amount', '$address', '$hashed_id', 'pending') ");

            if ($insert) {
                // insert into transaction history
                $insertTransaction = mysqli_query($connection, "INSERT INTO transactions (userId, title, amount, uniqId, status) VALUES ('$userId', 'Deposit', '$amount', '$uniqId', 'pending')");
                if ($insertTransaction) {
                    // send a mail to user
                    $subject = "Deposit Received - Awaiting Approval";
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
                                    <p>Dear ' . $username . ',</p>
                                    <p>We have received your deposit of $' . $amount . ' into your Expert Capitals account.</p>
                                    <p>Transaction Details:</p>
                                    <ul>
                                        <li>Transaction ID: ' . $uniqId . '</li>
                                        <li>Amount: $' . $amount . '</li>
                                        <li>Payment Method: ' . $walletName . '</li>
                                    </ul>
                                    <p>Please note that this deposit is currently pending and awaiting approval from our team.</p>
                                    <p>We will notify you once the deposit has been approved and credited to your account.</p>
                                    <p>Thank you for choosing Expert Capitals.</p>
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
                        // update activity track
                        $activityTitle = "Deposit Processing";
                        $activityMessage = "Your <b>$$amount</b> deposit is under review. Completion in 1-3 business days.";

                        $activityTrack = mysqli_query($connection, "INSERT INTO activity (userId, title, message) VALUES ('$userId', '$activityTitle', '$activityMessage')");

                        if ($activityTrack) {
                            $_SESSION['success'] = [
                                    'title' => 'Deposit Successful',
                                    'html' => 'Thank you for making a deposit! Please be patient while we confirm your transaction. This may take a few minutes. You will receive a confirmation email once your deposit has been successfully processed',
                                    'icon' => 'success'
                                ];
                            header('location: ' . URL . "user/deposit-history.php");
                        }
                        else {
                            $_SESSION['error'] = "A error occured during activity insertion, please try again";
                        }
                    }
                    
                    else {
                        $_SESSION['error'] = "An error occured, please try again later";
                    }
                }
                else {
                    $_SESSION['error'] = "An error occured during transaction history insertion, please try again";
                }
            }

            else {
                $_SESSION['deposit-error'] = "An error occured, please try again";
            }
        }

        if (isset($_SESSION['deposit-error'])) {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }

    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }