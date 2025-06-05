<?php
    include __DIR__ . "/./partials/header.php";

    if (isset($_GET['transaction'])) {
        $transactionId = $_GET['transaction'];
        $sql = mysqli_query($connection, "SELECT * FROM deposit_track WHERE transactionId = '$transactionId'");
        if (mysqli_num_rows($sql) > 0) {
            $data = mysqli_fetch_assoc($sql);
            $userId = $data['userId'];
?>

<style>
    #deposit-btn {
        color: #BB5441;
    }

    .wallet-box {
        width: 50%;
        margin: auto
    }

    @media screen and (max-width: 767px) {
        .wallet-box {
            width: 100%;
            margin: auto
        }
    }
</style>

<style>
    @media screen and (max-width: 767px) {
        .wallet {
            width: 90%;
            margin: auto
        }

        .deposit-history th:first-child, .deposit-history td:first-child {
            display: none;
        }
    }

    .dropdown-toggle {
        cursor: pointer;
        color: blue;
        text-decoration: none;
        /* padding-bottom: 80px; */
    }

    .deposit-history {
        display: none;
        margin-top: 20px;
    }

    .deposit-history table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 190px;
    }

    .deposit-history th, .deposit-history td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .deposit-history th {
        background-color: #f2f2f2;
        text-align: center;
        font-weight: lighter;
    }

    table {
        text-align: center;
        margin-bottom: 40px;
    }

    .copy-icon {
        cursor: pointer;
        margin-left: 10px;
        color: blue;
    }

    .bouncing-icon {
        display: inline-block;
        animation: bounce 1s infinite;
        font-size: 18px;
        color: red;
    }


    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
</style>
<script>
    document.getElementById("title_title").innerHTML = "Deposit | Expert Capitals";
</script>
            <!-- codes here -->
            <div class="container-fluid pt-4 pb-4">
                <!-- overview here -->
                <div class="container-fluid mt-4">
                    <p class="fs-4 text-secondary">Overview</p>

                    <div class="row">
                        <div class="col-md-3 pt-4 pb-4 shadow">
                            <!-- total deposits -->
                            <?php  
                                $sql = mysqli_query($connection, "SELECT * FROM deposit WHERE userId= '$userId' AND status= 'accepted'");
                                $totalDeposit = 0;
                                if (mysqli_num_rows($sql) > 0) {
                                    $totalDeposit = 0;
                                    foreach ($sql as $row) {
                                        $totalDeposit += $row['amount'];
                                    }
                                }
                                else {
                                    $totalDeposit = 0;
                                }
                            ?>
                            <div class="container text-center">
                                <p class="text-secondary">Total Deposit</p>
                                <p class="text-secondary">$<?= $totalDeposit ?>.00</p>
                            </div>
                        </div>
                        <div class="col-md-3 pt-4 pb-4 shadow">
                            <!-- for pending deposit -->
                            <?php
                                $sql = mysqli_query($connection, "SELECT * FROM deposit WHERE userId= '$userId' AND status= 'pending'");
                                $pending = mysqli_num_rows($sql);
                            ?>
                            <div class="container text-center">
                                <p class="text-secondary">Pending Deposit</p>
                                <p class="text-secondary"><?= $pending ?></p>
                            </div>
                        </div>
                        <div class="col-md-3 pt-4 pb-4 shadow">
                            <!-- for deposit interest -->
                            <?php
                                $sql = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                                if (mysqli_num_rows($sql) > 0) {
                                    $data = mysqli_fetch_assoc($sql);
                                    $interest = $data['deposit_interest'];
                                }
                            ?>
                            <div class="container text-center">
                                <p class="text-secondary">Interest</p>
                                <p class="text-secondary">$<?= $interest ?>.00</p>
                            </div>
                        </div>
                        <div class="col-md-3 pt-4 pb-4 shadow">
                            <div class="container text-center">
                                <p class="text-secondary">View History</p>
                                <a href="<?= URL ?>user/deposit-history.php">
                                    <button type="button" class="btn btn-info text-white w-100 btn-sm">View</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>




                <form action="<?= URL ?>user/deposit-save.php" method="POST" >
                    <input type="hidden" name="userId" value="<?= $userId ?>" id="">
                    <p class="mt-4 fs-4 mb-4 text-secondary"><span class="bi-upload small bounce-icon"></span> Choose Your Deposit Wallet</p>
                    <div class="text-center">
                        <p class="">► Selecting the correct wallet address will enable us to credit your deposits to the correct account, and your balance will be updated accordingly on our website.</p>
                        <p class="">► Please choose your preferred wallet address from the options below to proceed with your deposit.</p>
                        <p class=" text-danger">► To initiate a deposit, please ensure that the amount you enter is $50 or more.</p>
                    </div>
                    <div class="wallet-box">
                        <!-- alerts -->
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <?=  
                                    $_SESSION['error'];
                                    unset($_SESSION['error']);
                                ?>
                            </div>
                        <?php endif ?>

                        
                           

                        <label for="" class="small">Wallet Address →</label>
                        <select name="walletName" id="" class="form-control">
                            <option value="" disabled>Select a preferred address</option>
                                <?php
                                    $fetch = mysqli_query($connection, "SELECT * FROM wallet");
                                    if (mysqli_num_rows($fetch) > 0) {
                                        foreach ($fetch as $key) {
                                            $walletName = $key['walletName'];
                                            $walletId = $key['walletId'];
                                ?>
                                            <option value="<?= $walletId ?>"><?= $walletName ?></option>
                                <?php
                                        }
                                    }
                                ?>
                        </select>

                        <div class="form-group mt-2">
                            <label for="amount" class="small">Amount →</label>
                            <div class="input-group">
                                <span class="input-group-text text-secondary" id="toggle-confirm-password"><i class="fas fa-dollar-sign"></i></span>
                                <input type="number" name="amount" id="amount" value="<?= $amount ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-outline-primary w-100 mt-4">Proceed</button>
                        </div>
                    </div>

                </form>
            </div>


<?php
        }

        else {
            header('location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('toggle-history').addEventListener('click', function() {
            const history = document.getElementById('deposit-history');
            if (history.style.display === 'none' || history.style.display === '') {
                history.style.display = 'block';
            } else {
                history.style.display = 'none';
            }
        });
    });

    function copyToClipboard(text) {
        const tempInput = document.createElement('input');
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        alert('Wallet address copied to clipboard');
    }
</script>


<?php
    include __DIR__ . "/./partials/footer.php";
?>