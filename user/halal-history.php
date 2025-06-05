<?php
    include __DIR__ . "/./partials/header.php";
?>

<style>
    #halal-btn {
        color: #BB5441;
    }

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

    @media screen and (max-width: 767px) {
        table th:nth-child(2), table td:nth-child(2), table th:nth-child(3), table td:nth-child(3) {
            display: none;
        }
    }
</style>

<script>
    document.getElementById("title_title").innerHTML = "Halal History | Expert Capitals";
</script>

<div class="container-fluid mt-4">
    <p class="fs-4 text-secondary">Halal History</p>

    <!-- overview -->
    
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
                    if (mysqli_num_rows($sql) > 0) {
                        $pending = mysqli_num_rows($sql);
                    }
                    else {
                        $pending = 0;
                    }
                        
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
                    <p class="text-secondary">Make an investment</p>
                    <a href="<?= URL ?>user/investment/halal.php">
                        <button type="button" class="btn btn-info btn-sm w-100 text-white">New <span class="fa fa-angle-right small"></span></button>
                    </a>
                </div>
            </div>
        </div>

        <!-- alerts -->
        <?php if (isset($_SESSION['confirm-success'])): ?>
            <div class="alert alert-dismissible alert-success mt-4">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <?=
                    $_SESSION['confirm-success'];
                    unset($_SESSION['confirm-success']);
                ?>
            </div>
        <?php endif ?>

    <table class="mt-4">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Transaction ID</th>
                <th>Wallet</th>
                <th>Amount ($)</th>
                <th>Plan</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
            <?php
                $fetch = mysqli_query($connection, "SELECT * FROM halal WHERE userId= '$userId' ORDER BY date DESC");
                if (mysqli_num_rows($fetch) > 0) {
                    $sn = 1;
                    foreach ($fetch as $row) {
                        $uniqId = $row['uniqId'];
                        $wallet = $row['walletName'];
                        $amount = $row['amount'];
                        $plan = $row['plan'];
                        $status = $row['status'];
                        $date = $row['date'];

                        // Convert date to words
                        $day = date('j', strtotime($date));
                        $month = date('F', strtotime($date));
                        $year = date('Y', strtotime($date));
                        $time = date('h:i A', strtotime($date));
                        $formattedDate = "$day $month $year";
                        
                        if ($plan == 1) {
                            $plan = "Silver";
                        }  elseif ($plan == 2) {
                            $plan = "Gold";
                        }  elseif ($plan == 3) {
                            $plan = "Diamond";
                        }  elseif ($plan == 4) {
                            $plan = "Platinum";
                        }  else {
                            $plan = "Phantom";
                        }
                        
                        
            ?>
                        <tbody>
                            <tr class="small">
                                <td><?= $sn++ ?></td>
                                <td><?= $uniqId ?></td>
                                <td><?= $wallet ?></td>
                                <td><?= $amount ?></td>
                                <td><?= $plan ?></td>
                                <?php if ($status == 'pending'): ?>
                                    <td><button type="button" class="btn btn-warning btn-sm button button4 text-sm">Pending</button></td>
                                <?php elseif ($status == 'accepted'): ?>
                                    <td><button type="button" class="btn btn-success btn-sm button button4">Accepted</button></td>
                                <?php else: ?>
                                    <td><button type="button" class="btn btn-danger btn-sm button button4">Declined</button></td>
                                <?php endif ?>
                                <td><?= $formattedDate ?></td>
                            </tr>
                        </tbody>

            <?php
                    }
                }

                else {
            ?>  
                    <tbody>
                        <tr>
                            <td colspan="7">
                                <p class="bounce-icon small">No records found</p>
                            </td>
                        </tr>
                    </tbody>
            <?php
                }
            ?>
                
    </table>
</div>






<?php
    include __DIR__ . "/./partials/footer.php";
?>