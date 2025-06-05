<?php
    include __DIR__ . "/./partials/header.php";

    if (isset($_GET['halal-id'])) {
        $halalId = $_GET['halal-id'];

        $sql = mysqli_query($connection, "SELECT * FROM halal_track WHERE userId= '$userId' AND uniqId= '$halalId' ORDER BY date DESC LIMIT 1");

        if (mysqli_num_rows($sql) > 0) {
            $data = mysqli_fetch_assoc($sql);
            $walletId = $data['wallet'];
            $amount = $data['amount'];
            $plan = $data['plan'];

            // for wallet
            if ($plan == 1) {
                $type = "Silver Plan";
            }  elseif ($plan == 2) {
                $type = "Gold Plan";
            } elseif ($plan == 3) {
                $type = "Diamond Plan";
            } elseif ($plan == 4) {
                $type = "Platinum Plan";
            } else {
                $type = "Phantom Plan";
            }

            // fetch address
            $query = mysqli_query($connection, "SELECT * FROM wallet WHERE walletId= '$walletId'");
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $walletName = $row['walletName'];
            }
            else {
                echo "No wallet Found";
            }
?>
            <style>
                .walletId {
                    word-wrap: break-word;
                }

                #halal-btn {
                    color: #BB5441;
                }
            </style>
            <script>
                document.getElementById("title_title").innerHTML = "Halal Investment | Expert Capitals";
            </script>

            <script>
                function copyWalletId() {
                    const walletId = document.querySelector('.walletId').innerText;
                    const tempInput = document.createElement('input');
                    tempInput.value = walletId;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);
                    alert('Wallet Address copied to clipboard');
                }
            </script>

            <div class="container">
                <div class="col-md-12">
                    <div class="container-fluid mt-4">
                        <p class="overview mt-4 fs-4 text-secondary">Overview</p>
                        <div class="row">
                            <div class="col-md-3 shadow pt-4 pb-4 text-center">
                                <?php
                                    $sql = mysqli_query($connection, "SELECT * FROM halal WHERE userId= '$userId' AND status= 'accepted'");
                                    $totalAmount = 0;
                                    if (mysqli_num_rows($sql) > 0) {
                                        foreach ($sql as $key) {
                                            $totalAmount += $key['amount']; // Assuming 'amount' is the column name
                                        }
                                    }
                                        
                                ?>
                                <div class="container">
                                    <p class="fw-bold text-secondary">Total Investment</p>
                                    <p>$<?= $totalAmount ?>.00</p>
                                </div>
                            </div>
                            <div class="col-md-3 shadow pt-4 pb-4 text-center">
                                <?php
                                    $sql = mysqli_query($connection, "SELECT * FROM halal WHERE userId= '$userId' AND status= 'pending'");
                                    $pendingAmount = 0;
                                    if (mysqli_num_rows($sql) > 0) {
                                        $pending = mysqli_num_rows($sql);
                                    }
                                    else {
                                        $pending = 0;
                                    }
                                        
                                ?>
                                <div class="container">
                                    <p class="fw-bold text-secondary">Pending Investment</p>
                                    <p><?= $pending ?></p>
                                </div>
                            </div>
                            <div class="col-md-3 shadow pt-4 pb-4 text-center">
                                <div class="container">
                                    <p class="fw-bold text-secondary">Halal contracts</p>
                                    <p>none</p>
                                </div>
                            </div>
                            <div class="col-md-3 shadow pt-4 pb-4 text-center">
                                <div class="container">
                                    <p class="fw-bold text-secondary">Make an investment</p>
                                    <a href="<?= URL ?>user/investment/halal.php">
                                        <button type="button" class="btn btn-info btn-sm w-100 text-white">New <span class="fa fa-angle-right small"></span></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- alerts -->
                    <?php if (isset($_SESSION['confirm-error'])): ?>
                        <div class="alert alert-dismissible alert-danger mt-4">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <?=
                                $_SESSION['confirm-error'];
                                unset($_SESSION['confirm-error']);
                            ?>
                        </div>
                    <?php endif; ?>

                    <!-- contents here -->
                    <div class="container mt-4">
                        <div>
                            <p class="fs-4 text-secondary slide"><span class="fas fa-chart-line small bounce-icon"></span> Investment Details</p>
                            <p class="text-secondary">- Wallet Type: <?= $walletName ?> Wallet</p>
                            <p class="text-secondary">- Investment Amount: $<?= $amount ?>.00</p>
                            <p class="text-secondary">- Investment Plan: <?= $type ?></p>
                            <div>
                                <p>To proceed with your investment, please deposit the selected amount into the following <?= $walletName ?> wallet address:
                                </p>
                                <!-- wallet address -->
                                
                                <p class="fs-4 walletId"><?= $walletId ?> <button type="button" class="btn btn-normal" onclick="copyWalletId()"><span class=" fa fa-copy"></span></button></p>
                            </div>
                            <div>
                                <p class="text-secondary">- Please ensure to deposit the exact amount selected to avoid any delays.</p>
                                <p class="text-secondary">- Deposits made to incorrect wallet addresses will not be processed.</p>
                            </div>
                            <form action="<?= URL ?>user/halal-confirm-logic.php" method="POST">

                                <input type="hidden" name="userId" value="<?= $userId ?>">
                                <input type="hidden" name="walletName" value="<?= $walletName ?>">
                                <input type="hidden" name="walletId" value="<?= $walletId ?>">
                                <input type="hidden" name="plan" value="<?= $type ?>">
                                <input type="hidden" name="amount" value="<?= $amount ?>">

                                <div class="container-fluid mt-4">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="" class="text-secondary">Enter Transaction Hash <span class="fa fa-caret-down"></span></label>
                                            <input type="text" name="hash" class="form-control" id="" placeholder="Transaction Hash">
                                        </div>
                                        <div class="form-group col-md-6 mt-4">
                                            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


<?php

        }

        else {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }


    else {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
    include __DIR__ . "/./partials/footer.php";
?>