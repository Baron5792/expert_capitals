<?php
    include __DIR__ . "/../database.php";

    if (isset($_POST['submit'])) {
        $userId = $_POST['userId'];
        $balance = $_POST['balance'];
        $wallet = $_POST['wallet'];
        
        $address = $_POST['address'];
        $uniqId = uniqid();
        $amount = $_POST['amount'];
        
        // query for users email
        $query = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            $email = $data['email'];
        }


        if (empty($amount)) {
            $_SESSION['withdraw-error'] = "An amount is required to proceed";
        }

        elseif (empty($address)) {
            $_SESSION['withdraw-error'] = "A wallet address is required to proceed";
        }
        
        elseif ($amount < 5) {
            $_SESSION['withdraw-error'] = "The amount you've entered is less than the minimum withdrawal amount of $5.00. Please enter a amount greater than or equal to $5.00.";
        }

        elseif ($amount > $balance) {
            $_SESSION['withdraw-error'] = "The amount you've entered exceeds your available interest balance. Please enter an amount less than or equal to your current interest balance of" . " " . "$" . $balance . " " . ", try again later";
        }

        else {
            $insert = mysqli_query($connection, "INSERT INTO withdrawal (userId, amount, wallet, walletId, status, uniqId) VALUES ('$userId', '$amount', '$wallet', '$address', 'pending', '$uniqId')");
            if ($insert) {
                // insert into transaction history
                $insertTransaction = mysqli_query($connection, "INSERT INTO transactions (userId, title, amount, uniqId, status) VALUES ('$userId', 'Withdrawal', '$amount', '$uniqId', 'pending')");
                if ($insertTransaction) {
                    // mail code
                    $subject = "Withdrawal Request Submitted";
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
                                    max-width: 800px;
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
                                .email-body h2 {
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
                                    <h2>Withdrawal Request Submitted</h2>
                                    <p>Your withdrawal request of $' . $amount . ' has been successfully submitted and is now awaiting approval.</p>
                                    <p>Transaction Details:</p>
                                    <ul>
                                        <li>Transaction ID: ' . $uniqId . '</li>
                                        <li>Amount: $' . $amount . '</li>
                                        <li>Wallet: ' . $wallet . '</li>
                                        <li>Wallet Address: ' . $address . '</li>
                                    </ul>
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
                        $_SESSION['withdraw-success'] = "Congratulations, Your withdrawal request of". " " . $amount . "$ " .  "has been successfully submitted and is now awaiting approval";
                        header('location: '. URL . "user/withdrawal-history.php");
                    }

                    else {
                        $_SESSION['withdraw-error'] = "An error occured, please try again later";
                    }
                }
                
            }

            else {
                $_SESSION['withdraw-error'] = "Error 404, please try again";
            }
        }

        if (isset($_SESSION['withdraw-error'])) {
            $_SESSION['withdraw-data'] = $_POST;
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }