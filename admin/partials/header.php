<?php
    include __DIR__ . "/../../database.php";
    
    if (isset($_SESSION['user'])) {
        $userId = $_SESSION['user']['id'];
    }
    
    else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="icon" href="<?= URL ?>assets/images/logoIcon/favicon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 190px;
        }
    
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
    
        table th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: lighter;
        }
    
        table {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .card-title span {
            font-size: x-small;
        }
        
        .logo-img img {
            width: 120px;
        }
        
        #sidebar {
          position: absolute;
          top: 0;
          left: 0;
          width: 250px;
          height: 100vh;
          /*background-color: #333;*/
          padding: 20px;
          z-index: 1000;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header" style="background-color: #343A40">
                <?php
                    $query = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                    if (mysqli_num_rows($query) > 0) {
                        $data = mysqli_fetch_assoc($query);
                        $username = $data['username'];
                ?>
                        <h3><?= $username ?>! <span class="bi bi-emoji-smile"></span></h3>
                <?php
                    }
                ?>
                    
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="<?= URL ?>admin/manage-users.php">Manage Users</a>
                </li>
                <li>
                    <a href="<?= URL ?>admin/deposit.php">Deposits</a>
                </li>
                <li>
                    <a href="<?= URL ?>admin/withdrawal.php">Withdrawals</a>
                </li>
                <li>
                    <a href="<?= URL ?>admin/contact-us.php">Contact Us</a>
                </li>
                <li>
                    <a href="<?= URL ?>admin/kyc.php">KYC</a>
                </li>
                <li>
                    <a href="<?= URL ?>admin/halal.php">Halal</a>
                </li>
                <li>
                    <a href="<?= URL ?>admin/ambassadors.php">Ambassadors</a>
                </li>
                <li>
                    <a href="<?= URL ?>user/home.php">Return to site</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="logo-img">
                        <img src="<?= URL ?>assets/images/logoIcon/logo-light.png" alt="">
                    </div>
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <i class="material-icons">menu_open</i>
                    </button>
                </div>
            </nav>

            <div class="container-fluid mb-4" id="overview">
                <h2 id="title"></h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-header">Registered Users</div>
                            <div class="card-body">
                                <?php
                                    $query = mysqli_query($connection, "SELECT * FROM users");
                                    $users = mysqli_num_rows($query);
                                ?>
                                <h5 class="card-title"><?= $users ?></h5>
                                <p class="card-text">Total Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Withdrawal</div>
                            <div class="card-body">
                                <!--fetch accepted deposits-->
                                <?php
                                    $fetch = mysqli_query($connection, "SELECT * FROM withdrawal WHERE status= 'pending'");
                                    $withdrawal = mysqli_num_rows($fetch)
                                ?>
                                <!--check for todays withdrawal -->
                                <?php 
                                    $today = date('Y-m-d');
                                    $query = mysqli_query($connection, "SELECT * FROM withdrawal WHERE DATE(date) = '$today' AND status = 'pending'");
                                    if (mysqli_num_rows($query) >= 0) {
                                        $pendingWithdrawal = mysqli_num_rows($query);
                                    }
                                ?>
                                <h5 class="card-title"><?= $withdrawal ?> <span class="text-white">+<?= $pendingWithdrawal ?></span></h5>
                                <p class="card-text">Pending</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Deposits</div>
                            <div class="card-body">
                                <?php
                                    $sql = mysqli_query($connection, "SELECT * FROM deposit WHERE status= 'pending'");
                                    $pending = mysqli_num_rows($sql);
                                ?>
                                <!--check for todays kyc -->
                                <?php 
                                    $today = date('Y-m-d');
                                    $query = mysqli_query($connection, "SELECT * FROM deposit WHERE DATE(date) = '$today' AND status = 'pending'");
                                    if (mysqli_num_rows($query) >= 0) {
                                        $pendingDeposit = mysqli_num_rows($query);
                                    }
                                ?>
                                <h5 class="card-title"><?= $pending ?> <span class="text-white">+<?= $pendingDeposit ?></span></h5>
                                <p class="card-text">Pending </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-white bg-normal mb-3">
                            <div class="card-header text-black">KYC</div>
                            <?php
                                $sql = mysqli_query($connection, "SELECT * FROM kyc WHERE status= 'pending'");
                                $pending = mysqli_num_rows($sql);
                            ?>
                            
                            <div class="card-body">
                                <!--check for todays kyc -->
                                <?php 
                                    $today = date('Y-m-d');
                                    $query = mysqli_query($connection, "SELECT * FROM kyc WHERE DATE(date) = '$today' AND status = 'pending'");
                                    if (mysqli_num_rows($query) >= 0) {
                                        $pendingKYc = mysqli_num_rows($query);
                                    }
                                ?>
                                <h5 class="card-title text-black"><?= $pending ?> <span class="text-success small">+<?= $pendingKYc ?></span></h5>
                                <p class="card-text text-black">Pending</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card text-white bg-secondary mb-3">
                            <div class="card-header">Halal INV</div>
                            <?php
                                $sql = mysqli_query($connection, "SELECT * FROM halal WHERE status= 'pending'");
                                $pending = mysqli_num_rows($sql);
                            ?>
                            
                            <div class="card-body">
                                <!--check for todays halal -->
                                <?php 
                                    $today = date('Y-m-d');
                                    $query = mysqli_query($connection, "SELECT * FROM halal WHERE DATE(date) = '$today' AND status = 'pending'");
                                    if (mysqli_num_rows($query) >= 0) {
                                        $pendingDeposits = mysqli_num_rows($query);
                                    }
                                ?>
                                <h5 class="card-title"><?= $pending ?> <span class="small text-white">+<?= $pendingDeposits ?></span></h5>
                                <p class="card-text">Pending</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if (isset($_SESSION["error"])): ?>
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?=
                        $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>
            
            <?php if (isset($_SESSION["success"])): ?>
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?=
                        $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>
        

    