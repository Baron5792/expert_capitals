<?php
    include __DIR__ . "/../../database.php";

    if (isset($_GET['user-eligibility'])) {

        $errors = [];
        $status = $_GET['user-eligibility'];

        $fetch = mysqli_query($connection, "SELECT * FROM users WHERE reg_no= '$status'");
        if (mysqli_num_rows($fetch) > 0) {
            $data = mysqli_fetch_assoc($fetch);
            $loan = $data['loan_track'];
            $email = $data['email_verify_track'];

            if ($loan == 0 || $email == 0) {
                $errors[] = "This page is only accessible after your KYC and email address have been successfully verified. If you've already submitted your details, please wait for our verification process to complete. If not, kindly complete the verification process to gain access";
            }

            else {
                header('location: ' . URL . 'user/loan/new-loan-application.php');
            }
        }

        if (!empty($errors)) {
            $_SESSION['swal_error'] = [
                'title' => 'Access Restricted!',
                'html' => '<p class="text-secondary small"><span>' . implode('<span></span>', $errors) . '</span></p>',
                'icon' => 'error',
                'confirmTextButton' => 'OK',
                'confirmButtonColor' => 'red'
            ];

            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }


