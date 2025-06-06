<?php
    include __DIR__ . "/../../database.php";

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
        $uniqId = uniqid(100, true);
        $displayTotalRepayment = htmlspecialchars($_POST['displayTotalRepayment']);

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
        // validation for the image uploaded files
        $GII = $_FILES['GII'];
        $POA = $_FILES['POA'];
        $incomeProof = $_FILES['incomeProof'];

        // check for empty elements
        if (empty($middleName) || empty($mothersMaidenName) || empty($mothersFullName) || empty($fathersFullName) || empty($DOB) || empty($ssn) || empty($gender) || empty($address) || empty($city) || empty($zipcode) || empty($employmentStatus) || empty($employersName) || empty($jobTitle) || empty($income) || empty($monthlyExpenses) || empty($loanAmount) || empty($GII['name']) || empty($POA['name']) || empty($incomeProof['name'])) {
            $errors[] = "Please be sure to fill out all required fields.";
        }

        // for the other purpose section
        elseif ($purpose == "other" && empty($otherPurpose)) {
            $errors[] = "Please specify the purpose of the loan to proceed.";
        }

        elseif (!is_numeric($income) || !is_numeric($monthlyExpenses) || !is_numeric($loanAmount)) {
            $errors[] = "Please ensure that the income, monthly expenses and loan amount are numeric values.";
        }

        elseif ($income < $monthlyExpenses) {
            $errors[] = "Your monthly income must be greater than your monthly expenses.";
        }

        else {
            // check for repayment method
            if ($repaymentMethod == "flexible") {
                if (empty($_POST['duration']) || empty($_POST['fixedAmount']) || empty($_POST['flexibleTerm'])) {
                    $errors[] = "Please ensure that you fill out all the required fields for the flexible repayment method.";
                }

                else {
                    $duration = $_POST['duration'];
                    $fixed_amount = $_POST['fixedAmount'];
                    $loan_term = $_POST['flexibleTerm'];
                }
            }

            elseif ($repaymentMethod == "bullet") {
                if (empty($_POST['bulletTerm'])) {
                    $errors[] = "Please ensure that you fill out all the required fields for the bullet repayment method.";
                }

                else {
                    $duration = "None";
                    $fixed_amount = "None";
                    $loan_term = $_POST['bulletTerm'];
                }
            }
            
            // rest of the codes here
            $time = time();
            $GIIName = $time . $GII['name'];
            $tmp_name = $GII['tmp_name'];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $extension = explode('.' , $GIIName);
            $extension = end($extension);
            $destination = __DIR__ . "/./GII/" . $GIIName; // save the image files here
            if (in_array($extension, $allowedExtensions)) {
                move_uploaded_file($tmp_name, $destination);
                // validate for the income
                $incomeProofName = $time . $incomeProof['name'];
                $incomeProofTmpName = $incomeProof['tmp_name'];
                $incomeExtension = explode('.', $incomeProofName);
                $incomeExtension = end($incomeExtension);
                $incomeDestination = __DIR__ . "/./Income/" . $incomeProofName;
                if (in_array($incomeExtension, $allowedExtensions)) {
                    move_uploaded_file($incomeProofTmpName, $incomeDestination);
                    // Validate for the POA
                    $POAName = $time . $POA['name'];
                    $POATmpName = $POA['tmp_name'];
                    $POAExtension = explode('.', $POAName);
                    $POAExtension = end($POAExtension);
                    $POADestination = __DIR__ . "/./POA/" . $POAName;
                    if (in_array($POAExtension, $allowedExtensions)) {
                        move_uploaded_file($POATmpName, $POADestination);

                        if ($purpose == "other") {
                            $purpose = $otherPurpose; // declare the purpose of the loan if other is selected
                        }

                        // insert the data into the database
                        $insert = mysqli_query($connection, "INSERT INTO loan (userId, middleName, mothersMaidenName, mothersFullName, fathersFullName, uniqId, date_of_birth, ssn, address, city, zipcode, income, employment_status, amount, purpose, GII, POA, incomeProof, repaymentTerm, duration, fixed_amount, loan_term, status, displayTotalRepayment) VALUES ('$userId', '$middleName', '$mothersMaidenName', '$mothersFullName', '$fathersFullName', '$uniqId', '$DOB', '$ssn', '$address', '$city', '$zipcode', '$income', '$employmentStatus', '$loanAmount', '$purpose', '$GIIName', '$POAName', '$incomeProofName', '$repaymentMethod', '$duration', '$fixed_amount', '$loan_term', 'pending', '$displayTotalRepayment')");
                        if ($insert) {
                            // Email code here for a successful loan submission
                            $_SESSION['success'] = [
                                'title' => 'Application Submitted Successfully!',
                                'html' => '<p>Thank you for applying! Your loan request is now under review. We’ll notify you via email/SMS within 1-2 business days. In the meantime, you can track your application status in your dashboard.</p>',
                                'icon' => 'success',
                                'confirmButtonColor' => 'green',
                            ];
                            header('location: ' . URL . 'user/loan/loan-history.php');
                        }

                        else {
                            $errors[] = "Error 404, please try again";
                        }
                    }

                    else {
                        $errors[] = "Only JPG, JPEG, or PNG files are allowed.";
                    }

                }

                else {
                    $errors[] = "Only JPG, JPEG, or PNG files are allowed.";
                }


            }

            else {
                $errors[] = "Only JPG, JPEG, or PNG files are allowed.";
            }
        }

        // fetch errors 
        if (!empty($errors)) {
            $_SESSION['error'] = [
                'title' => 'An error occured',
                'html' => '<p><span>' . implode('<span></span>', $errors) . '</span></p>',
                'icon' => 'error',
                'confirmButtonColor' => 'red',
            ];
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }