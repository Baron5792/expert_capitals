<?php
    include "../../database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
        $userId = $_POST['userId'];
        $middleName = $_POST['middle-name'];
        $mothersMaidenName = htmlspecialchars($_POST['mothers-maiden-name']);
        $mothersFullName = htmlspecialchars($_POST['mothers-full-name']);
        $fathersFullName = htmlspecialchars($_POST['fathers-full-name']);
        $DOB = $_POST['DOB'];
        $ssn = $_POST['ssn'];
        $gender = $_POST['gender'];

        // for contact info
        $address = htmlspecialchars($_POST['address']);
        $city = htmlspecialchars($_POST['city']);
        $zipcode = htmlspecialchars($_POST['zipcode']);

        // financial info
        $employmentStatus = $_POST['employment-status'];
        $employersName = htmlspecialchars($_POST['employers-name']);
        $jobTitle = filter_var($_POST['jobTitle'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $income = $_POST['income'];
        $monthlyExpenses = $_POST['expenses'];

        // loan Info
        $loanAmount = $_POST['loanAmount']; // check for both a deposit and un-deposited user with this
        $purpose = filter_var($_POST['purpose'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $otherPurpose = filter_var($_POST['other-purpose'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); // if the other option is selected
        $repaymentMethod = $_POST['repaymentMethod'];

        //  vaidate the other required fields for the repayment method
        $GII = $_FILES['GII'];
        $POA = $_FILES['POA'];
        $incomeProof = $_FILES['incomeProof'];

        // check for empty elements
        if (empty($middleName) || empty($mothersMaidenName) || empty($mothersFullName) || empty($fathersFullName) || empty($DOB) || empty($ssn) || empty($gender) || empty($address) || empty($city) || empty($zipcode) || empty($employmentStatus) || empty($employersName) || empty($jobTitle) || empty($income) || empty($monthlyExpenses) || empty($loanAmount) || empty($GII['name']) || empty($POA['name']) || empty($incomeProof['name'])) {
            $errors[] = "Please be sure to fill out all required fields.";
        }

        // elseif ()


    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }