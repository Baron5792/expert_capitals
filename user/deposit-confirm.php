<?php
    include "./partials/header.php";

    if (isset($_GET['uniqid'])) {
        $uniqId = $_GET['uniqid'];
        $sql = mysqli_query($connection, "SELECT * FROM pre_deposit WHERE uniqId= '$uniqId' ORDER BY date DESC LIMIT 1");
        if (mysqli_num_rows($sql) > 0) {
            $data = mysqli_fetch_assoc($sql);
            $amount = $data['amount'];
            $walletId = $data['walletName'];
            $userId = $data['userId'];
            // $walletId = $data['walletId'];
        
            $check = mysqli_query($connection, "SELECT * FROM wallet WHERE walletId= '$walletId' LIMIT 1");
            if (mysqli_num_rows($check) > 0) {
                $row = mysqli_fetch_assoc($check);
                $address = $row['walletId'];
                // fetch wallets name
                $name = $row['walletName'];
            }
?>
            <style>
                .header {
                    border-bottom: 1px solid silver;
                    font-size: x-large;
                    padding: 10px 0px 0px 10px;
                }

                .wallet {
                    width: 40%;
                    margin: auto;
                    color: silver;
                }

                .address {
                    word-wrap: break-word;
                }

                @media screen and (max-width: 767px) {
                    .wallet {
                        width: 90%;
                        margin: auto
                    }
                }
            </style>

            <script>
                document.getElementById("title_title").innerHTML = "Confirm Deposit | Expert Capitals";
            </script>
            <div class="bg-white pb-4">
                <div class="w-100 header mb-4">
                    <p>Confirm Deposit</p>
                </div>


                <div class="container-fluid">
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
                                <p class="text-secondary fw-bold">Total Deposit</p>
                                <p>$<?= $totalDeposit ?>.00</p>
                            </div>
                        </div>
                        <div class="col-md-3 pt-4 pb-4 shadow">
                            <!-- for pending deposit -->
                            <?php
                                $sql = mysqli_query($connection, "SELECT * FROM deposit WHERE userId= '$userId' AND status= 'pending'");
                                $pending = mysqli_num_rows($sql);
                            ?>
                            <div class="container text-center">
                                <p class="text-secondary fw-bold">Pending Deposit</p>
                                <p><?= $pending ?></p>
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
                                <p class="text-secondary fw-bold">Interest</p>
                                <p>$<?= $interest ?>.00</p>
                            </div>
                        </div>
                        <div class="col-md-3 pt-4 pb-4 shadow">
                            <div class="container text-center">
                                <p class="text-secondary fw-bold">View History</p>
                                <a href="<?= URL ?>user/deposit-history.php">
                                    <button type="button" class="btn btn-info text-white w-100 btn-sm">View</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p>► You are about to make a deposit of <span class="fw-bold">$<?= $amount ?> (<?= $name ?>)</span> into the following wallet address:</p>
                    <!-- wallet address -->
                    <p class="fs-4 address"><?= $address ?> <span class="copy-icon text-secondary" onclick="copyToClipboard('<?= $address ?>')"><i class="fas fa-copy"></i></span></p>
                    <p>► Please copy the wallet address above and use it to initiate the deposit from your wallet.
                    </p>
                    <p class="text-danger">► (Note: You will be prompted to enter the transaction hash below after completing the deposit)
                    </p>
                </div>  

                <form action="<?= URL ?>user/deposit-confirm_logic.php" method="POST">
                    <!-- deposit details -->
                    <input type="hidden" name="userId" value="<?= $userId ?>">
                    <input type="hidden" name="uniqId" value="<?= $uniqId ?>">
                    <input type="hidden" name="walletName" value="<?= $name ?>"> <!-- wallet name -->
                    <input type="hidden" name="address" value="<?= $address ?>">  <!-- wallet address -->
                    <input type="hidden" name="amount" value="<?= $amount ?>">
                    
                    <div class="wallet">
                        <!-- alerts -->
                        <?php if (isset($_SESSION['deposit-error'])): ?>
                            <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <?=  
                                    $_SESSION['deposit-error'];
                                    unset($_SESSION['deposit-error']);
                                ?>  
                            </div>
                        <?php endif ?>

                        <label for="" class="text-black">Transaction Hash →</label>
                        <input type="text" name="hashed_id" class="form-control" id="">

                    </div>
                    
                    <div class="wallet">
                        <button type="submit" class="btn btn-outline-primary w-100 mt-4" name="submit">Procced</button>
                    </div>
                </form>
            </div>

        <script>
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
        }
        else {
            header('location: ' . URL . "login.php");
            die();
        }
    }

    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
?>


















<?php
    include "./partials/footer.php";
?>
