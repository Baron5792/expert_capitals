<?php
    include "./partials/header.php";
?>

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

    @media screen and (max-width: 767px) {
        table th:nth-child(2), table td:nth-child(2), table th:nth-child(3), table td:nth-child(3) {
            display: none;
        }
    }
</style>


<div class="container-fluid">

    

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
                    $amount = 0;
                    foreach ($query as $row) {
                        $amount += $row['amount'];
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
                <p class="text-secondary">Make a withdrawal</p>
                <a href="<?= URL ?>user/withdrawal.php">
                    <button type="button" class="btn btn-primary w-100 btn-sm">New</button>
                </a>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['withdraw-success'])): ?>
        <div class="alert alert-dismissible alert-success mt-3 mb-3">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?=     
                $_SESSION['withdraw-success'];
                unset($_SESSION['withdraw-success']);
            ?>
        </div>  
    <?php endif ?>


    <div class="bg-white pb-4 mt-4">
        <p class="fs-4 text-secondary"><span class="fa fa-chart-line bounce-icon"></span> Deposit History</p>
    </div>

    <!-- table here -->
    <!-- table here -->
    <table>
        <thead>
            <tr>
                <th>S/N</th>
                <th>Transaction ID</th>
                <th>Amount ($)</th>
                <th>Wallet</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php  
            $sql = mysqli_query($connection, "SELECT * FROM withdrawal WHERE userId= '$userId' ORDER BY date DESC");
            $sn = 1;
            if (mysqli_num_rows($sql) > 0) {
                foreach ($sql as $data) {
                    $uniqId = $data['uniqId'];
                    $amount = $data['amount'];
                    $wallet = $data['wallet'];
                    $walletId = $data['walletId'];
                    $status = $data['status'];
                    $date = $data['date'];
                    $day = date('j', strtotime($date));
                    $month = date('F', strtotime($date));
                    $year = date('Y', strtotime($date));
                    $time = date('h:i A', strtotime($date));
                    $formattedDate = "$day $month $year";
        ?>    
                    <tr class="small">
                        <td><?= $sn++ ?></td>
                        <td><?= $uniqId ?></td>
                        <td><?= $amount ?></td>
                        <td><?= $wallet ?></td>
                        <?php if ($status == 'pending'): ?>
                            <td><button type="button" class="btn btn-warning btn-sm button button4 text-sm">Pending</button></td>
                        <?php elseif ($status == 'accepted'): ?>
                            <td><button type="button" class="btn btn-success btn-sm button button4">Accepted</button></td>
                        <?php else: ?>
                            <td><button type="button" class="btn btn-danger btn-sm button button4">Declined</button></td>
                        <?php endif ?>
                        <td><?= $formattedDate ?></td>
                    </tr>
        <?php
                }
            }

            else {
        ?>
                <tr class="small">
                    <td class="bounce-icon" colspan="7">No records found</td>
                </tr>
        <?php
            }
        ?>
                
        </tbody>
    </table>
</div>



<?php
    include "./partials/footer.php";
?>