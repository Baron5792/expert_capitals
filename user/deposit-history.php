<?php
    include __DIR__ . "/./partials/header.php";
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
        table th:nth-child(2), table td:nth-child(2) {
            display: none;
        }
    }
</style>

<script>
    document.getElementById("title_title").innerHTML = "Deposit History | Expert Capitals";
</script>


<div class="container-fluid">
    <p class="fs-4 text-secondary mt-4 pb-4">Overview</p>

    <div class="row">
        <div class="col-md-3 pt-4 pb-4 shadow">
            <!-- total deposits -->
            <?php  
                $sql = mysqli_query($connection, "SELECT * FROM deposit WHERE userId= '$userId' AND status= 'accepted'");
                $totalDeposit = 0;
                if (mysqli_num_rows($sql) > 0) {
                    foreach ($sql as $row) {
                        $totalDeposit = $row['amount'];
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
                <p class="text-secondary">Make a deposit</p>
                <a href="<?= URL ?>user/deposit-track.php?transaction-id=<?= $randomAlphabets ?>&&user=<?= $userId ?>">
                    <button type="button" class="btn btn-info text-white w-100 btn-sm">New</button>
                </a>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire(<?= json_encode($_SESSION['success']) ?>);
            })
        </script>
    <?php 
        unset($_SESSION['success']);
        endif;
    ?>

    <div class="bg-white pb-4 mt-4">
        <p class="fs-4 text-secondary"><span class="fa fa-chart-line bounce-icon"></span> Deposit History</p>
    </div>


    <!-- table here -->
    <table>
        <thead>
            <tr>
                <th>S/N</th>
                <th>Transaction ID</th>
                <th>Amount</th>
                <th>Wallet</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <?php
            $sql = mysqli_query($connection, "SELECT * FROM deposit WHERE userId= '$userId' ORDER BY date DESC");
            if (mysqli_num_rows($sql) > 0) {
                $sn = 1;
                foreach ($sql as $key) {
                    $unidId = $key['uniqId'];
                    $amount  = $key['amount'];
                    $wallet = $key['walletName'];
                    $status = $key['status'];
                    $date = $key['date'];
                    $day = date('j', strtotime($date));
                    $month = date('F', strtotime($date));
                    $year = date('Y', strtotime($date));
                    $time = date('h:i A', strtotime($date));
                    $formattedDate = "$day $month $year";
        ?>
                    <tbody>
                        <tr class="small">
                            <td><?= $sn++ ?></td>
                            <td><?= $unidId ?></td>
                            <td>$<?= $amount ?></td>
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
                    </tbody>
        <?php
                }
            }

            else {
        ?>
                <tbody>
                    <tr class="small">
                        <td colspan="7" class="bounce-icon">No records found</td>
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