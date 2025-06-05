<?php
    include __DIR__ . "/../partials/header.php";
?>

<style>
    #halal-btn {
        color: #BB5441;
    }

    option {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }
</style>

<script>
    document.getElementById("title_title").innerHTML = "Halal Investment | Expert Capitals";
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
                        <p class="text-secondary">Total Investment</p>
                        <p class="text-secondary">$<?= $totalAmount ?>.00</p>
                    </div>
                </div>
                <div class="col-md-3 shadow pt-4 pb-4 text-center">
                    <?php
                        $sql = mysqli_query($connection, "SELECT * FROM halal WHERE userId= '$userId' AND status= 'pending'");
                        $pendingAmount = 0;
                        $pending = mysqli_num_rows($sql);
                            
                    ?>
                    <div class="container">
                        <p class="text-secondary">Pending Investment</p>
                        <p class="text-secondary"><?= $pending ?></p>
                    </div>
                </div>
                <div class="col-md-3 shadow pt-4 pb-4 text-center">
                    <div class="container">
                        <p class="text-secondary">Halal contracts</p>
                        <p class="text-secondary">none</p>
                    </div>
                </div>
                <div class="col-md-3 shadow pt-4 pb-4 text-center">
                    <div class="container">
                        <p class="text-secondary">History</p>
                        <a href="<?= URL ?>user/halal-history.php">
                            <button type="button" class="btn btn-info btn-sm w-100 text-white">Halal History <span class="fa fa-angle-right small"></span></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <p class=" text-secondary fs-3 mt-4"><span class="bi-piggy-bank bounce-icon small"></span> Halal Plans</p>
        <!-- records -->
        
        <?php if (isset($_SESSION['halal-error'])): ?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <?=
                    $_SESSION['halal-error'];
                    unset($_SESSION['halal-error']);
                ?>
            </div>
        <?php endif ?>
    </div>
    <div class="row">
        <!-- halal01 -->
        <div class="col-12 col-md-4 mt-4 shadow pt-3 pb-3">
            <!--titanium plan-->
            <div class="container">
                <p class="text-center fs-4">Titanium Plan</p>
                <div>
                    <img src="<?= URL ?>assets/images/frontend/halal/halal (2).png" alt="" class="w-100">
                </div>
                <form action="<?= URL ?>user/halal-logic.php" method="POST">
                    <input type="hidden" name="plan" value="0">
                    <input type="hidden" name="userId" value="<?= $userId ?>">
                    <div>
                        <div class="d-flex justify-content-between pt-3">
                            <p class="small text-secondary"><span class="fas fa-hourglass small"></span> Duration</p>
                            <p class="small text-secondary">2 Weeks</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-coins small"></span> Amount</p>
                            <p class="small text-secondary">$100~$499</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-percentage small"></span> Interest</p>
                            <p class="small text-secondary">0.5% Daily</p>
                        </div>
                        <select name="wallet" id="" class="form-control small">
                            <option value="" disabled>Select Preferred Wallet</option>
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
                        <div class="form-group">
                            <input type="number" name="amount" class="form-control mt-2" min="100" max="499" id="" placeholder="Enter amount">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-outline-primary w-100 mt-3">Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
            
        <div class="col-12 col-md-4 mt-4 shadow pt-3 pb-3">
            <div class="container-fluid">
                <p class="text-center fs-4">Silver Plan</p>
                <div>
                    <img src="<?= URL ?>assets/images/frontend/halal/halal (2).png" alt="" class="w-100">
                </div>
                <form action="<?= URL ?>user/halal-logic.php" method="POST">
                    <input type="hidden" name="plan" value="1">
                    <input type="hidden" name="userId" value="<?= $userId ?>">
                    <div>
                        <div class="d-flex justify-content-between pt-3">
                            <p class="small text-secondary"><span class="fas fa-hourglass small"></span> Duration</p>
                            <p class="small text-secondary">1 Month</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-coins small"></span> Amount</p>
                            <p class="small text-secondary">$500~$5,999</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-percentage small"></span> Interest</p>
                            <p class="small text-secondary">0.8% Daily</p>
                        </div>

                        <select name="wallet" id="" class="form-control small">
                            <option value="" disabled>Select Preferred Wallet</option>
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

                        <div class="form-group">
                            <input type="number" name="amount" class="form-control mt-2" min="500" max="5999" id="" placeholder="Enter amount">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-outline-primary w-100 mt-3">Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- halal02 -->
        <div class="col-12 col-md-4 mt-4 shadow pt-3 pb-3">
            <div class="container">
                <p class="text-center fs-4">Gold Plan</p>
                <div>
                    <img src="<?= URL ?>assets/images/frontend/halal/halal (2).png" alt="" class="w-100">
                </div>
                <form action="<?= URL ?>user/halal-logic.php" method="POST">
                    <input type="hidden" name="plan" value="2">
                    <input type="hidden" name="userId" value="<?= $userId ?>">
                    <div>
                        <div class="d-flex justify-content-between pt-3">
                            <p class="small text-secondary"><span class="fas fa-hourglass small"></span> Duration</p>
                            <p class="small text-secondary">3 Months</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-coins small"></span> Amount</p>
                            <p class="small text-secondary">$6,000~$20,999</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-percentage small"></span> Interest</p>
                            <p class="small text-secondary">1.1% Daily</p>
                        </div>
                        <select name="wallet" id="" class="form-control small">
                            <option value="" disabled>Select Preferred Wallet</option>
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
                        <div class="form-group">
                            <input type="number" name="amount" class="form-control mt-2" min="6000" max="20999" id="" placeholder="Enter amount">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-outline-primary w-100 mt-3">Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- halal03 -->
        <div class="col-12 col-md-4 mt-4 shadow pt-3 pb-3">
            <div class="container">
                <p class="fs-4 text-center">Diamond Plan</p>
                
                <div>
                    <img src="<?= URL ?>assets/images/frontend/halal/halal (2).png" alt="" class="w-100">
                </div>
                <form action="<?= URL ?>user/halal-logic.php" method="POST">
                    <input type="hidden" name="userId" value="<?= $userId ?>">
                    <input type="hidden" name="plan" value="3">
                    <div>
                        <div class="d-flex justify-content-between pt-3">
                            <p class="small text-secondary"><span class="fas fa-hourglass small"></span> Duration</p>
                            <p class="small text-secondary">4 Months</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-coins small"></span> Amount</p>
                            <p class="small text-secondary">$21,000~$59,999</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-percentage small"></span> Interest</p>
                            <p class="small text-secondary">1.4% Daily</p>
                        </div>
                        <select name="wallet" id="" class="form-control small">
                            <option value="" disabled>Select Preferred Wallet</option>
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
                        <div class="form-group">
                            <input type="number" name="amount" class="form-control mt-2" min="10000" max="99999" id="" placeholder="Enter amount">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-outline-primary w-100 mt-3">Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- halal04 -->
        <div class="col-12 col-md-4 mt-4 shadow pt-3 pb-3">
            <div class="container">
                <p class="fs-4 text-center">Platinum Plan</p>
                
                <div>
                    <img src="<?= URL ?>assets/images/frontend/halal/halal (2).png" alt="" class="w-100">
                </div>
                <form action="<?= URL ?>user/halal-logic.php" method="POST">
                    <input type="hidden" name="userId" value="<?= $userId ?>">
                    <input type="hidden" name="plan" value="4">
                    <div>
                        <div class="d-flex justify-content-between pt-3">
                            <p class="small text-secondary"><span class="fas fa-hourglass small"></span> Duration</p>
                            <p class="small text-secondary">5 months</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-coins small"></span> Amount</p>
                            <p class="small text-secondary">$60,000~$499,999</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-percentage small"></span> Interest</p>
                            <p class="small text-secondary">1.7% Daily</p>
                        </div>
                        <select name="wallet" id="" class="form-control small">
                            <option value="" disabled>Select Preferred Wallet</option>
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
                        <div class="form-group">
                            <input type="number" name="amount" class="form-control mt-2" min="60000" max="499999" id="" placeholder="Enter amount">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-outline-primary w-100 mt-3">Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- halal five -->
        <div class="col-12 col-md-4 mt-4 shadow pt-3 pb-3">
            <div class="container">
                <p class="fs-4 text-center">Phantom Plan (VIP)</p>
                
                <div>
                    <img src="<?= URL ?>assets/images/frontend/halal/halal (2).png" alt="" class="w-100">
                </div>
                <form action="<?= URL ?>user/halal-logic.php" method="POST">
                    <input type="hidden" name="userId" value="<?= $userId ?>">
                    <input type="hidden" name="plan" value="5">
                    <div>
                        <div class="d-flex justify-content-between pt-3">
                            <p class="small text-secondary"><span class="fas fa-hourglass small"></span> Duration</p>
                            <p class="small text-secondary">6 Months</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-coins small"></span> Amount</p>
                            <p class="small text-secondary">$500,000~1m</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small text-secondary"><span class="fas fa-percentage small"></span> Interest</p>
                            <p class="small text-secondary">1.9% Daily</p>
                        </div>
                        <select name="wallet" id="" class="form-control small">
                            <option value="" disabled>Select Preferred Wallet</option>
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
                        <div class="form-group">
                            <input type="number" name="amount" class="form-control mt-2" min="500000" max="1000000" id="" placeholder="Enter amount">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-outline-primary w-100 mt-3">Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>









<?php
    include __DIR__ . "/../partials/footer.php";
?>
