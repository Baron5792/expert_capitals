<?php
    include "./partials/header.php";
    
    $address = $_SESSION['withdraw-data']['address'] ?? null;
    $amount = $_SESSION['withdraw-data']['amount'] ?? null;
    unset($_SESSION['withdraw-data']);
?>

<style>
    #withdraw-btn {
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

<script>
    document.getElementById("title_title").innerHTML = "Withdraw Funds | Expert Capitals";
</script>


<!-- codes here -->
<div class="container-fluid pt-4 pb-4">
    <!-- overview here -->
    <div class="container-fluid mt-4">
        <p class="fs-4 text-secondary">Overview</p>
    </div>

    <div class="row mb-4">
        <div class="col-md-3 shadow pt-4 pb-4">
            <!-- total withdrawal -->
            <?php
                $query = mysqli_query($connection, "SELECT * FROM withdrawal WHERE status= 'accepted' AND userId= '$userId'");
                if (mysqli_num_rows($query) > 0) {
                    foreach ($query as $row) {
                        $amount = $row['amount'];
                    }
                }
                else {
                    $amount = 0;
                }
            ?>
            <div class="container text-center">
                <p class="text-secondary">Total Withdrawal</p>
                <p class="text-secondary">$<?= $amount ?>.00</p>
            </div>
        </div>
        <div class="col-md-3 shadow pt-4 pb-4">
            <!-- pending -->
            <?php
                $sql = mysqli_query($connection, "SELECT * FROM withdrawal WHERE userId= '$userId' AND status= 'pending'");
                $pending = mysqli_num_rows($sql);
            ?>
            <div class="container text-center">
                <p class="text-secondary">Pending</p>
                <p class="text-secondary"><?= $pending ?></p>
            </div>
        </div>
        <div class="col-md-3 shadow pt-4 pb-4">
            <?php
                $sql = mysqli_query($connection, "SELECT * FROM withdrawal WHERE userId= '$userId' AND status= 'accepted'");
                $accepted = mysqli_num_rows($sql);
            ?>
            <div class="container text-center">
                <p class="text-secondary">Accepted</p>
                <p class="text-secondary"><?= $accepted ?></p>
            </div>
        </div>
        <div class="col-md-3 shadow pt-4 pb-4">
            <div class="container text-center">
                <p class="text-secondary">View History</p>
                <a href="<?= URL ?>user/withdrawal-history.php">
                    <button type="button" class="btn btn-primary w-100 btn-sm">View</button>
                </a>
            </div>
        </div>
    </div>



    <!-- contents here -->
    <form action="<?= URL ?>user/withdrawal-logic.php" method="POST">
        <input type="hidden" name="userId" value="<?= $userId ?>">
        <input type="hidden" name="balance" value="<?= $interest ?>">
        <p class="fs-4 text-secondary"><span class="bi-download bounce-icon"></span> Withdrawal</p>

        <div class="wallet-box">
            <!-- alert here -->
            <?php if (isset($_SESSION['withdraw-error'])): ?>
                <div class="alert alert-dismissible alert-danger mt-3 mb-3">
                    <!--<button type="button" class="btn-close" data-bs-dismiss="alert"></button>-->
                    <?=     
                        $_SESSION['withdraw-error'];
                        unset($_SESSION['withdraw-error']);
                    ?>
                </div>  
            <?php endif ?>

            <label for="wallet" class="small">Select Wallet</label>
            <select name="wallet" id="" class="form-control">
                <option value="" disabled>Enter preferred wallet</option>
                <?php
                    $query = mysqli_query($connection, "SELECT * FROM wallet");
                    if (mysqli_num_rows($query) > 0) {
                        foreach ($query as $row) {
                            $walletName = $row['walletName'];
                            $walletId = $row['walletId'];
                ?>
                            <option value="<?= $walletName ?>"><?= $walletName ?></option>
                <?php
                        }
                    }
                ?>
            </select>
            <div class="form-group mt-4">
                <label for="" class="small">Enter Wallet Address</label>
                <input type="text" value="<?= $address ?>" name="address" id="" class="form-control">
            </div>

            <div class="form-group mt-4">
                <label for="" class="small">Enter Amount</label>
                <input type="number" name="amount" id="" class="form-control">
            </div>

            <div class="form-group mt-4">
                <button type="submit" name="submit" class="btn btn-primary w-100">Proceed</button>
            </div>
        </div>
    </form>
</div>




<?php
    include "./partials/footer.php";
?>