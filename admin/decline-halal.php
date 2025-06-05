<?php
    include __DIR__ . "/../database.php";
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $update = mysqli_query($connection, "UPDATE halal SET status= 'declined' WHERE id= '$id'");
        if ($update) {
            // update transactions table
            // fetch halal details
            $fetch = mysqli_query($connection, "SELECT * FROM halal WHERE id= '$id'");
            if (mysqli_num_rows($fetch) > 0) {
                $data = mysqli_fetch_assoc($fetch);
                $userId = $data['userId'];
                $amount = $data['amount'];
                $uniqId = $data['uniqId'];
                $wallet = $data['walletName'];
                $plan = $data['plan'];
                
                // declare plans
                if ($plan == 1) {
                    $rate = "0.1";
                    $name = "Silver Plan";
                } elseif ($plan == 2) {
                    $rate = "0.2";
                    $name = "Gold Plan";
                } elseif ($plan == 3) {
                    $rate = "0.3";
                    $name = "Diamond Plan";
                } elseif ($plan == 4) {
                    $rate = "0.4";
                    $name = "Platinum Plan";
                } else {
                    $rate = "0.5";
                    $name = "Phantom Plan";
                }
                
                $updateTransaction = mysqli_query($connection, "UPDATE transactions SET status= 'declined' WHERE uniqId= '$uniqId' AND userId= '$userId'");
                if ($updateTransaction) {
                    // fetch users details
                    $fetch = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                    if (mysqli_num_rows($fetch) > 0) {
                        $data = mysqli_fetch_assoc($fetch);
                        $username = $data['username'];
                        $email = $data['email'];
                        
                        // send email code
                        $subject = "Halal Investment Declined";
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
                                            <p>We regret to inform you that your halal investment of $' . $amount . ' in the ' . $name . ' has been declined.</p>
                                            <p>To resolve this issue, please try the following:</p>
                                            <ul>
                                                <li>Verify your payment information and ensure it is accurate.</li>
                                                <li>Try an alternative payment method.</li>
                                            </ul>
                                            <p>If you need assistance or have questions, please do not hesitate to contact us.</p>
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
                            $_SESSION['success'] = "Halal has been declined successfully";
                            header('location: ' . URL . "admin/halal.php");
                        }
                    }
                }
            }
            
            else {
                $_SESSION['error'] = "Error during the fetching of halal details";
            }
                
        }
        else {
            $_SESSION['error'] = "Error during the status update";
        }
    }
    
    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }