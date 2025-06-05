<?php
    include __DIR__ . "/../database.php";
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $update = mysqli_query($connection, "UPDATE withdrawal SET status= 'accepted' WHERE id= '$id'");
        if ($update) {
            // check for interest amount
            // fetch interest amount
            $fetch = mysqli_query($connection, "SELECT * FROM withdrawal WHERE id= '$id'");
            if (mysqli_num_rows($fetch) > 0) {
                $data = mysqli_fetch_assoc($fetch);
                $amount = $data['amount'];
                $userId = $data['userId'];
                $uniqId = $data['uniqId'];
                $wallet = $data['wallet'];
                
                // check for current users interest
                $query = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                if (mysqli_num_rows($query) > 0) {
                    $row = mysqli_fetch_assoc($query);
                    $interest = $row['interest'];
                    $email = $row['email'];
                    $firstname = $row['firstname'];
                    
                    // check the rate
                    if ($amount > $interest) {
                        $_SESSION['error'] = "User doesnt have a sufficient interest amount for this withdrawal";
                    }
                    
                    else {
                        $rate = $interest - $amount;
                        $sql = mysqli_query($connection, "UPDATE users SET interest= '$rate' WHERE id= '$userId'");
                        if ($sql) {
                            // update transactions
                            $updateTransaction = mysqli_query($connection, "UPDATE transactions SET status= 'accepted' WHERE userId= '$userId' AND uniqId= '$uniqId'");
                            if ($updateTransaction) {
                                // send email
                                $subject = "Withdrawal Successful";
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
                                                    <h2>Withdrawal Successful</h2>
                                                    <p>Dear ' . $firstname . ',</p>
                                                    <p>We are pleased to inform you that your withdrawal of ' . $amount . ' has been successfully processed.</p>
                                                    <p>Withdrawal Details:</p>
                                                    <ul>
                                                        <li>Withdrawal Amount: $' . $amount . '</li>
                                                        <li>Deposit Method: ' . $wallet . '</li>
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
                                        $_SESSION['success'] = "withdrawal has been accepted successfully";
                                        header('location: ' . URL . "admin/withdrawal.php");
                                    }
                                    
                                    else {
                                        $_SESSION['error'] = "Error during mail sending";
                                    }
                            }
                                
                        }
                        else {
                            $_SESSION['error'] = "Error during users interest update";
                        }
                    }
                }
                
                else {
                    $_SESSION['user'] = "User not found";
                }
            }
            
            else {
                $_SESSION['error'] = "Error fetching withdrawal details, please try again";
            }
        }
        
        else {
            $_SESSION['error'] = "Error during withdrawal update";
        }
        
        if (isset($_SESSION['error'])) {
            header('location: ' . URL . "admin/withdrawal.php");
        }
    }
    
    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }