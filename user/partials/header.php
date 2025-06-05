<?php
    include __DIR__ . "/../../database.php";

    if (isset($_SESSION['user'])) {
        $userId = $_SESSION['user']['id'];
        $query = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $username = $data['username'];
            $email = $data['email'];
            $balance = $data['balance'];
            $avatar = $data['avatar'];
            $regNo = $data['reg_no'];
            $ref_id = $data['ref_id'];
            $phone = $data['phone'];
            $address = $data['address'];
            $gender = $data['gender'];
            $interest = $data['interest'];
            $admin = $data['admin'];
            $avatar = $data['avatar'];

            $firstLetter = substr($firstname, 0, 1);
            $lastLetter = substr($lastname, 0, 1);
            
            
            // write a function code for increments
                // fetch accepted halal status and plan track
                $check = mysqli_query($connection, "SELECT * FROM halal WHERE status= 'accepted' AND userId= '$userId'");
                $planInt = 0;
                $planAmount = 0;
                if (mysqli_num_rows($check) > 0) {
                    $data = mysqli_fetch_assoc($check);
                    $plan = $data['plan'];
                    // $track = $data['track'];
                    $halalAmount += $data['amount'];
                    
                   
                    
                    if ($plan == 1) {
                        $plan = 0.001;
                    } elseif ($plan == 2) {
                        $plan = 0.002;
                    } elseif ($plan == 3) {
                        $plan = 0.003;
                    } elseif ($plan == 4) {
                        $plan = 0.004;
                    } else {
                        $plan = 0.005;
                    }
                    
                    $planInt += $plan;  // for total plans
                }
                
                // fetch the last halal plans date
                $current = mysqli_query($connection, "SELECT * FROM halal WHERE userId= '$userId' AND status= 'accepted' ORDER BY date DESC LIMIT 1");
                if (mysqli_num_rows($current) > 0) {
                    $row = mysqli_fetch_assoc($current);
                    $track = $row['track'];
                    $halalId = $row['id'];
                    $date = $row['date'];
                    
                    
                    // create a future date from the track
                    $newDate = new DateTime($track);
                    $newDate->modify('+24 hours');
                    $formatted = $newDate->format('Y-m-d H:i:s');
                   
                    // fetch current DateTime
                    $nowDate = new DateTime();
                    $nowFormat = $nowDate->format('Y-m-d H:i:s');
                    
                    // add hours to the current times
                    $currentDate = new DateTime();
                    $currentDate->modify('+24 hours');
                    $currentFormat = $currentDate->format('Y-m-d H:i:s');
                    
                    // calculate interest
                    $planInterest = $planInt * $halalAmount;
                    
                    // add planInterest to the current interest value
                    $sumInt = $planInterest + $interest;
                    
                    // var_dump($currentFormat);
                    // die();
                    
                    if ($nowFormat > $track) {
                        // increment into the interest table of the userId
                        $interestUpdate = mysqli_query($connection, "UPDATE users SET interest= '$sumInt' WHERE id= '$userId'");
                        if ($interestUpdate) {
                            // insert into the earcning table
                            $insertEarn = mysqli_query($connection, "INSERT INTO earning (userId, amount, title) VALUES ('$userId', '$planInterest', 'Halal Returns')");
                            if ($insertEarn) {
                                // update the track
                                $updateTrack = mysqli_query($connection, "UPDATE halal SET track= '$currentFormat' WHERE id= '$halalId'");
                            }
                        }
                        
                    }
                    
                    else {
                        // reupdate the interest VALUES
                        $update = mysqli_query($connection, "UPDATE users SET interest= '$interest' WHERE id= '$userId'");
                    }
                        
                        
                }
                
                else {
                    $update = mysqli_query($connection, "UPDATE users SET interest= '$interest' WHERE id= '$userId'");
                }
                
                
                
        }

        else {
            header('location: ' . URL . "login.php");
        }
    }

    else {
        header('location: ' . URL . "login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title_title">Dashboard | Expert Capital</title>
    <link rel="stylesheet" href="<?= URL ?>assets/bootstrap-5.3.3/dist/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= URL ?>assets/jQuery link/jquery-3.6.1.js"></script>
  <link rel="stylesheet" href="<?= URL ?>assets/fontawesome-free-6.1.1-web/css/all.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="icon" href="<?= URL ?>assets/images/logoIcon/favicon.jpg">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= URL ?>user/loan/progress-bar.css">


    <style>
        body {
            width: 100%;
            box-sizing: border-box;
            margin: 0px;
        }

        .section-30 {
            height: 100vh;
            position: sticky;
            top: 0;
            overflow: hidden;
            background-color: #F2F3F7;
        }

        .section-40 {
            height: 100vh;
            display: flex;
            flex-direction: column;
            /*width: 100%;*/
            padding: 0px;
        }

        .section-40-header {
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 1;
            border-bottom: 1px solid lightgray;
            padding-bottom: 10px;
        }
        .section-40-content {
            overflow-y: auto;
            flex-grow: 1;
            /* padding-bottom: 30px; */
        }

        .header-control {
            display: flex;
            justify-content: space-around;
            padding-left: 10px;
        }
        
        .logo {
            width: 40%;
            padding-bottom: 20px;
        }

        .logo img {
            height: 60px;
            width: 100%;
        }

        .avatar {
            width: 70px;
            border-radius: 7px;
            position: relative;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-end;

        }

        .avatar img {
            border-radius: 50%;
            height: 37px;
            width: 39px;
            border: 3px solid silver;
        }

        .grey-icon {
            margin-right: 20px;
            font-size: 29px;
            color:  #ccc;
        }

        .username {
            font-family: sans-serif;
            color: white;
            font-weight: bold;
            word-wrap: break-word;
        }

        .fixed-bottom {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 30px 0;
            border-radius: 10px;
        }

        .sticky-scrollable {
            overflow-y: auto;
            max-height: calc(100vh - 80px); /* Adjust based on the height of the fixed bottom content */
            padding-bottom: 160px;
            padding-left: 0px;
        }

        /* Custom scrollbar styles */   
        .sticky-scrollable::-webkit-scrollbar {
            width: 5px;
        }
        
        .sticky-scrollable::-webkit-scrollbar-thumb {
            background-color: #F2F3F7;
            border-radius: 10px;
        }

        .sticky-scrollable::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        .nav-list {
            margin-top: 20px;
        }

        .nav-list a {
            color: white;
            font-size: 16px;
            transition: 0s ease-in;
            display: flex;
            align-items: center;
            border-radius: 10px;
            padding: 0px;
            margin: 0px;
            padding: 12px 7px 0px 7px;
            color: grey;
        }

        .nav-list a:hover {
            /* background-color: #80809D; */
            background-color: #DEE0E8;
            color: white;
        }

        .nav-list .material-icons {
            margin-right: 10px;
            font-size: 22px;
            margin-top: 4px;
        }

        .input-header {
            width: 40%;
            float: right;
        }

        #bar {
            display: none;
        }

        .mobile-nav {
            display: none;
        }

        .times {
            display: none;
        }

        .balance {
            border-bottom: 1px solid silver;
        }

        .menu {
            font-weight: bold;
            color: grey;
            font-size: x-small;
            margin-bottom: 0px;
        }

        .balance-div {
            border-top: 1px solid silver;
            border-bottom: 1px solid silver;
            border-radius: 4px;
            /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
            background-color: #F2F3F7;
        }

        .menu-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            /* width: 160px; */
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
            right: 10px;
            top: 49px;
            width: 340px;
        }

        .menu-content a {
            text-decoration: none;
            padding: 7px 10px;
        }

        .name-tag {
            padding-left: 10px;
        }

        .name-tag p:first-child {
            font-family: sans-serif;
            text-transform: capitalize;
            font-size: medium;
        }

        @media screen and (max-width: 767px) {
            .menu-content {
                width: 320px;
                /* right: 0px; */
                /* padding: 0px; */
                padding-top: 20px;
            }

            .menu-content a {
                display: block;
            }

            .name-content {
                padding-left: 10px
            }

            .name-tag {
                display: block;
            }

            .avatar {
                width: 100px;
                border-radius: 7px;
                position: relative;
                width: 100%;
                /* display: flex; */
            }

            .grey-icon span {
                display: block;
            }

            .avatar img {
                float: unset;
            }
        }

        .button5 {
            background-color: #04AA6D; /* Green */
            border: none;
            color: white;
            padding: 1q0px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button5 {border-radius: 50%;}

        .name-details p {
            color: grey;
            word-wrap: break-word;
        }

        .bounce-icon {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
            100% {
                transform: translateY(0);
            }
        }



        @media screen and (max-width: 767px) {
            .section-30 {
                display: none;
            }

            #bar {
                display: block;
                margin-left: 10px;
                font-size: 30px;
            }

            .section-30 {
                width: 90%;
                z-index: 1100;
            }

            .mobile-nav {
                display: flex;
                justify-content: space-around;
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: #fff;
                box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
                padding: 8px 0;
                z-index: 1050;
                text-align: center;
            }

            .mobile-nav a {
                color: #8E99A3;
                text-decoration: none;
                font-size: 14px;
            }

            .section-40-content {
                padding-bottom: 90px;
            }

            .times {
                display: block;
                color: black;
            }

            .avatar {
                width: 100%;
                border-radius: 7px;
                padding-top: 0px;
            }

            .avatar img {
                float: unset;
                margin-left: 10px;
            }

            .grey-icon span {
                display: block;
            }

        }

        .preloader {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
        }

        .preloader-icon {
            font-size: 10px;
            animation: rotate 1s linear infinite;
            color: grey;
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        .refresh-icon {
            animation: rotate 2s linear infinite;
        }

        .dropdown-container {
            display: none;
            padding: 10px 20px;
        }

        .dropdown-container a {
            text-decoration: none;
            font-size: small;
        }

        /* for home icons */
        #trans-right {
            display: block;
        }

        #trans-down {
            display: none;
        }
        
        .balance-display {
            color: #EB7B54;
        }
        
        .balance-display span {
            font-size: small;
            color: grey;
        }

        .halal-contents, .deposit-contents, .withdrawal-contents, .loan-contents {
            display: none;
            padding-left: 30px
        }

        .halal-contents ul li, .deposit-contents ul li, .withdrawal-contents ul li, .loan-contents ul li  {
            color: grey;
            font-size: 15px;
        }

        .halal-contents ul li:hover, .deposit-contents ul li:hover, .withdrawal-contents ul li:hover, .loan-contents ul li:hover {
            color: #EB7B54;
            cursor: pointer;
        }
    </style>

    

    <script>
        

        document.addEventListener('DOMContentLoaded', function () {
            const sectionContent = document.querySelector('.section-40-content');
            const preloader = document.createElement('div');
            preloader.className = 'preloader';
            preloader.innerHTML = '<i class="fas fa-sync-alt preloader-icon"></i>';
            sectionContent.style.position = 'relative';
            sectionContent.appendChild(preloader);

            setTimeout(() => {
                preloader.style.display = 'none';
                sectionContent.style.overflow = 'auto';
            }, 1000);
        });

        $(document).ready(function() {
            $(".avatar").click(function() {
                $(".menu-content").toggle(100);
            })
        })

        document.addEventListener('DOMContentLoaded', function () {
            const welcomeDiv = document.querySelector('.welcome');
            setTimeout(() => {
                welcomeDiv.classList.add('slide-in');
            }, 100);
        });

        // Save the scroll position before the page unloads
        window.onbeforeunload = function() {
            localStorage.setItem('scrollPosition', window.scrollY);
        };

        // Restore the scroll position when the page loads
        window.onload = function() {
            const scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition) {
                window.scrollTo(0, parseInt(scrollPosition));
            }
        };
        

    </script>
    <script>
        window.onbeforeunload = function() {
            localStorage.setItem('scrollPosition', window.scrollY);
        };

        // Retrieve and scroll to previous position on load
        window.onload = function() {
            const scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition) {
                window.scrollTo(0, parseInt(scrollPosition));
              }
        };
    </script>
</head>
<body>
    <?php
        include __DIR__ . "/../randomNames.php";
    ?>

    <!-- display swal alert -->
    <?php
        // Display SweetAlert if error exists
        if (isset($_SESSION['swal_error'])): 
    ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire(<?= json_encode($_SESSION['swal_error']) ?>);
                });
            </script>
    <?php
        // Clear the error after displaying
        unset($_SESSION['swal_error']); 
        endif;
    ?>
    
    

    <div class="container-fluid w-100">
        <div class="row">
            <div class="col-0 col-md-3 section-30">
                <!-- Content for the 30% section -->
                <div class="d-flex justify-content-between">
                    <div class="logo pt-4 ">
                        <a href="<?= URL ?>index.php">
                            <img src="<?= URL ?>assets/images/logoIcon/logo-light.png" alt="" class="w-100">
                        </a>
                    </div>
                    <div class="pt-4 ml-2">
                        <span class="bi bi-x text-black fs-2 times"></span>
                    </div>
                </div>


                <!-- sticky header -->
                <div class="sticky-scrollable mt-2">
                    <div class="pt-4 balance-div pb-4">
                       <div class="container">
                            <p class="text-secondary mb-0">PERSONAL ACCOUNT</p>
                            <p class="fs-4 balance-display mt-0"><?= number_format($balance) ?>.00 <span class="small">USD</span></p>
                            <p class="mt-2 text-secondary"><?= $regNo ?> #</p>
                            
                            <div>
                                <a href="<?= URL ?>user/withdrawal.php" class="text-decoration-none">Withdraw Funds <span class="bi-download"></span></a>
                            </div>
                        </div>
                        
                    </div>

                    <!-- nav-list -->
                    <div class="nav-list">
                        <p class="menu mb-4"><span class='fa fa-bars'></span> MENU</p>
                        <a href="<?= URL ?>user/home.php" class="d-block text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <p><span class="bi-grid"></span> Dashboard</p>
                                <p><span class="bi-chevron-right"></span></p>
                            </div>
                        </a>
                        <a href="<?= URL ?>user/referrals.php" class="d-block text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <p><span class="bi-link"></span> Referral</p>
                                <p><span class="bi-chevron-right"></span></p>
                            </div>
                        </a>
                       
                        <a href="#" id="halal_con" class="d-block text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <p><span class="bi-piggy-bank"></span> Halal</p>
                                <p><span class="bi-chevron-right"></span></p>
                            </div>
                        </a>

                        <div class="halal-contents mt-2">
                            <ul>
                                <li class="mt-0 mb-2" onclick="window.location.href = '<?= URL ?>user/investment/halal.php'">New Halal</li>
                                <li class="mt-0 mb-0" onclick="window.location.href = '<?= URL ?>user/halal-history.php'">Halal History</li>
                            </ul>
                        </div>
                        
                        <?php 
                            $randomAlphabets = '';
                            $alphabets = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            
                            for ($i = 0; $i < 100; $i++) {
                                $randomAlphabets .= $alphabets[rand(0, strlen($alphabets) - 1)];
                            }
                        ?>

                        <a href="#" id="deposit_con" class="d-block text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <p class=""><span class="bi-upload"></span> Deposit</p>
                                <p><span class="bi-chevron-right"></span></p>
                            </div>
                        </a>

                        <div class="deposit-contents">
                            <ul>
                                <li onclick="window.location.href = '<?= URL ?>user/deposit-track.php?transaction-id=<?= $randomAlphabets ?>&&user=<?= $userId ?>'">Deposit Funds</li>
                                <li onclick="window.location.href = '<?= URL ?>user/deposit-history.php'">Deposit History</li>
                            </ul>
                        </div>

                        <a href="#" class="d-block text-decoration-none" id="withdrawal_con">
                            <div class="d-flex justify-content-between">
                                <p><span class="bi-download"></span> Withdrawal</p>
                                <p><span class="bi-chevron-right"></span></p>
                            </div>
                        </a>

                        <div class="withdrawal-contents">
                            <ul>
                                <li onclick="window.location.href = '<?= URL ?>user/withdrawal.php'">Withdraw Funds</li>
                                <li onclick="window.location.href = '<?= URL ?>user/withdrawal-history.php'">Withdrawal History</li>
                            </ul>
                        </div>

                        <?php if ($userId == 5): ?>
                            <a href="<?= URL ?>user/transfer/internal-transfer.php" class="d-block text-decoration-none">
                                <div class="d-flex justify-content-between">
                                    <p><span class="bi-arrow-left-right"></span> Transfer</p>
                                    <p><span class="bi-chevron-right"></span></p>
                                </div>
                            </a>
                        <?php endif ?>

                        <a href="<?= URL ?>user/transactions.php" class="d-block text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <p><span class="bi-clipboard-data"></span> Transactions</p>
                                <p><span class="bi-chevron-right"></span></p>
                            </div>
                        </a>
                        

                        <?php if ($userId == 5 || $userId == 6): ?>
                            <a href="<?= URL ?>user/loan/new-loan-application.php" class="d-block text-decoration-none" id="loan_con">
                                <div class="d-flex justify-content-between">
                                    <p><span class="bi bi-credit-card"></span> Loan</p>
                                    <p><span class="bi-chevron-right"></span></p>
                                </div>
                            </a>
                        <?php endif; ?>

                        <!-- loan contents -->
                        <div class="loan-contents">
                            <ul>
                                <li onclick="window.location.href = '<?= URL ?>user/loan/check-eligibility.php?user-eligibility=<?= $regNo ?>'">New Application</li>
                                <li onclick="window.location.href = '<?= URL ?>user/loan/loan-history.php'">Loan History</li>
                            </ul>
                        </div>  
                        

                        <a href="<?= URL ?>login.php?logout=1" onclick="logOut()" class="d-block text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <p>Logout</p>
                                <p><span class="bi bi-box-arrow-right"></span></p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Fixed bottom content -->
                
                <div class="fixed-bottom">
                    <!-- Fixed bottom content -->
                    <div class="container">
                        <a href="<?= URL ?>user/deposit-track.php?transaction-id=<?= $randomAlphabets ?>&&user=<?= $userId ?>" class="text-decoration-none align-center text-white"><button type="button" class="btn btn-primary btn-md w-100">Deposit Funds</button></a>
                    </div>
                </div>

                <!-- pop of messages -->
                
            </div>
            <div class="col-12 col-md-9 section-40">
                <div class="section-40-header">
                    <!-- Fixed header content -->
                    <div class="header-control">
                        <div class="pt-3 pl-2">
                            <span class="material-icons" id="bar">menu</span>
                        </div>
                        <div class="text-black mt-2 ml-3">
                            <form action="">
                                <div class="input-group" id="search-input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-text"><i class="bi-search"></i></span>
                                </div>
                            </form>
                        </div>
                        <div class="w-100 mt-2">
                            <div class="avatar">
                                <span class="fa fa-user-circle grey-icon mt-2 mr-3 "></span>

                                <!-- dropdown-content -->
                                <div class="menu-content">
                                    <!-- for image and username -->
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-2 col-2 mt-1">
                                                <?php if (strlen($avatar) < 1): ?>
                                                    <img src="<?= URL ?>assets/images/avatar/unknown.jpeg" alt="avatar">
                                                <?php else: ?>
                                                    <img src="<?= URL ?>assets/images/avatar/<?= $avatar ?>" alt="avatar">
                                                <?php endif ?>
                                            </div>
                                            <div class="col-md-10 col-10 name-tag pt-2">
                                                <p class="mb-0 text-secondary"><?= $username ?> <i class="material-icons small text-success mt-2">fiber_manual_record</i></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="name-content">
                                        <div>
                                            <p class="mb-0">#<?= $regNo ?></p>
                                        </div>
                                        <div class="name-details">
                                            <p class="mt-0 small"><span class="bi bi-envelope-open-fill"></span> <?= $email ?></p>
                                        </div>
                                      
                                    </div>
                                    <a href="<?= URL ?>user/profile.php" class="d-block"><span class="bi-person"></span> Profile</a>
                                    <a href="<?= URL ?>user/verification.php" class="d-block"><span class="bi-gear"></span> Settings</a>
                                    <?php if ($admin == 1): ?>
                                        <a href="<?= URL ?>admin/manage-users.php" class="d-block"><span class="bi-people"></span> Admin</a>
                                    <?php endif ?>
                                    <a href="<?= URL ?>login.php?logout=1" onclick="logOut()" class="d-block"><span class="bi-door-open"></span> Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-40-content">
                    <!-- Scrollable content -->

                    <!-- modal for search -->
                    <!-- Modal -->
                    <div class="modal fade modal-md" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="input-group" id="search-input-group">
                                            <input type="text" class="form-control" id="search-input" placeholder="Search..." onkeyup="searchTitles(this.value)">
                                            <span class="input-group-text"><i class="bi-search"></i></span>
                                        </div>
                                    </form>

                                    <div id="search-results"></div>
                                    <p class="search-helper-text mt-4 small"> Can't find what you're looking for? If you're unable to find the information you need, please visit our <a href="<?= URL ?>mail-us.php">Contact Us</a> page to reach out to our team. We'll do our best to assist you with your query. </p>
                                </div>
                            </div>
                        </div>
                    </div>





                    

                    <script>
                        document.getElementById('search-input-group').addEventListener('click', function() {
                        var modal = new bootstrap.Modal(document.getElementById('myModal'));
                        modal.show();
                        });
                        
                        $(document).ready(function() {
                            $("#bar").click(function() {
                                $(".section-30").toggle(100) && $(".menu-content").hide(0) && $(".section-40").hide(0);
                            })
                
                            $(".times").click(function() {
                                $(".section-30").hide(100) && $(".section-40").show(0);
                            })
                        })
                        
                        function logOut() {
                            event.preventDefault();
                            Swal.fire({
                                title : 'Are you sure?',
                                icon : 'warning',
                                showCancelButton : true,
                                confirmButtonText : 'Yes',
                                cancelButtonText : 'No, cancel!',
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '<?= URL ?>database.php?logout=1';
                                }
                            })
                        }
                    </script>
                    <script>
                      (function(d,t) {
                        var BASE_URL="https://app.chatwoot.com";
                        var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                        g.src=BASE_URL+"/packs/js/sdk.js";
                        g.defer = true;
                        g.async = true;
                        s.parentNode.insertBefore(g,s);
                        g.onload=function(){
                          window.chatwootSDK.run({
                            websiteToken: 'PZZF9bRikxYRZisZcwdeSFhR',
                            baseUrl: BASE_URL
                          })
                        }
                      })(document,"script");
                    </script>


