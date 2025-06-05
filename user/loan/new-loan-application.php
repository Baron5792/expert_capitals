<?php
    include __DIR__ . "/../partials/header.php";
    
    if (isset($_GET['track'])) {
        $track = htmlspecialchars($_GET['track']);
        // update track
        $update = mysqli_query($connection, "UPDATE users SET loan_track= '1' WHERE ref_id= '$track'");
        // if ($update) {
        //     header('location: ' . URL . "user/loan/new-loan-application.php");
        // }
    }
?>

<style>
    .pc-image img {
        height: 470px;
        position: relative;
        border-radius: 10px;
    }

    .image-text {
        position: absolute;
        top: 170px;
        padding-left: 20px;
        opacity: 0;
        transform: translateX(50px); /* Start with a slight offset */
        transition: all 0.5s;
        text-transform: capitalize;
    }

    .slide-in {
        animation: slideIn 0.5s forwards;
    }


    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }




    .top-text p:first-child {
        font-size: 38px;
        color: #446EA2;
        margin-bottom: 0px;
    }

    .top-text p:nth-child(2) {
        font-size: 38px;
        color: black;
        margin-top: 0px;
    }

    marquee {
        padding: 14px 0px;
        background-color: #F6F7F9;
        margin-top: 20px;
        border-radius: 40px;
    }

    marquee span {
        margin-right: 70px;
        font-size: small;
    }

    .break-down {
        margin-top: 80px;
    }

    .break-down-container {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 20px;
    }

    .icons {
        color: #446EA2;
    }

    .gif {
        width: 400px;
        margin: auto;
    }

    .title {
        font-size: 23px;
    }
    
    .form-step {
        display: none;
        animation: fadeIn 0.3s;
    }
    
    .form-step.active {
        display: block;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 200;
    }
    
    input, select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        color: silver;
    }

    input[type="text"] {
        text-transform: capitalize;
    }
    
    .button-group {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
        padding-bottom: 70px;
    }
    
    button {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
    }
    
    .next-btn {
        background: #4a6bff;
        color: white;
    }
    
    .next-btn:disabled {
        background: #cccccc;
        cursor: not-allowed;
    }
    
    .prev-btn {
        background: #f1f1f1;
        color: #333;
    }
    
    .submit-btn {
        background: #4CAF50;
        color: white;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }



    /* for document preview */
    .document-upload-section {
        max-width: 600px;
        margin: 0 auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .document-upload-group {
        margin-bottom: 25px;
        border: 3px dashed lightblue;
        border-radius: 8px;
        padding: 20px;
        background-color: #F5F5F5;
    }

    .upload-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .upload-label {
        display: flex;
        align-items: center;
        font-weight: 0;
        color: black;
        font-size: 18px;
    }

    .upload-label .icon {
        margin-right: 10px;
        color: lightblue;
    }

    .required {
        color: #e74c3c;
        margin-left: 4px;
    }

    .file-input-wrapper {
        position: relative;
        display: flex;
    }

    .file-input {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .browse-btn {
        color: lightblue;
        border: none;
        /* border-radius: 4px; */
        cursor: pointer;
        font-size: 16px;
    }

    .browse-btn:hover {
        background-color: #3a5a9f;
    }

    .preview-container {
        margin-top: 10px;
        min-height: 50px;
    }

    .preview-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 12px;
        background-color: #F5F5F5;
        margin-top: 10px;
    }

    .preview-info {
        display: flex;
        align-items: center;
        overflow: hidden;
        color: lightblue;
        font-size: small;
    }

    .preview-icon {
        margin-right: 10px;
        color: #4a6baf;
    }

    .preview-name {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 200px;
        color: lightblue;
        font-size: small;
    }

    .delete-btn {
        background: none;
        border: none;
        color: #e74c3c;
        cursor: pointer;
        font-size: 16px;
        margin-left: 10px;
    }

    .delete-btn:hover {
    color: #c0392b;
    }

    .btn-proceed {
    position: relative;
    padding: 12px 28px;
    font-weight: 600;
    font-size: 1rem;
    color: #fff;
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    border: none;
    border-radius: 50px;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(108, 141, 251, 0.3);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }

  .btn-proceed:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(108, 141, 251, 0.4);
    background: linear-gradient(135deg, #a777e3, #6e8efb);
  }

  .btn-proceed:active {
    transform: translateY(0);
    box-shadow: 0 4px 12px rgba(108, 141, 251, 0.3);
  }

  .btn-proceed::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: 0.5s;
  }

  .btn-proceed:hover::before {
    left: 100%;
  }

  .btn-proceed-icon {
    display: flex;
    align-items: center;
    transition: transform 0.3s ease;
  }

  .btn-proceed:hover .btn-proceed-icon {
    transform: translateX(3px);
  }

  .loan-footer {
    margin: 0 auto;
    max-width: 200px;
  }

    #calculationResults {
        transition: all 0.3s ease;
    }


    .table th {
        width: 50%;
    }

    @media screen and (max-width: 768px) {
        .pc-image img {
            height: 370px;
            position: relative;
            border-radius: 7px;
        }

        .image-text {
            position: absolute;
            top: 140px;
            padding-left: 20px; 
        }

        .top-text p:first-child {
            font-size: 20px;
            color: #446EA2;
            margin-bottom: 0px;
        }

        .top-text p:nth-child(2) {
            font-size: 20px;
            color: black;
            margin-top: 0px;
        }

        .gif {
            width: 100%;
        }

    
    }
</style>

<script>
    document.getElementById("title_title").innerHTML = "New Loan Application | Expert Capitals";
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<!-- codes here -->
<div class="container-fluid mt-4">

    <!-- loan image -->
    <div class="pc-image mt-4">
        <img src="../../assets/images/loan/coin in hand.jpeg" alt="" class="w-100">

        <div class="image-text">
            <div class="top-text">
                <p class="fw-bold text-success">Reducing the public financial bond</p>
                <p>Enhancing quality of life</p>
            </div>
            <div>
                <p class="mt-0 mb-0"><span class="bi bi-check-circle-fill text-success"></span> Flexibility</p>
                <p class="mt-0 mb-0"><span class="bi bi-check-circle-fill text-success"></span> No collateral</p>
                <p class="mt-0 mb-0"><span class="bi bi-check-circle-fill text-success"></span> Very low interest rate</p>
                <p class="mt-0 mb-0"><span class="bi bi-check-circle-fill text-success"></span> Continuous collaboration </p>
            </div>
        </div>
    </div>

    <marquee behavior="" direction="">
        <span>Over 10k+ Loan Applicants</span>
        <span>Founded in 2017</span>
        <span>Over $12M Principle</span>
    </marquee>


    <!-- loan header text -->
    <div class="mt-4">
        <p class="fs-3 text-center mb-0">Understanding Your Loan Package</p>
        <p class="text-center small mt-0 text-secondary">Explore the details of our loan package, including loan amounts, interest rates, and repayment terms, to make an informed decision.</p>
    </div>


    <div class="container-fluid break-down">
        <div class="row">
            <div class="col-md-6 col-xl-4 col-12 col-lg-4 text-center mt-4 break-down-container p-4">
                <p class="fs-4 mb-0">ELIGIBILITY</p>
                <!-- for icons -->
                <div class="mt-3 mb-3 icons">
                    <span class="bi bi-clipboard-check fs-3"></span>
                </div>
                <div class="small text-secondary">
                    <p>Our services are available in over 148 countries. To qualify, individuals must be KYC verified and must be at least 18 years of age, possessing a verifiable earning capacity and financial history. Clients who engage with us through partnerships, banking, and investments are more likely to qualify for higher loan amounts compared to clients who solely utilize loan services.</p>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 col-12 col-lg-4 text-center mt-4 break-down-container p-4">
                <p class="fs-4 mb-0">OUR LOAN PROGRAM</p>
                <!-- for icons -->
                <div class="mt-3 mb-3 icons">
                    <span class="bi bi-handbag fs-3"></span>
                </div>
                <div class="small text-secondary">
                    <p>The Expert Capitals loan program, referred to as the ECs loan, represents an innovative financial solution designed to meet the pressing economic requirements of individuals and organizations within the public sector. This program is notable for its absence of collateral requirements, thereby improving accessibility for a broader spectrum of applicants.</p>
                </div>
            </div>


            <div class="col-md-6 col-xl-4 col-12 col-lg-4 text-center mt-4 break-down-container p-4">
                <p class="fs-4 mb-0">Low interest rate</p>
                <!-- for icons -->
                <div class="mt-3 mb-3 icons">
                    <span class="bi bi-graph-down fs-3"></span>
                </div>
                <div class="small text-secondary">
                    <p>A very low interest rate, which is assessed based on the principal amount, has been established to alleviate the financial burden on borrowers.</p>
                </div>
            </div>


            <div class="col-md-6 col-xl-4 col-12 col-lg-4 text-center mt-4 break-down-container p-4">
                <p class="fs-4 mb-0">No Collateral Required</p>
                <!-- for icons -->
                <div class="mt-3 mb-3 icons">
                    <span class="bi bi-unlock fs-3"></span>
                </div>
                <div class="small text-secondary">
                    <p>The application for the loan does not necessitate the provision of collateral, resulting in an unsecured loan arrangement. A deposit may be required prior to the disbursement of the loan. This no-collateral feature enhances the likelihood of eligibility for clients who may have limited access to traditional lending options.</p>
                </div>
            </div>


            <div class="col-md-6 col-xl-4 col-12 col-lg-4 text-center mt-4 break-down-container p-4">
                <p class="fs-4 mb-0">Amortization</p>
                <!-- for icons -->
                <div class="mt-3 mb-3 icons">
                    <span class="bi bi-clock-history fs-3"></span>
                </div>
                <div class="small text-secondary">
                    <p>The loan repayment structure provides the Borrower with the flexibility to determine the manner and timing of loan repayment. This arrangement offers multiple options and sufficient time for clients to fulfill their financial obligations, thereby alleviating the burden of financial stress.</p>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 col-12 col-lg-4 text-center mt-4 break-down-container p-4">
                <p class="fs-4 mb-0">MORE</p>
                <!-- for icons -->
                <div class="mt-3 mb-3 icons">
                    <span class="bi bi-three-dots fs-3"></span>
                </div>
                <div class="small text-secondary">
                    <p>Our team is consistently available to assist in various situations throughout the duration of the loan term. We provide a distinguished loan service, offering valuable insights on effective loan management and the optimal paths to pursue. Additionally, you can access a variety of our services, including TR investment, Halal investment, banking, real estate, and more.</p>
                </div>
            </div>

            
        </div>


        <!-- footer -->
        <div class="mt-4">
            <p class="mt-4">Before proceeding, please carefully review the loan breakdown details provided above. If you understand and agree to the terms, including the loan amount, interest rate, repayment schedule, and other conditions, please click the button below to proceed.</p>


            <!-- gif -->
            <div class="gif">
                <img src="../../assets/images/loan/gif.gif" alt="loan gif" class="w-100">
            </div>

            <div class="form-check mt-4">
                <input class="form-check-input" checked type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    By clicking the button, you acknowledge that you have read, understood, and accepted the loan terms. You will then be directed to the next step in the application process.
                </label>
            </div>
        </div>

        <div class="mt-4 text-center w-40 loan-footer">
            <button 
                type="button" 
                data-bs-toggle="modal" 
                data-bs-target="#elegantModal" 
                class="btn-proceed"
                id="proceedButton"
            >
                <span class="btn-proceed-text">Proceed</span>
                <span class="btn-proceed-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
                </span>
            </button>
        </div>


    </div>
</div>





<div class="modal fade modal-xl" id="elegantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="closeModal" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- for the modal -->
                <div class="progress-container">
                    <div class="progress-bar">
                        <div class="progress-step active" data-step="1">
                            <div class="step-number">1</div>
                            <div class="step-title">Personal Info</div>
                        </div>
                        <div class="progress-step" data-step="2">
                            <div class="step-number">2</div>
                            <div class="step-title">Contact Info</div>
                        </div>
                        <div class="progress-step" data-step="3">
                            <div class="step-number">3</div>
                            <div class="step-title">Financial Info</div>
                        </div>
                        <div class="progress-step" data-step="4">
                            <div class="step-number">4</div>
                            <div class="step-title">Loan Details</div>
                        </div>
                        <div class="progress-step" data-step="5">
                            <div class="step-number">5</div>
                            <div class="step-title">Documents</div>
                        </div>
                    </div>
                </div>

                <form id="multiStepForm">
                    <!-- Step 1: Personal Information -->
                    <div class="form-step active" id="step1">
                        <p class="title">Personal Information</p>
                        
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="fullName">First Name <span class="text-danger">*</span></label>
                                <input type="text" readonly value="<?= $firstname ?>" id="fullName" class="form-control" required>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="fullName">Last Name <span class="text-danger">*</span></label>
                                <input type="text" readonly value="<?= $lastname ?>" id="fullName" class="form-control" required>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="fullName">Middle Name <span class="text-danger">*</span></label>
                                <input type="text" id="fullName" class="form-control" required>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="fullName">Mother's Maiden Name <span class="text-danger">*</span></label>
                                <input type="text" id="fullName" class="form-control" required>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="fullName">Mother's Full Name <span class="text-danger">*</span></label>
                                <input type="text" id="fullName" class="form-control" required>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="fullName">Father's Full Name <span class="text-danger">*</span></label>
                                <input type="text" id="fullName" class="form-control" required>
                            </div>
                            
                            <div class="form-group  col-md-6 col-12">
                                <label for="dob">Date of Birth <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="bi bi-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="date" id="dob" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="dob">Social Security Number (SSN) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="bi bi-card-text"></i>
                                        </span>
                                    </div>
                                    <input type="password" id="userSsn" class="form-control" required placeholder="Enter SSN">
                                    <span class="input-group-text" id="toggleSsnVisibility">
                                        <i class="bi bi-eye" id="eye-icon"></i>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 col-12">
                                <label for="gender">Gender <span class="text-danger">*</span></label>
                                <?php if ($gender == 1): ?>
                                    <select class="form-control" id="gender" required>
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                <?php elseif ($gender == 0): ?>
                                    <select class="form-control" id="gender" required>
                                        <option value="male">Male</option>
                                        <option value="female" selected>Female</option>
                                    </select>
                                <?php else: ?>
                                    <select class="form-control" id="gender" required>
                                        <option value="" disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                <?php endif ?>
                            </div>
                           
                        </div>
                        
                        <div class="button-group">
                            <div></div> <!-- Empty div for spacing -->
                            <button type="button" class="next-btn" disabled>Next</button>
                        </div>
                    </div>

                    <!-- Step 2: Contact Information -->
                    <div class="form-step" id="step2">
                        <p class="title">Contact Information</p>
                        
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="email">Email Address <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                    </div>
                                    <input type="email" value="<?= $email ?>" readonly class="form-control" id="email" required>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 col-12">
                                <label for="phone">Phone Number <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                    </div>
                                    <input type="tel" value="<?= $phone ?>" readonly class="form-control" id="phone" required>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 col-12">
                                <label for="address">Residential Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" required>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="address">City <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" required>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="address">Zipcode <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" required>
                            </div>
                        </div>
                        
                        <div class="button-group">
                            <button type="button" class="prev-btn">Previous</button>
                            <button type="button" class="next-btn" disabled>Next</button>
                        </div>
                    </div>

                    <!-- Step 3: Financial Information -->
                    <div class="form-step" id="step3">
                        <p class="title">Financial Information</p>
                        
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="employment">Employment Status <span class="text-danger">*</span></label>
                                <select id="employment" class="form-control" required>
                                    <option value="" disabled>Select</option>
                                    <option value="full-time">Full-time</option>
                                    <option value="part-time">Part-time</option>
                                    <option value="self-employed">Self-Employed</option>
                                    <option value="unemployed">Unemployed</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="Employer Name">Employer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="expenses" required>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="expenses">Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="expenses" required>
                            </div>
                            
                            <div class="form-group col-md-6 col-12">
                                <label for="income">Monthly Income ($) <span class="text-danger">*</span></label>
                                <input type="number" onkeyup="fetchIncome()" class="form-control" id="income" required>
                                <small class="text-success" id="incomeDisplay"></small>
                            </div>
                            
                            <div class="form-group col-md-6 col-12">
                                <label for="expenses">Monthly Expenses ($) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="expenses" required>
                            </div>

                        </div>
                        
                        <div class="button-group">
                            <button type="button" class="prev-btn">Previous</button>
                            <button type="button" class="next-btn" disabled>Next</button>
                        </div>
                    </div>

                    <!-- Step 4: Loan Details -->
                    <div class="form-step" id="step4">
                        <p class="title">Loan Details</p>
                        
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="loanAmount">Loan Amount ($) <span class="text-danger">*</span></label>
                                <?php  
                                    $query = mysqli_query($connection, "SELECT * FROM deposit WHERE userId= '$userId' AND status= 'accepted'");
                                    if (mysqli_num_rows($query) > 0) {
                                ?>
                                        <input type="number" class="form-control" min="0" id="loanAmount" required>
                                <?php                                    
                                    }
                                    else {
                                ?>
                                        <input type="number" class="form-control" min="0" max="5000" id="loanAmount" required>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="loanPurpose">Loan Purpose <span class="text-danger">*</span></label>
                                <select id="loanPurpose" onchange="showOtherPurpose(this)" class="form-control" required>
                                    <option value="">Select a purpose</option>
                                    <option value="debt-consolidation">Debt consolidation</option>
                                    <option value="home-improvement">Home improvement</option>
                                    <option value="car-purchase">Car purchase</option>
                                    <option value="education">Education</option>
                                    <option value="personal-expenses">Personal expenses</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12 col-12" id="other-purpose-div" style="visibility: hidden; height: 0;">
                                <label for="other-purpose">Please specify: <span class="text-danger">*</span></label>
                                <textarea id="other-purpose" class="form-control" name="other-purpose"></textarea>
                            </div>
                            
                            
                            <div class="form-group col-md-6 col-12">
                                <label for="loanTerm">Repayment method <span class="text-danger">*</span></label>
                                <select name="" id="repaymentMethod" required>
                                    <option value="" selected disabled>Select repayment method</option>
                                    <option value="flexible">Flexible Repayment</option>
                                    <option value="bullet">Bullet Repayment</option>
                                </select>
                                <!-- Dynamic Fields Container -->
                                <div id="repaymentFieldsContainer">
                                    <!-- Fields will be shown here based on selection -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="button-group">
                            <button type="button" class="prev-btn">Previous</button>
                            <button type="button" class="next-btn" disabled>Next</button>
                        </div>
                    </div>

                    <!-- Step 5: Documentation Uploads -->
                    <div class="form-step" id="step5">
                        <p class="title">Documentation Uploads</p>
                        
                        <div class="document-upload-section">
                            <!-- Government Issued ID -->
                            <div class="form-group document-upload-group">
                                <div class="upload-header">
                                <label for="idProof" class="upload-label">
                                    <i class="bi bi-passport icon"></i>
                                    Government Issued ID
                                    <span class="required">*</span>
                                </label>
                                <div class="file-input-wrapper">
                                    <input type="file" id="idProof" class="file-input" accept=".pdf,.jpg,.png" required>
                                    <button type="button" class="browse-btn">
                                        <span class="bi bi-upload"></span>
                                    </button>
                                </div>
                                </div>
                                <div class="preview-container" id="idProof-preview"></div>
                            </div>

                            <!-- Proof of Address -->
                            <div class="form-group document-upload-group">
                                <div class="upload-header">
                                <label for="addressProof" class="upload-label">
                                    <i class="bi bi-pin-map icon"></i>
                                    Proof of Address
                                    <span class="required">*</span>
                                </label>
                                <div class="file-input-wrapper">
                                    <input type="file" id="addressProof" class="file-input" accept=".pdf,.jpg,.png" required>
                                    <button type="button" class="browse-btn">
                                        <span class="bi bi-upload"></span>
                                    </button>
                                </div>
                                </div>
                                <div class="preview-container" id="addressProof-preview"></div>
                            </div>

                            <!-- Proof of Income -->
                            <div class="form-group document-upload-group">
                                <div class="upload-header">
                                <label for="incomeProof" class="upload-label">
                                    <i class="bi bi-graph-up icon"></i>
                                    Proof of Income
                                    <span class="required">*</span>
                                </label>
                                <div class="file-input-wrapper">
                                    <input type="file" id="incomeProof" class="file-input" accept=".pdf,.jpg,.png" required>
                                    <button type="button" class="browse-btn">
                                        <span class="bi bi-upload"></span>
                                    </button>
                                </div>
                                </div>
                                <div class="preview-container" id="incomeProof-preview"></div>
                            </div>
                        </div>


                        <!-- calculate loan rate reasults -->
                        <div class="row mt-4" id="calculationResults" style="display: none;">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <p class="mb-0 title">Loan Calculation Breakdown</p>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Principal</th>
                                                <td id="displayPrincipal">$0</td>
                                            </tr>
                                            <tr>
                                                <th>Interest Rate</th>
                                                <td>0.1%</td>
                                            </tr>
                                            <tr>
                                                <th>Repayment Method</th>
                                                <td id="displayMethod">-</td>
                                            </tr>
                                            <tr>
                                                <th>Loan Term</th>
                                                <td id="displayTerm">-</td>
                                            </tr>
                                            <tr class="table-active">
                                                <th>Total Interest</th>
                                                <td id="displayTotalInterest">$0</td>
                                            </tr>
                                            <tr class="table-success">
                                                <th>Total Repayment</th>
                                                <td id="displayTotalRepayment">$0</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="button-group">
                            <button type="button" class="prev-btn">Previous</button>
                            <button type="submit" class="submit-btn">Submit Application</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>















<script>
    // Add the fade-in class after 2 seconds
    // Get all elements with the class .image-text
    const elements = document.querySelectorAll('.image-text');

    // Function to add the slide-in class with a delay
    function animateElements() {
        elements.forEach((element, index) => {
            setTimeout(() => {
            element.classList.add('slide-in');
            }, 1000 + (index * 500)); // 1000ms initial delay, 500ms delay between each element
        });
    }

    // Run the animation after the page has loaded
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(animateElements, 1000); // Wait for 1 second before starting the animation
    });


    // for closing a modal
    let confirmedClose = false;

    $('#elegantModal').on('hide.bs.modal', function(event) {
        if (!confirmedClose) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'Your progress may be lost',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, close it!',
                cancelButtonText: 'No, cancel!',
            })
            .then((result) => {
                if (result.isConfirmed) {
                    confirmedClose = true;
                    $('#elegantModal').modal('hide');
                    confirmedClose = false; // Reset the flag
                }
            });
        }
    })



    // maximum loan amount for non-deposited users
    document.addEventListener('DOMContentLoaded', function() {
        const loanAmountInput = document.getElementById('loanAmount');
        const MAX_AMOUNT = 5000;

        loanAmountInput.addEventListener('change', function() {
            // Get the numeric value (parsed as float)
            const enteredAmount = parseFloat(this.value);
            
            // Check if amount exceeds maximum
            if (enteredAmount > MAX_AMOUNT) {
                // Reset to max value
                this.value = MAX_AMOUNT;
                
                // Show alert
                alert(`The maximum loan amount is $${MAX_AMOUNT.toLocaleString()}. Your entered amount has been adjusted.`);
                this.focus();
            }
        });

        // Optional: Prevent typing values over 5000 in real-time
        loanAmountInput.addEventListener('input', function() {
            if (this.value > MAX_AMOUNT) {
                this.value = MAX_AMOUNT;
                Swal.fire({
                    title : 'An error occured',
                    html : `<p class="small">Thank you for your interest! Currently, new customers can borrow up to $5,000. After making a successful transactions with us, you'll qualify for higher amounts. Visit our Help Center to learn more</p>`,
                    icon : 'error',
                    confirmButtonColor : 'red',
                })
            }
        });
    });





    // for annual incomes display
    var display = document.getElementById("incomeDisplay");
    function fetchIncome() {
        var income = document.getElementById('income');
        var annualIncome = income.value * 12;
        display.innerHTML = "Your annual income is: ≈$" + annualIncome.toLocaleString();
    }




    // for the other option select in the loan's purpose
    function showOtherPurpose(select) {
        var otherPurposeDiv = document.getElementById("other-purpose-div");
        var otherPurposeTextarea = document.getElementById("other-purpose");
        if (select.value === "other") {
            otherPurposeDiv.style.visibility = "visible";
            otherPurposeDiv.style.height = "auto";
            otherPurposeTextarea.setAttribute("required", "required");
        } 
        
        else {
            otherPurposeDiv.style.visibility = "hidden";
            otherPurposeDiv.style.height = "0";
            otherPurposeTextarea.removeAttribute("required");
            otherPurposeTextarea.value = ""; // Clear the textarea value
        }
    }




    








</script>


<script src="./modal.js"></script>
<script src="./document-preview.js"></script>
<script src="./repayment-method.js"></script>
<script src="./ssn.js"></script>
<script src="./submit-form.js"></script>
<script src="./loan-calculate-logic.js"></script>




<?php
    include __DIR__ . "/../partials/footer.php";
?>



